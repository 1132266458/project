<?php

namespace App\Http\Controllers\Home;

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
    public function index(Request $request)
    {
        if(session()->has('user_name') && session()->has('user_id')){
            // 全部订单数
            $tot=DB::table("shop_order")->where('user_id','=',session('user_id'))->count();
            // 未付款订单数
           $w=DB::table('shop_order')->where('order_state','=',1)->where('user_id','=',session('user_id'))->count();
           // 代发货订单数
           $dd=DB::table('shop_order')->where('order_state','=',2)->where('user_id','=',session('user_id'))->count();
           // 代收货订单数
           $ddd=DB::table('shop_order')->where('order_state','=',3)->where('user_id','=',session('user_id'))->count();
           // 已收货订单数
           $dddd=DB::table('shop_order')->where('order_state','=',4)->where('user_id','=',session('user_id'))->count();
            //每页显示的数据条数
            $rev=5;
             //获取数据最大页
            $maxpage=ceil($tot/$rev);
            //获取参数page
            $page=$request->input('page');
            //判断
            if(empty($page)){
                $page=1;
            }
            //获取偏移量
            $offset=($page-1)*$rev;

            $data=DB::table('shop_order')->where('user_id','=',session('user_id'))->offset($offset)->limit($rev)->get();

            foreach($data as $k=>$v){
                // 订单信息表
                $info=DB::table('order_info')->where('order_id','=',$v->order_id)->get();
                $address=DB::table('shop_address')->where('address_id','=',$v->address_id)->first(); 
                // var_dump($address);
                $data[$k]->name=$address->name;
                // var_dump($info[$k]);
                foreach($info as $value){
                    // 商品表
                    $goods=DB::table('shop_goods')->where('goods_id','=',$value->goods_id)->first();
                    // 把需要的数据添加到数据中
                    $data[$k]->dev[]=['goods_name'=>$goods->goods_name,'goods_pic'=>$goods->goods_pic,'num'=>$value->num,'id'=>$goods->goods_id];
                }   
            }
           $pp=array();
            //遍历
            for($i=1;$i<=$maxpage;$i++){
                $pp[$i]=$i;
            }
            if($request->ajax()){
                //单独加载模板 把Ajax 当前页数据分配过去
                return view("Home.order.test",['data'=>$data,'pp'=>$pp]);
            }
            $i=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
            return view('Home.order.list',['data'=>$data,'wei'=>$w,'d'=>$tot,'dd'=>$dd,'ddd'=>$ddd,'dddd'=>$dddd,'pp'=>$pp,'i'=>$i]);
        }else{
            return redirect('/homelogin');
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
        // echo $id;
        $data=DB::table('shop_order')->where('order_id','=',$id)->first();
        $address=DB::table('shop_address')->where('address_id','=',$data->address_id)->first();
        $info=DB::table('order_info')->where('order_id','=',$data->order_id)->get();
        $in=[];
        
        foreach($info as $v){
            $goods=DB::table('shop_goods')->where('goods_id','=',$v->goods_id)->first();
            $in[]=['goods_name'=>$goods->goods_name,'goods_price'=>$goods->goods_price,'goods_id'=>$goods->goods_id,'num'=>$v->num]; 
            
        }
        $i=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
        return view('Home.order.info',['data'=>$data,'in'=>$in,'address'=>$address,'i'=>$i]);
        // dd($in);
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
        // echo 1;
        $s=DB::table('shop_order')->where('order_id','=',$id)->delete();
        if($s){
            DB::table('order_info')->where('order_id','=',$id)->delete();
            echo 1;
        }else{
            echo 0;
        }
    }

    public function cancel($id){
        $s=DB::table('shop_order')->where('order_id','=',$id)->update(['order_state'=>0]);
        if($s){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function getup($id){
        $s=DB::table('shop_order')->where('order_id','=',$id)->update(['order_state'=>4]);
        if($s){
            echo 1;
        }else{
            echo 0;
        }
    }
}
