@extends("Home.public")
@section('main')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link href="/theme/css/common.css" rel="stylesheet" tyle="text/css" /> 
  <link href="/theme/css/style.css" rel="stylesheet" type="text/css" /> 
  <link href="/theme/css/iconfont.css" rel="stylesheet" type="text/css" /> 
  <script src="/theme/js/jquery.min.1.8.2.js" type="text/javascript"></script>
  <script src="/theme/js/payfor.js" type="text/javascript"></script> 
  <script src="/theme/js/lrtk.js" type="text/javascript"></script> 
  <script src="/theme/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
  <script src="/theme/js/common_js.js" type="text/javascript"></script> 
  <script src="/theme/js/footer.js" type="text/javascript"></script> 
  <script src="/theme/js/jquery.jumpto.js" type="text/javascript"></script> 
  <title>购物车</title> 
 </head> 
 <body> 
  <div id="header_top"> 
   <!--样式--> 
   <!--顶部样式2--> 
   <div id="header " class="header page_style"> 
    <div class="logo"> 
     <a href="#"><img src="/theme/img/car/logo.png" /></a> 
    </div> 
    <!--可修改图层--> 
    <div class="festival"> 
     <a href="#"><img src="/theme/img/car/logo_yd.png" /></a> 
    </div> 
    <!--结束图层--> 
    <div class="Search"> 
     <p><input name="" type="text" class="text" /><input name="" type="submit" value="搜 索" class="Search_btn" /></p> 
     <p class="Words"><a href="#">苹果</a><a href="#">香蕉</a><a href="#">菠萝</a><a href="#">西红柿</a><a href="#">橙子</a><a href="#">苹果</a></p> 
    </div> 
    <!--可修改图层2--> 
    
   <!--菜单导航样式--> 
  </div> 
  <!--购物车样式图层--> 
  <div class="Inside_pages">
  @if($shop) 
   <div class="shop_carts"> 
    <div class="Process"></div> 
    <div class="Shopping_list"> 
     <div class="title_name"> 
      <ul> 
       <li class="checkbox"></li> 
       <li class="name">商品名称</li> 
       <li class="scj">价格</li> 
       <li class="sl">购买数量</li> 
       <li class="xj" >小计</li> 
       <li class="cz" style="padding-left:170px;">操作</li> 
      </ul> 
     </div> 
     <div class="shopping"> 
      <form method="post" action=""> 
       <table class="table_list"> 
        <tbody>
        <?php $tot=0; ?> 
        @foreach($shop as $car)
         <tr class="tr"> 
          <td class="checkbox"><input name="checkitems" type="checkbox" value="{{$car['id']}}" id="check{{$car['id']}}"/></td> 
          <td class="name"> 
           <div class="img"> 
            <a href="/homepage/{{$car['goodsinfo']->goods_id}}"><img src="/{{$car['goodsinfo']->goods_pic}}" /></a> 
           </div> 
           <div class="p_name"> 
            <a href="#">{{$car['goodsinfo']->goods_name}}</a> 
           </div> </td> 
          <td class="scj sp" style="padding-left:60px;"><span id="Original_Price_1">￥{{$car['goodsinfo']->goods_price}}</span></td>
          <td class="sl" style="padding-left:60px;"> 
           <div class="Numbers"> 
            <a  href="javascript:void(0)" class="jian" ids="{{$car['goodsinfo']->goods_id}}" money="{{$car['goodsinfo']->goods_price}}">-</a> 
            <input type="text" name="qty_item_" value="{{$car['num']}}" id="qty_item_1" onkeyup="setAmount.modify('#qty_item_1')" class="number_text" /> 
            <a  href="javascript:void(0)" class="jia" ids="{{$car['goodsinfo']->goods_id}}" money="{{$car['goodsinfo']->goods_price}}">+</a> 
           </div> </td> 
           <?php
            $money=$car['goodsinfo']->goods_price*$car['num'];
            // $tot+= $money;
           ?>
          <td class="xj" style="padding-right:180px;">￥<span id="money{{$car['goodsinfo']->goods_id}}">{{$money}}</span></td> 
          <td class="cz"> <p><a href="javascript:;" onclick="deleline(this,{{$car['goodsinfo']->goods_id}})">删除</a></p><p> </p><p><a href="#">收藏该商品</a></p> </td> 
         </tr> 
         @endforeach
        </tbody> 
       </table> 
       <div class="sp_Operation clearfix"> 
        <div class="select-all"> 
         <div class="cart-checkbox"> 
          <input type="checkbox" id="CheckedAll" name="toggle-checkboxes" class="jdcheckbox" clstag="clickcart" />全选 
         </div> 
         <div class="operation"> 
          <a href="javascript:void(0);" id="send" class="delall">删除选中的商品</a> 
         </div> 
        </div> 
        <!--结算--> 
        <div class="toolbar_right"> 
         <ul class="Price_Info"> 
          <li class="p_Total"><label class="text">商品总价：</label>￥<span style="color:red;font-size:20px" id="heji">0.00</span></li> 
          <!-- <li class="Discount"><label class="text">以&nbsp;&nbsp;节&nbsp;&nbsp;省：</label><span class="price" id="Preferential_price"></span></li> 
          <li class="integral">本次购物可获得<b id="total_points"></b>积分</li>  -->
         </ul> 
         <div class="btn"> 
          <!-- 马上付款 -->
          <a class="cartsubmit" href="/homeorders"></a> 
          <!-- 继续购物 -->
          <a class="continueFind" href="/"></a> 
         </div> 
        </div> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div>
    @else
    <div class="empty" id="empty" style="">
        <p>您的购物车还是空的，您可以：</p>
        <a href="/homelogin" class="btn">立即登录</a><a href="/" class="btn">去逛逛</a>
    </div>
    <style>
      .empty {
        padding: 90px 0 0 495px;
        background: url(/theme/img/car/empty.png) 90px 46px no-repeat;
        height: 190px;
      }
      .empty a.btn {
        width: 116px;
        height: 38px;
        display: inline-block;
        background-color: #ff2832;
        color: #fff;
        text-align: center;
        line-height: 38px;
        font-size: 18px;
        margin: 30px 20px 0 0;
        border-radius: 2px;
      }
      .empty p {
        font-size: 14px;
        color: #8a8888;
      }
    </style>
    @endif

