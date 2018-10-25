<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NewController extends Controller
{
    //商城快讯页面
    public function index()
    {   
        //查询公告数据
        $new=DB::table("shop_articles")->get();
        //加载页面
        return view("Home.new.new",['new'=>$new]);
    }
}
