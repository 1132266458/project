<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $data = $request->session()->all();
        // var_dump($data);
        $data = session('shop');
        $user_id = session('user_id');
        // 根据session 的用户id 查找用户 地址数据
        $info = DB::table('shop_address')->where('user_id','=',$user_id)->get();
        // var_dump($info);
        return view('Home.orders.order',['info'=>$info,'data'=>$data]);
    }
    // 地址遍历
    public function address(Request $request){
        // var_dump($request->all());
        $upid = $request->input('upid');
        // 省级
        $list = DB::table('district')->where('upid','=',$upid)->get();
        echo json_encode($list);
        // var_dump($list);
    }
    // 添加地址
    public function doaddress(Request $request){
        // var_dump($_POST);
        // 根据session用户的ID 查询shop_address
            // 根据session传过来的订单id 
            $data['user_id'] = 1;
            // 用户的收货人姓名
            $data['name'] = $_POST['name'];
            // 用户的收货地址
            $data['address'] = $_POST['address'];
            // 用户收货手机
            $data['address_phone'] = $_POST['address_phone'];
            // 用户的联系邮箱
            $data['address_email'] = $_POST['address_email'];
            // 用户的收货地址省份
            $data['address_location'] = $_POST['address_location'];
            // 用户收货默认地址状态 1 是默认 
            $data['address_statue'] = 1;
            $res = DB::table('shop_address')->insert($data);
            if($res){
                echo "<script>alert('添加收货地址成功!');location='/homeorder';</script>";
            }else{
                echo "<script>alert('添加收货地址失败!');location='/homeorder';</script>";
            }
    }   
    public function sum(Request $request){
        // var_dump($request->all());
        $sum = $request->input('sum');
        // echo $sum;
        $res = session(['sum'=>$sum]);
        if($sum){
            echo 1;
        }else{
            echo 2;
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
    public function store(Request $request)
    {
        $list = session('shop');
        // 用户id
        $info['user_id'] = session('user_id');
        // 地址id
        $info['address_id'] = $_POST['address_id'];
        // 订单号
        $info['order_sn'] = rand(10,9999999999);
        // 支付单号
        $info['order_pay'] = rand(1,9999999);
        // 订单事件
        $info['order_addtime'] = time();
        // 支付方式
        $info['order_payment'] = '支付宝';
        // 订单总计
        $info['order_amount'] = session('sum');
        // 评论状态 默认0
        $info['order_evaluation'] = 0;
        // 支付状态 默认 1 (未支付)
        $info['order_state'] = 1;
        // 订单留言
        $info['order_messeges'] = $_POST['order_messeges'];
        // 根据地址id查询收货人详情
        $address = DB::table('shop_address')->where('address_id','=',$info['address_id'])->first();
        // var_dump($address);
        if(DB::table('shop_order')->insert($info)){
            // echo "<script>alert('提交订单成功!');</script>";
            return view('Home.orders.success',['info'=>$info,'list'=>$list,'address'=>$address]);
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



