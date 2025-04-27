<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.manage_store'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">

<div class="row" id="table-head">
<div class="col-12">
<div class="card">
<div class="card-content">

<div class="card-body"><h4 class="card-title"><?php echo app('translator')->get('app.manage_store'); ?> <a href="<?php echo e(Asset($link.'add')); ?>" class="btn btn-primary" style="float: right"><?php echo app('translator')->get('app.add_new'); ?></a></h4> </div>
<div class="table-responsive">
<table class="table mb-0">
<thead >
<tr>
<th>ID</th>
<th><?php echo app('translator')->get('app.store_image'); ?></th>
<th><?php echo app('translator')->get('app.store_name'); ?></th>
<th><?php echo app('translator')->get('app.store_logins'); ?></th>
<th><?php echo app('translator')->get('app.status_plan'); ?></th>
<th class="text-right"><?php echo app('translator')->get('app.store_option'); ?></th>
</tr>
</thead>
<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="5%"><?php echo e($row->id); ?></td>
<td width="5%"><?php if($row->img): ?> <img src="<?php echo e(Asset('upload/store/'.$row->img)); ?>" height="60px"> <?php endif; ?></td>
<td width="12%"><?php echo e($row->name); ?>


<?php if($row->signup_by): ?>
<br><small style="color:red"><?php echo app('translator')->get('app.from_app'); ?></small>
<?php endif; ?>

</td>
<td width="15%"><?php echo app('translator')->get('app.store_username'); ?> <?php echo e($row->phone); ?><br><small><?php echo app('translator')->get('app.store_password'); ?> <?php echo e($row->shw_password); ?></small></td>
<td width="18%">

<a href="<?php echo e(Asset('storeAction?action=status&id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">
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
<?php ($checkPlan = $row->checkPlan($row->id)); ?>
<a data-toggle="modal" data-placement="top" data-original-title="Add Addons" href="javascript::void()" data-target="#assign<?php echo e($row->id); ?>">
<?php if($checkPlan == 0): ?>

<div class="chip chip-danger mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.assign'); ?></span>
</div>
</div>

<?php elseif($checkPlan == 1): ?>

<div class="chip chip-success mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo e($row->plan); ?></span>
</div>
</div>

<?php elseif($checkPlan == 2): ?>

<div class="chip chip-dark mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.plan_expir'); ?></span>
</div>
</div>

<?php elseif($checkPlan == 3): ?>

<div class="chip chip-warning mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.payment_pending'); ?></span>
</div>
</div>

<?php endif; ?>
</a>	

</td>
<td width="28%" class="text-right">

<a class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.login_store'); ?>" href="<?php echo e(Asset('loginAsStore?id='.$row->id)); ?>" target="_blank"><i class="fa fa-sign-in"></i></a>

<a class="btn btn-icon btn-dark mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.gen_qr'); ?>" href="<?php echo e(Asset('qr?id='.$row->id)); ?>" target="_blank"><i class="fa fa-qrcode"></i></a>

<a class="btn btn-icon <?php if($row->trend == 0): ?> btn-primary <?php else: ?> btn-danger <?php endif; ?> mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php if($row->trend == 1): ?> <?php echo app('translator')->get('app.in_trend'); ?> <?php else: ?> <?php echo app('translator')->get('app.make_trend'); ?> <?php endif; ?>" href="<?php echo e(Asset('storeAction?action=trend&id='.$row->id)); ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-line-chart"></i></a>

<a class="btn btn-icon <?php if($row->open == 0): ?> btn-success <?php else: ?> btn-danger <?php endif; ?> mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php if($row->open == 0): ?> Store is Open Now <?php else: ?> Store is Closed Now <?php endif; ?>" href="<?php echo e(Asset('storeAction?action=open&id='.$row->id)); ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-clock-o"></i></a>

<a class="btn btn-icon btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.edit'); ?>" href="<?php echo e(Asset($link.$row->id.'/edit')); ?>"><i class="feather icon-edit"></i></a>

<a type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.delete'); ?>" onclick="confirmAlert('<?php echo e(Asset($link.'delete/'.$row->id)); ?>')"><i class="feather icon-trash-2"></i></a>

</td>
</tr>

<?php echo $__env->make('store.plan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<script type="text/javascript">

function paid(pay,id)
{
	if(pay > 0)
	{
		window.location.href = "<?php echo e(Asset('pay?pay=')); ?>"+pay+"&id="+id;
	}
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store/index.blade.php ENDPATH**/ ?>