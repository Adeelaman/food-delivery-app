<div class="card-content">
<div class="card-body">

<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="tab-content">
<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-pane" id="tabs_<?php echo e($l->id); ?>" aria-labelledby="home-tab" role="tabpanel">

<input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_name'); ?></label>
<?php echo Form::text('l_name[]',$data->getSData($data->s_data,$l->id,0),['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_desc'); ?></label>
<?php echo Form::text('l_desc[]',$data->getSData($data->s_data,$l->id,1),['id' => 'code','class' => 'form-control']); ?>

</div>
</div>


</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane active" id="tabs_0" aria-labelledby="home-tab" role="tabpanel">
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.select_cate'); ?></label>
<select name="category_id" class="form-control" required="required">
<option value=""><?php echo app('translator')->get('app.select'); ?></option>
<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cate->id); ?>" <?php if($cate->id == $data->category_id): ?> selected <?php endif; ?>><?php echo e($cate->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_name'); ?></label>
<?php echo Form::text('name',null,['required' => 'required','class' => 'form-control',]); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_desc'); ?></label>
<?php echo Form::text('description',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-3">
<label for="inputEmail6">Type</label>
<select name="food_type" class="form-control">
<option value="0" <?php if($data->food_type == 0): ?> selected <?php endif; ?>>Both</option>
<option value="1" <?php if($data->food_type == 1): ?> selected <?php endif; ?>>Veg</option>
<option value="2" <?php if($data->food_type == 2): ?> selected <?php endif; ?>>Non-Veg</option>
</select>
</div>

<div class="form-group col-md-3">
<label for="inputEmail6"><?php echo app('translator')->get('app.sort_order'); ?></label>
<?php echo Form::text('sort_no',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.status'); ?></label>
<select name="status" class="form-control">
<option value="0" <?php if($data->status == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.active'); ?></option>
<option value="1" <?php if($data->status == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.disbale'); ?></option>
</select>
</fieldset>
</div>
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.image'); ?></label>
<input type="file" name="img" class="form-control">
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_mrp'); ?></label>
<?php echo Form::text('mrp',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6">Manage Inventory</label>
<select name="inv" class="form-control">
<option value="0" <?php if($data->inv == 0): ?> selected <?php endif; ?>>No</option>
<option value="1" <?php if($data->inv == 1): ?> selected <?php endif; ?>>Yes</option>
</select>
</div>
</div>

<h4><?php echo app('translator')->get('app.price_title'); ?></h4>

<!--Small Price-->
<div class="row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.select_unit'); ?></label>
<select name="unit1" class="form-control">
<option value=""><?php echo app('translator')->get('app.select'); ?></option>
<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($unit); ?>" <?php if($data->unit1 == $unit): ?> selected <?php endif; ?>><?php echo e($unit); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_price'); ?></label>
<?php echo Form::text('small_price',null,['id' => 'code','class' => 'form-control']); ?>

</div>
</div>

<!--Medium Price-->
<div class="row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.select_unit'); ?></label>
<select name="unit2" class="form-control">
<option value=""><?php echo app('translator')->get('app.select'); ?></option>
<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($unit); ?>" <?php if($data->unit2 == $unit): ?> selected <?php endif; ?>><?php echo e($unit); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_price'); ?></label>
<?php echo Form::text('medium_price',null,['id' => 'code','class' => 'form-control']); ?>

</div>
</div>

<!--Large Price-->
<div class="row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.select_unit'); ?></label>
<select name="unit3" class="form-control">
<option value=""><?php echo app('translator')->get('app.select'); ?></option>
<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($unit); ?>" <?php if($data->unit3 == $unit): ?> selected <?php endif; ?>><?php echo e($unit); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.item_price'); ?></label>
<?php echo Form::text('large_price',null,['id' => 'code','class' => 'form-control']); ?>

</div>
</div>

</div>
</div>


<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.save'); ?></button>

</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/item/form.blade.php ENDPATH**/ ?>