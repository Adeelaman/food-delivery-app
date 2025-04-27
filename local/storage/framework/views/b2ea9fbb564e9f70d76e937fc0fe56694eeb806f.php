<div class="modal fade text-left" id="addon<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h4 class="modal-title" id="myModalLabel33"><?php echo app('translator')->get('app.assign_addon'); ?></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?php echo e(Asset(env('store').'/addAddon')); ?>" method="post" enctype="multipart/form-data">
<div class="modal-body">

<?php echo e(csrf_field()); ?>


<input type="hidden" name="id" value="<?php echo e($row->id); ?>">

<?php $__currentLoopData = $addon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="row">
<div class="col-xl-12"><h3><?php echo e($a['name']); ?></h3></div>

<?php $__currentLoopData = $a['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-xl-3" style="margin-top: 10px;margin-bottom: 10px"><input type="checkbox" name="chk[]" value="<?php echo e($i->id); ?>" <?php if(in_array($i->id,$assign->getAssigned($row->id))): ?> checked <?php endif; ?>> <?php echo e($i->name); ?></div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.save'); ?></button>
</div>
</form>
</div>
</div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/item/addon.blade.php ENDPATH**/ ?>