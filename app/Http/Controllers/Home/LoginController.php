<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;
class LoginController extends Controller
{
    // 登录页面
    public function index(){
    	// 加载登录页面
        return view('Home.login.login');
    }
    // 处理登录
    public function login(Request $request){
		$user_name = $request->input('user_name');  
		$user_pwd = $request->input('user_pwd');
		$res = DB::table('shop_user')->where('user_name','=',$user_name)->first();
		if($res){
			// 检测密码
			if(Hash::check($user_pwd,$res->user_pwd)){
				// 存储在session
				session(['user_name'=>$user_name]);
				session(['user_id'=>$res->user_id]);
				// $data = $request->session()->all();
				// var_dump($data);
				echo "<script>alert('登录成功!快去购物吧^_^');location='/home'</script>";
			}else{
				echo "<script>alert('账号或密码错误');location='/homelogin';</script>";
			}
		}else{
			echo "<script>alert('账号或密码错误');location='/homelogin';</script>";
		}

		}
	// 处理退出
	public function out(Request $request){
		$request->session()->pull('user_name');
		$request->session()->pull('user_id');
		return redirect('/home');	
	}
	// 邮箱发送方法
	public function sendMail($id,$token,$mail){
			// var_dump($id,$token,$mail);exit;
	        // $message 消息生成器
	        //在闭包函数内部不能直接使用闭包函数外部的变量  如果想使用 use 导入
	        Mail::send('Home.login.a',['id'=>$id,'token'=>$token],function($message)use($mail){
	            $message->to($mail);
	            $message->subject('密码重置');
	        });
	        return true;
	}
	public function forget(){
		return view('Home.login.forget');
	}
	// 处理忘记密码
	public function doforget(Request $request){
		$email = $request->input('user_email');
		// var_dump($email);
		// 获取数据库的数据
		$info = DB::table('shop_user')->where('user_email','=',$email)->first();
		$res = $this->sendMail($info->user_id,$info->user_token,$email);
		if($res){
			echo "<script>alert('重置密码的邮件已发送,请尽快重置密码!');location='/homelogin'</script>";
		}
	}
	// 密码重置模板
	public function reset(Request $request){
		$id = $request->input('id');
		$token = $request->input('token');
		// var_dump($request->all());
		// 数据库数据
		$res = DB::table('shop_user')->where('user_id','=',$id)->first();
		if($token == $res->user_token){
			return view('Home.login.doreset',['id'=>$id]);
		}
	}
	// 处理重置密码
	public function doreset(Request $request){
		$id = $request->input('id');
		$data['user_pwd'] = Hash::make($request->input('user_pwd'));
		$data['user_token'] = rand(1,10000); 
		// var_dump($user_pwd);
		if(DB::table('shop_user')->where('user_id','=',$id)->update($data)){
			echo "<script>alert('密码重置成功!');location='/homelogin'</script>";
		}
	}
}
