<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CarController extends Controller
{
    //购物车页
    public function index(){
    	$shop=session("shop");
    	// var_dump($shop);
        // dd(session('shop'));
    	return view("Home.car.car",['shop'=>$shop]);
    }

    //加入购物车
    public function addcar(Request $request){

    	$data=session("shop")?session("shop"):array();

    	//处理添加相同的商品时购物车的遍历问题
    	$a=0;
    	if($data){
    		//注意要改变原数组必须用在$value前面加&符
    		foreach ($data as $key => &$value) {
    			//如果添加的商品id一致则不需要再存入session，只需要将数量再原来的基础上加一
    			if($value['id']==$_GET['id']){
    				$value['num']=$value['num']+$_GET['num'];
    				$a=1;
    			}
    		}
    	}
        $list = DB::table("shop_goods")->where("goods_id","=",$_GET['id'])->first();
        $list->statue = 0;
    	//如果传递过来的数据不是第一次添加，则让其存入session
    	if(!$a){
    	//将传递过来的数据以数组的形式存入到session
    	//$data[]=array(),将session存入这样的二维数组，这样方便后面session数据的存储。
    	$data[]=array(
    		"id"=>$_GET['id'],
    		"num"=>$_GET['num'],
    		//在存入商品id时顺便将商品信息查询出来
    		"goodsinfo"=> $list,
    		);
    	}

    	//将找个数组的数据追加到session中
    	$request->session()->put("shop",$data);
    	//跳转到购物车页面
    	return redirect("car");
    }

    //ajax 购物车添加
    public function CarAdd(Request $request){
   // 获取修改的ID

        $id=$request->input('id');

        // 获取session中的商品数据

        $shop=session('shop');
        
        // 遍历数据

        foreach ($shop as $key => $value) {
            # code...

            // 修改数量
            if ($value['id']==$id) {
                # code...
								
                $shop[$key]['num']=++$shop[$key]['num'];
                //当num的数值超过商品的库存时则将num赋值与商品库存的最大值
                if($shop[$key]['num']>$shop[$key]['goodsinfo']->goods_num){
                	$shop[$key]['num']=$shop[$key]['goodsinfo']->goods_num;
                }
            }
        }

        // 写入session
        $request->session()->put('shop', $shop);

        echo 1;
    }

    //ajax 购物车减少
    public function CarJian(Request $request){
    	        // 获取修改的ID

        $id=$request->input('id');

        // 获取session中的商品数据

        $shop=session('shop');
        
        // 遍历数据

        foreach ($shop as $key => $value) {
            # code...
            // 修改数量
            if ($value['id']==$id) {
                # code...

                $shop[$key]['num']=--$shop[$key]['num'];
            }
        }

        // 写入session
        $request->session()->put('shop', $shop);

        echo 1;
    }
        // 购物车的删除

    public function CarDel(Request $request){

        // 接收ID

        $id=$request->input("id");

        // 获取购物车中所有的商品数据

        $shop=session('shop');

        // 遍历数据

        foreach ($shop as $key => $value) {
            # code...

            // 判断需要删除的数据

            if ($value['id']==$id) {
                unset($shop[$key]);
            }
        }
        // 写入sessiion
        $request->session()->put('shop', $shop);
        // 返回
        echo 1;
    }

    //购物车批量删除
    public function CarDelall(Request $request){
    	$a=$request->input('a');
    	$shop=session('shop');
    	foreach($a as $value){
    		foreach ($shop as $keys => $values){
    			if ($values['id']==$value){
    				//删除对应的子数组
    				unset($shop[$keys]);
    			}
    		}
    	}
      // 写入sessiion
      $request->session()->put('shop', $shop);
      // 返回
      echo 1;
    }

}
