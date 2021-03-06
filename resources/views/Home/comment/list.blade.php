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
    <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
    <meta content="歪秀购物，购物商城。" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>会员我的评价</title>
    <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="/theme/css/member.css">

    <!-- <link rel="stylesheet" type="text/css" href="/shops/static/h-ui/css/H-ui.min.css" /> -->
  <script type="text/javascript" src="/shops/lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/theme/js/jquery.js"></script>
    <style>
        .pl{

                height: 30px;
                line-height: 30px;
                text-align: left;
                display: block;
                
                border-bottom: 1px solid #e0e0e0;
        }
        .fr{
            float: right;
            text-align: right;
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
                  <li><a href="#" style="float:left;">{{session('user_name')}}</a> <a href="/homeout" style="float:left;">退出</a> </li>
                @else
                  <li><a href="/homelogin" style="color:#ea4949;">请登录</a> </li>
                  <li class="headerul">|</li>
                  <li><a href="/homereg">免费注册</a> </li>
                @endif
                <li class="headerul">|</li>
                <li><a href="#">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="/homecollection">我的收藏</a> </li>
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

<div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>

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
              <dd class="cur"><a href="/homecomment">我的评价</a></dd>
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
          <div class="member-heels fl"><h2>我的评价</h2></div>
      </div>
      <div class="member-border">
         <div class="member-column clearfix">
             <span class="co1">商品信息</span>
             <span class="co2">购买时间</span>
             <span class="co3">评论操作</span>
         </div>
         <div class="member-class clearfix">
          
              <ul>
                @foreach($data as $v)

                  <li class="clearfix">
                      <div class="sp1">
                          <span class="gr1"><a href="#"><img width="60" height="60" about="" title="" src="/{{$v['goods_pic']}}"></a></span>
                          <span class="gr2"  style="width:300px">{{$v['goods_name']}}</span>
                          <span class="gr3">X{{$v['num']}}</span>
                      </div>
                      <div class="sp2">{{date('Y-m-d h:m:s',$v['addtime'])}}</div>
                      <div class="sp3" onclick="opendiv({{$v['goods_id'].$v['order_id']}})"><a href="javascript:;">查看/发表评价</a> </div>
                  </li>
                <!-- 评论开始 -->
                  <form action="/homecomment" method="post">
                  <div class="member-setup clearfix" id="oo{{$v['goods_id'].$v['order_id']}}" style="display:none">
                    <ul>
                      <!-- 显示历史评论信息 -->
                      @if(!empty($v['dev']))
                      @foreach($v['dev'] as $vv)
                      <div class="dd{{$vv->appraise_id}}">
                        <div class="pl">
                            <div class="member-score fl"><i class="reds"></i>我的评价：</div>
                            <div class="member-star fl">
                            @if($vv->appraise_leval==0)
                               [好评]
                            @elseif($vv->appraise_leval==1)
                                [中评]
                            @elseif($vv->appraise_leval==2)
                                [差评]
                            @endif
                               {{$vv->appraise_coment}}
                           </div>
                           <a href="javascript:;" onclick="del({{$vv->appraise_id}})" class="fr">删除&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                           <i class="fr">{{date('Y-m-d h:m:s',$vv->appraise_time)}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                        </div>
                      <!-- 卖家回复 -->
                        @if($vv->appraise_reply!=null)
                        <div class="pl">
                            <div style="display:inline-block" class="fl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="reds"></i>卖家回复：</div>
                            <div class="member-star fl">
                               {{$vv->appraise_reply}}
                            </div>
                            <i class="fr">{{date('Y-m-d h:m:s',$vv->appraise_replytime)}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                        </div>
                        @endif
                      <!-- 卖家回复结束 -->
                      </div>
                      @endforeach
                      @endif
                      <!-- 显示历史评论信息结束 -->
                      <!-- 评分开始 -->
                      <li class="clearfix">
                        <div class="member-score fl"><i class="reds">*</i>评分：</div>
                        <div class="member-star fl">
                          <input type="radio" name="appraise_leval" value="0">好评&nbsp;&nbsp;&nbsp;<input type="radio" name="appraise_leval" value="1">中评&nbsp;&nbsp;&nbsp;<input type="radio" name="appraise_leval" value="2">差评
                        </div>
                      </li>
                      <!-- 评分结束 -->
                      <!-- 评价开始 -->
                      <li class="clearfix">
                        <div class="member-score fl"><i class="reds">*</i>商品评价：</div>
                        <div class="member-star fl">
                          <textarea maxlength="200" name="appraise_coment"></textarea>
                        </div>
                      </li>
                      <!-- 评价结束 -->
                      <input type="hidden" name="appraise_time" value="{{time()}}">
                      <!-- 商品id -->
                      <input type="hidden" name="goods_id" value="{{$v['goods_id']}}">
                      <!-- 订单详情id -->
                      <input type="hidden" name="orderinfo_id" value="{{$v['info_id']}}">
                      <!-- 会员id -->
                      <input type="hidden" name="user_id" value="{{session('user_id')}}">
                      {{csrf_field()}}
                      <li class="clearfix" style="padding-right:85px;">
                        <input type="submit"  class="btn btn-primary radius size-S submits" value="发表评价" style="float:right;padding: 3px 8px;border: solid 1px #ddd;color: #fff;background-color: #5a98de;border-color: #5a98de;font-size: 14px;height: 31px;border-radius: 4px;">
                      </li>
                    </ul>
                  </div>
                  </form>
                 @endforeach

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
  function opendiv(id){
    // alert(id);
    var oo = document.getElementById('oo'+id);
    if(oo.style.display == 'none'){
      oo.style.display="block";
    }else{
      oo.style.display="none";
    }
  }

  function del(id){
    // alert(obj);
    layer.confirm('确认要删除吗？',function(index){
      $.ajax({
        type: 'DELETE',
        url: '/homecomment/'+id,
        dataType: 'json',
        success: function(data){
          $('.dd'+id).remove();
          layer.msg('已删除评论!',{icon:1,time:1000});
        },
        error:function(data) {
          layer.msg('删除失败!',{icon: 2,time:1000});
        },
      }); 
    });
  }

  @if(count($errors))
    layer.msg('评论失败!',{icon: 2,time:1000});
  @endif
</script>
</body>
</html>
