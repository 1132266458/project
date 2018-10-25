<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::table("shop_articles")->paginate(13);
        $tot=DB::table('shop_articles')->count();
        return view("Admin.articles.articles-list",['data'=>$data]);
        //echo "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载公告添加模版
        return view("Admin.articles.articles-add");
        //echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        // var_dump($request->all());exit;
        if(empty($request->input('title')) || empty($request->input('title'))){
            echo "<script>alert('标题,内容不能为空!');
            var index = parent.layer.getFrameIndex(window.name);
            window.parent.location.reload();
            parent.layer.close(index);
           </script>";
        }else{
             $data=$request->except("_token");
            $data['addtime']=date('Y-m-d H:i:s',time());

            // dd($data);
            if(DB::table("shop_articles")->insert($data)){
               return redirect("/adminarticles")->with('success','添加成功');
             }else{
               return redirect("/adminarticles")->with('error','添加失败');
            }
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
        ////加载公告添加模版
        //$info=DB::table("articles")->where("id",'=',$id)->first();
        // return view("Admin.articles.articles-edit",['info'=>$info]);
        //echo "create";
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

        //echo 1;
           if(DB::table('shop_articles')->where('id','=',$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }
    
}
