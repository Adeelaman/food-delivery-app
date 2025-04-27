<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.product'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">

<div class="row" id="table-head">
<div class="col-12">
<div class="card">
<div class="card-content">

<div class="card-body"><h4 class="card-title"><?php echo app('translator')->get('app.product'); ?>

<?php if($hasItem['item']): ?>
<a href="<?php echo e(Asset($link.'add')); ?>" class="btn btn-primary" style="float: right"><?php echo app('translator')->get('app.add_new'); ?></a>

<?php else: ?>

<span style="font-size: 14px;color:red;float: right"><?php echo app('translator')->get('app.no_limit'); ?></span>

<?php endif; ?>

</h4> </div>
<div class="table-responsive">
<table class="table mb-0">
<thead >
<tr>
<th><?php echo app('translator')->get('app.image'); ?></th>
<th><?php echo app('translator')->get('app.category'); ?></th>
<th><?php echo app('translator')->get('app.item_name'); ?></th>
<th><?php echo app('translator')->get('app.status'); ?></th>
<th>Stock</th>
<th class="text-right"><?php echo app('translator')->get('app.option'); ?></th>
</tr>
</thead>
<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="10%"><?php if($row->img): ?> <img src="<?php echo e(Asset('upload/item/'.$row->img)); ?>" height="50"> <?php endif; ?></td>
<td width="17%"><?php echo e($row->cate); ?></td>
<td width="18%"><?php echo e($row->name); ?></td>
<td width="15%">

<a href="<?php echo e(Asset('itemStatus?id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">
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
</a>
</td>
<td width="15%"><?php if($row->inv == 1): ?> <?php echo e($row->getStock($row->id)); ?> <?php else: ?> --- <?php endif; ?></td>
<td width="25%" class="text-right">

<?php if($row->inv == 1): ?>
<a class="btn btn-icon btn-dark mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-placement="top" data-original-title="Add Stock" href="javascript::void()" data-target="#inv<?php echo e($row->id); ?>"><i class="fa fa-plus"></i></a>

<?php endif; ?>

<a class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-placement="top" data-original-title="Add Addons" href="javascript::void()" data-target="#addon<?php echo e($row->id); ?>"><i class="fa fa-link"></i></a>

<a class="btn btn-icon btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.edit'); ?>" href="<?php echo e(Asset($link.$row->id.'/edit')); ?>"><i class="feather icon-edit"></i></a>

<a type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.delete'); ?>" onclick="confirmAlert('<?php echo e(Asset($link.'delete/'.$row->id)); ?>')"><i class="feather icon-trash-2"></i></a>

</td>
</tr>

<?php echo $__env->make('store_end.item.addon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($row->inv == 1): ?>
<?php echo $__env->make('store_end.item.inv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

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
<?php echo $__env->make('store_end.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/item/index.blade.php ENDPATH**/ ?>