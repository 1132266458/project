<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('shop_return')->get();
        
        foreach($data as $k=>$v){
            $info=DB::table('order_info')->where('id','=',$v->info_id)->first();
            $order=DB::table('shop_order')->where('order_id','=',$info->order_id)->first();
            $goods=DB::table('shop_goods')->where('goods_id','=',$info->goods_id)->first();
            $data[$k]->dev=['order_sn'=>$order->order_sn,'goods_name'=>$goods->goods_name];
        }
        // dd($data);
        return view('Admin.return.list',['data'=>$data]);
    }

    // 确认退款
    public function oktui($id){
        // echo $id;
        $s=DB::table('shop_return')->where('id','=',$id)->update(['return_state'=>1]);
        if($s){
            echo 1;
        }else{
            echo 2;
        }
    }

    // 拒绝退款
    public function notui($id){
        // echo $id;
        $s=DB::table('shop_return')->where('id','=',$id)->update(['return_state'=>2]);
        if($s){
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
}
