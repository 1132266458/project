<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!-- post方式提交需要csrf保护 -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/shops/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加轮播图 - 轮播图管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="/admin/adminslider" method="post" class="form form-horizontal" id="form-admin-add" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="slider_title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>超链接：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="phone" name="slider_href">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>轮播图片：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="file" class="input-text" value="" placeholder="" id="phone" name="slider_img">
		</div>
	</div>
	<?php if(session('error')): ?>
	<div class="row cl">
	  <label class="form-label col-xs-3" style="color:red;">&nbsp;<?php echo e(session('error')); ?></label>
	</div>
	<?php endif; ?>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="//shops/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="//shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="//shops/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="//shops/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="//shops/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="//shops/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="//shops/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script> 
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} }
);
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		//submitHandler:function(form){
			// $(form).ajaxSubmit({
			// 	type: 'post',
			// 	url: "xxxxxxx" ,
			// 	success: function(data){
			// 		layer.msg('添加成功!',{icon:1,time:1000});
			// 	},
            //     error: function(XmlHttpRequest, textStatus, errorThrown){
			// 		layer.msg('error!',{icon:1,time:1000});
			// 	}
			// });
			// var index = parent.layer.getFrameIndex(window.name);
			// parent.$('.btn-refresh').click();
			// parent.layer.close(index);
		//}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
