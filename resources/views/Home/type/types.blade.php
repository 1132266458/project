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
  <title>歪秀购物</title> 
  <link rel="shortcut icon" type="image/x-icon" href="/theme/icon/favicon.ico" /> 
  <link rel="stylesheet" type="text/css" href="/theme/css/base.css" /> 
  <link rel="stylesheet" type="text/css" href="/theme/css/home.css" /> 
  <script type="text/javascript" src="/theme/js/jquery.js"></script>
 </head> 
 <body> 
  <!-- header begin--> 
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
      <li><a href="#">订单查询</a> </li> 
      <li class="headerul">|</li> 
      <li><a href="#">我的收藏</a> </li> 
      <li class="headerul">|</li> 
      <li><a href="/">我的商城</a> </li> 
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
   <div class="pc-nav-item">
    <a href="#" style="color:black;">全部分类</a> &gt; 
    <a href="#" style="color:black;">{{$name}}</a>
   </div>
  </div> 
  <div class="containers clearfix"> 
   <div class="fl"> 
   <!--  <div id="firstpane" class="menu_list"> 
     <h2>所有类目</h2> 
     <h3 class="menu_head current">进口食品</h3> 
     <div style="display:block" class="menu_body"> 
      <a href="#">冲调饮品</a> 
      <a href="#">糖果/巧克力</a> 
     </div> 
    </div>  -->

  <div class="list">
    <ul class="yiji">
    @foreach($type as $one)
      <li><a href="javascript:void(0)" class="inactive">{{$one->name}}</a>
        <ul style="display: none">
          @foreach($one->zi as $two)
          <li><a href="javascript:void(0)" class="inactive active">{{$two->name}}</a>
            <ul>
              @foreach($two->zi as $three)
              <li><a href="/types/{{$three->id}}">{{$three->name}}</a></li>
              @endforeach
            </ul>
          </li>
          @endforeach 
        </ul>
      </li>
      @endforeach
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
     <dl class="pc-term-dl clearfix"> 
      <dt>
       品牌：
      </dt> 
      <dd>
       <a href="#">三星（SAMSUNG）</a>
      </dd> 
      <dd>
       <a href="#">华为（HUAWEI）</a>
      </dd> 
      <dd>
       <a href="#">联想（lenovo）</a>
      </dd> 
      <dd>
       <a href="#">索尼（SONY）</a>
      </dd> 
      <dd>
       <a href="#">飞利浦（Philips）</a>
      </dd> 
      <dd>
       <a href="#">Apple</a>
      </dd> 
      <dd>
       <a href="#">小米（MI）</a>
      </dd> 
      <dd>
       <a href="#">HTC</a>
      </dd> 
      <dd>
       <a href="#">酷派（Coolpad）</a>
      </dd> 
      <dd>
       <a href="#">诺基亚（NOKIA）</a>
      </dd> 
      <dd>
       <a href="#">中兴（ZTE）</a>
      </dd> 
     </dl> 
     <dl class="pc-term-dl clearfix"> 
      <dt>
       尺寸：
      </dt> 
      <dd>
       <a href="#">4.5英寸</a>
      </dd> 
      <dd>
       <a href="#">4.7英寸</a>
      </dd> 
      <dd>
       <a href="#">5.0英寸</a>
      </dd> 
      <dd>
       <a href="#">5.5英寸</a>
      </dd> 
      <dd>
       <a href="#">5.3英寸</a>
      </dd> 
      <dd>
       <a href="#">7.0英寸</a>
      </dd> 
      <dd>
       <a href="#">6.0英寸</a>
      </dd> 
      <dd>
       <a href="#">3.5英寸</a>
      </dd> 
     </dl> 
     <dl class="pc-term-dl clearfix"> 
      <dt>
       系统：
      </dt> 
      <dd>
       <a href="#">iOS</a>
      </dd> 
      <dd>
       <a href="#">Android/安卓</a>
      </dd> 
      <dd>
       <a href="#">Windows Phone</a>
      </dd> 
      <dd>
       <a href="#">无操作系统</a>
      </dd> 
      <dd>
       <a href="#">YunOS</a>
      </dd> 
      <dd>
       <a href="#">FLyme</a>
      </dd> 
      <dd>
       <a href="#">MIUI</a>
      </dd> 
      <dd>
       <a href="#">MTK</a>
      </dd> 
      <dd>
       <a href="#">iOS</a>
      </dd> 
     </dl> 
     <div> 
      <a href="#">更多</a> 
     </div> 
     <div class="pc-line"></div> 
     <div class="pc-search clearfix"> 
      <div class="fl pc-search-in"> 
       <input type="text" class="pc-search-w" /> 
       <input type="text" class="pc-search-s" placeholder="￥" /> 
       <input type="text" class="pc-search-s" placeholder="￥" /> 
       <a href="#" class="pc-search-a">搜索</a> 
      </div> 
      <!-- <div class="fr pc-with">
        相关搜索： 
       <a href="#">黑糖</a>
       <em>|</em>
       <a href="#">姜茶</a>
       <em>|</em>
       <a href="#">红印黑糖</a>
       <em>|</em>
       <a href="#">黑糖话梅</a>
       <em>|</em>
       <a href="#">黑糖姜母</a>
       <em>|</em>
       <a href="#">茶黑糖饼</a>
       <em>|</em>
       <a href="#">干黑糖</a>
       <em>|</em>
       <a href="#">沙琪玛</a> 
      </div>  -->
     </div> 
    </div> 
    <div class="pc-term"> 
     <div class="clearfix pc-search-p"> 
      <div class="fl pc-search-e">
       <a href="#" class="cur" style="color:black;">销量</a>
       <a href="#" style="color:black;">价格</a>
       <a href="#" style="color:black;">评价</a>
       <a href="#" style="color:black;">上架时间</a>
      </div> 
      <!-- <div class="fr pc-search-v"> 
       <ul> 
        <li><input type="checkbox" /><a href="#">有货</a> </li> 
        <li><input type="checkbox" /><a href="#">限时抢购</a> </li> 
        <li><input type="checkbox" /><a href="#">满减大促</a> </li> 
       </ul> 
      </div> --> 
     </div> 
     
    </div> 
    <div class="time-border-list pc-search-list clearfix"> 
      <ul class="clearfix" id="uid">
      @foreach($goods as $good)
      <li> <a href="/homepage/{{$good->goods_id}}"> <img src="/{{$good->goods_pic}}" width="240px" height="280px" /></a> <p class="head-name"><a href="#" style="font-size:12px;color:black;">{{$good->goods_describe}}</a> </p> <p><span class="price">￥{{$good->goods_price}}</span></p> <p class="head-futi clearfix"><span class="fl">好评度：90% </span> <span class="fr">100人购买</span></p> <p class="clearfix"><span class="label-default fl">抢购</span> <a href="#" class="fr pc-search-c" style="color:black;">收藏</a> </p> </li> 
      @endforeach
     </ul> 
     <div class="clearfix"> 
      <div class="fr pc-search-g"> 
       <a class="fl pc-search-f" href="javascript:void(0)" onclick="getData(false)" style="color:black;cursor:pointer;">上一页</a>
       @foreach($pp as $v) 
       <a href="javascript:void(0)" class="current" onclick="page({{$v}})" style="color:black" id="page{{$v}}">{{$v}}</a> 
       @endforeach
       <input type="hidden" id="pagesx" value="1">
       <input type="hidden" id="maxpage" value="{{$maxpage}}">
       <!-- <span class="pc-search-di">…</span>  -->
       <a title="使用方向键右键也可翻到下一页哦！" class="pc-search-n" href="javascript:;" onclick="getData(true)" style="color:black;">下一页</a> 
       <span class="pc-search-y"> <em> 共20页 到第</em> <input type="text" class="pc-search-j" placeholder="1" /> <em>页</em> <a href="#" class="confirm" style="color:black;">确定</a> </span> 
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
<script type="text/javascript">
  function page(page){
  $("#pagesx").val(page);
  $.get("/types/{{$cate_id}}",{page:page},function(data){
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
  $.get("/types/{{$cate_id}}",{page:page},function(data){
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
    $.get("/types/{{$cate_id}}",{page:page},function(data){
    //赋值给id值为 uid的div
    $("#uid").html(data);
    });
 }
}
</script>
</html>
