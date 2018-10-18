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
        var_dump($data);
        // 根据session 的用户id 查找用户 地址数据
        $info = DB::table('shop_address')->join('shop_user','shop_address.user_id','=','shop_user.user_id')->select('shop_address.*')->get();
        // var_dump($info);
        return view('Home.orders.order',['info'=>$info]);
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
        var_dump($request->all());
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



