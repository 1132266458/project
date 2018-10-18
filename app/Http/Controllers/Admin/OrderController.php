<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('shop_order')->get();
        return view('admin.order.list',['data'=>$data]);
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
    // 订单详情信息 获取订单id
    public function show($id)
    {
        $info=DB::table('order_info')->where('order_id','=',$id)->get();
        $go=[];
        $order=DB::table('shop_order')->where('order_id','=',$id)->first();
        $address=DB::table('shop_address')->where('address_id','=',$order->address_id)->first();
        foreach($info as $k=>$v){
            // var_dump($v->goods_id);
            $goods=DB::table('shop_goods')->where('goods_id','=',$v->goods_id)->first();
            // var_dump($goods);
            $go[]=$goods;
            $go[$k]->num=$v->num;
        }
        // var_dump($go);
        return view('admin.order.info',['info'=>$info,'go'=>$go,'address'=>$address,'order'=>$order]);
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
