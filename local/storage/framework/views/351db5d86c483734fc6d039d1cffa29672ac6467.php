<div class="modal fade text-left" id="assign<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h4 class="modal-title" id="myModalLabel33"><?php echo app('translator')->get('app.sub_plan'); ?> - <?php echo e($row->name); ?></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<?php if(count($storePlan->getAll($row->id)) > 0): ?>
<h4> <?php echo app('translator')->get('app.assign_plan'); ?></h4>

<div class="row" style="border:1px solid #ccc;padding: 10px 10px">
<div class="col-xl-3"><b><?php echo app('translator')->get('app.plan'); ?></b></div>
<div class="col-xl-2"><b><?php echo app('translator')->get('app.price'); ?></b></div>
<div class="col-xl-2"><b><?php echo app('translator')->get('app.time_period'); ?></b></div>
<div class="col-xl-2"><b><?php echo app('translator')->get('app.valid_till'); ?></b></div>
<div class="col-xl-3"><b><?php echo app('translator')->get('app.payment_method'); ?></b></div>
</div>

<?php $__currentLoopData = $storePlan->getAll($row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $splan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row" style="border:1px solid #ccc;padding: 10px 10px">
<div class="col-xl-3"><?php echo e($splan['plan']); ?></div>
<div class="col-xl-2"><?php echo e($splan['price']); ?></div>
<div class="col-xl-2"><?php echo e($splan['time']); ?></div>
<div class="col-xl-2"><?php echo e($splan['valid']); ?></div>
<div class="col-xl-3">

<?php if($splan['status'] == 0 && $splan['payment'] == 0): ?>

<select name="mm" class="form-control" onchange="paid(this.value,<?php echo e($splan['id']); ?>)">
<option value="0"><?php echo app('translator')->get('app.payment_pending'); ?></option>
<option value="1"><?php echo app('translator')->get('app.via_cash'); ?></option>
<option value="3"><?php echo app('translator')->get('app.via_bank'); ?></option>
</select>

<?php else: ?>
<?php echo e($splan['payment']); ?>

<?php endif; ?>

</div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
<h4 style="color:red"><?php echo app('translator')->get('app.no_plan'); ?></h4>
<?php endif; ?>


<div style="margin-top: 10%">
<h4><?php echo app('translator')->get('app.assign_plan'); ?></h4>

<form action="<?php echo e(Asset('storePlan')); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
<?php echo e(csrf_field()); ?>


<input type="hidden" name="id" value="<?php echo e($row->id); ?>">

<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.sub_plan'); ?></label>
<select name="plan_id" class="form-control" required="required">
<option value=""><?php echo app('translator')->get('app.select'); ?></option>
<?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($pl->id); ?>"><?php echo e($pl->name); ?> - <?php echo e($pl->valid_value); ?> <?php echo e($pl->getValidType($pl->valid_type)); ?> - <?php echo e(Auth::user()->currency.$pl->price); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</fieldset>
</div>

<div class="form-group col-md-4">
<label for="inputEmail6">&nbsp;</label>
<button type="submit" class="btn btn-primary" style="margin-top: 20px"><?php echo app('translator')->get('app.assign'); ?></button>
</div>
</form>
</div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store/plan.blade.php ENDPATH**/ ?>