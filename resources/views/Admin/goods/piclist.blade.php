<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/shops/css/shop.css" type="text/css" rel="stylesheet" />
<link href="/shops/css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="/shops/css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="/shops/font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<link  href="/shops/css/colorbox.css" rel="stylesheet" type="text/css" />
<script src="/shops/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="/shops/js/Sellerber.js" type="text/javascript"></script>
<script src="/shops/js/layer/layer.js" type="text/javascript"></script>
<script src="/shops/js/laydate/laydate.js" type="text/javascript"></script>
<script language='javascript' src='/shops/js/jquery.nicescroll.js'></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if lt IE 9]>
<script src="shops/js/html5shiv.js" type="text/javascript"></script>
<script src="shops/js/respond.min.js"></script>
<script src="shops/js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>详细</title>
</head>

<body>
<div class="margin clearfix">
 <div class="operation clearfix">
<a href="javascript:ovid()" onclick="close1()" class="btn btn-info button_btn"><i class="fa fa-reply"></i> 返回上一步</a>
<span class="r_f line30">共：{{$num}}条</span>
</div>
<div class="adverts_list">
@foreach($data as $v)
 <div class="col-xs-4 col-sm-3 col-md-6 col-lg-6" id="tr">
  <div class="adverts_content">
   <div class="ad_img"><img src="/{{$v->goods_pic}}"  width="100%"/></div>
   <div class="ad_info clearfix">
   <p>商品颜色：{{$v->goods_color}}</p>
   <p class="clearfix">
   <span class="col-xs-6">图片状态：@if($v->pic_status==0)
           显示
          @else
           隐藏
          @endif</span>
   </p>
   <ul class="operating">
   
    <li class="col-xs-3 "><a href="javascript:void()" onClick="picture_del(this,'{{$v->id}}')" class="btn">删除</a></li>
    <li class="col-xs-3 "><a href="javascript:void()" class="btn">修改</a></li>
     <li class="col-xs-3 ">
     @if($v->pic_status==0)
     <a href="javascript:void()" onclick="status(this,{{$v->id}},1)" class="btn">隐藏</a>
      @else
    <a href="javascript:void()" onclick="status(this,{{$v->id}},0)" class="btn">显示</a>
      @endif
     </li>
    </ul>
   </div>
  </div>
 </div>
@endforeach
</div>
</div>
</body>
</html>
<script>
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$("body").niceScroll({  
	cursorcolor:"#888888",  
	cursoropacitymax:1,  
	touchbehavior:false,  
	cursorwidth:"5px",  
	cursorborder:"0",  
	cursorborderradius:"5px"  
});

function close1(){
  var index = parent.layer.getFrameIndex(window.name);

  parent.layer.close(index);
}
// 商品图片启用与隐藏
function status(obj,id,sta){
  a=$(obj).parent();

  if(sta==1){
    b='隐藏';
  }else{
    b='显示';
  }
  layer.confirm('确认要'+b+'吗?',function(index){
    $.get('/admin/picstatus',{id:id,sta:sta},function(data){
      // console.log(data);
      if(data==1){
        layer.msg('已隐藏!',{icon:5,time:1000});
        
        obj.remove();
        a.prepend('<a href="javascript:void()" onclick="status(this,'+id+',0)" class="btn">显示</a>');
      }else if(data==0){
        layer.msg('已显示!',{icon:6,time:1000});
        obj.remove();
        a.prepend('<a href="javascript:void()" onclick="status(this,'+id+',1)" class="btn">隐藏</a>');
      }else if(data==2){
        layer.msg('权限不足,隐藏失败!',{icon:5,time:1000});
      }else{
        layer.msg('权限不足,显示失败!',{icon:5,time:1000});
      }
    });
  });  
}

/*商品图片-删除*/
function picture_del(obj,id){
  layer.confirm('确认要删除吗？',function(index){
    $.ajax({
      type: 'DELETE',
      url: '/admin/adminpics/'+id,
      dataType: 'json',
      success: function(data){
        // alert(data);
        $(obj).parents("#tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
      },
      error:function(data) {
        layer.msg('删除失败!',{icon:2,time:1000});
      },
    });   
  });
}
</script>
