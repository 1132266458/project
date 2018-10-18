<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->pull('name');
        $request->session()->pull('nodelist');
        return redirect('/admin/adminlogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.login.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request->all());
        $name=$request->input('admin_name');
        $password=$request->input('admin_password');

        $s=DB::table('shop_admin')->where('admin_name','=',$name)->first();
        if($s){
            if(Hash::check($password,$s->admin_password)){
                // echo 'ok';
                session(['name'=>$name,'user_id'=>1]);
                // 管理员拥有权限
                //老师版本转换本人数据表版本
                // $list=DB::select("select n.name,n.controller_name,n.action_name from shop_admin as ur,role_node as rn,node as n where ur.admin_level=rn.rid and rn.nid=n.id and ur.admin_id={$s->admin_id}");
                // 本人版本
                $list=DB::select("select n.name,n.controller_name,n.action_name from role_node as rn,node as n where {$s->admin_level}=rn.rid and rn.nid=n.id");

                $nodelist['IndexController'][]="index";

                foreach($list as $key=>$value){
                  $nodelist[$value->controller_name][]=$value->action_name;
                  if($value->action_name=="create"){
                    $nodelist[$value->controller_name][]="store";
                  }
                  if($value->action_name=="edit"){
                    $nodelist[$value->controller_name][]="update";
                  }
                  if($value->action_name=="infoedit"){
                    $nodelist[$value->controller_name][]="infoupdate";
                  }
                }

                // echo '<pre>';
                // var_dump($nodelist);die;
                session(['nodelist'=>$nodelist]);

                return redirect('/admin');
            }else{
                return back()->with('error','密码有问题');
            }
         
        }else{
            return back()->with('error','账号有问题');
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
