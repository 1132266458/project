<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 浏览用户
    public function index()
    {
        $data=DB::table('shop_user')->get();
        return view('admin.user.list',['data'=>$data]);
    }
    // 禁用
    public function stop($id){
        $data=DB::table('shop_user')->where('user_id','=',$id)->update(['user_state'=>1]);
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }
    // 启用
    public function start($id){
        $data=DB::table('shop_user')->where('user_id','=',$id)->update(['user_state'=>0]);
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
    public function show($id)
    {
        // echo $id;
        $data=DB::table('shop_userinfo')->where('user_id','=',$id)->first();
        // dd($data);
        if($data){
            return view('admin.user.show',['data'=>$data]);
        }else{
            echo "用户还没有添加详情信息~";
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
