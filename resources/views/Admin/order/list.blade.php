<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,admin-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/shops/favicon.ico" >
<link rel="Shortcut Icon" href="/shops/favicon.ico" />
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
<title>订单列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="10">订单列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
        <th width="150">订单编号</th>
				<th>会员</th>
				<th width="70">总价</th>
        <th >订单时间</th>
        <th >支付方式</th>
        <th width="100">订单状态</th>
				<th width="100">评论状态</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($data as $v)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$v->order_id}}</td>
        <td>{{$v->order_sn}}</td>
				<td>{{$v->user_id}}</td>
				<td>{{$v->order_amount}}</td>
        <td>{{$v->order_addtime}}</td>
        <td>{{$v->order_payment}}</td>
        <td class="td-status"><span class="label label-success radius">启用</span></td>
			 <td class="td-status"><span class="label label-success radius">启用</span></td>
				<td class="td-manage">
			        <a onclick="status(this,,1)" href="javascript:;" title="禁用"  style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a> 
			   
         <a title="编辑" href="javascript:;" onclick="admin_edit('订单信息','/admin/adminorder/{{$v->order_id}}')" class="btn btn-secondary radius size-S" style="text-decoration:none">订单信息</a>

				 <!-- <a title="删除" href="javascript:;" onclick="admin_del(this,{{$v->order_id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td> -->
			</tr>
		@endforeach
		</tbody>
	</table>
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
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*订单-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
// 订单信息
function admin_info(title,url,w,h){
	layer_show(title,url,w,h);
}

/*订单-删除*/

function admin_del(obj,id){
	if(id==1){
		layer.msg('不能删除超级订单!',{icon:2,time:1000});
	}else{
		layer.confirm('确认要删除吗？',function(index){
			$.ajax({
				type: 'DELETE',
				url: '/admin/adminlist/'+id,
				dataType: 'json',
				success: function(data){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				},
				error:function(data) {
					layer.msg('权限不足,删除失败!',{icon: 2,time:1000});
				},
			});		
		});
	}
}

/*订单-查看*/
function admin_edit(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}
/*收货地址-查看*/
function admin_address(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}


// 订单-启用与禁用
function status(obj,id,sta){
  a=$(obj).parent();
  layer.confirm('确认要禁用吗?',function(index){
    $.get('/admin/adminstatus',{id:id,sta:sta},function(data){
      // console.log(data);
      if(data==1){
        layer.msg('已禁用!',{icon:5,time:1000});
        $(obj).parent().prev().html('<span class="label label-defaunt radius">已停用</span>');
        obj.remove();
        a.prepend('<a style="text-decoration:none" onclick="status(this,'+id+',0)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>');
      }else if(data==0){
        layer.msg('已启用!',{icon:6,time:1000});
        $(obj).parent().prev().html('<span class="label label-success radius">已启用</span>');
        obj.remove();
        a.prepend('<a onclick="status(this,'+id+',1)" href="javascript:;" title="禁用"  style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
      }else if(data==2){
      	layer.msg('权限不足,禁用失败!',{icon:5,time:1000});
      }else{
      	layer.msg('权限不足,启用失败!',{icon:5,time:1000});
      }
    });
  });  
}


</script>
</body>
</html>
