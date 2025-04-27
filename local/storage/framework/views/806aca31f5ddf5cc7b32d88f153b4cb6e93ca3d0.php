<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.fiance'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">

<h2> <?php echo app('translator')->get('app.overall_income'); ?></h2><br>

<div class="row" >
<div class="col-lg-4" >
<div class="card" style="padding: 10px 0px">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-money fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h3 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.order_income'); ?></h3>
<p class="mb-0" style="font-size: 20px"><?php echo e(Auth::user()->currency.$data['com']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>

<div class="col-lg-4" >
<div class="card" style="padding: 10px 0px">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-credit-card-alt fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h3 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.sub_income'); ?></h3>
<p class="mb-0" style="font-size: 20px"><?php echo e(Auth::user()->currency.$data['plan']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>

<div class="col-lg-4" >
<div class="card" style="padding: 10px 0px">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-money fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h3 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.total_income'); ?></h3>
<p class="mb-0" style="font-size: 20px"><?php echo e(Auth::user()->currency.$data['total']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>

</div>

<br><hr><br>
<h2><?php echo app('translator')->get('app.income_month'); ?> <span style="font-size: 18px">(1 <?php echo e(date('M')); ?> <?php echo app('translator')->get('app.to'); ?> <?php echo e(date('d M')); ?>)</span></h2><br>

<div class="row" >
<div class="col-lg-4" >
<div class="card" style="padding: 10px 0px">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-money fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h3 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.order_income'); ?></h3>
<p class="mb-0" style="font-size: 20px"><?php echo e(Auth::user()->currency.$month['com']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>

<div class="col-lg-4" >
<div class="card" style="padding: 10px 0px">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-credit-card-alt fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h3 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.sub_income'); ?></h3>
<p class="mb-0" style="font-size: 20px"><?php echo e(Auth::user()->currency.$month['plan']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>

<div class="col-lg-4" >
<div class="card" style="padding: 10px 0px">
<div class="card-header d-flex flex-column align-items-start pb-0">
<div class="avatar bg-rgba-primary p-50 m-0">
<div class="avatar-content">
<i class="fa fa-money fa-5" style="color:black;font-size: 20px"></i>
</div>
</div>
<h3 class="text-bold-700 mt-1"><?php echo app('translator')->get('app.total_income'); ?></h3>
<p class="mb-0" style="font-size: 20px"><?php echo e(Auth::user()->currency.$month['total']); ?></p>
</div>
<div class="card-content">
<div id="line-area-chart-1"></div>
</div>
</div>
</div>

</div>

<br><hr><br>
<h2> <?php echo app('translator')->get('app.sub_expiry'); ?></h2><br>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table class="table mb-0">
<thead >
<tr>
<th><?php echo app('translator')->get('app.store'); ?></th>
<th><?php echo app('translator')->get('app.plan'); ?></th>
<th><?php echo app('translator')->get('app.price'); ?></th>
<th><?php echo app('translator')->get('app.valid_till'); ?></th>
<th class="text-right"><?php echo app('translator')->get('app.option'); ?></th>
</tr>

<?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td width="20%"><?php echo e($row->store); ?></td>
<td width="20%"><?php echo e($row->plan); ?></td>
<td width="15%"><?php echo e(Auth::user()->currency.$row->price); ?></td>
<td width="25%"><?php echo e(date('d-M-Y',strtotime($row->valid_till))); ?>


<?php if($row->last_notify): ?>
<br>
<small style="color:red">Last Notify on <?php echo app('translator')->get('app.last_notify'); ?> <?php echo e($row->last_notify); ?></small>
<?php endif; ?>

</td>
<td width="20%" class="text-right">

<a class="btn btn-icon btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.send_alert'); ?>" href="<?php echo e(Asset('sendAlert?pid='.$row->id.'&id='.$row->store_id)); ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-bell"></i></a>

<a class="btn btn-icon btn-dark mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-placement="top" data-original-title="Add Addons" href="javascript::void()" data-target="#assign<?php echo e($row->store_id); ?>"><i class="fa fa-link"></i></a>

</td>
</tr>

<?php echo $__env->make('store.plan',['row' => DB::table('store')->where('id',$row->store_id)->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/plan/fiance.blade.php ENDPATH**/ ?>