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
	<title>退后申请</title>
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
        <div class="header-cart fr"><a href="#"><img src="/theme/icon/car.png"></a> <i class="head-amount">99</i></div>
    </div>
</header>
<!-- header End -->

<div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">退货申请</a></div></div>

<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a href="#">
                  @if(count($i))
                  <img src='{{$i->userinfo_pic==null?"/theme/img/bg/mem.png":"/$i->userinfo_pic"}}'>
                  @else
                  <img src="/theme/img/bg/mem.png">
                  @endif
                </a></div>
                <div class="fl">
                  <p>用户名：</p>
                  @if(count($i))
                      <p><a href="#">{{$i->userinfo_pname}}</a></p>
                  @else
                      <p><a href="#">未知</a></p>
                  @endif
                    
                </div>
            </div>
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
                    <dd class="cur"><a href="javascript:;">退货申请</a></dd>
                    
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd><a href="#">商城快讯</a></dd>
                   
                </dl>
            </div>
        </div>
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>退货申请</h2></div>
            </div>
            <div class="member-whole clearfix">
                <ul id="H-table" class="H-table">
                    <li class="cur"><a href="javascript:;">退货申请</a></li>
                    <li><a href="javascript:;">退货/退款记录</a></li>
                </ul>
            </div>
            <div class="member-border">
            
               <div class="member-return H-over">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                        @foreach($data as $v)
                        <!-- {{var_dump($v)}} -->
                           <li class="dd{{$v->order_id}}">
                               <div class="member-minute clearfix">
                                   <span>{{date('Y-m-d H:m:s',$v->order_addtime)}}</span>
                                   <span>订单号：<em>{{$v->order_sn}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      @foreach($v->dev as $val)
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/{{$val['id']}}"><img src="/{{$val['goods_pic']}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px">{{$val['goods_name']}}</span>
                                           <span class="gr3">X{{$val['num']}}</span>
                                       </div>
                                      @endforeach
                                      
                                   </div>
                                   <div class="ci2">{{$v->name}}</div>
                                   <div class="ci3"><b>￥{{$v->order_amount}}</b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{date('Y-m-d',$v->order_addtime)}}</p></div>
                                   <div class="ci5">
                                     <div class="statue{{$v->order_id}}"><p>已完成</p></div>
                                     <p><a href="/homeorder/{{$v->order_id}}">订单详情</a></p>
                                    </div>
                                    <div class="ci6"><p><a href="/homereturn/{{$v->order_id}}">申请退货</a> </p></div>
                                  
                               </div>
                           </li>
                          @endforeach
                       </ul>
                   </div>
                </div>


                <div class="member-return H-over" style="display:none">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                        @foreach($re as $vv)
                         <li>
                             <div class="member-minute clearfix">
                                 <span>{{date('Y-m-d H:m:s',$vv->return_addtime)}}</span>
                                 <span>订单号：<em>{{$vv->dev['order_sn']}}</em></span>
                                 <span><a href="#">以纯甲醇旗舰店</a></span>
                                 <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                             </div>
                             <div class="member-circle clearfix">
                                 <div class="ci1">
                                     <div class="ci7 clearfix">
                                         <span class="gr1"><a href="#"><img src="/{{$vv->dev['goods_pic']}}" width="60" height="60" title="" about=""></a></span>
                                         <span class="gr2"><a href="#">{{$vv->dev['goods_name']}}</a></span>
                                         <span class="gr3">X{{$vv->dev['num']}}</span>
                                     </div>
                                 </div>
                                 <div class="ci2" >{{$vv->dev['name']}}</div>
                                 <div class="ci3"><b>￥{{$vv->dev['goods_price']}}</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                                 <div class="ci4"><p>{{date('Y-m-d',$vv->dev['order_addtime'])}}</p></div>
                                 <div class="ci5">
                                 @if($vv->return_state==0)
                                 <p>已申请退货</p> 
                                 @elseif($vv->return_state==1)
                                 <p>已完成</p> 
                                 @elseif($vv->return_state==2)
                                 <p>拒绝退货</p>
                                 @endif
                                 </div>
                                 <div class="ci6"><p><a href="javascript:;" onclick="del(this,{{$vv->id}})">取消退货</a> </p></div>
                             </div>
                           </li>
                        @endforeach
                       </ul>
                   </div>
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
    layer.confirm('是否取消退款吗？',function(index){
      $.ajax({
        type: 'DELETE',
        url: '/homereturn/'+id,
        dataType: 'json',
        success: function(data){
          $(obj).parents("li").remove();
          layer.msg('已取消!',{icon:1,time:1000});
        },
        error:function(data) {
          layer.msg('取消失败!',{icon: 2,time:1000});
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
