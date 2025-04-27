<div class="row">
<div class="col-lg-6">
<div class="card" style="padding: 20px 20px">

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><h4><?php echo app('translator')->get('app.overall_order'); ?></h4></div>
<div class="col-lg-4"><a class="btn btn-primary" href="<?php echo e(Asset('report')); ?>" style="margin-top: -8%"><?php echo app('translator')->get('app.get_report'); ?></a></div>
</div>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><b><?php echo app('translator')->get('app.total_order'); ?></b></div>
<div class="col-lg-4"><?php echo e($data['order']); ?></div>

</div>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><b><?php echo app('translator')->get('app.completed_order'); ?></b></div>
<div class="col-lg-4"><?php echo e($data['complete']); ?></div>

</div>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><b><?php echo app('translator')->get('app.running_order'); ?></b> </div>
<div class="col-lg-4"><?php echo e($data['running']); ?></div>

</div>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><b><?php echo app('translator')->get('app.cancelled_orders'); ?></b> </div>
<div class="col-lg-4"><?php echo e($data['cancel']); ?></div>

</div>

<div class="row" style="padding: 10px 10px">

<div class="col-lg-12"></div>

</div>

<div class="row" style="padding: 10px 10px">

<div class="col-lg-12"></div>

</div>

<div class="row" style="padding: 10px 10px">

<div class="col-lg-12"></div>

</div>

</div>
</div>

<div class="col-lg-6">
<div class="card" style="padding: 20px 20px">

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><h4><?php echo app('translator')->get('app.most_order'); ?></h4></div>
<div class="col-lg-4"><a class="btn btn-primary" href="<?php echo e(Asset('report')); ?>" style="margin-top: -8%"><?php echo app('translator')->get('app.get_report'); ?></a></div>
</div>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><b><?php echo app('translator')->get('app.store'); ?></b></div>
<div class="col-lg-4"><b><?php echo app('translator')->get('app.completed_orders'); ?></b></div>
</div>

<?php $__currentLoopData = $schart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-8"><?php echo e($s['name']); ?></div>
<div class="col-lg-4"><?php echo e($s['order']); ?></div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/dashboard/chart.blade.php ENDPATH**/ ?>