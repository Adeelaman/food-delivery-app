<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.delivery_staff'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">

<div class="row" id="table-head">
<div class="col-12">
<div class="card">
<div class="card-content">

<div class="card-body"><h4 class="card-title"><?php echo app('translator')->get('app.delivery_staff'); ?> <a href="<?php echo e(Asset($link.'add')); ?>" class="btn btn-primary" style="float: right"><?php echo app('translator')->get('app.add_new'); ?></a></h4> </div>
<div class="table-responsive">
<table class="table mb-0">
<thead >
<tr>
<th><?php echo app('translator')->get('app.name'); ?></th>
<th><?php echo app('translator')->get('app.phone'); ?></th>
<th><?php echo app('translator')->get('app.password'); ?></th>
<th>Per Delivery Charge</th>
<th>Per KM</th>
<th><?php echo app('translator')->get('app.status'); ?></th>
<th class="text-right"><?php echo app('translator')->get('app.option'); ?></th>
</tr>
</thead>
<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="15%"><?php echo e($row->name); ?></td>
<td width="15%"><?php echo e($row->phone); ?></td>
<td width="15%"><?php echo e($row->shw_password); ?></td>
<td width="10%"><?php echo e(Auth::user()->currency.$row->charge); ?></td>
<td width="10%"><?php echo e(Auth::user()->currency.$row->per_km); ?></td>
<td width="15%">

<?php if($row->status == 0): ?>

<div class="chip chip-success mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.active'); ?></span>
</div>
</div>

<?php else: ?>

<div class="chip chip-danger mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.disbale'); ?></span>
</div>
</div>

<?php endif; ?>	

</td>
<td width="20%" class="text-right">

<a class="btn btn-icon btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.edit'); ?>" href="<?php echo e(Asset($link.$row->id.'/edit')); ?>"><i class="feather icon-edit"></i></a>

<a type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.delete'); ?>" onclick="confirmAlert('<?php echo e(Asset($link.'delete/'.$row->id)); ?>')"><i class="feather icon-trash-2"></i></a>

</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>
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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/delivery/index.blade.php ENDPATH**/ ?>