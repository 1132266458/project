<?php

namespace App\Http\Controllers\Home;

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
    public function index()
    {
        
        $info=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
        if($info){
            return view('Home.user.list',['info'=>$info]);
        }else{
            return view('Home.user.add');
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
    // 添加个人信息
    public function store(Request $request)
    {
        var_dump($request->hasFile('userinfo_pic'));
        $data=$request->except(['_token']);
        $data['user_id']=session('user_id');
        //判断是否具有文件上传
        if($request->hasFile('userinfo_pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('pic')->extension();
            $ext=$request->file("userinfo_pic")->getClientOriginalExtension();
            // dd($ext);
            //移动到指定的目录下（提前在public下新建uploads目录）
            $s=$request->file("userinfo_pic")->move("./uploads/user",$name.".".$ext);
            if(!$s){
                echo '<script>alert("上传错误");</script>';
            }else{
                $data['userinfo_pic']='./uploads/user/'.$name.'.'.$ext.'';
                if(DB::table('shop_userinfo')->insert($data)){
                    echo '<script>alert("保存成功");location="/homeuser"</script>';
                }else{
                    echo '<script>alert("保存失败");location="/homeuser"</script>';
                }  
            }
        }else{
            dd(1);
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
        $path=DB::table('shop_userinfo')->where('userinfo_id','=',$id)->first();
        $data=$request->except(['_token','_method']);
        //判断是否具有文件上传
        if($request->hasFile('userinfo_pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('pic')->extension();
            $ext=$request->file("userinfo_pic")->getClientOriginalExtension();
            // dd($ext);
            //移动到指定的目录下（提前在public下新建uploads目录）
            $s=$request->file("userinfo_pic")->move("./uploads/user",$name.".".$ext);
            if(!$s){
                echo '<script>alert("上传错误");</script>';
            }else{
                $data['userinfo_pic']='./uploads/user/'.$name.'.'.$ext.'';
                if(DB::table('shop_userinfo')->where('userinfo_id','=',$id)->update($data)){
                    unlink($path->userinfo_pic);
                    echo '<script>alert("修改成功");location="/homeuser"</script>';
                }else{
                    echo '<script>alert("修改失败");location="/homeuser"</script>';
                }  
            }
        }else{
            if(DB::table('shop_userinfo')->where('userinfo_id','=',$id)->update($data)){
                    echo '<script>alert("修改成功");location="/homeuser"</script>';
                }else{
                    echo '<script>alert("修改失败");location="/homeuser"</script>';
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
        //
    }
}
