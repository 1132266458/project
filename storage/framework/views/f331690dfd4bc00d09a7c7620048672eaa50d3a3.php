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
    <title>歪秀购物</title>
    <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/theme/css/home.css">

    <script type="text/javascript" src="/theme/js/jquery.js"></script>
    <script type="text/javascript" src="/theme/js/index.js"></script>
    <script type="text/javascript" src="/theme/js/js-tab.js"></script>
    <script type="text/javascript" src="/theme/js/MSClass.js"></script>
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
     <style>
      .one{display:none;}
     </style>
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
                        <a href="/homeaddress">地址管理</a>
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
    <div class="container clearfix">
        <div class="header-logo fl"><h1><a href="/"><img src="/theme/icon/logo.png"></a> </h1></div>
        <div class="head-form fl">
            <!-- 搜索 -->
            <form class="clearfix" action="/search" method="get">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="洗衣机" name="keywords">
                <button class="button" type="submit">搜索</button>
            </form>
            <div class="words-text clearfix">
                <a href="javascript:void(0)" class="red">1元秒爆</a>
                <a href="javascript:void(0)">低至五折</a>
                <a href="javascript:void(0)">农用物资</a>
                <a href="javascript:void(0)">买一赠一</a>
                <a href="javascript:void(0)">佳能相机</a>
                <a href="javascript:void(0)">稻香村月饼</a>
                <a href="javascript:void(0)">服装城</a>
            </div>
        </div>
        <!-- 购物车 -->
        <div class="header-cart fr"><a href="/car"><img src="/theme/icon/car.png"></a> <i class="head-amount"><?php echo e(count(session('shop'))); ?></i></div>
        <div class="head-mountain"></div>
    </div>
    <div class="yHeader">
        <div class="yNavIndex">
            <div class="pullDown">
              <h2 class="pullDownTitle">
                  全部商品分类
              </h2>
              <ul class="pullDownList">
                <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li  onclick="open1(<?php echo e($v->id); ?>)">
                      <i class="listi<?php echo e($k+1); ?>"></i>
                      <a href="/types/<?php echo e($v->id); ?>" target="_blank"><?php echo e($v->name); ?></a> 
                  </li>
                 <ul id="u<?php echo e($v->id); ?>" style="display:none;">
                 <?php $__currentLoopData = $v->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li onclick="open2(<?php echo e($vv->id); ?>)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/types/<?php echo e($vv->id); ?>"  target="_blank"><?php echo e($vv->name); ?></a></li>
                    <ul id="uu<?php echo e($vv->id); ?>" style="display:none;">
                     <?php $__currentLoopData = $vv->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vvv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/types/<?php echo e($vvv->id); ?>"  target="_blank"><?php echo e($vvv->name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </ul>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            
            <!-- 栏目 -->
            <ul class="yMenuIndex">
                <li><a href="" target="_blank">服装城</a></li>
                <li><a href="" target="_blank">美妆馆</a></li>
                <li><a href="" target="_blank">美食</a></li>
                <li><a href="" target="_blank">全球购</a></li>
                <li><a href="" target="_blank">闪购</a></li>
                <li><a href="" target="_blank">团购</a></li>
                <li><a href="" target="_blank">拍卖</a></li>
                <li><a href="" target="_blank">金融</a></li>
                <li><a href="" target="_blank">智能</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- header End -->

<!-- 轮播图 -->
<!--- banner begin-->
<section id="pc-banner">
    <div class="yBanner">
        <div class="banner" id="banner" >
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="javascript:;" class="d1" style="background:url(/uploads/slider/<?php echo e($row->slider_img); ?>) center no-repeat;background-color: #f01a38; padding-left:180px;"></a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="d2" id="banner_id">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div style="text-align:center;clear:both"></div>
    </div>
</section>
<!-- banner End -->

<!-- 轮播图下的广告 -->
<!--- advert begin-->
<section id="pc-advert">
    <div class="container-c clearfix">
        <a href="/homepage/7" target="_blank"><img src="/theme/img/pd/pd1.png"></a>
        <a href="page.html" target="_blank"><img src="/theme/img/pd/pd2.png"></a>
        <a href="page.html" target="_blank"><img src="/theme/img/pd/pd3.png"></a>
        <a href="page.html" target="_blank"><img src="/theme/img/pd/pd4.png"></a>
    </div>
</section>
<!-- advert End -->
<!-- 轮播图下的广告end -->

<!-- 商城资讯 begin -->
<section id="pc-information">
    <div class="containers">
        <div class="pc-info-mess  clearfix" style="position: relative;">
            <h2 class="fl" style="margin-right:20px;">商城快讯</h2>
            <div id="MarqueeDiv" class="MarqueeDiv">
              <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="new.html"><?php echo e($row->title); ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a href="/morenew" style="position: absolute;right: 15px;top: 0;"> 更多资讯</a>
        </div>
    </div>
