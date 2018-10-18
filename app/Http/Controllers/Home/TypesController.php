<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TypesController extends Controller
{		
		//分类数据的处理
    public function checkTypeData($data,$pid=0){

        // 新建数据
        $newArr=array();

        // 获取数据

        foreach ($data as $key => $value) {
            //如果相等就是顶级分类
            if ($value->pid==$pid) {
                # code...

                $newArr[$value->id]=$value;

                $newArr[$value->id]->zi=$this->checkTypeData($data,$value->id);
            }
        }

        // 返回数据
        return $newArr;
    }

    public function index(Request $request,$id){
    //根据获得到的id查询当前的分类
    $type=DB::table("shop_cates")->where("id","=",$id)->first();
    //将path路径处理成数组
    $arr=explode(',',$type->path);
    //计算这个数组的个数，为1是顶级分类，为2为二级分类，为3是三级分类
    $size=count($arr);
    //运用swith对不同的分类遍历出不同的商品
    //获取分页参数值
		$page=$request->input('page');
		//判断$page为空
		if(empty($page)){
		$page=1;
		} 
    //每页显示的数据条数
    $rev=8;
    //偏移量
		$offset=($page-1)*$rev;
    switch($size){
    	case '1':
    	//一级分类的时候通过分类id获取所有的子分类
    		$sanClass=DB::table("shop_cates")->where([["path","like","%,$id,%"],['pid','!=',$id]])->get();
    		$newArr=array();
    		foreach ($sanClass as $key => $value) {
    			$newArr[]=$value->id;
    		}
    		//在查询对应的商品并获取数据总条数
    		$tot=DB::table("shop_goods")->whereIn("type_id",$newArr)->count();
    		//获取数据最大页
		    $maxpage=ceil($tot/$rev);
		    $pp=array();
		    //for循环遍历页数
		    for($i=1;$i<=$maxpage;$i++){
		    			$pp[$i]=$i;
		    }
		    //将数组转化为字符串
		    $numin=implode(",",$newArr);
    		//var_dump($numin);
    		$sql="select * from shop_goods where type_id in($numin) limit $offset,$rev";
    		//执行sql
				$goods=DB::select($sql);
    		//dd($goods);
    		break;
    	case '2':
    		//二级分类，那么先查出分类表中父类id为当前id的所有子类
    		$goodsClass=DB::table("shop_cates")->where("pid","=",$id)->get();
    		//定义一个空数组，用于存放查询出来的子类id
    		$newArr=array();
    		foreach($goodsClass as $key=>$value){
    			$newArr[]=$value->id;
    		}
    		//在查询对应的商品
    		$tot=DB::table("shop_goods")->whereIn("type_id",$newArr)->count();
    		//获取数据最大页
		    $maxpage=ceil($tot/$rev);
		    $pp=array();
		    //for循环遍历页数
		    for($i=1;$i<=$maxpage;$i++){
		    			$pp[$i]=$i;
		    }
		    //将数组转化为字符串
		    $numin=implode(",",$newArr);
		    $sql="select * from shop_goods where type_id in($numin) limit $offset,$rev";
    		//执行sql
				$goods=DB::select($sql);		
    		break;
    	case '3':
    		//三级分类直接查询该分类下对应的商品
    		$tot=DB::table("shop_goods")->where("type_id","=",$id)->count();
		    $maxpage=ceil($tot/$rev);
		    $pp=array();
		    //for循环遍历页数
		    for($i=1;$i<=$maxpage;$i++){
		    			$pp[$i]=$i;
		    }
		    $sql="select * from shop_goods where type_id=$id limit $offset,$rev";
    		//执行sql
				$goods=DB::select($sql);
    		break;
    }
	    //处理分类页面左侧的折叠菜单
	    //分类
    	$types=DB::table('shop_cates')->get();
    	//递归处理数据
    	$typeall=$this->checkTypeData($types);
    	//判断当前请求是否为Ajax请求
			if($request->ajax()){
			// echo $page;exit;
			//加载一个独立的模板界面
			return view("Home.type.typespage",['goods'=>$goods]);
			}
	    //引入分类的页面,并且把分类id，商品信息，分类名，分类数据
	    return view("Home.type.types",['goods'=>$goods,'name'=>$type->name,'type'=>$typeall,'pp'=>$pp,'cate_id'=>$id]);
    }
}
