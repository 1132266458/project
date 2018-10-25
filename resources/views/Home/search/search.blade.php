<!DOCTYPE html>
<html>
 <head> 
  <meta charset="UTF-8" /> 
  <meta name="Generator" content="EditPlus&reg;" /> 
  <meta name="Author" content="" /> 
  <meta name="Keywords" content="" /> 
  <meta name="Description" content="" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" /> 
  <meta name="renderer" content="webkit" /> 
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>歪秀购物</title> 
  <link rel="shortcut icon" type="image/x-icon" href="theme/icon/favicon.ico" /> 
  <link rel="stylesheet" type="text/css" href="theme/css/base.css" /> 
  <link rel="stylesheet" type="text/css" href="theme/css/home.css" /> 
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
 </head> 
 <body> 
  <!-- header begin--> 
  <header id="pc-header"> 
   <div class="BHeader"> 
    <div class="yNavIndex"> 
     <ul class="BHeaderl"> 
      <li><a href="#">登录</a> </li> 
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
       </div> </li> 
      <li class="headerul">|</li> 
      <li><a href="#" class="M-iphone">手机悦商城</a> </li> 
     </ul> 
    </div> 
   </div> 
   <div class="container clearfix"> 
    <div class="header-logo fl"> 
     <h1><a href="#"><img src="/theme/icon/logo.png" /></a> </h1> 
    </div> 
    <div class="head-form fl"> 
     <form class="clearfix"> 
      <input type="text" class="search-text" accesskey="" id="key" autocomplete="off" placeholder="手机模型" /> 
      <button class="button" onclick="search('key');return false;">搜索</button> 
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
    <div class="header-cart fr"> 
     <a href="#"><img src="/theme/icon/car.png" /></a> 
     <i class="head-amount">99</i> 
    </div> 
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
  <div class="containers"> 
   <div class="time-border-list pc-search-list clearfix"> 
    <ul class="clearfix">
     @foreach($goods as $row) 
     @if($row->goods_status==0)
     <li> <a href="/homepage/{{$row->goods_id}}"> <img src="/{{$row->goods_pic}}" width="240px" height="280px"/></a> <p class="head-name"><a href="/homepage/{{$row->goods_id}}">{{$row->goods_describe}}</a> </p> <br><p><span class="price">{{$row->goods_price}}</span></p> <p class="head-futi clearfix"><span class="fl">好评度：90% </span> <span class="fr">100人购买</span></p> <p class="clearfix"><span class="label-default fl">抢购</span> <a href="javascript:;" onclick="foverite({{$row->goods_id}})" class="fr pc-search-c">收藏</a> </p> </li> 
     @endif
     @endforeach
    </ul> 
   </div> 
  </div>  
  <!-- <div class="pc-no">
    抱歉，没有找到与“
    <em>手机模型</em>”相关的商品
   </div>  -->  
  <div class="time-lists clearfix"> 
   <div class="time-list time-list-w fl"> 
    <div class="time-title time-clear"> 
     <h2>热卖区</h2> 
     <div class="pc-font fl"></div> 
     <a href="javascript:;" class="pc-spin fr">换一换</a> 
    </div> 
    <div class="time-border"> 
     <div class="yScrollList"> 
      <div class="yScrollListIn"> 
       <div class="yScrollListInList yScrollListInList1" style="display:block;"> 
        <ul style="width: 2440px;"> 
         <li> <a href=""> <img src="/theme/img/pd/p1.png" /> <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p> <p class="label-default">3.45折</p> </a> </li> 
         <li> <a href=""> <img src="/theme/img/pd/p2.png" /> <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p> <p class="label-default">3.45折</p> </a> </li> 
         <li> <a href=""> <img src="/theme/img/pd/p3.png" /> <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p> <p class="label-default">3.45折</p> </a> </li> 
         <li> <a href=""> <img src="/theme/img/pd/p4.png" /> <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p> <p class="label-default">3.45折</p> </a> </li> 
         <li> <a href=""> <img src="/theme/img/pd/p5.png" /> <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p> <p class="label-default">3.45折</p> </a> </li> 
         <li> <a href=""> <img src="/theme/img/pd/p6.png" /> <p class="head-name pc-pa10">TP-LINK TL-WN725N 微型150M无线USB网卡</p> <p class="label-default">3.45折</p> </a> </li> 
        </ul> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="pc-120"></div> 
  <!-- footer begin--> 
  <div class="aui-footer-bot"> 
   <div class="time-lists aui-footer-pd clearfix"> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d1.png" /></span> <em>消费者权益</em> </h4> 
     <ul> 
      <li><a href="#">保障范围 </a> </li> 
      <li><a href="#">退货退款流程</a> </li> 
      <li><a href="#">服务中心 </a> </li> 
      <li><a href="#">服务中心</a> </li> 
      <li><a href="#"> 更多特色服务 </a> </li> 
     </ul> 
    </div> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d2.png" /></span> <em>新手上路</em> </h4> 
     <ul> 
      <li><a href="#">退货退款流程</a> </li> 
      <li><a href="#">服务中心 </a> </li> 
      <li><a href="#">服务中心</a> </li> 
      <li><a href="#"> 更多特色服务 </a> </li> 
     </ul> 
    </div> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d3.png" /></span> <em>保障正品</em> </h4> 
     <ul> 
      <li><a href="#">退货退款流程</a> </li> 
      <li><a href="#">服务中心 </a> </li> 
      <li><a href="#">服务中心</a> </li> 
      <li><a href="#"> 更多特色服务 </a> </li> 
     </ul> 
    </div> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d1.png" /></span> <em>消费者权益</em> </h4> 
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
  <script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/shops/static/h-ui.admin/js/H-ui.admin.js"></script>
  <script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
    // 收藏商品
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
 </body>
</html>
