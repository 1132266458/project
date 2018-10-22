<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Goodsinsert;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 商品列表
    public function index()
    {
        $data=DB::table('shop_goods')->get();
        $type=[];
        foreach($data as $k=>$v){
            $l=DB::table('shop_cates')->where('id','=',$v->type_id)->first();
            $type[]=$l->name;
            $s=DB::table('shop_fovorite')->where('goods_id','=',$v->goods_id)->get();
            $data[$k]->num=count($s);
        }
        return view('admin.goods.list',['data'=>$data,'type'=>$type]);
    }

     // 禁用
    public function stop($id){
        $data=DB::table('shop_goods')->where('goods_id','=',$id)->update(['goods_status'=>1]);
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }
    // 启用
    public function start($id){
        $data=DB::table('shop_goods')->where('goods_id','=',$id)->update(['goods_status'=>0]);
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 返回添加商品页面
    public function create()
    {
        $data=DB::table('shop_cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        
        foreach($data as $k=>$v){
            $arr=explode(',',$v->path);
            $len=count($arr)-1;
            $data[$k]->name=str_repeat('--',$len).$v->name;
        };
        return view('admin.goods.add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加商品操作
    public function store(Goodsinsert $request)
    {
        // dd($request->str);
        // echo '<pre>';
        dd($request->all());
        $data=$request->except(['_token']);
        //判断是否具有文件上传
        if($request->hasFile('goods_pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('pic')->extension();
            $ext=$request->file("goods_pic")->getClientOriginalExtension();
            // dd($ext);
            //移动到指定的目录下（提前在public下新建uploads目录）
            $s=$request->file("goods_pic")->move("./uploads/goods",$name.".".$ext);
            if(!$s){
                echo '<script>alert("上传错误");var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);</script>';
            }else{
                $data['goods_pic']='./uploads/goods/'.$name.'.'.$ext.'';
                if(DB::table('shop_goods')->insert($data)){
                    echo '<script>alert("添加成功");var index = parent.layer.getFrameIndex(window.name);
                    window.parent.location.reload();
                    parent.layer.close(index);</script>';
                }else{
                    echo '<script>alert("添加失败");var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);</script>';
                }  
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
        $d=DB::table('shop_goods')->where('goods_id','=',$id)->first();
        $data=DB::table('shop_cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        
        foreach($data as $k=>$v){
            $arr=explode(',',$v->path);
            $len=count($arr)-1;
            $data[$k]->name=str_repeat('--',$len).$v->name;
        };
        return view('admin.goods.edit',['data'=>$data,'d'=>$d]);
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
        $path=DB::table('shop_goods')->where('goods_id','=',$id)->first();
        $data=$request->except(['_token','_method']);
        //判断是否具有文件上传
        if($request->hasFile('goods_pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('pic')->extension();
            $ext=$request->file("goods_pic")->getClientOriginalExtension();
            // dd($ext);
            //移动到指定的目录下（提前在public下新建uploads目录）
            $s=$request->file("goods_pic")->move("./uploads/goods",$name.".".$ext);
            if(!$s){
                echo '<script>alert("上传错误");var index = parent.layer.getFrameIndex(window.name);
            
            parent.layer.close(index);</script>';
            }else{
                $data['goods_pic']='./uploads/goods/'.$name.'.'.$ext.'';
                if(DB::table('shop_goods')->where('goods_id','=',$id)->update($data)){
                    unlink($path->goods_pic);
                    echo '<script>alert("修改成功");var index = parent.layer.getFrameIndex(window.name);window.parent.location.reload();parent.layer.close(index);</script>';
                }else{
                    echo '<script>alert("修改失败");var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';
                }  
            }
        }else{
            if(DB::table('shop_goods')->where('goods_id','=',$id)->update($data)){
                    echo '<script>alert("修改成功");var index = parent.layer.getFrameIndex(window.name);window.parent.location.reload();parent.layer.close(index);</script>';
                }else{
                    echo '<script>alert("修改失败");var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';
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
        $d=DB::table('shop_goods')->where('goods_id','=',$id)->first();
        $s=DB::table('shop_goods')->where('goods_id','=',$id)->delete();
        if($s){
            unlink($d->goods_pic); 
             echo 1;
        }else{
            echo 0;
        }
    }
}
