<!doctype html>
<html>
 <head>
	<meta charset="UTF-8">
	<meta name="Generator" content="EditPlus®">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"> 
	<meta name="renderer" content="webkit">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
    <meta content="歪秀购物，购物商城。" name="description">
	<title>个人中心</title>
    <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="/theme/css/member.css">
  
    <script type="text/javascript" src="/shops/lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/theme/js/jquery.js"></script>

     <script>
         $(function(){

             $("#H-table li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over").hide();
                         $(".H-over:eq(" + _index + ")").show();
                     }
                 })(i));
             });
             $("#H-table1 li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over1").hide();
                         $(".H-over1:eq(" + _index + ")").show();
                     }
                 })(i));
             });
         });
     </script>
     <style type="text/css">
      .sub{
            width: 70px;
            line-height: 30px;
            border: 1px solid #e6433e;
            text-align: center;
            background: #ffeded;
            font-size: 12px;
            color: #c40000;
            display: block;
            float: left;
            margin-right: 14px;
            border-radius: 2px;
            margin-left:80px
      }
     </style>
 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">
                @if(session()->has('user_name'))
                <li><a href="#">{{session('user_name')}}</a></li>
                @else
                    <li><a href="/homelogin">登录</a> </li>
                @endif
                <li class="headerul">|</li>
                <li><a href="#">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="#">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="#" class="tit">我的商城</a>
                    <div class="subnav">
                        <a href="#">我的山城</a>
                        <a href="#">我的山城</a>
                        <a href="#">我的山城</a>
                    </div>
                </li>
                <li class="headerul">|</li>
                <li><a href="#" class="M-iphone">手机悦商城</a> </li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">
        <div class="header-logo fl"><h1><a href="#"><img src="/theme/icon/logo.png"></a> </h1></div>
        <div class="member-title fl"><h2></h2></div>
        <div class="head-form fl">
            <form class="clearfix">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="洗衣机">
                <button class="button" onClick="search('key');return false;">搜索</button>
            </form>
            <div class="words-text clearfix">
                <a href="#" class="red">1元秒爆</a>
                <a href="#">低至五折</a>
                <a href="#">农用物资</a>
                <a href="#">买一赠一</a>
                <a href="#">佳能相机</a>
                <a href="#">稻香村月饼</a>
                <a href="#">服装城</a>
            </div>
        </div>
        <div class="header-cart fr"><a href="#"><img src="/theme/icon/car.png"></a> <i class="head-amount">{{count(session('shop'))}}</i></div>
    </div>
</header>
<!-- header End -->

<div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">个人中心</a></div></div>

<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">
        <div class="member-left fl">
            
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd><a href="/homeorder">我的订单</a></dd>
                    <dd><a href="/homecollection">我的收藏</a></dd>
                    <dd><a href="/usersafety">账户安全</a></dd>
                    <dd><a href="/homecomment">我的评价</a></dd>
                    <dd><a href="/homeaddress">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="/homereturn">退货申请</a></dd>
                    
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd><a href="#">商城快讯</a></dd>
                    
                </dl>
            </div>
        </div>
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>个人中心</h2></div>
            </div>
            <div class="member-border">
              <div class="member-sites">
                    <ul>
                      
                        <li class="clearfix">
                        <form action="/homeuser/{{$info->userinfo_id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="default fl"></div>
                            <div class="user-info1 fl clearfix">
                                <div class="user-info">
                                    <span class="info1">当前头像：</span>
                                    <span class="info2"><img src="@if($info->userinfo_pic) /{{$info->userinfo_pic}} @else /theme/img/bg/mem.png @endif" alt="" width="80px" height="80px"></span>
                                </div>
                                <div class="user-info">
                                    <span class="info1">上传头像：</span>
                                    <span class="info2"><input type="file" name="userinfo_pic" class="btn btn-default btn-uploadstar radius ml-10"></span>
                                </div>
                                <div class="user-info">
                                    <span class="info1">昵称：</span>
                                    <input class="info2" type="text" name="userinfo_pname" value="{{$info->userinfo_pname}}">
                                </div>
                                <div class="user-info">
                                    <span class="info1">真实姓名：</span>
                                    <input class="info2" type="text" name="userinfo_name" value="@if($info->userinfo_name){{$info->userinfo_name}} @endif">
                                </div>
                                <div class="user-info">
                                    <span class="info1">性别：</span>
                                    <input  type="radio" name="userinfo_sex" value="1" {{$info->userinfo_sex==1?'checked':''}}>男&nbsp;&nbsp;&nbsp;&nbsp; <input  type="radio" name="userinfo_sex" value="0" {{$info->userinfo_sex==0?'checked':''}}>女&nbsp;&nbsp;&nbsp;&nbsp; <input  type="radio" name="userinfo_sex" value="2" {{$info->userinfo_sex==2?'checked':''}}>保密
                                </div>
                                <div class="user-info">
                                    <span class="info1">生日：</span>
                                    <input class="info2" type="text" name="userinfo_birthday" value="{{$info->userinfo_birthday}}">
                                </div>
                                <div class="user-info">
                                    <span class="info1">爱好：</span>
                                    <input class="info2" type="text" name="userinfo_hobby" value="{{$info->userinfo_hobby}}">
                                </div>
                                <div class="user-info">
                                    <span class="info1">居住地：</span>
                                    <input class="info2" type="text" name="userinfo_address"  value="@if($info->userinfo_address){{$info->userinfo_address}} @endif">
                                </div>
                                <div class="user-info">
                                   {{ method_field('PUT') }}
                                <input type="submit" class="sub" value="保存">
                                </div>
                            </div>
                        </form>
                            
                        </li>
                      
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- 商城快讯 End -->



