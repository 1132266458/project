<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCatesByPid($pid){
        $res=DB::table("shop_cates")->where("pid",'=',$pid)->get();
        $data=[];
        //遍历
        foreach($res as $key=>$value){
            //获取父类的子类信息
            $value->dev=self::getCatesByPid($value->id);
            $data[]=$value;
        }
        return $data;
    }

    public function index(Request $request)
    {
        $cate=self::getCatesByPid(0);

        //先判断缓存有没有数据，有的话直接调用缓存的数据，没有的先查询数据库的数据在存入缓存中。
        if (cache('slider')) {
            $data = cache('slider');
        }else{
            $data=DB::table('shop_slider')->get();

            cache(['slider' => $data],1); 
        }
        //
        //$data=DB::table('shop_slider')->get();
        //将购物车中查询的数据通过file的方式存储在缓存中
        //cache(['slider' => $data],1); 
         //$data = cache('slider');
        //  var_dump($data);
        
        //查询公告数据
        $new=DB::table("shop_articles")->paginate(5);
        //$news=DB::table("shop_articles")->get();
        if (cache('news')) {
            $news = cache('news');
        }else{
            $news=DB::table('shop_articles')->get();

            cache(['news' => $news],1); 
        }
        $page=$request->input('page');
        //var_dump($page);
        if(empty($page)){
        $page=1;
        } 
        //查询卖场推荐的数据也就是数据库goods_ads为0的数据
        $tot=DB::table("shop_goods")->where("goods_ads",'=',0)->count();
        $rev=6;
        $maxpage=ceil($tot/$rev);
        $offset=($page-1)*$rev;
        $sql="select * from shop_goods where goods_ads=0 limit $offset,$rev";
        //执行sql
        $goods=DB::select($sql);
        //var_dump($goods);
        if($request->ajax()){
            // echo $page;exit;
            //加载一个独立的模板界面
            return view("home.indexpage",['goods'=>$goods]);
            }
        $goodgoods=DB::table("shop_goods")->paginate(8);
        return view('home.index',['cate'=>$cate,'data'=>$data,'new'=>$new,'news'=>$news,'maxpage'=>$maxpage,'goods'=>$goods,'goodgoods'=>$goodgoods]);
        //'ads'=>$ads
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
