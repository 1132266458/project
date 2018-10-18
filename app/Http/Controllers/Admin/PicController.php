<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        echo "这是一个神奇的世界";
    }

    // 查看商品图片
    public function piclist($id){
        $data=DB::table('goods_pics')->where('goods_id','=',$id)->get();
        return view('admin.goods.piclist',['data'=>$data]);
    }

    // 添加商品图片
    public function picadd($id){
        // echo $id;
        $data=DB::table('shop_goods')->where('goods_id','=',$id)->first();
        return view('admin.goods.picadd',['data'=>$data]);
    }

    // 添加商品图片操作
    public function doadd(Request $request){
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
                if(DB::table('goods_pics')->insert($data)){
                    echo '<script>alert("添加成功");var index = parent.layer.getFrameIndex(window.name);
            
            parent.layer.close(index);</script>';
                }else{
                    echo '<script>alert("添加失败");var index = parent.layer.getFrameIndex(window.name);
            
            parent.layer.close(index);</script>';
                }  
            }
        }else{
            echo '<script>alert("上传错误,您没有添加商品图片~");var index = parent.layer.getFrameIndex(window.name);
            
            parent.layer.close(index);</script>';
        }
    }

    // 商品图片的启用和禁用
    public function status(Request $request){
        $id=$request->input('id');
        $sta=$request->input('sta');
        // echo $id;
        $s=DB::table('goods_pics')->where('id','=',$id)->update(['pic_status'=>$sta]);
        if($sta==1){
            if($s){
                echo 1; 
            }else{
                echo 2;
            }  
        }elseif($sta==0){
            if($s){
                echo 0;
            }else{
                echo 3;
            }
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 删除商品图片
    public function destroy($id)
    {
        $d=DB::table('goods_pics')->where('id','=',$id)->first();
        $s=DB::table('goods_pics')->where('id','=',$id)->delete();
        if($s){if(unlink($d->goods_pic)){echo 1;}else{echo 0;}}else{echo 0;}
    }
}
