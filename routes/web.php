<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 后台登录资源控制器
Route::resource('/admin/adminlogin','Admin\AdminLoginController');

Route::group(['middleware'=>'adminlogin'],function(){
	// 首页
	Route::get('/admin','Admin\IndexController@index');
	//清除缓存
	Route::get("/admin/flush","Admin\IndexController@flush");
	// 管理员资源控制器
	Route::resource('/admin/adminlist','Admin\AdminController');
	// 管理员修改
	Route::post('/admin/adminlist/{id}','Admin\AdminController@update');
	// 管理员启用与禁用
	Route::get('/admin/adminstatus','Admin\AdminController@status');
	// 查看管理员信息
	Route::get('/admin/admininfo/{id}','Admin\AdminController@info');
	// 管理员信息编辑页面
	Route::get('/admin/admininfo_edit/{id}','Admin\AdminController@infoedit');
	// 管理员信息编辑
	Route::post('/admin/admininfo_update/{id}','Admin\AdminController@infoupdate');


	// 分类资源控制器
	Route::resource("/admin/admincates","Admin\CateController");
	// 用户资源控制器
	Route::resource("/admin/adminusers","Admin\UserController");
	// 停用用户
	Route::post('/admin/userstop/{id}','Admin\UserController@stop');
	// 启用用户
	Route::post('/admin/userstart/{id}','Admin\UserController@start');

	// 角色资源控制器
	Route::resource('/admin/adminroles','Admin\RoleController');
	// 设置权限页面
	Route::get('/admin/adminauth/{id}','Admin\RoleController@auth');
	// 设置权限操作
	Route::post('/admin/adminsetauth/{id}','Admin\RoleController@setauth');
	// 权限资源控制器
	Route::resource('/admin/adminnode','Admin\NodeController');
	// 收货地址资源控制器
	Route::resource('/admin/adminaddress','Admin\AddressController');
	// 会员拥有的收货地址
	Route::get('/admin/address/{id}','Admin\AddressController@info');
	// 商品资源控制器
	Route::resource('/admin/admingoods','Admin\GoodsController');
	// 商品下架控制器
	Route::post('/admin/goodsstop/{id}','Admin\GoodsController@stop');
	// 商品上架控制器
	Route::post('/admin/goodsstart/{id}','Admin\GoodsController@start');
	// 商品推荐控制器
	Route::post('/admin/adsstart/{id}','Admin\GoodsController@adsstart');
	// 商品取消推荐控制器
	Route::post('/admin/adsstop/{id}','Admin\GoodsController@adsstop');

	// 商品图片资源控制器
	Route::resource('/admin/adminpics','Admin\PicController');
	// 浏览商品图片
	Route::get('/admin/piclist/{id}','Admin\PicController@piclist');
	// 添加商品图片
	Route::get('/admin/picadd/{id}','Admin\PicController@picadd');
	
	// 添加商品图片操作
	Route::post('/admin/picdoadd','Admin\PicController@doadd');
	// 商品图片启用禁用
	Route::get('/admin/picstatus','Admin\PicController@status');
	// 轮播图资源管理器
	Route::resource('/admin/adminslider','Admin\SliderController');

	// 订单资源控制器
	Route::resource('/admin/adminorder','Admin\OrderController');
	// 发货
	Route::post('/admin/admingetup/{id}','Admin\OrderController@getup');
	// 评论管理控制器
	Route::resource('/admin/adminappraise','Admin\AppraiseController');
	// 回复评论
	Route::post('/admin/adminreply','Admin\AppraiseController@reply');
	// 查看回复
	Route::get('/admin/replyshow/{id}','Admin\AppraiseController@replyshow');
	// 商品详情添加
	Route::get('/admin/details/{id}','Admin\DetailsController@index');
	// 商品详情处理添加
	Route::post('/admin/adddetails','Admin\DetailsController@add');
	// 退货管理资源控制器
	Route::resource('/admin/adminreturn','Admin\ReturnController');
	// 确认退款
	Route::post('/oktui/{id}','Admin\ReturnController@oktui');
	// 拒绝退款
	Route::post('/notui/{id}','Admin\ReturnController@notui');
});

