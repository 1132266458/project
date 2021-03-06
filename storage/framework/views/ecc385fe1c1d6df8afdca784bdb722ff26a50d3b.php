﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,admin-scalable=no" />
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
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="admin_add('添加管理员','/admin/adminlist/create','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="150">角色</th>
				<th >加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td><?php echo e($v->admin_id); ?></td>
				<td><a href="javascript:" onclick="admin_info('管理员信息','/admin/admininfo/<?php echo e($v->admin_id); ?>','450','400')"><?php echo e($v->admin_name); ?></a></td>
				<td>
				<?php echo e($level[$k]); ?>

				</td>
				<td><?php echo e(date('Y-m-d h:m:s',$v->admin_addtime)); ?></td>
				<?php if($v->admin_statue==0): ?>
			     <td class="td-status"><span class="label label-success radius">启用</span></td>
			    <?php else: ?>
			     <td class="td-status"><span class="label label-defaunt radius">已停用</span></td>
			    <?php endif; ?>
				<td class="td-manage">
				<?php if($v->admin_statue==0): ?>
			        <a onclick="status(this,<?php echo e($v->admin_id); ?>,1)" href="javascript:;" title="禁用"  style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a> 
			      <?php else: ?>
			        <a style="text-decoration:none" onclick="status(this,<?php echo e($v->admin_id); ?>,0)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>
			      <?php endif; ?>
				 <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','/admin/adminlist/<?php echo e($v->admin_id); ?>/edit','700','400')" class="ml-5" style="text-decoration:none"> <i class="Hui-iconfont">&#xe63c;</i></a>
				 <a title="信息编辑" href="javascript:;" onclick="admin_edit('管理员信息编辑','/admin/admininfo_edit/<?php echo e($v->admin_id); ?>','700','400')" class="ml-5" style="text-decoration:none"> <i class="Hui-iconfont">&#xe62e;</i></a>

				 <a title="删除" href="javascript:;" onclick="admin_del(this,<?php echo e($v->admin_id); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/shops/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/shops/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/shops/static/h-ui.admin/js/H-ui.admin.js"></script> 
 <!--/_footer 作为公共模版分离出去 -->

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
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
// 管理员信息
function admin_info(title,url,w,h){
	layer_show(title,url,w,h);
}

/*管理员-删除*/

function admin_del(obj,id){
	if(id==1){
		layer.msg('不能删除超级管理员!',{icon:2,time:1000});
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

/*管理员-编辑*/
function admin_edit(title,url,w,h){
	layer_show(title,url,w,h);
}


// 管理员-启用与禁用
function status(obj,id,sta){
  a=$(obj).parent();
  if(sta==1){
    b='禁用';
  }else{
    b='启用';
  }
  layer.confirm('确认要'+b+'吗?',function(index){
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
