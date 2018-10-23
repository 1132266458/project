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
              @if(session()->has('user_name'))
                <li><a href="#" style="float:left;">{{session('user_name')}}</a> <a href="/homeout" style="float:left;">退出</a> </li>
              @else
                <li><a href="/homelogin" style="color:#ea4949;">请登录</a> </li>
                <li class="headerul">|</li>
                <li><a href="/homereg">免费注册</a> </li>
              @endif
                <li class="headerul">|</li>
                <li><a href="my-d.html">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="/homecollection">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="my-user.html" class="tit">我的商城</a>
                    <div class="subnav">
                        <a href="/homeorder">我的订单</a>
                        <a href="/homecollection">我的收藏</a>
                        <a href="/usersafety">账户安全</a>
                        <a href="/homeaddress">地址管理</a>
                        <a href="/homecomment">我要评价</a>
                    </div>
                </li>
                <li class="headerul">|</li>
                <li id="pc-nav1" class="menu"><a href="#" class="tit M-iphone">手机悦商城</a>
                   <div class="subnav">
                       <a href="#"><img src="/theme/icon/ewm.png" width="115" height="115" title="扫一扫，有惊喜！"></a>
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
                <a href="#" class="red">1元秒爆</a>
                <a href="#">低至五折</a>
                <a href="#">农用物资</a>
                <a href="#">买一赠一</a>
                <a href="#">佳能相机</a>
                <a href="#">稻香村月饼</a>
                <a href="#">服装城</a>
            </div>
        </div>
        <!-- 购物车 -->
        <div class="header-cart fr"><a href="/car"><img src="/theme/icon/car.png"></a> <i class="head-amount">{{session()->has('shop')?count(session('shop')):'0'}}</i></div>
        <div class="head-mountain"></div>
    </div>
    <div class="yHeader">
        <div class="yNavIndex">
            <div class="pullDown">
              <h2 class="pullDownTitle">
                  全部商品分类
              </h2>
              <ul class="pullDownList">
                @foreach($cate as $k=>$v)
                  <li  onclick="open1({{$v->id}})">
                      <i class="listi{{$k+1}}"></i>
                      <a href="/types/{{$v->id}}" target="_blank">{{$v->name}}</a> 
                  </li>
                 <ul id="u{{$v->id}}" style="display:none;">
                 @foreach($v->dev as $vv)
                  <li onclick="open2({{$vv->id}})">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/types/{{$vv->id}}"  target="_blank">{{$vv->name}}</a></li>
                    <ul id="uu{{$vv->id}}" style="display:none;">
                     @foreach($vv->dev as $vvv)
                      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/types/{{$vvv->id}}"  target="_blank">{{$vvv->name}}</a></li>
                      @endforeach
                     </ul>
                  @endforeach
                 </ul>
                 @endforeach
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
          @foreach($data as $row)
            <a href="javascript:;" class="d1" style="background:url(/uploads/slider/{{$row->slider_img}}) center no-repeat;background-color: #f01a38; padding-left:180px;"></a>
          @endforeach
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
              <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
              <a href="new.html">[特惠]洗护节 跨品牌满199减100</a>
              <a href="new.html">[特惠]仁怀政府开启“仁怀酱香酒馆”</a>
              <a href="new.html">[特惠]洗护节 跨品牌满199减100</a>
              <a href="new.html">逛商城赚话费，商城通信51城全线抢购 </a>
              <a href="new.html">文艺蓝牙音箱 火热众筹中 </a>
              <a href="new.html">[公告]第1000家商城帮服务店落户遵义</a>
              <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
              <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
              <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
            </div>
            <a href="new.html" style="position: absolute;right: 15px;top: 0;"> 更多资讯</a>
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
        <div class="time-title time-clear"><h2>商城快讯</h2><a href="#" class="fr"> 更多资讯</a> </div>
        <div class="time-border" style="border-left:none;">
            <ul class="news">
                <li><a href="#">[特惠]洗护节 跨品牌满199减100</a> </li>
                <li><a href="#">[特惠]新一代Moto 360智能手表登陆</a> </li>
                <li><a href="#">[特惠]惠氏品牌日 两件立享85折</a> </li>
                <li><a href="#">[特惠]洗护节 跨品牌满199减100</a> </li>
                <li><a href="#">[特惠]仁怀政府开启“仁怀酱香酒馆”</a> </li>
            </ul>
            <div class="time-poduse"><img src="/theme/img/pd/pj1.png"></div>
        </div>
    </div>
