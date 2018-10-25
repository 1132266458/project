<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class RegController extends Controller
{
    //注册页面
    public function index(){
         // 加载模板
        return view('Home.reg.register');
    }
    // 处理注册
    public function check(Request $request){
        // var_dump($request->all());die;
        $arr = $request->except('_token');
        $arr = $request->except('user_repwd');
        // 加密密码
        $data['user_pwd'] = Hash::make($arr['user_pwd']);
        // 添加时间
        $data['user_addtime'] = date('Y-m-d H:i:s');
        // 添加默认状态 0开启 1封禁
        $data['user_state'] = 0;
        // 添加手机号
        $data['user_phone'] = $arr['user_phone'];
        // 添加用户名
        $data['user_name'] = $arr['user_name'];
        // 添加邮箱
        $data['user_email'] = $arr['user_email'];
        // 添加token
        $data['user_token'] = rand(1000,9999);
        // var_dump($data);
        if(DB::table('shop_user')->insert($data)){
            echo "<script>alert('恭喜您,注册成功!快去购物吧!^_^~');location='/homelogin'</script>";
        }else{
            echo "<script>alert('很抱歉,注册失败!);</script>";
        }
  }
    // 验证用户名是否已存在
    public function checkname(Request $request){
        // var_dump($request->all());
        $username = $request->input('userName');
        // var_dump($username);
        if(DB::table('shop_user')->where('user_name','=',$username)->first()){
            echo 0;
        }else{
            echo 1;
        }
  }
  // 注册手机号验证
    public function checkphone(Request $request){
        // var_dump($request->all());
        // 获取ajax传递过来的手机号
        $phone = $request['phonere'];
        // var_dump($phone);
        if(sendsphone($phone)){
            echo 1;
        }else{
            echo 2;
        }
    }
    // 校验码对比检测
    public function checkcode(Request $request){
        // echo 1;
        // var_dump($request->all());
        // 获取传过来的验证码
        $code = $request->input('code');
        // 获取cookie的验证码
        $codere = \Cookie::get('code');
        // cookie的验证码是整数  strval()转换成字符串
        $codere = strval($codere);
        // 判断
        if($code == $codere){
            echo 1;
        }else{
            echo 0;
        }

    }
    // 邮箱验证
    public function checkemail(Request $request){
         // var_dump($request->all());
        $userEmail = $request->input('userEmail');
        // var_dump($username);
        if(DB::table('shop_user')->where('user_email','=',$userEmail)->first()){
            echo 0;
        }else{
            echo 1;
        }
    }
}
