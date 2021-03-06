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
<title>修改管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	 <!-- method="post" action="/admin/adminlist/{{$data->admin_id}}" -->
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员账号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data->admin_name}}" placeholder="" id="adminName" name="admin_name">
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="admin_password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="admin_password2">
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="admin_level" size="1">
				@foreach($a as $v)
				<option value="{{$v->admin_level}}" {{$data->admin_level==$v->admin_level?'selected':''}}>{{$v->level_name}}</option>
				@endforeach
				<!-- <option value="0" {{$data->admin_level==0?'selected':''}}>超级管理员</option>
				<option value="1" {{$data->admin_level==1?'selected':''}}>浏览员</option>
				<option value="2" {{$data->admin_level==2?'selected':''}}>打杂</option> -->
			</select>
			</span> </div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">状态：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="admin_statue" size="1">
				<option value="0" {{$data->admin_statue==0?'selected':''}}>开启</option>
				<option value="1" {{$data->admin_statue==1?'selected':''}}>禁用</option>
			</select>
			</span> </div>
	</div>

	{{csrf_field()}}
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
			admin_name:{
				required:true,
				rangelength:[5,10]
			},
			
			admin_password:{
				required:true,
				rangelength:[6,14]
			},
			admin_password2:{
				required:true,
				equalTo: "#password",
				rangelength:[6,14]
			},
			
			admin_phone:{
				required:true,
				isPhone:true,
			},

		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){

			str=$('#form-admin-add').serialize();
			// alert(str);
			$.post('/admin/adminlist/{{$data->admin_id}}',{str:str},function(data){
				if(data==1){
					layer.msg('修改成功!',{icon:1,time:1000},function(){
						var index = parent.layer.getFrameIndex(window.name);
						// // parent.$('.btn-refresh').click();
						window.parent.location.reload();
						parent.layer.close(index);
					});
				}else{

					layer.msg('修改失败!',{icon:1,time:1000});
				}
			});
		}
	});
});


</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
