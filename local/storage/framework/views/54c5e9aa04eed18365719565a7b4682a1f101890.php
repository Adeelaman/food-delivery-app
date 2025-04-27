<div class="modal fade text-left" id="assign<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h4 class="modal-title" id="myModalLabel33">Assign Delivery Partner</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?php echo e(Asset('assign')); ?>" method="post" enctype="multipart/form-data">
<div class="modal-body">

<?php echo e(csrf_field()); ?>


<input type="hidden" name="id" value="<?php echo e($row->id); ?>">

<div class="row">
<div class="form-group col-md-8">
<label for="inputEmail6">Select Delivery Partner</label>
<select name="dboy" class="form-control" required="required">
<option value="">Select</option>
<?php $__currentLoopData = $dboy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="form-group col-md-4">
<label for="inputEmail6">&nbsp;</label>
<button type="submit" class="btn btn-primary" style="margin-top: 20px">Assign</button>
</div>

</div>
<div class="modal-footer">
</div>
</form>
</div>
</div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/order/assign.blade.php ENDPATH**/ ?>