<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/shops/lib/html5shiv.js"></script>
<script type="text/javascript" src="/shops/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui/css/my.css" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/shops/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/shops/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/shops/css/my.css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if IE 6]>
<script type="text/javascript" src="/shops/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	分类管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="text-c">
		<form action="/admin/admincates" method="get">
			<input type="text" name="keywords" id="" placeholder="分类名称" style="width:250px" class="input-text" value="{{$request['keywords'] or ''}}">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</form>
		
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" onclick="system_category_add('添加资讯','/admin/admincates/create',700,500)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a>
		</span>
		<span class="r">共有数据：<strong id="tot">{{$tot}}</strong> 条</span>
	</div>
	<div class="mt-20">
		<div id="uid">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="150">分类名称</th>
					<th>pid</th>
					<th>path</th>
					<th>level</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($data as $v)
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>{{$v->id}}</td>
					<td class="text-l">{{$v->name}}</td>
					<td>{{$v->pid}}</td>
					<td>{{$v->path}}</td>
					<td>{{$v->level}}</td>

					
					<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('分类编辑','/admin/admincates/{{$v->id}}/edit','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="system_category_del(this,'{{$v->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		</div>
		<div class="dataTables_paginate paging_full_numbers" id="pages">
		@foreach($pp as $v) 
		<a href="javascript:void(0)" onclick="page({{$v}})"  id="page{{$v}}">{{$v}}</a>
		@endforeach
		</div>
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
// $('.table-sort').dataTable({
// 	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
// 	"bStateSave": true,//状态保存
// 	"aoColumnDefs": [
// 	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
// 	  {"orderable":false,"aTargets":[0,4]}// 制定列不参与排序
// 	]
// });
/*系统-分类-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-分类-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

function system_category_del(obj,id){
	//删除之前用于提示 confirm放在方法的最外面
	if(confirm("你确定要删除吗？")){
	//发送ajax请求
	$.post("/admin/admincates/"+id,{"_method":"delete"},function(data){
			//判断删除是否成功
			if(data==0){
				alert("请先删除子类");
			}else if(data==1){
				//移除数据
				$(obj).parent().parent().remove();
				//数量计算
				tot=Number($("#tot").html());
				$('#tot').html(--tot);
			}else{
				alert("删除失败");
			}		 
	});
}
}

//处理分页
function page(page){
	$.get("/admin/admincates",{page:page},function(data){
	// alert(data);
	//赋值给id值为 uid的div
	$("#uid").html(data);
	});
} 
</script>
</body>
</html>
