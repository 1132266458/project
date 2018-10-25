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
	<title>会员系统帮助中心</title>
    <link rel="shortcut icon" type="image/x-icon" href="theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="theme/css/member.css">
    <script type="text/javascript" src="theme/js/jquery.js"></script>
    <script type="text/javascript">
         (function(a){
             a.fn.hoverClass=function(b){
                 var a=this;
                 a.each(function(c){
                     a.eq(c).hover(function(){
                         $(this).addClass(b)
                     },function(){
                         $(this).removeClass(b)
                     })
                 });
                 return a
             };
         })(jQuery);

         $(function(){
             $("#pc-nav").hoverClass("current");
         });
     </script>

 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
             <ul class="BHeaderl">
              <?php if(session()->has('user_name')): ?>
                <li><a href="#" style="float:left;"><?php echo e(session('user_name')); ?></a> <a href="/homeout" style="float:left;">退出</a> </li>
              <?php else: ?>
                <li><a href="/homelogin" style="color:#ea4949;">请登录</a> </li>
                <li class="headerul">|</li>
                <li><a href="/homereg">免费注册</a> </li>
              <?php endif; ?>
                <li class="headerul">|</li>
                <li><a href="#">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="#">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="#" class="tit">我的商城</a>
                    <div class="subnav">
                        <a href="#">我的商城</a>
                        <a href="#">我的商城</a>
                        <a href="#">我的商城</a>
                    </div>
                </li>
                <li class="headerul">|</li>
                <li><a href="#" class="M-iphone">手机悦商城</a> </li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">
        <div class="header-logo fl"><h1><a href="#"><img src="theme/icon/logo.png"></a> </h1></div>
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
        <div class="header-cart fr"><a href="#"><img src="theme/icon/car.png"></a> <i class="head-amount">99</i></div>
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
                <?php if(count($i)): ?>
                <img src='<?php echo e($i->userinfo_pic==null?"/theme/img/bg/mem.png":"/$i->userinfo_pic"); ?>'>
                <?php else: ?>
                <img src="/theme/img/bg/mem.png">
                <?php endif; ?>
                </a></div>
                <div class="fl">
                    <p>用户名：</p>
                    <?php if(count($i)): ?>
                        <p><a href="#"><?php echo e($i->userinfo_pname); ?></a></p>
                    <?php else: ?>
                        <p><a href="#">未知</a></p>
                    <?php endif; ?>
                    
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd><a href="/homeorder">我的订单</a></dd>
                    <dd><a href="/homecollection">我的收藏</a></dd>
                    <dd><a href="javascript:;">账户安全</a></dd>
                    <dd><a href="/homecomment">我的评价</a></dd>
                    <dd><a href="/homeaddress">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="/homereturn">退货申请</a></dd>
                    
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd class="cur"><a href="#">商城快讯</a></dd>
                    
                </dl>
            </div>
        </div>
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>账户安全</h2></div>
            </div>
            <div class="member-border">
               <div class="member-secure clearfix">
                   <div class="member-extent fl">
                       <h2 class="fl">安全级别</h2>
                       <ul class="fl">
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on1"><a href="#"></a></li>
                           <li class="on2"><a href="#"></a></li>
                           <li class="on3"><a href="#"></a></li>
                       </ul>
                       <span class="fl">较高</span>
                   </div>
                   <div class="fr reds"><p> * 建议您开启全部安全设置，以保障您的账户及资金安全</p></div>
               </div>
               <div class="member-caution clearfix">
                   <ul>
                       <li class="clearfix">
                           <div class="warn1"></div>
                           <div class="warn2">登录密码</div>
                           <div class="warn3">互联网账号存在被盗风险，建议您定期更改密码以保护账户安全。</div>
                           <div class="warn4"><a href="/useredpwd">修改</a> </div>
                       </li>
                       <li class="clearfix">
                           <div class="warn1"></div>
                           <div class="warn2">邮箱绑定</div>
                           <div class="warn3">您验证的邮箱 <i class="reds"><?php echo e($info->user_email); ?></i> </div>
                           <div class="warn4"><a href="/useredemail">更换邮箱</a> </div>
                       </li>
                       <li class="clearfix">
                           <div class="warn1"></div>
                           <div class="warn2">手机验证</div>
                           <div class="warn3">您验证的手机： <i class="reds"><?php echo e($info->user_phone); ?></i>   若已丢失或停用，请立即更换，<i class="reds">避免账户被盗</i></div>
                           <div class="warn5"><p>解绑请咨询搜小悦官方客服 <i>xdl@163.com</i></p></div>
                       </li>
                      <!--  <li class="clearfix">
                           <div class="warn6"></div>
                           <div class="warn2">支付密码</div>
                           <div class="warn3">安全程度：  建议您设置更高强度的密码。</div>
                           <div class="warn5"><a href="#">支付密码管理</a></div>
                       </li> -->
                   </ul>
                   <div class="member-prompt">
                       <p>安全提示：</p>
                       <p>您当前IP地址是：<i class="reds">110.106.0.01</i>  北京市          上次登录的TP： 2015-09-16  <i class="reds">110.106.0.02 </i> 天津市</p>
                       <p>1. 注意防范进入钓鱼网站，不要轻信各种即时通讯工具发送的商品或支付链接，谨防网购诈骗。</p>
                       <p>2. 建议您安装杀毒软件，并定期更新操作系统等软件补丁，确保账户及交易安全。      </p>
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
                <span><img src="theme/icon/icon-d1.png"></span>
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
                <span><img src="theme/icon/icon-d2.png"></span>
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
                <span><img src="theme/icon/icon-d3.png"></span>
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
                <span><img src="theme/icon/icon-d1.png"></span>
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
</body>
</html>