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
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
    <meta content="歪秀购物，购物商城。" name="description">
	<title>我的订单</title>
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
                <?php if(session()->has('user_name')): ?>
                <li><a href="#"><?php echo e(session('user_name')); ?></a></li>
                <?php else: ?>
                    <li><a href="/homelogin">登录</a> </li>
                <?php endif; ?>
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

<div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">我的订单</a></div></div>

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
                    <dd class="cur"><a href="/homeorder">我的订单</a></dd>
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
                <div class="member-heels fl"><h2>我的订单</h2></div>
                <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
                <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div>
            </div>
            <div class="member-whole clearfix">
                <ul id="H-table" class="H-table">
                    <li class="cur"><a href="javascript:;">我的订单(<?php echo e($d); ?>)</a></li>
                    <li><a href="javascript:;">待付款<em>(<?php echo e($wei); ?>)</em></a></li>
                    <li><a href="javascript:;">待发货<em>(<?php echo e($dd); ?>)</em></a></li>
                    <li><a href="javascript:;">待收货<em>(<?php echo e($ddd); ?>)</em></a></li>
                    <li><a href="javascript:;">交易完成<em>(<?php echo e($dddd); ?>)</em></a></li>
                    <li><a href="javascript:;">退货</a></li>
                </ul>
            </div>
            <div class="member-border">
            <div id="uid">
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
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- <?php echo e(var_dump($v)); ?> -->
                           <li class="dd<?php echo e($v->order_id); ?>">
                               <div class="member-minute clearfix">
                                   <span><?php echo e(date('Y-m-d H:m:s',$v->order_addtime)); ?></span>
                                   <span>订单号：<em><?php echo e($v->order_sn); ?></em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      <?php $__currentLoopData = $v->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/<?php echo e($val['id']); ?>"><img src="/<?php echo e($val['goods_pic']); ?>" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px"><?php echo e($val['goods_name']); ?></span>
                                           <span class="gr3">X<?php echo e($val['num']); ?></span>
                                       </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                   </div>
                                   <div class="ci2"><?php echo e($v->name); ?></div>
                                   <div class="ci3"><b>￥<?php echo e($v->order_amount); ?></b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p><?php echo e(date('Y-m-d',$v->order_addtime)); ?></p></div>
                                   <div class="ci5">
                                   <div class="statue<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>等待付款</p>
                                   <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p>等待发货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==3): ?>
                                  <p><a href="javascript:;">等待收货</a></p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==4): ?>
                                  <p>已收货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==0): ?>
                                  <p>交易关闭</p>
                                  <?php endif; ?>
                                    
                                   </div>
                                   <p><a href="/homeorder/<?php echo e($v->order_id); ?>">订单详情</a></p></div>
                                   <div class="ci5 ci8">
                                    <div class="getup<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>剩余15时20分</p> <p><a href="/pays" class="member-touch">立即支付</a> </p>
                                   <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                    
                                  <?php elseif($v->order_state==3): ?>
                                  <p>剩余6天23小时</p> <p><a href="javascript:;" onclick="getup(<?php echo e($v->order_id); ?>)" class="member-touch">确认收货</a> </p>
                                  <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                   
                                  <?php elseif($v->order_state==4): ?>
                                  <p><a href="/homecomment/<?php echo e($v->order_id); ?>">快去评论</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p><a href="javascript:;">申请退款</a></p>
                                  <?php endif; ?>
                                    </div>
                                   <p><a href="javascript:;" onclick="del(this,<?php echo e($v->order_id); ?>)">删除订单</a> </p></div>
                               </div>
                           </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </ul>
                   </div>
                   <div class="clearfix" style="padding:30px 20px;">
                      <div class="fr pc-search-g pc-search-gs">
                          <?php $__currentLoopData = $pp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <a href="javascript:;" onclick="page(<?php echo e($row); ?>)"><?php echo e($row); ?></a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                  </div>

               </div>
              

          </div>
               <div class="member-return H-over" style="display:none;">
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

                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($v->order_state==1): ?>
                        <!-- <?php echo e(var_dump($v)); ?> -->
                           <li class="dd<?php echo e($v->order_id); ?>">
                               <div class="member-minute clearfix">
                                   <span><?php echo e(date('Y-m-d H:m:s',$v->order_addtime)); ?></span>
                                   <span>订单号：<em><?php echo e($v->order_sn); ?></em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      <?php $__currentLoopData = $v->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/<?php echo e($val['id']); ?>"><img src="/<?php echo e($val['goods_pic']); ?>" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px"><?php echo e($val['goods_name']); ?></span>
                                           <span class="gr3">X<?php echo e($val['num']); ?></span>
                                       </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                   </div>
                                   <div class="ci2"><?php echo e($v->name); ?></div>
                                   <div class="ci3"><b>￥<?php echo e($v->order_amount); ?></b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p><?php echo e(date('Y-m-d',$v->order_addtime)); ?></p></div>
                                   <div class="ci5">
                                   <div class="statue<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>等待付款</p>
                                   <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p>等待发货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==3): ?>
                                  <p><a href="javascript:;">等待收货</a></p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==4): ?>
                                  <p>已收货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==0): ?>
                                  <p>交易关闭</p>
                                  <?php endif; ?>
                                    
                                   </div>
                                   <p><a href="/homeorder/<?php echo e($v->order_id); ?>">订单详情</a></p></div>
                                   <div class="ci5 ci8">
                                    <div class="getup<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>剩余15时20分</p> <p><a href="/pays" class="member-touch">立即支付</a> </p>
                                   <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                    
                                  <?php elseif($v->order_state==3): ?>
                                  <p>剩余6天23小时</p> <p><a href="javascript:;" onclick="getup(<?php echo e($v->order_id); ?>)" class="member-touch">确认收货</a> </p>
                                  <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                   
                                  <?php elseif($v->order_state==4): ?>
                                  <p><a href="">快去评论</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p><a href="javascript:;">申请退款</a></p>
                                  <?php endif; ?>
                                    </div>
                                   <p><a href="javascript:;" onclick="del(this,<?php echo e($v->order_id); ?>)">删除订单</a> </p></div>
                               </div>
                           </li>
                           <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                       </ul>
                   </div>
               </div>

               <div class="member-return H-over" style="display:none;">
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
                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($v->order_state==2): ?>
                        <!-- <?php echo e(var_dump($v)); ?> -->
                           <li class="dd<?php echo e($v->order_id); ?>">
                               <div class="member-minute clearfix">
                                   <span><?php echo e(date('Y-m-d H:m:s',$v->order_addtime)); ?></span>
                                   <span>订单号：<em><?php echo e($v->order_sn); ?></em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      <?php $__currentLoopData = $v->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/<?php echo e($val['id']); ?>"><img src="/<?php echo e($val['goods_pic']); ?>" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px"><?php echo e($val['goods_name']); ?></span>
                                           <span class="gr3">X<?php echo e($val['num']); ?></span>
                                       </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                   </div>
                                   <div class="ci2"><?php echo e($v->name); ?></div>
                                   <div class="ci3"><b>￥<?php echo e($v->order_amount); ?></b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p><?php echo e(date('Y-m-d',$v->order_addtime)); ?></p></div>
                                   <div class="ci5">
                                   <div class="statue<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>等待付款</p>
                                   <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p>等待发货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==3): ?>
                                  <p><a href="javascript:;">等待收货</a></p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==4): ?>
                                  <p>已收货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==0): ?>
                                  <p>交易关闭</p>
                                  <?php endif; ?>
                                    
                                   </div>
                                   <p><a href="/homeorder/<?php echo e($v->order_id); ?>">订单详情</a></p></div>
                                   <div class="ci5 ci8">
                                    <div class="getup<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>剩余15时20分</p> <p><a href="/pays" class="member-touch">立即支付</a> </p>
                                   <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                    
                                  <?php elseif($v->order_state==3): ?>
                                  <p>剩余6天23小时</p> <p><a href="javascript:;" onclick="getup(<?php echo e($v->order_id); ?>)" class="member-touch">确认收货</a> </p>
                                  <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                   
                                  <?php elseif($v->order_state==4): ?>
                                  <p><a href="">快去评论</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p><a href="javascript:;">申请退款</a></p>
                                  <?php endif; ?>
                                    </div>
                                   <p><a href="javascript:;" onclick="del(this,<?php echo e($v->order_id); ?>)">删除订单</a> </p></div>
                               </div>
                           </li>
                           <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                       </ul>
                   </div>
               </div>
               <div class="member-return H-over" style="display:none;">
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
                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($v->order_state==3): ?>
                        <!-- <?php echo e(var_dump($v)); ?> -->
                           <li class="dd<?php echo e($v->order_id); ?>">
                               <div class="member-minute clearfix">
                                   <span><?php echo e(date('Y-m-d H:m:s',$v->order_addtime)); ?></span>
                                   <span>订单号：<em><?php echo e($v->order_sn); ?></em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      <?php $__currentLoopData = $v->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/<?php echo e($val['id']); ?>"><img src="/<?php echo e($val['goods_pic']); ?>" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px"><?php echo e($val['goods_name']); ?></span>
                                           <span class="gr3">X<?php echo e($val['num']); ?></span>
                                       </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                   </div>
                                   <div class="ci2"><?php echo e($v->name); ?></div>
                                   <div class="ci3"><b>￥<?php echo e($v->order_amount); ?></b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p><?php echo e(date('Y-m-d',$v->order_addtime)); ?></p></div>
                                   <div class="ci5">
                                   <div class="statue<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>等待付款</p>
                                   <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p>等待发货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==3): ?>
                                  <p><a href="javascript:;">等待收货</a></p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==4): ?>
                                  <p>已收货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==0): ?>
                                  <p>交易关闭</p>
                                  <?php endif; ?>
                                    
                                   </div>
                                   <p><a href="/homeorder/<?php echo e($v->order_id); ?>">订单详情</a></p></div>
                                   <div class="ci5 ci8">
                                   <div class="getup<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>剩余15时20分</p> <p><a href="/pays" class="member-touch">立即支付</a> </p>
                                   <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                    
                                  <?php elseif($v->order_state==3): ?>
                                  <p>剩余6天23小时</p> <p><a href="javascript:;" onclick="getu(<?php echo e($v->order_id); ?>)" class="member-touch">确认收货</a> </p>
                                  <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                   
                                  <?php elseif($v->order_state==4): ?>
                                  <p><a href="">快去评论</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p><a href="javascript:;">申请退款</a></p>
                                  <?php endif; ?>
                                    </div>
                                   <p><a href="javascript:;" onclick="del(this,<?php echo e($v->order_id); ?>)">删除订单</a> </p></div>
                               </div>
                           </li>
                           <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                       </ul>
                   </div>
               </div>
               <div class="member-return H-over" style="display:none;">
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
                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($v->order_state==4): ?>
                        <!-- <?php echo e(var_dump($v)); ?> -->
                           <li class="dd<?php echo e($v->order_id); ?>">
                               <div class="member-minute clearfix">
                                   <span><?php echo e(date('Y-m-d H:m:s',$v->order_addtime)); ?></span>
                                   <span>订单号：<em><?php echo e($v->order_sn); ?></em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      <?php $__currentLoopData = $v->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/<?php echo e($val['id']); ?>"><img src="/<?php echo e($val['goods_pic']); ?>" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px"><?php echo e($val['goods_name']); ?></span>
                                           <span class="gr3">X<?php echo e($val['num']); ?></span>
                                       </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </div>
                                   <div class="ci2"><?php echo e($v->name); ?></div>
                                   <div class="ci3"><b>￥<?php echo e($v->order_amount); ?></b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p><?php echo e(date('Y-m-d',$v->order_addtime)); ?></p></div>
                                   <div class="ci5">
                                   <div class="statue<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>等待付款</p>
                                   <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p>等待发货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==3): ?>
                                  <p><a href="javascript:;">等待收货</a></p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==4): ?>
                                  <p>已收货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==0): ?>
                                  <p>交易关闭</p>
                                  <?php endif; ?>
                                    
                                   </div>
                                   <p><a href="/homeorder/<?php echo e($v->order_id); ?>">订单详情</a></p></div>
                                   <div class="ci5 ci8">
                                    <div class="getup<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>剩余15时20分</p> <p><a href="/pays" class="member-touch">立即支付</a> </p>
                                   <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                    
                                  <?php elseif($v->order_state==3): ?>
                                  <p>剩余6天23小时</p> <p><a href="javascript:;" onclick="getup(<?php echo e($v->order_id); ?>)" class="member-touch">确认收货</a> </p>
                                  <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                   
                                  <?php elseif($v->order_state==4): ?>
                                  <p><a href="">快去评论</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p><a href="javascript:;">申请退款</a></p>
                                  <?php endif; ?>
                                    </div>
                                   <p><a href="javascript:;" onclick="del(this,<?php echo e($v->order_id); ?>)">删除订单</a> </p></div>
                               </div>
                           </li>
                           <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                       </ul>
                   </div>
               </div>
               <div class="H-over member-over" style="display:none;"><h2>退货</h2></div>
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