</div>
<!-- 限时抢购 End -->

<!-- 卖场推荐 begin -->
<div class="container-c time-lists clearfix">
    <div class="time-list fl">
        <div class="time-title time-clear"><h2>卖场推荐</h2><a href="javascript:;" class="pc-spin fr">换一换</a> </div>
        <div class="time-poued clearfix">
            <a href="#"><img src="/theme/img/ad/a2.png"></a>
            <a href="#"><img src="/theme/img/ad/a3.png"></a>
            <a href="#"><img src="/theme/img/ad/a4.png"></a>
            <a href="#"><img src="/theme/img/ad/a5.png"></a>
        </div>
    </div>
    <div class="news-list fr">
        <div class="time-title time-clear"><h2>今日值得购买</h2></div>
        <div class="news-right"><a href="#"><img src="/theme/img/ad/a1.png"></a></div>
    </div>
</div>
<!-- 卖场推荐 End -->

<div class="time-lists clearfix">
    <div class="time-list time-list-w fl">
        <div class="time-title time-clear"><h2>热卖区</h2><div class="pc-font fl"></div><a class="pc-spin fr" href="javascript:;">换一换</a> </div>
        <div class="time-border">
            <div class="yScrollList">
                <div class="yScrollListIn">
                    <div style="display:block;" class="yScrollListInList yScrollListInList1">
                        <ul>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p1.png">
                                    <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p2.png">
                                    <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p3.png">
                                    <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p4.png">
                                    <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p5.png">
                                    <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/theme/img/pd/p6.png">
                                    <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="containers main-banner"><a href="#"><img src="/theme/img/ad/br1.jpg" width="1200" height="105"></a> </div>

<div class="time-lists  clearfix">
    <div class="time-list time-list-w fl">
        <div class="time-title time-clear-f"><h2>服装鞋帽</h2>
            <ul class="brand-tab H-table clearfix fr" id="H-table">
                <li class="cur"><a href="javascript:void(0);" class="cur">男装</a></li>
                <li><a href="javascript:void(0);">女装</a></li>
                <li><a href="javascript:void(0);">鞋靴</a></li>
                <li><a href="javascript:void(0);">箱包</a></li>
                <li><a href="javascript:void(0);">内衣配饰</a></li>
                <li><a href="javascript:void(0);">珠宝首饰</a></li>
                <li><a href="javascript:void(0);">奢品礼品</a></li>
                <li><a href="javascript:void(0);">奢华腕表</a></li>
            </ul>
        </div>
        <div class="time-border time-border-h clearfix">
            <div class="brand-img fl">
                <ul>
                    <li><a href="#"><img src="/theme/img/ad/p1.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p2.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p3.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p4.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p5.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p6.png" width="125" height="47"></a></li>
                </ul>
            </div>
            <div class="brand-bar fl"><a href="#"><img src="/theme/img/ad/bar.jpg" width="300" height="476"></a> </div>
            <div class="brand-poa fl">
                <div class="brand-poa H-over clearfix">
                    <ul>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar2.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar3.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar4.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar5.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                    </ul>
                </div>
                <div class="brand-poa H-over clearfix" style="display:none;">
                    <ul>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar5.png"></a></div>
                            <div class="brand-title"><a href="#">松下（Panasonic）智能马桶盖 洁身器 电子坐便盖DL-1109CWS</a> </div>
                            <div class="brand-price">￥299.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar2.png"></a></div>
                            <div class="brand-title"><a href="#">一加（OnePlus）64GB 砂岩黑 移动4G手机</a> </div>
                            <div class="brand-price">￥455.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">【全球购】moony尤尼佳纸尿裤 日本官方进口尿不湿宝宝婴儿尿片 大号L54片(9-14kg)</a> </div>
                            <div class="brand-price">￥299.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar4.png"></a></div>
                            <div class="brand-title"><a href="#">【顺丰包邮】北海道白色恋人黑白巧克力36枚铁盒混合夹心饼干 日本进口零食礼盒中秋送礼送女友</a> </div>
                            <div class="brand-price">￥655.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar5.png"></a></div>
                            <div class="brand-title"><a href="#">便宜坊（Bianyifang）烤鸭 焖炉烤鸭1000g 原味（整只）</a> </div>
                            <div class="brand-price">￥189.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">加拿大进口Polar Bear极地熊牌榛子仁400g</a> </div>
                            <div class="brand-price">￥349.00 </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="time-lists  clearfix">
    <div class="time-list time-list-w fl">
        <div class="time-title time-clear-f2"><h2>美容护肤</h2>
            <ul class="brand-tab H-table1 clearfix fr" id="H-table1">
                <li class="cur"><a href="javascript:void(0);">男装</a></li>
                <li><a href="javascript:void(0);">女装</a></li>
                <li><a href="javascript:void(0);">鞋靴</a></li>
                <li><a href="javascript:void(0);">箱包</a></li>
                <li><a href="javascript:void(0);">内衣配饰</a></li>
                <li><a href="javascript:void(0);">珠宝首饰</a></li>
                <li><a href="javascript:void(0);">奢品礼品</a></li>
                <li><a href="javascript:void(0);">奢华腕表</a></li>
            </ul>
        </div>
        <div class="time-border time-border-h clearfix">
            <div class="brand-img fl">
                <ul>
                    <li><a href="#"><img src="/theme/img/ad/p1.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p2.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p3.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p4.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p5.png" width="125" height="47"></a></li>
                    <li><a href="#"><img src="/theme/img/ad/p6.png" width="125" height="47"></a></li>
                </ul>
            </div>
            <div class="brand-bar fl"><a href="#"><img src="/theme/img/ad/bar1.jpg" width="300" height="476"></a> </div>
            <div class="brand-poa fl">
                <div class="brand-poa H-over1 clearfix">
                    <ul>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar2.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar3.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar4.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar5.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                    </ul>
                </div>
                <div class="brand-poa H-over1 clearfix" style="display:none;">
                    <ul>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar2.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar3.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar4.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar5.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                        <li>
                            <div class="brand-imgss"><a href="#"><img src="/theme/img/pd/bar1.png"></a></div>
                            <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                            <div class="brand-price">￥599.00 </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="containers main-banner"><a href="#"><img src="/theme/img/ad/br1.jpg" width="1200" height="105"></a> </div>

