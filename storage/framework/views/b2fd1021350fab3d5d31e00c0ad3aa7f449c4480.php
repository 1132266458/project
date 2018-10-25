<ul id="uid">
<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
    <a href="/homepage/<?php echo e($row->goods_id); ?>">
        <img src="/<?php echo e($row->goods_pic); ?>">
        <p class="head-name pc-pa10"><?php echo e($row->goods_describe); ?></p>
        <!-- <p class="label-default">3.45折</p> -->
    </a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

