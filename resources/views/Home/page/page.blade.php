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
	<title>商品详情</title>
    <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="/theme/css/home.css">
	<script type="text/javascript" src="/theme/js/jquery.js"></script>
	<script type="text/javascript" src="/theme/js/index.js"></script>
	<script type="text/javascript" src="/theme/js/js-tab.js"></script>

    <script>
         $(function(){
             $(".yScrollListInList1 ul").css({width:$(".yScrollListInList1 ul li").length*(160+84)+"px"});
             $(".yScrollListInList2 ul").css({width:$(".yScrollListInList2 ul li").length*(160+84)+"px"});
             var numwidth=(160+84)*4;
             $(".yScrollListInList .yScrollListbtnl").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts<60){
                         obj.animate({left:lefts+numwidth},1000);
                     }
                 }
             })
             $(".yScrollListInList .yScrollListbtnr").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 var objcds=-(60+(Math.ceil(obj.find("li").length/4)-4)*numwidth);
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts>objcds){
                         obj.animate({left:lefts-numwidth},1000);
                     }
                 }
             })
         })
     </script>
    <script>
         $(function(){
         	$("#pro_detail a").click(function(){
         		$("#pro_detail a").removeClass("cur");
         		$(this).addClass("cur");
         		$("#big_img").attr("src",$(this).attr("simg"));
         	});
         	
         	$(".attrdiv a").click(function(){
         		$(".attrdiv a").removeClass("cur");
				$(this).addClass("cur");
         	});
          $(".attrdiv1 a").click(function(){
            $(".attrdiv1 a").removeClass("cur");
        $(this).addClass("cur");
          });
         	
         	$('.amount2').click(function(){
		        var num_input = $("#subnum");
		        var buy_num = (num_input.val()-1)>0?(num_input.val()-1):1;
		        num_input.val(buy_num);
		    });
		
		    $('.amount1').click(function(){
		        var num_input = $("#subnum");
		        var buy_num = Number(num_input.val())+1;
		        num_input.val(buy_num);
		    });
			
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
     <script type="text/javascript">
         $(document).ready(function(){
             $("#firstpane .menu_body:eq(0)").show();
             $("#firstpane h3.menu_head").click(function(){
                 $(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

             $("#secondpane .menu_body:eq(0)").show();
             $("#secondpane h3.menu_head").mouseover(function(){
                 $(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

         });
     </script>
     <style type="text/css">
      .sub{
            width: 148px;
            line-height: 38px;
            line-height: 38px;
            border: 1px solid #e6433e;
            text-align: center;
            background: #ffeded;
            font-size: 14px;
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
                    <li><a href="javascript:void(0)" style="float:left;">{{session('user_name')}}</a> <a href="/homeout" style="float:left;">退出</a> </li>
                  @else
                    <li><a href="/homelogin" style="color:#ea4949;">请登录</a> </li>
                    <li class="headerul">|</li>
                    <li><a href="/homereg">免费注册</a> </li>
                  @endif
                <li class="headerul">|</li>
                <li><a href="/homeorder">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="/homecollection">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="/" class="tit">我的商城</a>
                </li>
                <li class="headerul">|</li>
                <li><a href="javascript:void(0)" class="M-iphone">手机悦商城</a> </li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">
        <div class="header-logo fl"><h1><a href="javascript:void(0)"><img src="/theme/icon/logo.png"></a> </h1></div>
        <div class="head-form fl">
            <form class="clearfix">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="手机模型">
                <button class="button" onClick="search('key');return false;">搜索</button>
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
        <div class="header-cart fr"><a href=/car><img src="/theme/icon/car.png"></a> <i class="head-amount">99</i></div>
        <div class="head-mountain"></div>
    </div>
    <div class="yHeader">
        <div class="yNavIndex">
            <div class="pullDown">
                <h2 class="pullDownTitle">全部商品分类</h2>
            </div>
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

<!-- 商品详情 begin -->
<section>
    <div class="pc-details" >
        <div class="containers">
            <div class="pc-nav-item"><a class="pc-title" href="/">首页</a> &gt; <a href="/types/{{$catess->id}}">{{$catess->name}}</a> &gt; <a href="/types/{{$cates->id}}">{{$cates->name}}</a>&gt; <a href="/types/{{$cate->id}}">{{$cate->name}}</a>&gt; <a href="javascript:void(0)">{{$data->goods_name}}</a> </div>
            <div class="pc-details-l">
                <div class="pc-product clearfix">
                    <div class="pc-product-h">
                        <div class="pc-product-top"><img src="/{{$data->goods_pic}}" id="big_img" width="418" height="418"></div>
                        <div class="pc-product-bop clearfix" id="pro_detail">
                            <ul>
                              @if(count($pic))
                              @foreach($pic as $row)
                                <li><a href="javascript:void(0);" simg="/{{$row->goods_pic}}"><img src="/{{$row->goods_pic}}" width="58" height="58"></a> </li>
                              @endforeach
                              @else
                                <li><a href="javascript:void(0);" class="cur" simg="/{{$data->goods_pic}}"><img src="/{{$data->goods_pic}}" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/{{$data->goods_pic}}"><img src="/{{$data->goods_pic}}" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/{{$data->goods_pic}}"><img src="/{{$data->goods_pic}}" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/{{$data->goods_pic}}"><img src="/{{$data->goods_pic}}" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/{{$data->goods_pic}}"><img src="/{{$data->goods_pic}}" width="58" height="58"></a> </li>
                              @endif
                            </ul>
                        </div>
                    </div>
                    <div class="pc-product-t">
                        <div class="pc-name-info">
                            <h1>{{$data->goods_name}}</h1>
                            <h3>{{$data->goods_describe}}</h3>
                            <p class="clearfix pc-rate"><strong>￥{{$data->goods_price}}</strong> <span><em>限时抢购</em>抢购将于<b class="reds">18</b>小时<b class="reds">57</b>分<b class="reds">34</b>秒后结束</span></p>
                            <p>由<a href="javascript:void(0)" class="reds">神游官方旗舰店</a> 负责发货，并提供售后服务。</p>
                        </div>
                        <div class="pc-dashed clearfix">
                            <span>累计销量：<em class="reds">3988</em> 件</span><b>|</b><span>累计评价：<em class="reds">3888</em></span>
                        </div>
                        <div class="pc-size">
                            <div class="attrdiv pc-telling clearfix">
                                <div class="pc-version">版本</div>
                                <div class="pc-adults">
                                    <ul>
                                        <li><a href="javascript:void(0);" class="cur">32</a> </li>
                                        <li><a href="javascript:void(0);">32</a> </li>
                                        <li><a href="javascript:void(0);">32</a> </li>
                                        <li><a href="javascript:void(0);">32</a> </li>
                                        <li><a href="javascript:void(0);">32</a> </li>
                                        <li><a href="javascript:void(0);">32</a> </li>
                                        <li><a href="javascript:void(0);">32</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="attrdiv1 pc-telling clearfix">
                                <div class="pc-version">颜色分类</div>
                                <div class="pc-adults">
                                    <ul>
                                         @if(count($pic))
                                        @foreach($pic as $row)
                                        <li><a href="javascript:;" class="cur" title="{{$row->goods_color}}"><img src="/{{$row->goods_pic}}" width="52" height="51"></a> </li>
                                        @endforeach
                                        @else
                                        <li><a href="javascript:;" class="cur" title="我是颜色"><img src="/{{$data->goods_pic}}" width="52" height="51"></a> </li>
                                        <li><a href="javascript:;" title="我是颜色"><img src="/{{$data->goods_pic}}" width="52" height="51"></a> </li>
                                        <li><a href="javascript:;" title="我是颜色"><img src="/{{$data->goods_pic}}" width="52" height="51"></a> </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        <form action="/nowpay" method="post">
                        {{csrf_field()}}
                            <div class="pc-telling clearfix">
                                <div class="pc-version">数量</div>
                                <div class="pc-adults clearfix">
                                    <div class="pc-adults-p clearfix fl">
                                        <input type="" id="subnum" placeholder="1" name="num" value="1">
                                        <a href="javascript:void(0);" class="amount1"><img src="/theme/icon/pro_left.png" alt=""></a>
                                        <a href="javascript:void(0);" class="amount2"><img src="/theme/icon/pro_down.png" alt=""></a>    
                                    </div>
                                    <div class="fl pc-letter ">件</div>
                                    <div class="fl pc-stock ">库存<em>{{$data->goods_num}}</em>件</div>
                                </div>
                            </div>
                            <div class="pc-number clearfix"><span class="fl">商品编号：{{$data->goods_id}}   </span> <span class="fr">分享 <a href="javascript:;" onclick="foverite({{$data->goods_id}})">收藏</a></span></div>
                        </div>
                        <div class="pc-emption">
                            <!-- <a href="javascript:void(0)">立即购买</a> -->
                            <input type="submit" class="sub" value="立即购买">
                            <a href="javascript:;" class="join" id="addcar">加入购物车</a>
                            <input type="hidden" name="id" value="{{$data->goods_id}}">
                        </form>
                        </div>
                    </div>
                    <div class="pc-product-s">
                        <div class="pc-shoplo"><a href="javascript:void(0)"><img src="/theme/icon/shop-logo.png"></a> </div>
                        <div class="pc-shopti">
                            <h2>神游官方旗舰店</h2>
                            <p>公司名称：优购科技有限公司</p>
                            <p>所在地： 广东省   深圳市</p>
                        </div>
                        <div class="pc-custom"><a href="javascript:void(0)">联系客服</a> </div>
                        <div class="pc-trigger">
                            <a href="javascript:void(0)">进入店铺</a>
                            <a href="javascript:void(0)" style="margin:0;">关注店铺</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containers clearfix" style="margin-top:20px;">
        <div class="fl">
            <div class="pc-menu-in">
                <h2>店内搜索</h2>
                <form>
                    <p>关键词:<input type="text" class="pc-input1"></p>
                    <p>价  格：<input class="pc-input2"> 到 <input class="pc-input2"></p>
                    <p><a href="javascript:void(0)">搜索</a> </p>
                </form>
            </div>
            <div class="menu_list" id="firstpane">
                <h2>店内分类</h2>
                <h3 class="menu_head current">电玩</h3>
                <div class="menu_body" style="display: none;">
                    <a href="javascript:void(0)">耳机耳麦</a>
                    <a href="javascript:void(0)">游戏机</a>
                </div>
                <h3 class="menu_head">手机</h3>
                <div class="menu_body" style="display: none;">
                    <a href="javascript:void(0)">手机</a>
                    <a href="javascript:void(0)">手机</a>
                    <a href="javascript:void(0)">手机</a>
                </div>

                <h3 class="menu_head">耳机耳麦</h3>
                <div class="menu_body" style="display: none;">
                    <a href="javascript:void(0)">耳机耳麦</a>
                    <a href="javascript:void(0)">耳机耳麦</a>
                    <a href="javascript:void(0)">耳机耳麦</a>
                    <a href="javascript:void(0)">耳机耳麦</a>
                </div>
            </div>
        </div>
        <div class="pc-info fr">
            <div class="pc-overall">
                <ul id="H-table1" class="brand-tab H-table1 H-table-shop clearfix ">
                    <li class="cur"><a href="javascript:void(0);">商品介绍</a></li>
                    <li><a href="javascript:void(0);">商品评价<em class="reds">(91)</em></a></li>
                    <li><a href="javascript:void(0);">售后保障</a></li>
                </ul>
                <div class="pc-term clearfix">
                   <div class="H-over1 pc-text-word clearfix">
                    @if($list)
                    <div>{!!$list->details!!}</div>
                    @else
                    <div></div>
                    @endif
                       <div>
                          @foreach($pic as $r)
                           <div><img src="/{{$r->goods_pic}}" width="80%"></div>
                          @endforeach
                       </div>
                   </div>
                   <div class="H-over1" style="display:none">
                       <div class="pc-comment fl"><strong>86<span>%</span></strong><br> <span>好评度</span></div>
                       <div class="pc-percent fl">
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>中评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                       </div>
                   </div>
                   <div class="H-over1 pc-text-title" style="display:none">
                       <p>本产品全国联保，享受三包服务，质保期为：一年质保
                           如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！
                           (注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......</p>
                       <div class="pc-line"></div>
                   </div>
                </div>
            </div>
            <div class="pc-overall">
                <ul class="brand-tab H-table H-table-shop clearfix " id="H-table" style="margin-left:0;">
                    <li class="cur"><a href="javascript:void(0);">全部评价（{{count($app)}}）</a></li>
                    <li><a href="javascript:void(0);">好评<em class="reds">（{{$g}}）</em></a></li>
                    <li><a href="javascript:void(0);">中评<em class="reds">（{{$z}}）</em></a></li>
                    <li><a href="javascript:void(0);">差评<em class="reds">（{{$c}}）</em></a></li>
                </ul>
                <div class="pc-term clearfix">
                    <div class="pc-column">
                        <span class="column1">评价心得</span>
                        <span class="column2">顾客满意度</span>
                        <span class="column3">购买信息</span>
                        <span class="column4">评论者</span>
                    </div>
                    <div class="H-over  pc-comments clearfix">
                        <ul class="clearfix">
                          @foreach($app as $vv)
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="javascript:void(0)">回复<em>（90）</em></a> <a href="javascript:void(0)">赞<em>（90）</em></a> </p>
                                    <p>{{$vv->appraise_coment}}</p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_time)}}</p>
                                    @if($vv->appraise_reply!=null)
                                    <br><p>商家回复:  {{$vv->appraise_reply}}  </p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_replytime)}}</p>
                                    @endif
                                </div>
                                <div class="column2">
                                @if($vv->appraise_leval==0)
                                <img src="/theme/icon/star.png">
                                @elseif($vv->appraise_leval==1)
                                <img src="/theme/icon/member-x1.png"><img src="/theme/icon/member-x1.png"><img src="/theme/icon/member-x1.png">
                                @elseif($vv->appraise_leval==2)
                                <img src="/theme/icon/member-x1.png">
                                @endif
                               

                                </div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                          @endforeach
                            
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            @foreach($app as $vv)
                            @if($vv->appraise_leval==0)
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="javascript:void(0)">回复<em>（90）</em></a> <a href="javascript:void(0)">赞<em>（90）</em></a> </p>
                                    <p>{{$vv->appraise_coment}}</p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_time)}}</p>
                                    @if($vv->appraise_reply!=null)
                                    <br><p>商家回复:  {{$vv->appraise_reply}}  </p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_replytime)}}</p>
                                    @endif
                                </div>
                                <div class="column2">
                                <img src="/theme/icon/star.png">
                                </div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                          @endif
                          @endforeach
                            
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            @foreach($app as $vv)
                            @if($vv->appraise_leval==1)
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="javascript:void(0)">回复<em>（90）</em></a> <a href="javascript:void(0)">赞<em>（90）</em></a> </p>
                                    <p>{{$vv->appraise_coment}}</p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_time)}}</p>
                                    @if($vv->appraise_reply!=null)
                                    <br><p>商家回复:  {{$vv->appraise_reply}}  </p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_replytime)}}</p>
                                    @endif
                                </div>
                                <div class="column2">
                                @if($vv->appraise_leval==0)
                                <img src="/theme/icon/star.png">
                                @elseif($vv->appraise_leval==1)
                                <img src="/theme/icon/member-x1.png"><img src="/theme/icon/member-x1.png"><img src="/theme/icon/member-x1.png">
                                @elseif($vv->appraise_leval==2)
                                <img src="/theme/icon/member-x1.png">
                                @endif
                                </div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                          @endif
                          @endforeach
                          
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            @foreach($app as $vv)
                            @if($vv->appraise_leval==2)
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="javascript:void(0)">回复<em>（90）</em></a> <a href="javascript:void(0)">赞<em>（90）</em></a> </p>
                                    <p>{{$vv->appraise_coment}}</p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_time)}}</p>
                                    @if($vv->appraise_reply!=null)
                                    <br><p>商家回复:  {{$vv->appraise_reply}}  </p>
                                    <p class="column5">{{date('Y-m-d h:m:s',$vv->appraise_replytime)}}</p>
                                    @endif
                                </div>
                                <div class="column2">
                                @if($vv->appraise_leval==0)
                                <img src="/theme/icon/star.png">
                                @elseif($vv->appraise_leval==1)
                                <img src="/theme/icon/member-x1.png"><img src="/theme/icon/member-x1.png"><img src="/theme/icon/member-x1.png">
                                @elseif($vv->appraise_leval==2)
                                <img src="/theme/icon/member-x1.png">
                                @endif
                                </div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                          @endif
                          @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 商品详情 End -->

<!--- footer begin-->
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
<!-- footer End -->
</body>
<script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/shops/static/h-ui.admin/js/H-ui.admin.js"></script>
<script>
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
 $("#addcar").click(function(){
  //获取对应的商品id
  var id=$("input[name=id]").val();
  //获取商品详情页选择的数量
  var num=$("#subnum").val();
  //加入购物车，并把相应的数据传递过去
  window.location.href="/addcar?id="+id+"&num="+num;
 });

 function foverite(id){
  $.get('/homecollection/'+id,function(data){
    // alert(data);
    if(data==1){
      layer.msg('收藏成功~感谢您的收藏!',{icon:1,time:1000});
    }else if(data==2){
      layer.msg('非常抱歉~收藏失败!',{icon:2,time:1000});
    }else{
      layer.msg('请先登录!',{icon:7,time:1500},function(){
        location="/homelogin";
      });
    }
  });
 }
</script>
</html>
