<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if lt IE 9]>
<script type="text/javascript" src="/shops/lib/html5shiv.js"></script>
<script type="text/javascript" src="/shops/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/shops/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/shops/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add"  enctype="multipart/form-data">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  placeholder="" id="admininfo_name" name="admininfo_name">
		</div>
	</div>

	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="admininfo_sex" size="1">
				<option value="0">女</option>
				<option value="1">男</option>
				<option value="2" selected>保密</option>
			</select>
			</span> </div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>QQ：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  placeholder="" id="admininfo_qq" name="admininfo_qq">
		</div>
	</div>


	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  placeholder="" id="admininfo_phone" name="admininfo_phone">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮件：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  placeholder="" id="admininfo_email" name="admininfo_email">
		</div>
	</div>
	{{csrf_field()}}
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius"   type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>

	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/shops/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/shops/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/shops/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/shops/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/shops/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/shops/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			admininfo_name:{
				required:true,
				minlength:4,
				maxlength:16
			},
	
			admininfo_qq:{
				required:true,
			},
			admininfo_phone:{
				required:true,
				number:true,
				digits:true,
				max:11,
				min:11

			},

			admininfo_email:{
				required:true,
				email:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			
			str=$('#form-admin-add').serialize();
			
			$.get('/admin/adminlist/{{$id}}',{str:str},function(data){
				// alert(data);
				if(data==1){

					layer.msg('添加成功!',{icon:1,time:1000},function(){
						var index = parent.layer.getFrameIndex(window.name);
						// // parent.$('.btn-refresh').click();
						window.parent.location.reload();
						parent.layer.close(index);
					});
				}else{

					layer.msg('添加失败!',{icon:1,time:1000});
				}
			});
		}

	});
});



</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
