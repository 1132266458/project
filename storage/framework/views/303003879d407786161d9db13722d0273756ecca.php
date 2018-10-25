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
  <title>分类列表</title> 
  <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico" /> 
  <link rel="stylesheet" type="text/css" href="/theme/css/base.css" /> 
  <link rel="stylesheet" type="text/css" href="/theme/css/home.css" /> 
  <link rel="stylesheet" type="text/css" href="/shops/static/h-ui/css/H-ui.min.css" />
  <link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/H-ui.admin.css" />
  <link rel="stylesheet" type="text/css" href="/shops/lib/Hui-iconfont/1.0.8/iconfont.css" />
  <link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/skin/default/skin.css" id="skin" />
  <link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/style.css" />
  <script type="text/javascript" src="/theme/js/jquery.js"></script>
  <script type="text/javascript" src="/shops/lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
 </head> 
 <body> 
  <!-- header begin--> 
  <header id="pc-header"> 
   <div class="BHeader"> 
    <div class="yNavIndex"> 
     <ul class="BHeaderl"> 
      <?php if(session()->has('user_name')): ?>
        <li><a href="/homeout" style="float:left;"><?php echo e(session('user_name')); ?></a> <a href="/homeout" style="float:left;">退出</a> </li>
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
      <li><a href="/">我的商城</a> </li> 
      <li class="headerul">|</li> 
      <li><a href="javascript:void(0)" class="M-iphone">手机悦商城</a> </li> 
     </ul> 
    </div> 
   </div> 

  </header> 
  <!-- header End --> 
  <div class="containers">
   <div class="pc-nav-item">
    <a href="javascript:void(0)" style="color:black;">全部分类</a> &gt; 
    <a href="javascript:void(0)" style="color:black;"><?php echo e($name); ?></a>
   </div>
  </div> 
  <div class="containers clearfix"> 
   <div class="fl"> 

  <div class="list">
    <ul class="yiji">
    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><a href="javascript:void(0)" class="inactive"><?php echo e($one->name); ?></a>
        <ul style="display: none">
          <?php $__currentLoopData = $one->zi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $two): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="javascript:void(0)" class="inactive active"><?php echo e($two->name); ?></a>
            <ul>
              <?php $__currentLoopData = $two->zi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $three): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="/types/<?php echo e($three->id); ?>"><?php echo e($three->name); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </ul>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <style type="text/css">
  *{margin: 0;padding: 0}
  body{font-size: 12px;font-family: "宋体","微软雅黑";}
  ul,li{list-style: none;}
  a:link,a:visited{text-decoration: none;}
  .list{width: 190px;border-bottom:solid 1px #316a91;}
  .list ul li{background-color:#467ca2; border:solid 1px #316a91; border-bottom:0;}
  .list ul li a{padding-left: 10px;color: #fff; font-size:12px; display: block; font-weight:bold; height:36px;line-height: 36px;position: relative;
  }
  .list ul li .inactive{ background:url(/theme/img/off.png) no-repeat  left;}
  .list ul li .inactives{background:url(/theme/img/on.png) no-repeat left;} 
  .list ul li ul{display: none;}
  .list ul li ul li { border-left:0; border-right:0; background-color:#6196bb; border-color:#467ca2;}
  .list ul li ul li ul{display: none;}
  .list ul li ul li a{ padding-left:20px;}
  .list ul li ul li ul li { background-color:#d6e6f1; border-color:#6196bb; }
  .last{ background-color:#d6e6f1; border-color:#6196bb; }
  .list ul li ul li ul li a{ color:#316a91; padding-left:30px;}
  </style>
   </div> 
   <div class="pc-info fr"> 
    <div class="pc-term"> 
     <div class="pc-line"></div> 
     <div class="pc-search clearfix"> 
      <div class="fl pc-search-in">
       <input type="text" class="pc-search-s" placeholder="￥" name="min" value="" id="min" /> 
       <input type="text" class="pc-search-s" placeholder="￥" name="max" value="" id="max" />
       <a href="javascript:;" class="pc-search-a" id="search">搜索</a> 
      </div>
     </div> 
    </div> 
    <div class="pc-term"> 
     <div class="clearfix pc-search-p"> 
      <div class="fl pc-search-e">
       <!-- <a href="javascript:;" class="cur" style="color:black;">销量</a> -->
       <a href="javascript:;" style="color:black;" id="desc"><i class="Hui-iconfont">&#xe679;</i>价格</a>
       <a href="javascript:;" style="color:black;" id="asc"><i class="Hui-iconfont">&#xe674;</i>价格</a>
      </div> 
     </div> 
    </div> 
    <div class="time-border-list pc-search-list clearfix"> 
      <ul class="clearfix" id="uid">
      <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($good->goods_status==0): ?>
      <li> <a href="/homepage/<?php echo e($good->goods_id); ?>"> <img src="/<?php echo e($good->goods_pic); ?>" width="240px" height="280px" /></a> <p class="head-name"><a href="/homepage/<?php echo e($good->goods_id); ?>" style="font-size:12px;color:black;"><?php echo e($good->goods_describe); ?></a> </p> <p><span class="price">￥<?php echo e($good->goods_price); ?></span></p> <p class="head-futi clearfix"><span class="fl">好评度：90% </span> <span class="fr">100人购买</span></p> <p class="clearfix"><span class="label-default fl" style="cursor:pointer;" onclick="buy(this,<?php echo e($good->goods_id); ?>)">抢购</span> <a href="javascript:;" class="fr pc-search-c" onclick="foverite(<?php echo e($good->goods_id); ?>)" style="color:black;">收藏</a> </p> </li> 
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </ul> 
     <div class="clearfix"> 
      <div class="fr pc-search-g"> 
       <a class="fl pc-search-f" href="javascript:void(0)" onclick="getData(false)" style="color:black;cursor:pointer;">上一页</a>
       <?php $__currentLoopData = $pp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
       <a href="javascript:void(0)" class="current" onclick="page(<?php echo e($v); ?>)" style="color:black" id="page<?php echo e($v); ?>"><?php echo e($v); ?></a> 
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <input type="hidden" id="pagesx" value="1">
       <input type="hidden" id="maxpage" value="<?php echo e($maxpage); ?>">
       <!-- <span class="pc-search-di">…</span>  -->
       <a title="使用方向键右键也可翻到下一页哦！" class="pc-search-n" href="javascript:;" onclick="getData(true)" style="color:black;">下一页</a> 
       <span class="pc-search-y"> <em> 共<?php echo e($maxpage); ?>页 </a> </span> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- footer begin--> 
  <div class="aui-footer-bot" style="color:black;"> 
   <div class="time-lists aui-footer-pd clearfix"> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d1.png" /></span> <em>消费者权益</em> </h4> 
     <ul> 
      <li><a href="javascript:void(0)">保障范围 </a> </li> 
      <li><a href="javascript:void(0)">退货退款流程</a> </li> 
      <li><a href="javascript:void(0)">服务中心 </a> </li> 
      <li><a href="javascript:void(0)">服务中心</a> </li> 
      <li><a href="javascript:void(0)"> 更多特色服务 </a> </li> 
     </ul> 
    </div> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d2.png" /></span> <em>新手上路</em> </h4> 
     <ul> 
      <li><a href="javascript:void(0)">退货退款流程</a> </li> 
      <li><a href="javascript:void(0)">服务中心 </a> </li> 
      <li><a href="javascript:void(0)">服务中心</a> </li> 
      <li><a href="javascript:void(0)"> 更多特色服务 </a> </li> 
     </ul> 
    </div> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d3.png" /></span> <em>保障正品</em> </h4> 
     <ul> 
      <li><a href="javascript:void(0)">退货退款流程</a> </li> 
      <li><a href="javascript:void(0)">服务中心 </a> </li> 
      <li><a href="javascript:void(0)">服务中心</a> </li> 
      <li><a href="javascript:void(0)"> 更多特色服务 </a> </li> 
     </ul> 
    </div> 
    <div class="aui-footer-list clearfix"> 
     <h4> <span><img src="/theme/icon/icon-d1.png" /></span> <em>消费者权益</em> </h4> 
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
  <script type="text/javascript" src="/theme/js/jquery.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.inactive').click(function(){
      if($(this).siblings('ul').css('display')=='none'){
        $(this).parent('li').siblings('li').removeClass('inactives');
        $(this).addClass('inactives');
        $(this).siblings('ul').slideDown(100).children('li');
        if($(this).parents('li').siblings('li').children('ul').css('display')=='block'){
          $(this).parents('li').siblings('li').children('ul').parent('li').children('a').removeClass('inactives');
          $(this).parents('li').siblings('li').children('ul').slideUp(100);

        }
      }else{
        //控制自身变成+号
        $(this).removeClass('inactives');
        //控制自身菜单下子菜单隐藏
        $(this).siblings('ul').slideUp(100);
        //控制自身子菜单变成+号
        $(this).siblings('ul').children('li').children('ul').parent('li').children('a').addClass('inactives');
        //控制自身菜单下子菜单隐藏
        $(this).siblings('ul').children('li').children('ul').slideUp(100);

        //控制同级菜单只保持一个是展开的（-号显示）
        $(this).siblings('ul').children('li').children('a').removeClass('inactives');
      }
    })
  });
  </script>
  <!-- 无刷新分页 -->
<script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/shops/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  function page(page){
  $("#pagesx").val(page);
  $.get("/types/<?php echo e($cate_id); ?>",{page:page,pageajax:1},function(data){
  //alert(data);
  //赋值给id值为 uid的div
  $("#uid").html(data);
  });
} 
//处理上下页
function getData(mask){
  if(mask){
    //获取当前页码数
    page=$("#pagesx").val();
    maxpage=$("#maxpage").val();
    //当前页码减一
    page++;
    //判断范围
    if(page>maxpage){
      page=maxpage;
    }
    $("#pagesx").val(page);
  $.get("/types/<?php echo e($cate_id); ?>",{page:page,pageajax:1},function(data){
  //alert(data);
  //赋值给id值为 uid的div
  $("#uid").html(data);
  });
  }else{
    //获取当前页码数
    page=$("#pagesx").val();
   //当前页码减一
    page--;
    //判断范围
    if(page<1){
      page=1;
    }
    $("#pagesx").val(page);
    $.get("/types/<?php echo e($cate_id); ?>",{page:page,pageajax:1},function(data){
    //赋值给id值为 uid的div
    $("#uid").html(data);
    });
 }
}

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

 // 抢购跳转到商品购买
 function buy(obj,id){
  window.location.href="/homepage/"+id;
 }

 //分类的价格搜索
$("#search").click(function(){
  min=$("#min").val();
  max=$("#max").val();
  if(min==""){
    alert("请输入价格下限");
    return false;
  }
  if(max==""){
    alert("请输入价格上限");
    return false;
  }
  //发送ajax将价格的最大值与最小值传递过去
  $.get("/types/<?php echo e($cate_id); ?>",{min:min,max:max,sajax:1},function(data){
   // alert(data);
    //赋值给id值为 uid的div
    $("#uid").html(data);
      $("#min").val('');
      $("#max").val('');
    });
});

//价格按照升序排序
$("#desc").click(function(){
  $.get("/types/<?php echo e($cate_id); ?>",{descajax:1},function(data){
      $("#uid").html(data);
    });
});

//价格按照降序排序
$("#asc").click(function(){
  $.get("/types/<?php echo e($cate_id); ?>",{ascajax:1},function(data){
      $("#uid").html(data);
    });
});
</script>
</html>
