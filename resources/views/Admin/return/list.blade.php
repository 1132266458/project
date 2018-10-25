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
<title>评论管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论管理 <span class="c-gray en">&gt;</span> 评论列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">ID</th>
				<th width="100">订单号</th>
				<th>商品名</th>
				<th>退货理由</th>
				<th>具体描述</th>
				<th width="130">申请时间</th>
				<th width="70">评价等级</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $v)
			<tr class="text-c">
				<td>{{$v->id}}</td>
				
				<td>{{$v->dev['order_sn']}}</td>
				<td>{{$v->dev['goods_name']}}</td>
				<td>
				@if($v->reason_level==1)
				货不对板
				@elseif($v->reason_level==2)
				货物质量有问题
				@elseif($v->reason_level==3)
				发错货了
				@endif
				</td>
				<td>{{$v->reason}}</td>
				<td>{{date('Y-m-d h:m:s',$v->return_addtime)}}</td>
				<td class="td-status">
				@if($v->return_state==0)
				<span class="label label-warning radius">等待处理</span>
				@elseif($v->return_state==1)
				<span class="label label-success radius">退款成功</span>
				@elseif($v->return_state==2)
				<span class="label label-danger radius">拒绝退款</span>
				@endif
				</td>
				<td>
				@if($v->return_state==0)
				<a title="确认退款" href="javascript:;" onclick="oktui(this,{{$v->id}})" class="btn btn-success radius size-S" style="text-decoration:none">确认退款</a><a title="拒绝退款" href="javascript:;" onclick="notui(this,{{$v->id}})" class="btn btn-danger radius size-S" style="text-decoration:none">拒绝退款</a>
				@endif
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
function notui(obj,id){
	layer.confirm('确认拒绝退款吗？',function(index){
		$.post('/notui/'+id,function(data){
			// alert(data);
			layer.msg('已拒绝退款!',{icon: 5,time:1000});
			$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">拒绝退款</span>');
			$(obj).siblings().remove();
			$(obj).remove();
		});
	});
}

/*确认退款*/
function oktui(obj,id){
	layer.confirm('确认要退款吗？',function(index){
		$.post('/oktui/'+id,function(data){
			// alert(data);
			layer.msg('已确认退款!',{icon: 6,time:1000});
			$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">退款成功</span>');
			$(obj).siblings().remove();
			$(obj).remove();
		});
	});
}




</script> 
</body>
</html>
