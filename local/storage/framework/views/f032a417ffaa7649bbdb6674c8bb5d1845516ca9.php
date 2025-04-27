<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.sub_plan'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">

<div class="row" id="table-head">
<div class="col-12">
<div class="card">
<div class="card-content">

<div class="card-body"><h4 class="card-title"><?php echo app('translator')->get('app.sub_plan'); ?> <a href="<?php echo e(Asset($link.'add')); ?>" class="btn btn-primary" style="float: right"><?php echo app('translator')->get('app.add_new'); ?></a></h4> </div>
<div class="table-responsive">
<table class="table mb-0">
<thead >
<tr>
<th><?php echo app('translator')->get('app.name'); ?></th>
<th><?php echo app('translator')->get('app.price'); ?></th>
<th><?php echo app('translator')->get('app.time_period'); ?> </th>
<th><?php echo app('translator')->get('app.item_limit'); ?> </th>
<th>POS</th>
<th><?php echo app('translator')->get('app.status'); ?></th>
<th class="text-right"><?php echo app('translator')->get('app.option'); ?></th>
</tr>
</thead>
<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="15%"><?php echo e($row->name); ?></td>
<td width="10%"><?php echo e(Auth::user()->currency); ?><?php echo e($row->price); ?></td>
<td width="10%"> <?php echo e($row->valid_value); ?> <?php echo e($row->getValidType($row->valid_type)); ?></td>
<td width="10%"><?php if($row->item_limit == 0): ?> Unlimted <?php else: ?> <?php echo e($row->item_limit); ?> <?php endif; ?></td>
<td width="10%"><?php if($row->pos == 0): ?> Yes <?php else: ?> <span style="color:red">No</span> <?php endif; ?></td>
<td width="14%">

<a href="<?php echo e(Asset('plan/status/'.$row->id)); ?>" onclick="return confirm('Are you sure?')">
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
<td width="16%" class="text-right">

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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/plan/index.blade.php ENDPATH**/ ?>