// 商城首页资源管理器
Route::resource('/','Home\IndexController');
Route::resource('/home','Home\IndexController');
// 商品详情页资源管理器
Route::resource('/homepage','Home\PageController');
// 用户收货地址资源管理器
Route::resource('/homeaddress','Home\AddressController');
// 设置默认收货地址
Route::get('/addressstart/{id}','Home\AddressController@start');
//分类页面
Route::get('/types/{id}','Home\TypesController@index');


// 前台登录
Route::get('/homelogin','Home\LoginController@index');
// 处理登录
Route::post('/homedologin','Home\LoginController@login');
// 忘记密码
Route::get('/forget','Home\LoginController@forget');
// 处理忘记密码
Route::post('/doforget','Home\LoginController@doforget');
// 重置密码
Route::get('/reset','Home\LoginController@reset');
// 处理重置密码
Route::post('/doreset','Home\LoginController@doreset');

// 验证码
Route::get("/code","Home\RegisterController@code");
// 处理退出
Route::get('/homeout','Home\LoginController@out');
// 前台注册
Route::get('/homereg','Home\RegController@index');
// 注册处理
Route::post('/homeregCheck','Home\RegController@check');
// 用户名验证
Route::get('/homeregCheckName','Home\RegController@checkname');
// 手机注册验证
Route::get('/homeregPhone','Home\RegController@checkphone');
// 邮箱验证
Route::get('/homeregCheckEmail','Home\RegController@checkemail');
//手机校验码对比
Route::get('/homeregCode','Home\RegController@checkcode');

//公告管理控制器路由
Route::resource("/adminarticles","Admin\ArticleController");

// 购物车页面
Route::get("/car","Home\CarController@index");
//加入购物车
Route::get("/addcar","Home\CarController@addcar");
//购物车加操作
Route::post('/CarAdd',"Home\CarController@CarAdd");	
//购物车减操作
Route::post('/CarJian',"Home\CarController@CarJian");
//购物车单个删除	
Route::post('/CarDel',"Home\CarController@CarDel");
//购物车批量删除	
Route::get('/CarDelall',"Home\CarController@CarDelall");

// 立即购买
Route::resource('/nowpay','Home\NowpayController');
// 立即添加收货地址
Route::post('/nowadd','Home\NowpayController@nowadd');
// 提交订单
Route::post('/getup','Home\NowpayController@getup');
// 提交订单
Route::resource('/homeorders','Home\OrdersController');
// 添加新地址
Route::post('/doaddress','Home\OrdersController@doaddress');
// 立即购买的添加新地址
Route::post('/doaddre','Home\OrdersController@doaddre');
// 商品总价
Route::get('/sum','Home\OrdersController@sum');
//支付宝接口调用 
Route::get("/pays/{id}","Home\PayController@pays"); 
// 通知给客户端的界面
Route::get("/returnurl","Home\PayController@returnurl");

// 订单资源控制器
Route::resource('/homeorder','Home\OrderController');
// 取消订单
Route::post('/ordercancel/{id}','Home\OrderController@cancel');
// 确认收货
Route::post('/ordergetup/{id}','Home\OrderController@getup');
// 评论资源控制器
Route::resource('/homecomment','Home\CommentController');
// 前台搜索路由
Route::get('/search','Home\SearchController@index');
// 用户安全
Route::get('/usersafety','Home\SafetyController@index');
// 用户安全修改密码模板
Route::get('/useredpwd','Home\SafetyController@edpwd');
// 用户修改密码
Route::post('/doedpwd','Home\SafetyController@doedpwd');
// 用户更换邮箱模板
Route::get('/useredemail','Home\SafetyController@edemail');
// 用户更换邮箱验证
Route::post('/doedemail','Home\SafetyController@doedemail');
// 更换邮箱
Route::get('/editemail','Home\SafetyController@editemail');
// 处理更换邮箱
Route::post('/doemail','Home\SafetyController@doemail');
// 收藏资源控制器
Route::resource('/homecollection','Home\CollectionController');
// 商城更多快讯
Route::get('/morenew','Home\NewController@index');
// 个人模块资源控制器
Route::resource('/homeuser','Home\UserController');

// 退货资源控制器
Route::resource('/homereturn','Home\ReturnController');
// 加载退货理由模板
Route::get('/hometuihuo/{id}','Home\ReturnController@tuihuo');
// 确认退货
Route::post('/dotui','Home\ReturnController@dotui');