<div class="time-lists clearfix">
    <div class="time-list fl">
        <div class="time-title time-clear"><h2>好店推荐 </h2></div>
        <div class="time-border time-border-h clearfix">
            <div class="fl shop-img">
                <div class="shop-title"><a href="#"><img src="/theme/img/ad/shop1.png"></a></div>
                <div class="shop-text"><h2>熊太子坚果炒货金冠店铺...</h2> <p>[正品 有赠品 如实描述]</p></div>
                <div class="shop-work clearfix"><a href="#"><img src="/theme/img/ad/shop2.png"></a><a href="#"><img src="/theme/img/ad/shop3.png"></a> </div>
            </div>
            <div class="shop-bar clearfix fl">
                <ul>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="news-list fr">
        <div class="time-title time-clear"><h2>店铺销量top排行</h2></div>
        <div style="border-left:none;" class="time-border time-border-h">
            <ul class="shop-top">
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<section>
    <div class="time-lists clearfix">
        <div class="time-list time-list-w fl">
            <div class="time-title time-clear"><h2>悦帮派</h2></div>
            <div class="time-border time-border-h clearfix">
                <div class="fl shop-img">
                    <div class="shop-hgou"><h3>新手上路</h3></div>
                    <div class="shop-help clearfix">
                        <ul>
                            <li><a href="#">开店指南</a> </li>
                            <li><a href="#">购物流程</a> </li>
                            <li><a href="#">交易安全</a> </li>
                            <li><a href="#">常见问题</a> </li>
                            <li><a href="#">联系客服</a> </li>
                            <li><a href="#">用户协议</a> </li>
                        </ul>
                    </div>
                    <div class="shop-re"><a href="#"><img src="/theme/img/ad/shop5.png"></a> </div>
                </div>
                <div class="shop-bar shop-bar-w clearfix fl">
                    <div class="shop-dan clearfix"><h3 class="fl">悦用户晒单</h3> <a href="#" class="fr">更多晒单</a> </div>
                    <div class="clearfix" style="width:980px;">
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/theme/img/ad/shop2.png"></a><a href="#"><img src="/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/theme/img/ad/shop2.png"></a><a href="#"><img src="/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/theme/img/ad/shop2.png"></a><a href="#"><img src="/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/theme/img/ad/shop2.png"></a><a href="#"><img src="/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/theme/img/ad/shop2.png"></a><a href="#"><img src="/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






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


</script>
</body>
</html>
