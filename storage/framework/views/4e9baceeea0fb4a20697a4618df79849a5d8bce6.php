<ul class="clearfix">
<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($good->goods_status==0): ?>
<li> <a href="/homepage/<?php echo e($good->goods_id); ?>"> <img src="/<?php echo e($good->goods_pic); ?>" /></a> <p class="head-name"><a href="/homepage/<?php echo e($good->goods_id); ?>" style="font-size:12px;color:black;"><?php echo e($good->goods_describe); ?></a> </p> <p><span class="price">￥<?php echo e($good->goods_price); ?></span></p> <p class="head-futi clearfix"><span class="fl">好评度：90% </span> <span class="fr">100人购买</span></p> <p class="clearfix"><span class="label-default fl">抢购</span> <a href="javascript:;" onclick="foverite(<?php echo e($good->goods_id); ?>)" class="fr pc-search-c" style="color:black;">收藏</a> </p> </li> 
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul> 

