<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.sd_dashboard'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
.card
{
	padding: 10px 10px;
}
</style>
<section id="dashboard-ecommerce">

<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-pencil-square-o fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.sd_titems'); ?></h2>
<p class="mb-0"><?php echo e($data['item']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-success p-50 m-0">
<div class="avatar-content">
<i class="fa fa-shopping-cart fa-5" style="color:black;font-size: 20px"></i>

</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.sd_torders'); ?></h2>
<p class="mb-0"><?php echo e($data['total']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-2"></div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-danger p-50 m-0">
<div class="avatar-content">
<i class="fa fa-calendar-check-o fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.sd_l7d_orders'); ?></h2>
<p class="mb-0"><?php echo e($data['week']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-3"></div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-warning p-50 m-0">
<div class="avatar-content">
<i class="fa fa-calendar-check-o fa-5" style="color:black;font-size: 20px"></i>

</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.sd_l30d_orders'); ?></h2>
<p class="mb-0"><?php echo e($data['month']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-4"></div>
</div>
</div>
</div>

<?php if($hasPlan->id): ?>
<div class="col-lg-8 col-sm-6 col-12">
<div class="card" >

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px;">

<div class="col-lg-8"><h2 class="text-bold-700 mt-1"><i class="fa fa-calendar-check-o fa-5" style="color:black;font-size: 20px"></i> <?php echo app('translator')->get('app.sub_plan'); ?></h2></div>

</div>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-3"><b><?php echo app('translator')->get('app.plan'); ?></b></div>
<div class="col-lg-3"><?php echo e($hasPlan->name); ?></div>
<div class="col-lg-3"><b><?php echo app('translator')->get('app.valid_till'); ?></b></div>
<div class="col-lg-3"><?php echo e(date('d-M-Y',strtotime($hasPlan->valid_till))); ?></div>
</div>

<div class="row" style="border-bottom: 1px solid #ededed;padding: 10px 10px">

<div class="col-lg-3"><b><?php echo app('translator')->get('app.item_limit'); ?></b></div>
<div class="col-lg-3"><?php if($hasPlan->item_limit == 0): ?> <?php echo app('translator')->get('app.unlimited'); ?> <?php else: ?> <?php echo e($hasPlan->item_limit); ?> 

<span style="color:red">(<?php echo e($hasItem['item']); ?> <?php echo app('translator')->get('app.left'); ?>)</span>

 <?php endif; ?></div>

</div>
</div>
</div>
<?php endif; ?>

</div>

<div class="row">
<div class="col-md-12">
<div class="card">
<?php echo $__env->make('store_end.order.table',['data' => $order,'c' => $c], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

</div>
</div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_end.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/dashboard/home.blade.php ENDPATH**/ ?>