<script type="text/javascript">
  
  //单次删除
  function deleline(obj,id){

      $.post("/CarDel",{id:id,"_token":"{{csrf_token()}}"},function(data){
          // 判断是否成功

          if (data) {
              // 移除对应商品
              $(obj).parent().parent().parent().remove();
              window.location.reload();
          };
      });

  }
//购物车加操作
  $(".jia").click(function(){
    // 获取商品的ID
    id=$(this).attr('ids');
    obj=$(this);    
        // 发送ajax请求
        $.post("/CarAdd",{id:id,"_token":"{{csrf_token()}}"},function(data){

            if (data) {
                // js修改输入框的数量
                num=obj.prev().val();

                num=Number(num);

                obj.prev().val(++num);
                // 获取商品的价格

                price=Number(obj.attr("money"));

                // 让小计发生改变

                money=Number($("#money"+id).html());
                money=money+price;

                $("#money"+id).html(money);
                // 合计
                b=$("#check"+id);
                if(b.attr("checked")){
                tot=Number($("#heji").html());

                tot=tot+price;

                $("#heji").html(tot);
                }
            };
        });
  });

  $(".jian").click(function(){
  // 获取商品的ID
  id=$(this).attr('ids');
  obj=$(this);
  num=$(this).next().val();
  if (num<=1) {
    return "";              
  };
  num=Number(num);
  // 发送ajax请求
        $.post("/CarJian",{id:id,"_token":"{{csrf_token()}}"},function(data){

          if (data) {
              // js修改输入框的数量
              num=obj.next().val();

              num=Number(num);

              obj.next().val(--num);
              // 获取商品的价格

              price=Number(obj.attr("money"));

              // 让小计发生改变

              money=Number($("#money"+id).html());
              money=money-price;

              $("#money"+id).html(money);

              // 合计
              b=$("#check"+id);
              if(b.attr("checked")){
              tot=Number($("#heji").html());

              tot=tot-price;

              $("#heji").html(tot);
              }
   
            };
        });
});

</script>
<script type="text/javascript">
$(document).ready(function () {
   //全选
   $("#CheckedAll").click(function () {
     if (this.checked) {                 //如果当前点击的多选框被选中
       $('input[type=checkbox][name=checkitems]').attr("checked", true);
     } else {
       $('input[type=checkbox][name=checkitems]').attr("checked", false);
     }
   });
   $('input[type=checkbox][name=checkitems]').click(function () {
     var flag = true;
     $('input[type=checkbox][name=checkitems]').each(function () {
       if (!this.checked) {
         flag = false;
       }
     });

     if (flag) {
       $('#CheckedAll').attr('checked', true);
     } else {
       $('#CheckedAll').attr('checked', false);
     }
   });

   //批量删除
   $("#send").click(function () {
    a=[];
    if($("input[type='checkbox'][name='checkitems']:checked").attr("checked")){
     var str = "你是否要删除选中的商品：\r\n";
     //alert(str);
     $('input[type=checkbox][name=checkitems]:checked').each(function () {
       id = $(this).val();
       a.push(id);
     });

     //在进行发送ajax请求操作
     //Ajax操作
      $.get("/CarDelall",{a:a},function(data){
      if(data==1){
      //把选中数据所在tr从dom里移除 remove
      //遍历
      for(var i=0;i<a.length;i++){
      $("input[value='"+a[i]+"']").parents("tr").remove();
      window.location.reload();
      }
      }else{
      alert(data);
      }
      });
    }
      else{
         var str = "你未选中任何商品，请选择后在操作！"; 
         alert(str);
       } 
   });
})

//总计处理
$(document).ready(function(){
  //用户一进入购物车后让其所有复选框选中
  $('input[type=checkbox][name=checkitems]').attr("checked", true);
  $('#CheckedAll').attr("checked", true);
  tot=0;
  $('input[type=checkbox][name=checkitems]:checked').each(function () {
       id=$(this).val();
       total = Number($("#money"+id).html());
       tot +=total;  
     });
  $("#heji").html(tot);
  //当checkbox发生改变时触发重新去查询那个复选框被选中
  $(":checkbox").change(function(){
      tot=0;
      $('input[type=checkbox][name=checkitems]:checked').each(function () {
       id=$(this).val();
       total = Number($("#money"+id).html());
       tot +=total;  
     });
  $("#heji").html(tot);
  });
});
</script> 
  </div>    
 </body>
</html>
@endsection
@section("title",'购物车')
