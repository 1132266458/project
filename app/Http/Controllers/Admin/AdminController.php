<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Adminform\AdminUserinsert;
use Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 管理员列表
    public function index()
    {
        $data=DB::table('shop_admin')->orderBy('admin_id')->get();
        $level=[];
        foreach($data as $k=>$v){
            $l=DB::table('role')->where('admin_level','=',$v->admin_level)->first();
            // var_dump($l->level_name);
            // $data[$k]->admin_level= $l->level_name;
            $level[]=$l->level_name;
            // var_dump($data[$k]->admin_level);
        }
        return view('admin.admin.list',['data'=>$data,'level'=>$level]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 返回添加管理员页面
    public function create()
    {
        $data=DB::table('role')->get();
        return view('admin.admin.add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加管理员操作
    public function store(Request $request)
    {
        $arr=$request->str;
        parse_str($_POST['str'],$arr);
        $arr['admin_password']=Hash::make($arr['admin_password']);
        $arr['admin_addtime']=time();
        unset($arr['_token']);
        unset($arr['admin_password2']);
        // var_dump($arr);exit;
        $s=DB::table('shop_admin')->insert($arr);
        if($s){
            echo 1;
        }else{
            echo 0;
        }
      
    }

    // 管理员的启用和禁用
    public function status(Request $request){
        $id=$request->input('id');
        $sta=$request->input('sta');
        // echo $id;
        $s=DB::table('shop_admin')->where('admin_id','=',$id)->update(['admin_statue'=>$sta]);
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

    // 返回管理员信息页面
    public function info($id){
        // dd($id);
        $info=DB::table('shop_admininfo')->where('admin_id','=',$id)->first();
        // dd($info);
        if($info!=null){
            return view('admin.admin.info',['info'=>$info]);
        }else{
            return view('admin.admin.infoadd',['id'=>$id]);
        }
        

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 添加管理员信息操作
    public function show(Request $request,$id)
    {
        $arr=$request->str;
        parse_str($_GET['str'],$arr);
        unset($arr['_token']);
        // dd($_FILES);
        // dd($request->file);
        $arr['admin_id']=$id;
        // var_dump($arr);exit;
        $s=DB::table('shop_admininfo')->insert($arr);
        if($s){
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 修改管理员页面
    public function edit($id)
    {
        $data=DB::table('shop_admin')->where('admin_id','=',$id)->first();
        // 角色表
        $a=DB::table('role')->get();

        return view('admin.admin.edit',['data'=>$data,'a'=>$a]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // 管理员修改操作
    public function update(Request $request, $id)
    { 
            $data=$request->str;
          parse_str($_POST['str'],$data);
          unset($data['_token']);
          unset($data['admin_password2']);
          $data['admin_password']=Hash::make($data['admin_password']);
            $data['admin_addtime']=time();
            if(DB::table('shop_admin')->where('admin_id','=',$id)->update($data)){
              echo 1;
            }else{
              echo 0;
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 删除管理员
    public function destroy($id)
    {
        $s=DB::table('shop_admin')->where('admin_id','=',$id)->delete();
        $ss=DB::table('shop_admininfo')->where('admin_id','=',$id)->delete();

        if($s){
            echo 1;
        }else{
            echo 0;
        }
    }
    // 返回管理员信息编辑页面
    public function infoedit($id){
      $data=DB::table('shop_admininfo')->where('admin_id','=',$id)->first();
      if($data!=null){
        return view('admin.admin.infoedit',['data'=>$data]);
      }else{
        return view('admin.admin.infoadd',['id'=>$id]);
      }
      
    }
    // 管理员信息编辑操作
    public function infoupdate($id){
      // echo '<pre>';
      // var_dump($_POST);
      unset($_POST['_token']);
      if(DB::table('shop_admininfo')->where('admininfo_id','=',$id)->update($_POST)){
           echo "<script>
            var index = parent.layer.getFrameIndex(window.name);
            window.parent.location.reload();
            parent.layer.close(index);
           </script>";
        }
    }

}
