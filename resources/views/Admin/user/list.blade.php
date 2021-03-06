﻿<!DOCTYPE HTML>
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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th>密码</th>
				<th>手机号</th>

				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($data as $v)
			<tr class="text-c">
				
				<td>{{$v->user_id}}</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('{{$v->user_name}}','/admin/adminusers/{{$v->user_id}}','360','400')">{{$v->user_name}}</u></td>
				<td>{{$v->user_pwd}}</td>
				<td>{{$v->user_phone}}</td>
				
				<td>{{$v->user_addtime}}</td>
				<td class="td-status">
				@if($v->user_state==0)
				<span class="label label-success radius">已启用</span>
				@else
				<span class="label label-defaunt radius">已停用</span>
				@endif
				</td>
				<td class="td-manage">
				@if($v->user_state==0)
				<a style="text-decoration:none" onClick="member_stop(this,'{{$v->user_id}}')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631; </i></a> 
				@else
				<a style="text-decoration:none" onClick="member_start(this,'{{$v->user_id}}')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1; </i></a>
				@endif

				 <a title="编辑" href="javascript:;" onclick="admin_address('收货地址','/admin/address/{{$v->user_id}}','850','550')" class="btn btn-primary radius size-S" style="text-decoration:none">收货地址</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/shops/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/shops/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/shops/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/shops/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/shops/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/shops/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


/*用户信息-查看*/
function member_show(title,url,w,h){
	layer_show(title,url,w,h);
}

/*用户收货地址-查看*/
function admin_address(title,url,w,h){
	layer_show(title,url,w,h);
}

/*用户-停用*/
function member_stop(obj,id){
	// alert(id);
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/admin/userstop/'+id,
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				layer.msg('权限不足,停用失败!',{icon: 5,time:1000});
			},
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/admin/userstart/'+id,
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				layer.msg('权限不足,启用失败!',{icon: 6,time:1000});
			},
		});
	});
}


</script> 
</body>
</html>
