<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=DB::table('shop_order')->where('user_id','=',session('user_id'))->where('order_state','=',4)->get();
        // var_dump($order);
        $data=[];
        foreach($order as $k=>$v){
            // var_dump($v);
            $info=DB::table('order_info')->where('order_id','=',$v->order_id)->get();
            // var_dump($info);
            foreach($info as $key=>$value){
                // 商品表
                $goods=DB::table('shop_goods')->where('goods_id','=',$value->goods_id)->first();
                $oi=DB::table('shop_appraise')->where('orderinfo_id','=',$value->id)->get();
                // dd($oi[$key]);
                
                // 把需要的数据添加到数据中
                $data[]=['goods_name'=>$goods->goods_name,'goods_pic'=>$goods->goods_pic,'num'=>$value->num,'addtime'=>$v->order_addtime,'goods_id'=>$goods->goods_id,'order_id'=>$v->order_id,'info_id'=>$value->id];
                foreach($oi as $kk=>$vv){
                  // var_dump($vv);
                  $data[$key]['dev'][]=$vv;
                }
            } 
           

        }
        // dd($data);
        return view('Home.comment.list',['data'=>$data]);
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
        // dd($request->all());
      $data=$request->except(['_token']);
      $s=DB::table('shop_appraise')->insert($data);
      if($s){
        echo '<script>alert("感谢您的评论!!!");location="/homecomment"</script>';
      }else{
        echo '<script>alert("抱歉~评论失败!!!");location="/homecomment"</script>';
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
        $data=DB::table('shop_order')->where('order_id','=',$id)->first();
        $info=DB::table('order_info')->where('order_id','=',$id)->get();
        $in=[];
        foreach($info as $v){
            $goods=DB::table('shop_goods')->where('goods_id','=',$v->goods_id)->first();
            $in[]=['goods_name'=>$goods->goods_name,'goods_price'=>$goods->goods_price,'goods_id'=>$goods->goods_id,'num'=>$v->num,'goods_pic'=>$goods->goods_pic]; 
            // $tot+=$v->num*$goods->goods_price;
        }
        // dd($in);
        return view('Home.comment.comment',['info'=>$info,'in'=>$in,'data'=>$data]);
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
