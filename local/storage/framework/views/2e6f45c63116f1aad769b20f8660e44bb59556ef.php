<div class="modal fade text-left" id="addon<?php echo e($item['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h4 class="modal-title" id="myModalLabel33"><?php echo app('translator')->get('app.select_option'); ?></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row" style="margin-top: 20px">

<?php if($item['s_price']): ?>
<div class="col-xl-4">
<input type="radio" name="option_<?php echo e($item['id']); ?>" value="1" class="vs-radio-lg">
<?php echo e($item['unit1']); ?> - <?php echo e($c.$item['s_price']); ?>

</div>
<?php endif; ?>

<?php if($item['m_price']): ?>
<div class="col-xl-4">
<input type="radio" name="option_<?php echo e($item['id']); ?>" value="2" class="vs-radio-lg">
<?php echo e($item['unit2']); ?> - <?php echo e($c.$item['m_price']); ?>

</div>
<?php endif; ?>

<?php if($item['l_price']): ?>
<div class="col-xl-4">
<input type="radio" name="option_<?php echo e($item['id']); ?>" value="3" class="vs-radio-lg">
<?php echo e($item['unit3']); ?> - <?php echo e($c.$item['l_price']); ?>

</div>
<?php endif; ?>
</div>

<?php if(count($item['addon']) > 0): ?>
<br>
<h4>Addon's</h4>

<?php $__currentLoopData = $item['addon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonCate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row" style="margin-bottom: 20px">

<div class="col-xl-12" style="color:blue;margin-bottom: 10px;margin-top: 10px"><?php echo e($addonCate['name']); ?> 

<?php if($addonCate['req'] == 1): ?><small style="color:red"><?php echo app('translator')->get('app.select_one'); ?></small><?php endif; ?>

</div>

<?php if($addonCate['type'] == 0): ?>

<?php $__currentLoopData = $addonCate['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-xl-4"><input type="checkbox" class="addon_<?php echo e($item['id']); ?>" name="chk_<?php echo e($item['id']); ?>[]" value="<?php echo e($addonItem['id']); ?>,<?php echo e($addonItem['name']); ?>,<?php echo e($addonItem['price']); ?>"> <?php echo e($addonItem['name']); ?> - <?php echo e($c.$addonItem['price']); ?></div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>


<?php if($addonCate['type'] == 1): ?>

<?php $__currentLoopData = $addonCate['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-xl-4"><input type="radio"  class="addon_<?php echo e($item['id']); ?>" name="radio_<?php echo e($item['id']); ?>_<?php echo e($addonCate['id']); ?>[]" value="<?php echo e($addonItem['id']); ?>,<?php echo e($addonItem['name']); ?>,<?php echo e($addonItem['price']); ?>"> <?php echo e($addonItem['name']); ?> - <?php echo e($c.$addonItem['price']); ?></div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-primary" onClick="addonData(<?php echo e(json_encode($item)); ?>,<?php echo e($item['id']); ?>)" data-dismiss="modal"><?php echo app('translator')->get('app.add'); ?></button>
</div>

</div>
</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store_end/order/addon.blade.php ENDPATH**/ ?>