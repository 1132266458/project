<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //获取数据
        $slider=DB::table("shop_slider")->paginate(10);
        return view("Admin.Slider.sliderlist",['slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Slider.slideradd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request->all());
        if($request->input('slider_title')==null || $request->input('slider_href')==null){
            return back()->with('error','请认真填写资料');
        };

        if(!$request->hasFile('slider_img')){
            return back()->with('error','请认真填写资料');
        }
        //判断是否具有文件上传
        if($request->hasFile('slider_img')){
        //初始化名字
        $name=time()+rand(1,10000);
        //获取上传文件后缀
        // $ext=$request->file('pic')->extension();
        $ext=$request->file("slider_img")->getClientOriginalExtension();
        // dd($ext);
        //移动到指定的目录下（提前在public下新建uploads目录）
        $request->file("slider_img")->move("./uploads/slider",$name.".".$ext);
        }
        //获取标题与超链接
        $arr['slider_title']=$request->input('slider_title');
        $arr['slider_href']=$request->input('slider_href');
        $arr['slider_img']=$name.".".$ext;
        if(DB::table('shop_slider')->insert($arr)){
           echo "<script>
            var index = parent.layer.getFrameIndex(window.name);
            window.parent.location.reload();
            parent.layer.close(index);
           </script>";
        }else{
            return back();
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
    public function destroy($id)
    {
        //
    }


}
