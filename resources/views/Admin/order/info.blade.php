<!-- {{var_dump($address)}} -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/shops/css/shop.css" type="text/css" rel="stylesheet" />
<link href="/shops/css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="/shops/css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="/shops/font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="/shops/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="/shops/js/jquery.cookie.js"></script>
<script src="/shops/js/shopFrame.js" type="text/javascript"></script>
<script src="/shops/js/Sellerber.js" type="text/javascript"></script>
<script src="/shops/js/layer/layer.js" type="text/javascript"></script>
<script language='javascript' src='/shops/js/jquery.nicescroll.js'></script>
<!--[if lt IE 9]>
<script src="/shops/js/html5shiv.js" type="text/javascript"></script>
<script src="/shops/js/respond.min.js"></script>
<script src="/shops/js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>订单详细</title>
</head>

<body class="">
<div class="Interface_spacing clearfix">
  <div class="order_detailed">
    <div class="order_number">
    订单编号：<b>{{$order->order_sn}}</b>
    <span class="r_f">下单时间：{{date('Y-m-d h:m:s',$order->order_addtime)}}</span>
    </div>
    <div class="order_content clearfix">
     <div class="Buyers_info margin-bottom clearfix">
       <ul>
       <li><label class="title_name">收货人姓名：</label><span>{{$address->name}}</span></li>
       <li><label class="title_name">收人人电话：</label><span>{{$address->address_phone}}</span></li>
       <li><label class="title_name">地址邮编：</label><span>{{$address->address_code==0?'未知':$address->address_code}}</span></li>
       <li><label class="title_name">备&nbsp;&nbsp;&nbsp;&nbsp;注：</label><span>{{$order->order_messeges==null?'无备注':$order->order_messeges}}</span></li>
       <li class="address"><label class="title_name">收货地区：</label><span>{{$address->address_location}}</span></li>     
       <li class="address"><label class="title_name">详细地址：</label><span>{{$address->address}}</span></li>     
       </ul>
     </div>
     <table  class="table table_list table_striped  table-bordered">
      <thead>
       <tr>
        <th>产品名称</th>
        <th width="100">原价</th>
        <th width="100">现价</th>
        <th width="100">优惠</th>
        <th width="50">数量</th>
       </tr>
      </thead>
      <tbody>
      @foreach($go as $k=>$v)
      <!-- {{var_dump($v)}} -->
       <tr>
        <td class="product_name text-align">
        <a href="#" class="link_name">
        <div class="l_f img"><img src="/{{$v->goods_pic}}"  width="80px" height="80px"/></div>
        <div class="l_f content padding">
        <p>{{$v->goods_name}}</p>
        <p class="color">1.2kg/1件</p>
        </div>
        </a>
        </td>
        <td>{{$v->goods_price}}</td>
        <td>{{$v->goods_price}}</td>
        <td>0</td>
        <td>{{$v->num}}</td>
       </tr>
      @endforeach
      </tbody>
     </table>
     <div class="order_info Buyers_info margin-sx clearfix">
      <ul>
       <li><label class="title_name">支付方式：</label><span>支付宝</span></li>
       <li><label class="title_name">支付状态：</label><span>@if($order->order_state==1) 待付款 @else 已付款 @endif</span></li>
       <li><label class="title_name">发货日期：</label><span>2016-08-25</span></li>
       <li><label class="title_name">发货快递：</label><span>圆通</span></li>   
       </ul>
     </div>
     <div class="Price clearfix">
     <a href="javascrpit:void()" class="btn button_btn bg-deep-blue margin-top" onclick="logistics_info()">物流信息</a>
     <div class="right_Price">
      <p><span class="Price_name">总价：</span><b class="font_size_das color_mu">￥{{$order->order_amount}}</b></p>
      </div>
     </div>
    </div>
  </div>
</div>
<div class="logistics_info" id="logistics_info" style="display:none">
  <div class="track-rcol">
            <div class="track-list">
                <ul>
                    <li class="first">
                        <i class="node-icon"></i>
                        <span class="time">2016-03-10 18:07:15</span>
                        <span class="txt">感谢您在京东购物，欢迎您再次光临！</span>
                    </li>
                    <li>
                        <i class="node-icon"></i>
                        <span class="time">2016-03-10 18:07:15</span>
                        <span class="txt">【京东到家】京东配送员【申国龙】已出发，联系电话【18410106883，感谢您的耐心等待，参加评价还能赢取京豆呦】</span>
                    </li>
                    <li>
                        <i class="node-icon"></i>
                        <span class="time">2016-03-10 18:07:15</span>
                        <span class="txt">感谢您在京东购物，欢迎您再次光临！</span>
                    </li>
                    <li>
                        <i class="node-icon"></i>
                        <span class="time">2016-03-10 18:07:15</span>
                        <span class="txt">感谢您在京东购物，欢迎您再次光临！</span>
                    </li>
                    <li>
                        <i class="node-icon"></i>
                        <span class="time">2016-03-10 18:07:15</span>
                        <span class="txt">感谢您在京东购物，欢迎您再次光临！</span>
                    </li>
                    <li>
                        <i class="node-icon"></i>
                        <span class="time">2016-03-10 18:07:15</span>
                        <span class="txt">感谢您在京东购物，欢迎您再次光临！</span>
                    </li>
                </ul>
            </div>
        </div>
</div>
</body>
</html>
<script>
/***********图片查看**********/
function logistics_info(){
     layer.open({
        type: 1,
        title: '物流信息',
        maxmin: true, 
        shadeClose:false, //点击遮罩关闭层
        area : ['600px' , '400px'],
        content:$('#logistics_info'),
     });
    }
/*******滚动条*******/
$("body").niceScroll({  
    cursorcolor:"#888888",  
    cursoropacitymax:1,  
    touchbehavior:false,  
    cursorwidth:"5px",  
    cursorborder:"0",  
    cursorborderradius:"5px"  
});
</script>
