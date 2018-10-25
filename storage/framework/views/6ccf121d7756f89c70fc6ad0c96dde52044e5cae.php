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
  <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico">
  <link rel="stylesheet" type="text/css" href="/theme/css/base.css">
  <link rel="stylesheet" type="text/css" href="/theme/css/home.css">
  <script type="text/javascript" src="/theme/js/jquery.js"></script>
  <script type="text/javascript" src="/theme/js/index.js"></script>
  <script type="text/javascript" src="/theme/js/js-tab.js"></script>
  <!-- <script type="text/javascript" src="/theme/js/MSClass.js"></script> -->
  <script type="text/javascript" src="/theme/js/jcarousellite.js"></script>
  <script type="text/javascript" src="/theme/js/top.js"></script>
    <script type="text/javascript">
         var intDiff = parseInt(80000);//倒计时总秒数量
         function timer(intDiff){
             window.setInterval(function(){
                 var day=0,
                         hour=0,
                         minute=0,
                         second=0;//时间默认值
                 if(intDiff > 0){
                     day = Math.floor(intDiff / (60 * 60 * 24));
                     hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                     minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                     second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                 }
                 if (minute <= 9) minute = '0' + minute;
                 if (second <= 9) second = '0' + second;

                 $('#hour_show').html('<s id="h"></s>'+hour+'');
                 $('#minute_show').html('<s></s>'+minute+'');
                 $('#second_show').html('<s></s>'+second+'');
                 intDiff--;
             }, 1000);
         }

         $(function(){
             timer(intDiff);
         });
     </script>
 </head>
 <body>


<div>
    <div id="moquu_wxin" class="moquu_wxin"><a href="javascript:void(0)"><div class="moquu_wxinh"></div></a></div>
    <div id="moquu_wshare" class="moquu_wshare"><a href="javascript:void(0)" style="text-indent:0"><div class="moquu_wshareh"><img src="/theme/icon/moquu_wshare.png" width="100%"></div></a></div>
    <div id="moquu_wmaps"><a href="javascript:void(0)" class='moquu_wmaps'></a></div>
    <a id="moquu_top" href="javascript:void(0)"></a>
</div>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">
                <li style="display:none;"><a href="javascript:void(0)" style="float:left;">嘻哈杂货铺</a> <a href="javascript:void(0)" style="float:left;">退出</a> </li>
                <?php if(session()->has('user_name')): ?>
                <li><a href="javascript:void(0)" style="float:left;"><?php echo e(session('user_name')); ?></a> <a href="/homeout" style="float:left;">退出</a> </li>
                <?php else: ?>
                <li><a href="/homelogin" style="color:#ea4949;">请登录</a> </li>
                <li class="headerul">|</li>
                <li><a href="/homereg">免费注册</a> </li>
                <?php endif; ?>
                <li class="headerul">|</li>
                <li><a href="/homeorder">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="/homecollection">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="/" class="tit">我的商城</a>
                    <div class="subnav">
                        <a href="/homeorder">我的订单</a>
                        <a href="/homecollection">我的收藏</a>
                        <a href="/usersafety">账户安全</a>
                        <a href="/homecomment">我要评价</a>
                    </div>
                </li>
                <li class="headerul">|</li>
                <li id="pc-nav1" class="menu"><a href="javascript:void(0)" class="tit M-iphone">手机悦商城</a>
                   <div class="subnav">
                       <a href="javascript:void(0)"><img src="/theme/icon/ewm.png" width="115" height="115" title="扫一扫，有惊喜！"></a>
                   </div>
                </li>
            </ul>
        </div>
    </div>
    <?php $__env->startSection('main'); ?>
    <?php echo $__env->yieldSection(); ?>
</header>
<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="javascript:void(0)">保障范围 </a> </li>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">服务中心 </a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d2.png"></span>
                <em>新手上路</em>
            </h4>
            <ul>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">服务中心 </a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d3.png"></span>
                <em>保障正品</em>
            </h4>
            <ul>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">服务中心 </a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">服务中心 </a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
    <div style="border-bottom:1px solid #dedede"></div>
    <div class="time-lists aui-footer-pd time-lists-ls clearfix">
        <div class="aui-footer-list clearfix">
            <h4>购物指南</h4>
            <ul>
                <li><a href="javascript:void(0)">保障范围 </a> </li>
                <li><a href="javascript:void(0)">购物流程</a> </li>
                <li><a href="javascript:void(0)">会员介绍 </a> </li>
                <li><a href="javascript:void(0)">生活旅行</a> </li>
                <li><a href="javascript:void(0)"> 常见问题 </a> </li>
                <li><a href="javascript:void(0)"> 联系客服购物指南 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>特色服务</h4>
            <ul>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">服务中心 </a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>帮助中心</h4>
            <ul>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">服务中心 </a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>新手指导</h4>
            <ul>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">退货退款流程</a> </li>
                <li><a href="javascript:void(0)">服务中心 </a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)">服务中心</a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
                <li><a href="javascript:void(0)"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">banner()</script>
</body>
</html>



