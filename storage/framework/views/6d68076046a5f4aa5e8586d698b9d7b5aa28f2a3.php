<div id="uid">
               <div class="member-return H-over">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- <?php echo e(var_dump($v)); ?> -->
                           <li>
                               <div class="member-minute clearfix">
                                   <span><?php echo e(date('Y-m-d H:m:s',$v->order_addtime)); ?></span>
                                   <span>订单号：<em><?php echo e($v->order_sn); ?></em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                      <?php $__currentLoopData = $v->dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="ci7 clearfix" >
                                           <span class="gr1"><a href="/homepage/<?php echo e($val['id']); ?>"><img src="/<?php echo e($val['goods_pic']); ?>" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2" style="width:230px"><?php echo e($val['goods_name']); ?></span>
                                           <span class="gr3">X<?php echo e($val['num']); ?></span>
                                       </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                   </div>
                                   <div class="ci2"><?php echo e($v->name); ?></div>
                                   <div class="ci3"><b>￥<?php echo e($v->order_amount); ?></b><p>线上支付</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p><?php echo e(date('Y-m-d',$v->order_addtime)); ?></p></div>
                                   <div class="ci5">
                                   <div class="statue<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>等待付款</p>
                                   <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p>等待发货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==3): ?>
                                  <p><a href="javascript:;">等待收货</a></p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==4): ?>
                                  <p>已收货</p>
                                  <p><a href="javascript:;">物流跟踪</a></p>
                                  <?php elseif($v->order_state==0): ?>
                                  <p>交易关闭</p>
                                  <?php endif; ?>
                                    
                                   </div>
                                   <p><a href="/homeorder/<?php echo e($v->order_id); ?>">订单详情</a></p></div>
                                   <div class="ci5 ci8">
                                    <div class="getup<?php echo e($v->order_id); ?>">
                                  <?php if($v->order_state==1): ?>
                                   <p>剩余15时20分</p> <p><a href="#" class="member-touch">立即支付</a> </p>
                                   <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                    
                                  <?php elseif($v->order_state==3): ?>
                                  <p>剩余6天23小时</p> <p><a href="javascript:;" onclick="getup(<?php echo e($v->order_id); ?>)" class="member-touch">确认收货</a> </p>
                                  <p><a href="javascript:;" onclick="cancel(this,<?php echo e($v->order_id); ?>)">取消订单</a> </p>
                                   
                                  <?php elseif($v->order_state==4): ?>
                                  <p><a href="">快去评论</a></p>
                                  <?php elseif($v->order_state==2): ?>
                                  <p><a href="javascript:;">申请退款</a></p>
                                  <?php endif; ?>
                                    </div>
                                   <p><a href="javascript:;" onclick="del(this,<?php echo e($v->order_id); ?>)">删除订单</a> </p></div>
                               </div>
                           </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </ul>
                   </div>
                   <div class="clearfix" style="padding:30px 20px;">
                    <div class="fr pc-search-g pc-search-gs">
                        <a style="display:none" class="fl " href="#">上一页</a>
                        <?php $__currentLoopData = $pp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="javascript:;" onclick="page(<?php echo e($row); ?>)"><?php echo e($row); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <a title="使用方向键右键也可翻到下一页哦！" class="" href="javascript:;">下一页</a>
                    </div>
                </div>
               </div>

          </div>