<!--- footer begin-->
<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d2.png"></span>
                <em>新手上路</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d3.png"></span>
                <em>保障正品</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
    <div style="border-bottom:1px solid #dedede"></div>
    <div class="time-lists aui-footer-pd time-lists-ls clearfix">
        <div class="aui-footer-list clearfix">
            <h4>购物指南</h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">购物流程</a> </li>
                <li><a href="#">会员介绍 </a> </li>
                <li><a href="#">生活旅行</a> </li>
                <li><a href="#"> 常见问题 </a> </li>
                <li><a href="#"> 联系客服购物指南 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>特色服务</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>帮助中心</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>新手指导</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
</div>
<!-- footer End -->
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  // alert($);
  function del(obj,id){
    // alert(obj);
    layer.confirm('确认要删除吗？',function(index){
      $.ajax({
        type: 'DELETE',
        url: '/homeorder/'+id,
        dataType: 'json',
        success: function(data){
          $('.dd'+id).remove();
          layer.msg('已删除!',{icon:1,time:1000});
        },
        error:function(data) {
          layer.msg('删除失败!',{icon: 2,time:1000});
        },
      }); 
    });
  }

  function cancel(obj,id){
    // alert(id);
    layer.confirm('确认要取消该订单吗？',function(index){
      $.ajax({
        type: 'post',
        url: '/ordercancel/'+id,
        dataType: 'json',
        success: function(data){
          $('.statue'+id).html('<p>交易关闭</p>');
           $('.getup'+id).html(' ');
          layer.msg('已取消!',{icon:1,time:1000});
        },
        error:function(data) {
          layer.msg('取消失败!',{icon: 2,time:1000});
        },
      }); 
    });
  }

  function getup(id){
    // alert(id);
    layer.confirm('确认已收到货品吗？',function(index){
      $.ajax({
        type: 'post',
        url: '/ordergetup/'+id,
        dataType: 'json',
        success: function(data){
          $('.statue'+id).html('<p>已收货</p><p><a href="javascript:;">物流跟踪</a></p>');
          $('.getup'+id).html('<p><a href="">快去评论</a></p>');
          layer.msg('已收货!',{icon:1,time:1000});
        },
        error:function(data) {
          layer.msg('收货失败!',{icon: 2,time:1000});
        },
      }); 
    });
  }

  function getu(id){
    // alert(id);
    layer.confirm('确认已收到货品吗？',function(index){
      $.ajax({
        type: 'post',
        url: '/ordergetup/'+id,
        dataType: 'json',
        success: function(data){
          layer.msg('已收货!',{icon:1,time:1000});
          window.location.reload();
        },
        error:function(data) {
          layer.msg('收货失败!',{icon: 2,time:1000});
        },
      }); 
    });
  }

   function page(page){
    //触发Ajax请求
    $.get("/homeorder",{page:page},function(data){
      //赋值给id值为uid 的div
      $("#uid").html(data);
    });
   }

   function page1(page){
    //触发Ajax请求
    $.get("/homeorderone",{page:page},function(data){
      //赋值给id值为uid 的div
      $("#uid1").html(data);
    });
   }
</script>
</body>
</html>
