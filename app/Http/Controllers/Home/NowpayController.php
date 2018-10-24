<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NowpayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 立即购买
    public function index()
    {
        
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
        if(session()->has('user_name') && session()->has('user_id')){
        
          // var_dump($_POST);
          $num=$_POST['num'];
          $goods_id=$_POST['id'];
          $data=DB::table('shop_goods')->where('goods_id','=',$goods_id)->first();
          $data->num=$num;
          $user_id = session('user_id');
          // 根据session 的用户id 查找用户 地址数据
          $info = DB::table('shop_address')->where('user_id','=',$user_id)->get();   
          return view('Home.orders.now',['info'=>$info,'data'=>$data]);
         
      }else{
        return redirect('/homelogin');
      }
    }

    // 添加收货地址
    public function nowadd(Request $request){
        // dd($request->all());
        $str=$request->input('str');
        unset($str['_token']);
        $str['address_statue']=0;
        $str['user_id']=session('user_id');
        $id=DB::table('shop_address')->insertGetId($str);
        if($id){
            echo '<ul class=" clearfix">
                    <li class="clearfix fl">
                      <div class="fl pc-address">
                        <input type="radio"value="'.$id.'"name="address_id" checked>
                        <span>'.$str["name"].'</span> 
                        <span>'.$str["address_location"].'</span>
                        <span>'.$str["address"].'</span>
                        <span>'.$str["address_phone"].'</span>
                      </div>
                    </li>
                  </ul>';
        }else{
            echo 'a';
        }
    }

    public function getup(Request $request){

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
        $info['order_amount'] = $_POST['sum'];
        // 评论状态 默认0
        $info['order_evaluation'] = 0;
        // 支付状态 默认 1 (未支付)
        $info['order_state'] = 1;
        // 订单留言
        $info['order_messeges'] = $_POST['order_messeges'];
        // 根据地址id查询收货人详情
        $address = DB::table('shop_address')->where('address_id','=',$info['address_id'])->first();
        $id=DB::table('shop_order')->insertGetId($info);
        // var_dump($list);exit;
        if($id){
            $order_info['num']=$_POST['num'];
            $order_info['goods_id']=$_POST['goods_id'];
            $order_info['order_id'] = $id;
            DB::table('order_info')->insert($order_info);
            $list=DB::table('shop_goods')->where('goods_id','=',$_POST['goods_id'])->first();
            $list->sum=$_POST['sum'];
            $sn=DB::table('shop_order')->where('order_id','=',$id)->first();
            return view('Home.orders.nowsuccess',['info'=>$info,'list'=>$list,'address'=>$address,'sn'=>$sn]);
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
