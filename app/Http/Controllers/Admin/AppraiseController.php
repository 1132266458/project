<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AppraiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('shop_appraise')->get();
        foreach($data as $k=>$v){
            $user=DB::table('shop_user')->where('user_id','=',$v->user_id)->first();
            $goods=DB::table('shop_goods')->where('goods_id','=',$v->goods_id)->first();
            $data[$k]->user_name=$user->user_name;
            $data[$k]->goods_name=$goods->goods_name;
            // var_dump($user);
        }
        // dd($data);
        return view('Admin.appraise.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    // 返回回复评论页面
    public function show($id)
    {
        $data=DB::table('shop_appraise')->where('appraise_id','=',$id)->first();
        return view('Admin.appraise.reply',['data'=>$data]);
    }

    // 回复评论
    public function reply(Request $request){
        
        $appraise_reply = $request->input("appraise_reply");
        if(empty($appraise_reply)){
            echo '<script>alert("不能为空!");var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);</script>';
        }else{
            $id=$request->input('appraise_id');
            $data=$request->except(['_token','appraise_id']);
            $s=DB::table('shop_appraise')->where('appraise_id','=',$id)->update($data);
            if($s){
                echo '<script>alert("回复成功");var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);</script>';
            }else{
                echo '<script>alert("回复失败");var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);</script>';
            }
        }
        
    }

    // 查看回复
    public function replyshow($id){
        // echo $id;
        $data=DB::table('shop_appraise')->where('appraise_id','=',$id)->first();
        if($data->appraise_reply){
            return view('Admin.appraise.replyshow',['data'=>$data]);
        }else{
            echo '还未进行回复';
        }
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
