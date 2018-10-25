<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/shops/favicon.ico" >
<link rel="Shortcut Icon" href="/shops/favicon.ico" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td><?php echo e($v->order_id); ?></td>
        <td><?php echo e($v->order_sn); ?></td>
				<td><?php echo e($v->user_id); ?></td>
				<td><?php echo e($v->order_amount); ?></td>
        <td><?php echo e(date('Y-m-d h:m:s',$v->order_addtime)); ?></td>
        <td><?php echo e($v->order_payment); ?></td>
        <td class="td-status getup<?php echo e($v->order_id); ?>">
        	<?php if($v->order_state==0): ?>
        	已取消
        	<?php elseif($v->order_state==1): ?>
        	等待付款
        	<?php elseif($v->order_state==2): ?>
        	已付款，请发货
        	<?php elseif($v->order_state==3): ?>
        	等待收货
        	<?php else: ?>
        	已收货
        	<?php endif; ?>
        </td>
			 <td class="td-status"><?php if($v->order_evaluation==0): ?><span class="label label-info radius">未评论</span> <?php else: ?> <span class="label label-success radius">已评论</span> <?php endif; ?></td>
				<td class="td-manage">
				<?php if($v->order_state==2): ?>
			   <a onclick="getup(this,<?php echo e($v->order_id); ?>)" href="javascript:;" title="发货" class="btn btn-success radius size-S oo<?php echo e($v->order_id); ?>" style="text-decoration:none">确认发货</a> 
			  <?php endif; ?>
         <a title="编辑" href="javascript:;" onclick="admin_edit('订单信息','/admin/adminorder/<?php echo e($v->order_id); ?>')" class="btn btn-secondary radius size-S" style="text-decoration:none">订单信息</a>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

// 订单信息
function admin_info(title,url,w,h){
	layer_show(title,url,w,h);
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



// 发货
function getup(obj,id){
	// alert(id);
	layer.confirm('确认发货吗？',function(index){
			$.ajax({
				type: 'post',
				url: '/admin/admingetup/'+id,
				dataType: 'json',
				success: function(data){
					// $(obj).parents("tr").remove();
					
					$('.getup'+id).html('等待收货');
					$('.oo'+id).remove();
					layer.msg('已发货!',{icon:1,time:1000});
				},
				error:function(data) {
					layer.msg('权限不足,删除失败!',{icon: 2,time:1000});
				},
			});		
		});
}



</script>
</body>
</html>
