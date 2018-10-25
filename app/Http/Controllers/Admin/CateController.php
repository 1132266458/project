<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CateController extends Controller
{
    public static function getcates(){

    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取总共有多少个分类
        $tot=DB::table('shop_cates')->count();

        //处理分页
        $page=$request->input('page');
        //判断$page为空
        if(empty($page)){
        $page=1;
        }
        $rev=10;
        //偏移量
        $offset=($page-1)*$rev;
        $tot=DB::table("shop_cates")->count();
        $maxpage=ceil($tot/$rev);
        $pp=array();
        //for循环遍历页数
        for($i=1;$i<=$maxpage;$i++){
            $pp[$i]=$i;
        }
        $key=$request->input('keywords');
        // echo '<pre>';
        // var_dump($key);
        $data=DB::table('shop_cates')->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$key.'%')->orderBy('paths')->offset($offset)->limit(10)->get();
        foreach($data as $k=>$v){
            $arr=explode(',',$v->path);
            $len=count($arr)-1;
            $data[$k]->name=str_repeat('--',$len).$v->name;
        };
        //dd($data);
        if($request->ajax()){
            // echo $page;exit;
            //加载一个独立的模板界面
            return view("admin.cate.catepage",['data'=>$data]);
            }
        return view('admin.cate.cate',['data'=>$data,'tot'=>$tot,'pp'=>$pp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=DB::table('shop_cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        foreach($data as $k=>$v){
            $arr=explode(',',$v->path);
            $len=count($arr)-1;
            $data[$k]->name=str_repeat('--',$len).$v->name;
        };
        return view('admin.cate.cateadd',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        $pid=$request->input('pid');
        if($pid==0){
            $data['path']=0;
            $data['level']=1;
            if(DB::table('shop_cates')->insert($data)){
                echo "<script>
                alert('信息添加成功');
                var index = parent.layer.getFrameIndex(window.name);

                window.parent.location.reload();

                parent.layer.close(index);
                </script>";
            }else{
                echo '<script>alert("添加失败");</script>';
            }
        }else{
            $info=DB::table('shop_cates')->where('id','=',$pid)->first();
            $data['path']=$info->path.','.$info->id;
            $arr=explode(',',$data['path']);
            // 给分类等级 方便处理
            $data['level']=count($arr);
            if(DB::table('shop_cates')->insert($data)){
                echo "<script>
                alert('信息添加成功');
                var index = parent.layer.getFrameIndex(window.name);

                window.parent.location.reload();

                parent.layer.close(index);
                </script>";
            }else{
                echo '<script>alert("添加失败");</script>';
            }
        }
   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        $info=DB::table('shop_cates')->where('id','=',$id)->first();
        $data=DB::table('shop_cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        
        foreach($data as $k=>$v){
            $arr=explode(',',$v->path);
            $len=count($arr)-1;
            $data[$k]->name=str_repeat('--',$len).$v->name;
        };
        return view('admin.cate.cateedit',['data'=>$data,'info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $data=$request->except(['_token','_method']);
        $pid=$request->input('pid');
        if($pid==0){
            $data['path']=0;
            $data['level']=1;
            if(DB::table('shop_cates')->where('id','=',$id)->update($data)){
                echo "<script>
                alert('信息修改成功');
                var index = parent.layer.getFrameIndex(window.name);

                window.parent.location.reload();

                parent.layer.close(index);
                </script>";
            }else{
                echo '<script>alert("添加失败");</script>';
            }
        }else{
            $info=DB::table('shop_cates')->where('id','=',$pid)->first();
            $data['path']=$info->path.','.$info->id;
            $arr=explode(',',$data['path']);
            // 给分类等级 方便处理
            $data['level']=count($arr);
            if(DB::table('shop_cates')->where('id','=',$id)->update($data)){
                echo "<script>
                alert('信息修改成功');
                var index = parent.layer.getFrameIndex(window.name);

                window.parent.location.reload();

                parent.layer.close(index);
                </script>";
            }else{
                echo '<script>alert("添加失败");</script>';
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //获取当前分类下是否具有子类信息 子类个数
        $res=DB::table("shop_cates")->where('pid','=',$id)->count();
        if($res>0){
            return 0;
        }

        $s=DB::table('shop_cates')->where('id','=',$id)->delete();
        if($s){
            echo 1;
        }else{
            echo 2;
        }
    }
}
