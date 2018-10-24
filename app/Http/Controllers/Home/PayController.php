<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    //支付宝 接口调用
    public function pays($id){
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $id;
        //订单名称，必填
        $subject = '演示'; 
        // //付款金额，必填
        $total_fee = 0.01;
        //  //商品描述，可空
        $body = '';
        // 根据订单查询支付状态
        session(['order_id'=>$out_trade_no]);
        pay($out_trade_no,$subject,$total_fee,$body);

    }
    //通知界面
    public function returnurl(Request $request){
        // $data = $request->session()->all();
        // var_dump($data);
        $id = session('order_id');
        if(DB::table('shop_order')->where('order_sn','=',$id)->update(['order_state'=>2])){
            session()->pull('order_id');
            return view('Home.pay.pay');
        }
    }
}
