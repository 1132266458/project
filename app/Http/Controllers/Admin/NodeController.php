<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 权限列表
    public function index(Request $request)
    {
        $key=$request->input('keywords');
        $data=DB::table('node')->where('name','like','%'.$key.'%')->get();
        return view('admin.admin.node',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 返回添加权限页面
    public function create()
    {
        return view('admin.admin.nodeadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加权限操作
    public function store(Request $request)
    {
        $arr=$request->str;
        parse_str($_POST['str'],$arr);
        unset($arr['_token']);
        // dd($arr);
        $s=DB::table('node')->insert($arr);
        if($s){
            echo 1;
        }else{
            echo 0;
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
    // 删除权限 并删除
    public function destroy($id)
    {
        if(DB::table('node')->where('id','=',$id)->delete()){
            DB::table('role_node')->where('nid','=',$id)->delete();
            echo 1;
        }else{
            echo 0;
        }
    }
}