</section>
<!-- 商城资讯 End -->

<!-- 限时抢购 begin -->
<div class="time-lists clearfix">
    <div class="time-list fl">
        <div class="time-title">
            <h2>限时抢购</h2>
            <div class="time-item clearfix fl" style="padding-left:10px;">
                <strong id="hour_show">00</strong>
                <strong class="pc-clear-sr">:</strong>
                <strong id="minute_show">00</strong>
                <strong class="pc-clear-sr">:</strong>
                <strong id="second_show">00</strong>
            </div><!--倒计时模块-->
            <a href="sale-begin.html" class="fr">更多抢购商品</a>
        </div>
        <div class="time-border">
            <div class="yScrollList">
                <div class="yScrollListIn">
                  <a class="yScrollListbtn yScrollListbtnl" id="prev-01"></a>
                    <div class="yScrollListInList yScrollListInList1 jCarouselLite" style="display:block;margin-left: 20px;" id="demo-01">
                        <ul>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/theme/img/pd/p1.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/theme/img/pd/p2.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/theme/img/pd/p4.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                        </ul>
                        
                        
                    </div>
                    <a class="yScrollListbtn yScrollListbtnr" id="next-01"></a>
                    <div class="yScrollListInList yScrollListInList2">
                        <ul>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                        </ul>
                        <div class="yScrollListbtn yScrollListbtnl"></div>
                        <div class="yScrollListbtn yScrollListbtnr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-list fr">
        <div class="time-title time-clear"><h2>商城快讯</h2><a href="/morenew" class="fr"> 更多资讯</a> </div>
        <div class="time-border" style="border-left:none;">
            <ul class="news">
                <?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="javascript:void(0)"><?php echo e($row->title); ?></a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="time-poduse"><img src="/theme/img/pd/pj1.png"></div>
        </div>
    </div>
</div>
<!-- 限时抢购 End -->

<div class="time-lists clearfix">
    <div class="time-list time-list-w fl">
        <div class="time-title time-clear"><h2>热卖区</h2><div class="pc-font fl"></div><a class="pc-spin fr" href="javascript:;" id="change" onclick="changepage()">换一换</a> </div>
        <input type="hidden" id="pagesx" value="1">
        <input type="hidden" id="maxpage" value="<?php echo e($maxpage); ?>">
        <div class="time-border">
            <div class="yScrollList">
                <div class="yScrollListIn">
                    <div style="display:block;" class="yScrollListInList yScrollListInList1">
                        <ul id="uid">
                            <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="/homepage/<?php echo e($row->goods_id); ?>">
                                    <img src="/<?php echo e($row->goods_pic); ?>">
                                    <p class="head-name pc-pa10"><?php echo e($row->goods_describe); ?></p>
                                   <!--  <p class="label-default">3.45折</p> -->
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="time-lists  clearfix">
    <div class="time-list time-list-w fl">
        <div class="time-title time-clear-f2"><h2>商城精品</h2>
        </div>
        <div class="time-border time-border-h clearfix">
            <div class="brand-bar fl"><a href="javascript:void(0)"><img src="/theme/img/ad/bar2.jpg" width="300" height="476"></a> </div>
            <div class="brand-poa fl">
                <div class="brand-poa H-over1 clearfix">
                    <ul>
                        <?php $__currentLoopData = $goodgoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="brand-imgss"><a href="javascript:void(0)"><img src="/<?php echo e($row->goods_pic); ?>" width="150px"></a></div>
                            <div class="brand-title"><a href="javascript:void(0)"><?php echo e($row->goods_describe); ?></a> </div>
                            <div class="brand-price"><?php echo e($row->goods_price); ?></div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>



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
<script type="text/javascript">

function open1(pid){
  var ul = document.getElementById('u'+pid);
  //alert(ul)
  //alert(ul.style.display)
  if(ul.style.display == 'none'){
    ul.style.display="block";
  }else{
    ul.style.display="none";
  }
}

function open2(pid){
  var ul = document.getElementById('uu'+pid);
  //alert(ul)
  //alert(ul.style.display)
  if(ul.style.display == 'none'){
    ul.style.display="block";
  }else{
    ul.style.display="none";
  }
}

// function open2(pid){
//   var ul = document.getElementById('u'+pid);
//     // $('.o'+pid+'p').hide();
//     ul.style.display="none";
// }

//处理换一换，也就是改变page的值
function changepage(){
    page=$("#pagesx").val();
    maxpage=$("#maxpage").val();
    //当前页码加一
    page++;
    //判断范围
    //alert(page);
    if(page>maxpage){
      page=1;
    }
    $("#pagesx").val(page);
    $.get("/",{page:page},function(data){
    //赋值给id值为 uid的div
    $("#uid").html(data);
    });
}

</script>
</body>
</html>
