<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PageController extends Controller
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
        $data=DB::table('shop_goods')->where('goods_id','=',$id)->first();
        $cate=DB::table('shop_cates')->where('id','=',$data->type_id)->first();
        $cates=DB::table('shop_cates')->where('id','=',$cate->pid)->first();
        $catess=DB::table('shop_cates')->where('id','=',$cates->pid)->first();
        $pic=DB::table('goods_pics')->where('goods_id','=',$id)->get();
        // 商品评论
        $app=DB::table('shop_appraise')->where('goods_id','=',$id)->get();
        // 各评论的数量
        $g=0;
        $z=0;
        $c=0;
        foreach($app as $v){
            if($v->appraise_leval==0){
                $g+=1;
            }
            if($v->appraise_leval==1){
                $z+=1;
            }
            if($v->appraise_leval==2){
                $c+=1;
            }
        }
        return view('Home.page.page',['data'=>$data,'pic'=>$pic,'cate'=>$cate,'cates'=>$cates,'catess'=>$catess,'app'=>$app,'g'=>$g,'z'=>$z,'c'=>$c]);
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
