<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/shops/favicon.ico" >
<link rel="Shortcut Icon" href="/shops/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="/admin/admincates" method="post" class="form form-horizontal" id="form-category-add">
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>基本设置</span>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						父类：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="pid" onchange="SetSubID(this);">
							<option value="0">--请选择--</option>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($v->level==3): ?>
							<option value="<?php echo e($v->id); ?>" disabled><?php echo e($v->name); ?></option>
							<?php else: ?>
							<option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						分类名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="cate" name="name">
					</div>
					 <?php if(session('error')): ?>
				    <div class="row cl">
				      <label class="form-label col-xs-3" style="color:red;">&nbsp;<?php echo e(session('error')); ?></label>
				    </div>
				    <?php endif; ?>
					<div class="col-3">
					</div>
				</div>
			</div>
			
		
		</div>
		<?php echo e(csrf_field()); ?>

		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/shops/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/shops/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/shops/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/shops/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/shops/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/shops/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/shops/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/shops/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	
	$("#tab-category").Huitab({
		index:0
	});
	$("#form-category-add").validate({
		rules:{
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		
	});
});

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
