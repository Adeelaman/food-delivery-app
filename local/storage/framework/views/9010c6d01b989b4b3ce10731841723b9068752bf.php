<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.order_manage_order'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">

<div class="row" id="table-head">
<div class="col-12">
<div class="card">
<div class="card-content">

<div class="card-body"><h4 class="card-title"><?php echo app('translator')->get('app.order_manage_order'); ?></h4> </div>
<div class="table-responsive">

<?php echo $__env->make('store_end.order.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_end.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/order/index.blade.php ENDPATH**/ ?>