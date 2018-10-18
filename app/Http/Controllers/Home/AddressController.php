<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\addressedit;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=DB::table('shop_address')->where('user_id','=',session('user_id'))->orderBy('address_statue','desc')->get();
        $info=DB::table('shop_userinfo')->where('user_id','=',session('user_id'))->first();
        $num=count($data);
        return view('Home.address.list',['data'=>$data,'info'=>$info,'num'=>$num]);
    }

    // 默认为收货地址
    public function start($id){
        $data=DB::table('shop_address')->where('user_id','=',session('user_id'))->update(['address_statue'=>0]);
        $data=DB::table('shop_address')->where('address_id','=',$id)->update(['address_statue'=>1]);
        if($data){
            // echo 1;
            return redirect('/homeaddress');
        }else{
            echo 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo session('user_id');
        return view('Home.address.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addressedit $request)
    {
        // echo session('user_id');
        // var_dump($_POST);
        unset($_POST['_token']);
        $_POST['user_id']=session('user_id');
        $data=DB::table('shop_address')->insert($_POST);
        if($data){
            echo "<script>
                alert('添加成功');
                var index = parent.layer.getFrameIndex(window.name);
                window.parent.location.reload();
                parent.layer.close(index);
           </script>";
        }else{
            echo "<script>
                alert('添加失败');
                var index = parent.layer.getFrameIndex(window.name);
                parent.layer.close(index);
           </script>";
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
        // echo $id;
        $data=DB::table('shop_address')->where('address_id','=',$id)->first();
        return view('Home.address.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(addressedit $request, $id)
    {
        unset($_POST['_token']);
        unset($_POST['_method']);
        // dd($_POST);
        $data=DB::table('shop_address')->where('address_id','=',$id)->update($_POST);
        if($data){
            echo "<script>
                alert('修改成功');
                var index = parent.layer.getFrameIndex(window.name);
                window.parent.location.reload();
                parent.layer.close(index);
           </script>";
        }else{
            echo "<script>
                alert('修改失败');
                var index = parent.layer.getFrameIndex(window.name);
                parent.layer.close(index);
            </script>";
        }
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
        $s=DB::table('shop_address')->where('address_id','=',$id)->delete();
        if($s){
            echo 1;
        }else{
            echo 0;
        }
    }
}
