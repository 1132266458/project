<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   	public function index(){
   		return view('admin.index');
   	}

    // 清除缓存
    public function flush(Request $request){
    	function delDir($path){
    	$handle = opendir($path);
    	while($filename = readdir($handle)){
		//echo $filename.'<br/>';
		if($filename =='.' || $filename=='..'){
		continue;
			}
		$filepath = $path.'/'.$filename;
			if(is_file($filepath)){
			unlink($filepath);
				}

			//判断如果是目录 直接调用自己的函数
			if(is_dir($filepath)){
			delDir($filepath);
				}
			}
			closedir($handle);
			rmdir($path);
			return 1;
    	}
    	$path="../storage/framework/cache/data";
    	delDir($path);	
    	echo 1;
    }
}
