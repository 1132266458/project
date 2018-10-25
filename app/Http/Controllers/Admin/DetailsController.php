<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DetailsController extends Controller
{
    //商品详情添加模板
    public function index($id){
    	// 加载模板
        //字符串变成整数 
        $goods_id = intval($id);
        // var_dump($goods_id); 
    	return view('Admin.details.details-add',['goods_id'=>$goods_id]);
    }
    // 商品详情添加
    public function add(){
        if(empty($_POST['details'])){
            echo "<script>
                alert('商品详情不能为空');
                var index = parent.layer.getFrameIndex(window.name);

                window.parent.location.reload();

                parent.layer.close(index);
                </script>";
        }else{
            $data['goods_id'] = $_POST['goods_id'];
            $data['details'] = $_POST['details'];
            if(DB::table('goods_details')->insert($data)){
                // echo "<script>alert('商品详情添加成功');</script>";
                echo "<script>
                    alert('商品详情添加成功');
                    var index = parent.layer.getFrameIndex(window.name);

                    window.parent.location.reload();

                    parent.layer.close(index);
                    </script>";
            }
        }
        
    }
}
