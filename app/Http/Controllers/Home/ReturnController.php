<?php

namespace App\Http\Controllers\Home;

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
         

        $data=DB::table('shop_order')->where('user_id','=',session('user_id'))->where('order_state','=',4)->get();

        foreach($data as $k=>$v){
            // 订单信息表
            $info=DB::table('order_info')->where('order_id','=',$v->order_id)->get();
            $address=DB::table('shop_deliver')->where('address_id','=',$v->address_id)->first();
              
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

        $re=DB::table('shop_return')->where('user_id','=',session('user_id'))->get();
        foreach($re as $kk=>$vv){
            $i=DB::table('order_info')->where('id','=',$vv->info_id)->first();
            $g=DB::table('shop_goods')->where('goods_id','=',$i->goods_id)->first();
            $o=DB::table('shop_order')->where('order_id','=',$i->order_id)->first();
            $a=DB::table('shop_deliver')->where('address_id','=',$o->address_id)->first();
            
            $re[$kk]->dev=['order_sn'=>$o->order_sn,'goods_name'=>$g->goods_name,'goods_pic'=>$g->goods_pic,'goods_price'=>$g->goods_price,'goods_addtime'=>$o->order_addtime,'num'=>$i->num,'name'=>$a->name,'order_addtime'=>$o->order_addtime];
        }
        $i=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
        return view('Home.return.list',['data'=>$data,'i'=>$i,'re'=>$re]);
        // dd($re);
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
        // 接受订单id
        // echo $id;
        $data=DB::table('shop_order')->where('order_id','=',$id)->first();
        $address=DB::table('shop_deliver')->where('address_id','=',$data->address_id)->first();
         
        $info=DB::table('order_info')->where('order_id','=',$data->order_id)->get();
        $in=[];
        // $tot="";
        foreach($info as $v){
            $goods=DB::table('shop_goods')->where('goods_id','=',$v->goods_id)->first();
            $in[]=['goods_name'=>$goods->goods_name,'goods_price'=>$goods->goods_price,'goods_id'=>$goods->goods_id,'num'=>$v->num,'goods_pic'=>$goods->goods_pic,'id'=>$v->id]; 
            // $tot+=$v->num*$goods->goods_price;
        }

        $i=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
        // data是订单信息 in是商品详情 address是收货信息 i个人信息
        return view('Home.return.info',['data'=>$data,'in'=>$in,'address'=>$address,'i'=>$i]);
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


    public function tuihuo($id){
        // echo $id;

        return view('Home.return.tui',['info_id'=>$id]);
    }

    public function dotui(Request $request){
        // dd($request->all());
        $data=$request->except('_token');
        $data['user_id']=session('user_id');
        $s=DB::table('shop_return')->insert($data);
        if($s){
            echo "<script>alert('已发起申请,请耐心等待结果~');var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>";
        }
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
        $s=DB::table('shop_return')->where('id','=',$id)->delete();

        if($s){
            echo 1;
        }else{
            echo 0;
        }
    }
}
