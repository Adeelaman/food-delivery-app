<div class="card-content">
<div class="card-body">

<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="tab-content">
<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-pane" id="tabs_<?php echo e($l->id); ?>" aria-labelledby="home-tab" role="tabpanel">

<input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.name'); ?></label>
<?php echo Form::text('l_name[]',$data->getSData($data->s_data,$l->id,'l_name'),['id' => 'code','class' => 'form-control']); ?>

</div>
</div>


</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane active" id="tabs_0" aria-labelledby="home-tab" role="tabpanel">
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.category'); ?></label>
<select name="cate_id" class="form-control" required="required">
<option value=""><?php echo app('translator')->get('app.select'); ?></option>
<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cate->id); ?>" <?php if($data->cate_id == $cate->id): ?> selected <?php endif; ?>><?php echo e($cate->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.name'); ?></label>
<?php echo Form::text('name',null,['required' => 'required','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_price'); ?></label>
<?php echo Form::text('price',null,['class' => 'form-control']); ?>

</div>
</div>


</div>
</div>
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.save'); ?></button>


</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/addon/form.blade.php ENDPATH**/ ?>