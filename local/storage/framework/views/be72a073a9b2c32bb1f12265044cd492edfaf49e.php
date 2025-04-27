<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
.card
{
	padding: 10px 10px;
}
</style>
<section id="dashboard-ecommerce">

<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-user-plus fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.total_store'); ?></h2>
<p class="mb-0"><?php echo e($data['store']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-success p-50 m-0">
<div class="avatar-content">
<i class="fa fa-mobile fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.app_user'); ?></h2>
<p class="mb-0"><?php echo e($data['user']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-2"></div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-danger p-50 m-0">
<div class="avatar-content">
<i class="feather icon-shopping-cart text-danger font-medium-5"></i>
</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.total_orders'); ?></h2>
<p class="mb-0"><?php echo e($data['order']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-3"></div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="card">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-warning p-50 m-0">
<div class="avatar-content">
<i class="fa fa-map-marker fa-5" style="color:black;font-size: 20px"></i>

</div>
</div>
<h2 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.delivery_staff'); ?></h2>
<p class="mb-0"><?php echo e($data['delivery']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-4"></div>
</div>
</div>
</div>
</div>

<?php echo $__env->make('dashboard.chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
<div class="col-md-12">
<div class="card">
<?php echo $__env->make('order.table',['data' => $order,'c' => $c], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

</div>
</div>

</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/dashboard/home.blade.php ENDPATH**/ ?>