<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.store_user'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">

<div class="row" id="table-head">
<div class="col-12">
<div class="card">
<div class="card-content">

<div class="card-body"><h4 class="card-title"><?php echo app('translator')->get('app.store_user'); ?></h4> </div>
<div class="table-responsive">

<table class="table mb-0">
<thead >
<tr>
<th><?php echo app('translator')->get('app.user'); ?></th>
<th><?php echo app('translator')->get('app.phone'); ?></th>
<th><?php echo app('translator')->get('app.email'); ?></th>
<th><?php echo app('translator')->get('app.last_order'); ?></th>
<th><?php echo app('translator')->get('app.total_order'); ?></th>
</tr>
</thead>
<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="20%"><?php echo e($row->name); ?></td>
<td width="20%"><?php echo e($row->phone); ?></td>
<td width="20%"><?php echo e($row->email); ?></td>
<td width="20%"><?php echo e($row->getLastOrder($row->id)); ?></td>
<td width="20%"><?php echo e($row->getTotalOrder($row->id)); ?></td>
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
<?php echo $__env->make('store_end.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store_end/order/user.blade.php ENDPATH**/ ?>