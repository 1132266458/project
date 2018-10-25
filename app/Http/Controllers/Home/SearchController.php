<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    //搜索页面
    public function index(Request $request)
    {   
        //获取搜索关键词
        $k=$request->input('keywords');
        //获取列表数据
        $goods=DB::table('shop_goods')->where('goods_describe', 'like', '%'.$k.'%')->get();
        //var_dump($goods);
    	return view("Home.search.search",['goods'=>$goods]);
    }
}
