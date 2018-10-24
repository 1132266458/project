<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('user_name') && session()->has('user_id')){
            $data=DB::table('shop_fovorite')->where('user_id','=',session('user_id'))->get();
            $goods=[];
            foreach($data as $v){
                $g=DB::table('shop_goods')->where('goods_id','=',$v->goods_id)->first();
                $goods[]=$g;
            }
            $i=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
            return view('Home.collection.list',['data'=>$data,'goods'=>$goods,'i'=>$i]);
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
        if(session()->has('user_name') && session()->has('user_id')){
            $data['goods_id']=$id;
            $data['user_id']=session('user_id');
            $data['addtime']=time();
            $s=DB::table('shop_fovorite')->insert($data);
            if($s){
                // 收藏成功
                echo 1;
            }else{
                // 收藏失败
                echo 2;
            }
        }else{
            // 未登录
            echo 3;
        }
        
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
        $s=DB::table('shop_fovorite')->where('goods_id','=',$id)->where('user_id','=',session('user_id'))->delete();
        if($s){
            echo 1;
        }else{
            echo 0;
        }
    }
}
