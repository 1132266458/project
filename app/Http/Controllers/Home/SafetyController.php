<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;
class SafetyController extends Controller
{
	public function index(){
		if(session()->has('user_name') && session()->has('user_id')){
			$id = session('user_id');
			$info = DB::table('shop_user')->where('user_id','=',$id)->first();
			$i=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
			// 加载模板
	    	return view('Home.safety.my-safety',['info'=>$info,'i'=>$i]);
		}else{
			return redirect('/homelogin');
		}
		
	}
	// 修改密码模板
	public function edpwd(){
		// 加载模板
		return view('Home.safety.edpwd');
	}
	// 修改密码
	public function doedpwd(Request $request){
		// 获取session信息
		$data = $request->session()->all(); 
		$id = session('user_id');	
		// var_dump($id);
		// var_dump($_POST);
		$pwd = $_POST['user_pwd'];
		// 根据用户的id查询原密码
		$res = DB::table('shop_user')->where('user_id','=',$id)->first();
		// 新密码
		$repwd = $_POST['user_repwd'];
		// 重复新密码
		$repwd2 = $_POST['user_repwd2'];
		// 原密码
		$rpwd = $res->user_pwd;
		// 判断原密码与输入原密码是否一致
		if(Hash::check($pwd,$rpwd)){
			// 主要这里 新密码 不能为空=空 
			if($repwd == $repwd2 && !empty($repwd)){
				$repwd = Hash::make($repwd);
				// 字符串变为数组
				$info['user_pwd'] = $repwd;
				// 写入数据库
				if(DB::table('shop_user')->update($info)){
					echo "<script>alert('密码修改成功,请重新登录!');location='/homelogin'</script>";
				}

			}else{
				return redirect('/useredpwd')->with('error','两次密码输入不一致');
			}
		}else{
			return redirect('/useredpwd')->with('error','原密码输入不正确');
		}
	}
	// 用户修改邮箱模板
	public function edemail(){
		$id = session('user_id');
		return view('Home.safety.edemail');
	}
	// 邮箱重置方法
	public function sendMail($id,$token,$mail){
			// var_dump($id,$token,$mail);exit;
	        // $message 消息生成器
	        //在闭包函数内部不能直接使用闭包函数外部的变量  如果想使用 use 导入
	        Mail::send('Home.safety.b',['id'=>$id,'token'=>$token,'email'=>$mail],function($message)use($mail){
	            $message->to($mail);
	            $message->subject('邮箱重置');
	        });
	        return true;
	    }
	// 用户修改邮箱
	public function doedemail(Request $request){
		// var_dump($_POST);
		$email = $_POST['user_email'];
		$id = session('user_id');
		// 判断用户输入的邮箱是否符合规则
		$list = DB::table('shop_user')->where('user_email','=',$email)->first();
		if (!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email)) {
			return redirect('/useredemail')->with('error','邮箱不符合规则');
		}else{
			if($list){
				// 如果一致发送邮箱
				// var_dump($list);exit;
				// echo '123';exit;
				$res = $this->sendMail($list->user_id,$list->user_token,$email);
				echo "<script>alert('邮件发送成功,请立即前往修改!');location='/usersafety';</script>";
			}else{
				return redirect('/useredemail')->with('error','原邮箱输入不正确');
			}
		}
	}
	// 修改邮箱
	public function editemail(Request $request){
		// var_dump($request->all());
		$id = $request->input('id');
		$res = DB::table('shop_user')->where('user_id','=',$id)->first();
		$data['user_email'] = $res->user_email;
		// var_dump($id);
		return view('Home.safety.editemail',['id'=>$id]);
	}
	// 处理修改邮箱
	public function doemail(Request $request){
		$info['user_email'] = $request->input('user_email');
		$id = $request->input('user_id');
		if (!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $info['user_email'])) {
			return redirect('/useredemail')->with('error','邮箱不符合规则');
		}else{
			if(DB::table('shop_user')->where('user_id','=',$id)->update($info)){
				echo "<script>alert('邮箱修改成功!');location='/usersafety';</script>";
			}

		}
	}
}
