<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $ads=DB::table("shop_ads")->paginate(10);
        return view("Admin.Ads.adslist",['ads'=>$ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //添加页面
        return view("Admin.Ads.adsadd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       //判断是否具有文件上传
        if($request->hasFile('ads_img')){
        //初始化名字
        $name=time()+rand(1,10000);
        //获取上传文件后缀
        // $ext=$request->file('pic')->extension();
        $ext=$request->file("ads_img")->getClientOriginalExtension();
        // dd($ext);
        //移动到指定的目录下（提前在public下新建uploads目录）
        $request->file("ads_img")->move("./uploads/ads",$name.".".$ext);
        }
        //获取标题与超链接
        $arr['ads_title']=$request->input('ads_title');
        $arr['ads_href']=$request->input('ads_href');
        $arr['ads_img']=$name.".".$ext;
        $arr['ads_addtime']=date('Y-m-d H:i:s',time());
        if(DB::table('shop_ads')->insert($arr)){
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
