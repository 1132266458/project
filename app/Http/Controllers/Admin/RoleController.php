<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 角色列表
    public function index()
    {
        $data=DB::table('role')->get();
        return view('admin.admin.role',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 返回添加角色页面
    public function create()
    {
        return view('admin.admin.roleadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加角色
    public function store(Request $request)
    {
        // var_dump($_POST['name']);
        $s=DB::table('role')->insert(['level_name'=>$_POST['name']]);
        if($s){
            echo 1;
        }else{
            echo 2;
        }
    }

    // 返回设置权限页面
    public function auth($id){
        // echo $id;
        // 向role_node表插入数据
        $data=DB::table('role')->where('admin_level','=',$id)->first();
        $auth=DB::table('node')->get();

        $nn=DB::table('role_node')->where('rid','=',$id)->get();
        if(count($nn)){
          foreach($nn as $v){
            $nids[]=$v->nid;
          }
          return view('admin.admin.rnadd',['data'=>$data,'auth'=>$auth,'nids'=>$nids]);
        }else{
          return view('admin.admin.rnadd',['data'=>$data,'auth'=>$auth,'nids'=>[]]);
        } 
    }
    // 设置角色权限
    public function setauth(Request $request,$id){
      if(DB::table('role_node')->where('rid','=',$id)->delete()){
        $arr=$request->str;
        parse_str($_POST['str'],$arr);
        unset($arr['_token']);
        foreach($arr['nids'] as $key=>$val){
          $data['rid']=$id;
          $data['nid']=$val;
          DB::table('role_node')->insert($data);
        }
        echo 1;
      };
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
    // 删除角色
    public function destroy($id)
    {
        if(DB::table('role')->where('admin_level','=',$id)->delete()){
            DB::table('role_node')->where('rid','=',$id)->delete();
            echo 1;
        }else{
            echo 0;
        }
    }
}
