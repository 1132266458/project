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
	<title>提交订单</title>
    <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="/theme/css/home.css">
  <script type="text/javascript" src="/theme/js/jquery.js"></script>
  <script type="text/javascript" src="/theme/js/jquery-1.7.2.js"></script>
  <script src="/theme/js/jquery-1.7.min.js" type="text/javascript"></script>
  <script src="/theme/js/Area.js" type="text/javascript"></script>
  <script src="/theme/js/AreaData_min.js" type="text/javascript"></script>
  
<script type="text/javascript">
$(function (){
  initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '44', '0', '0');
});

//得到地区码
function getAreaID(){
  var area = 0;          
  if($("#seachdistrict").val() != "0"){
    area = $("#seachdistrict").val();                
  }else if ($("#seachcity").val() != "0"){
    area = $("#seachcity").val();
  }else{
    area = $("#seachprov").val();
  }
  return area;
}

function showAreaID() {
  //地区码
  var areaID = getAreaID();
  //地区名
  var areaName = getAreaNamebyID(areaID) ;
  // alert("您选择的地区码：" + areaID + "      地区名：" + areaName);            
}

//根据地区码查询地区名
function getAreaNamebyID(areaID){
  var areaName = "";
  if(areaID.length == 2){
    areaName = area_array[areaID];
  }else if(areaID.length == 4){
    var index1 = areaID.substring(0, 2);
    areaName = area_array[index1] + " " + sub_array[index1][areaID];
  }else if(areaID.length == 6){
    var index1 = areaID.substring(0, 2);
    var index2 = areaID.substring(0, 4);
    areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
  }
  $('.show').val(areaName);
  // return areaName;
}
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




         $(document).ready(function($){

             $(".btn1").click(function(event){
                 $(".hint").css({"display":"block"});
                 $(".box").css({"display":"block"});
             });

             $(".hint-in3").click(function(event) {
                 $(".hint").css({"display":"none"});
                 $(".box").css({"display":"none"});
             });

             $(".hint3").click(function(event) {
                 $(this).parent().parent().css({"display":"none"});
                 $(".box").css({"display":"none"});
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

         });
     </script>


 </head>
 <body>

<div class="box">
   <form action="/doaddress" method="post">
    {{csrf_field()}}
    <div class="hint">
        <div class="hint-in1">
            <div class="hint2">添加收货地址</div>
            <div class="hint3"></div>
        </div>

        <div class="pc-label"><label><i class="reds ">*</i>收货人:</label><input type="text" placeholder="请您填写收货人姓名" name="name"></div>
        <div id="sjld" style="margin-top:10px; padding-left:40px; position:relative;" class="clearfix">

            <div class="clearfix" style="padding-bottom:5px;"><i class="reds fl">*</i><p class="fl">所在地区:</p></div>

            <!-- <div id="province"></div> -->
            <div>
            <select id="seachprov" name="seachprov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');">
              
            </select>&nbsp;&nbsp;
            <select id="seachcity" name="homecity" onChange="changeCity(this.value,'seachdistrict','seachdistrict');">
              
            </select>&nbsp;&nbsp;
              <span id="seachdistrict_div">
                <select id="seachdistrict" name="seachdistrict"></select>
              </span>
            </div>
            <!-- <input type="button"  value="获取地区" onClick="showAreaID()"/> -->
            <!-- <input id="sfdq_num" type="hidden" value="" />
            <input id="csdq_num" type="hidden" value="" />
            <input id="sfdq_tj" type="hidden" value="" />
            <input id="csdq_tj" type="hidden" value="" />
            <input id="qydq_tj" type="hidden" value="" /> -->
        </div>

        <div class="pc-label"><label><i class="reds ">*</i>详细地址:</label><input type="text" style="width:400px; " placeholder="请您填写收货人详细地址" name="address"></div>
        <div class="pc-label"><label><i class="reds ">*</i>手机号码:</label><input type="text" style="width:400px;"placeholder="请您填写收货人手机号码" name="address_phone"></div>
        <div class="pc-label"><label>邮箱:</label><input type="text" style="width:400px;" placeholder="请您填写邮箱地址" name="address_email"></div>
        <input type="hidden" class="show" value="" name="address_location">
        <input type="submit" value="保存收货地址" class="hint-in3" onClick="showAreaID()">
    </div>
  </form>
  
</div>

<!--- header begin-->
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
                    </div>
                </li>
                <li class="headerul">|</li>
                <li><a href="#" class="M-iphone">手机悦商城</a> </li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">
        <div class="header-logo fl" style="width:212px;"><h1><a href="#"><img src="/theme/icon/logo.png"></a></h1></div>
        <div class="pc-order-titlei fl"><h2>填写订单</h2></div>
        <div class="pc-step-title fl">
            <ul>
                <li class="cur2"><a href="#">1 . 我的购物车</a></li>
                <li class="cur"><a href="#">2 . 填写核对订单</a></li>
                <li><a href="#">3 . 成功提交订单</a></li>
            </ul>
        </div>
    </div>

</header>
<!-- header End -->


<!-- 订单提交成功 begin-->
<form action="/homeorders" method="post">
            {{csrf_field()}}
<section>
    <div class="containers">
       <div class="pc-space">
           <div class="pc-order-title clearfix"><h3 class="fl">收货人信息</h3> <a href="#" class="fr pc-order-add btn1">新增收货地址</a> </div>
           <div class="pc-border">
               <div class="pc-order-text clearfix">
                    @foreach($info as $v)
                   <ul class=" clearfix">
                       <li class="clearfix fl">
                          <div class="fl pc-address">
                            @if($v->address_statue == 1)
                            <input type="radio"value="{{$v->address_id}} "name="address_id" checked>
                            @else
                            <input type="radio"value="{{$v->address_id}} "name="address_id">
                            @endif
                            <span>{{$v->name}}</span> 
                            <span>{{$v->address_location}}</span>
                            <span>{{$v->address}}</span>
                            <span>{{$v->address_phone}}</span>
                          </div>
                       </li>
                       <li class="fr">
                           <div class="pc-click">
                            @if($v->address_statue == 1)
                            <p>默认地址</p> 
                            @endif
                          </div>
                       </li>
                   </ul>
                    @endforeach
               </div>
           </div>
       </div>
       <div class="pc-space">
            <div class="pc-order-title clearfix"><h3 class="fl">支付方式</h3></div>
            <div class="pc-border">
                <div class="pc-order-text clearfix">
                    <ul class=" clearfix">
                        <li class="clearfix fl">
                            <div class="fl pc-frame pc-frams"> <a href="#"> 在线支付</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       <div class="pc-space clearfix">
           <div class="fl ">
               <div class="pc-order-title clearfix"><h3 class="fl">收货人信息</h3></div>
               <div class="fr pc-border">
                   <div class="pc-order-text pc-order-l clearfix">
                       <ul id="H-table" class="clearfix H-table"  >
                           <li class="cur">
                               <a href="javascript:void(0);">百事汇通</a>
                           </li>
                           <li>
                               <a href="javascript:void(0);">顺风快递</a>
                           </li>
                           <li>
                              <a href="javascript:void(0);">中通快递</a>
                           </li>
                       </ul>
                       <div class="" style="height:211px"></div>
                       <div class="pc-line"></div>
                       <div class="pc-freight"><p>运费：  8.00元</p></div>
                   </div>
               </div>
           </div>
           <div class="fr ">
               <div class="pc-order-title clearfix"><h3 class="fl">商品信息</h3></div>
               <div class="pc-border">
                   <div class="pc-order-text clearfix">
                       <div class="pc-wares-t"><h4></h4></div>
                            @foreach($data as $val)

                       <div class="clearfix pc-wares-p">

                           <div class="fl pc-wares">
                            <a href="#"><img style ="width:82px;height:82px;"src="{{$val['goodsinfo']->goods_pic}}"></a>
                          </div>
                           <div class="fl pc-wares-w">
                            <a href="#">{{$val['goodsinfo']->goods_name}}</a> 
                            <p class="clearfix">
                              <span class="fl">描述：{{$val['goodsinfo']->goods_describe}}</span>
                            </p>
                          </div>
                          <?php  $money=$val['goodsinfo']->goods_price*$val['num'];?>
                           <div class="fl pc-wares-s"><span class="reds">价格:{{$money}}<b></b></span>
                         
                          <span>数量:<b>{{$val['num']}}</b></span></div>

                       </div>
                            @endforeach

                       <div class="pc-written">订单留言:<input type="text" name="order_messeges" style="width:500px;"></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="pc-space">
            <div class="pc-order-title clearfix"><h3 class="fl">发票信息</h3></div>
            <div class="pc-border">
                <div class="pc-order-text clearfix">
                    <ul class=" clearfix">
                        <li class="clearfix fl">
                            <div class="fl pc-address pc-wares-l"><span>普通发票（纸质）</span> <span> 个人</span> <span>明细</span><span><a href="#">修改</a> </span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       <div class="pc-space-n"></div>
       <div class="clearfix">
           <div class="fr pc-space-j">
               <spna>应付总额：<strong>￥{{session('sum')}}</strong></spna>
               <button class="pc-submit">提交订单</button>
           </div>
       </div>
       </form>
    </div>
</section>
<!-- 订单提交成功 End-->


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

<script type="text/javascript" src="/theme/js/address.js"></script>
<script type="text/javascript">
    $(function(){

        $("#sjld").sjld("#shenfen","#chengshi","#quyu");

    });
</script>

</body>
</html>