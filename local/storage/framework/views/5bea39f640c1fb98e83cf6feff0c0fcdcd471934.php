<div class="card-content">
<div class="card-body">

<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="tab-content">
<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-pane" id="tabs_<?php echo e($l->id); ?>" aria-labelledby="home-tab" role="tabpanel">

<input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_title'); ?></label>
<?php echo Form::text('l_name[]',$data->getSData($data->s_data,$l->id,0),['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_address'); ?></label>
<?php echo Form::text('l_address[]',$data->getSData($data->s_data,$l->id,1),['id' => 'code','class' => 'form-control']); ?>

</div>
</div>


</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane active" id="tabs_0" aria-labelledby="home-tab" role="tabpanel">
<div class="form-row">

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_select_cat'); ?></label>
<select name="cate_id[]" class="form-control select2"  multiple="true">
<option value=""><?php echo app('translator')->get('app.store_select'); ?></option>
<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cate->id); ?>" <?php if(in_array($cate->id,$array)): ?> selected <?php endif; ?>><?php echo e($cate->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_title'); ?></label>
<?php echo Form::text('name',null,['required' => 'required','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_phone'); ?></label>
<?php echo Form::text('phone',null,['required' => 'required','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<?php if($data->id): ?>
<label for="inputEmail6"><?php echo app('translator')->get('app.store_change_pass'); ?></label>
<input type="password" name="password" class="form-control">
<?php else: ?>
<label for="inputEmail6"><?php echo app('translator')->get('app.store_choose_pass'); ?></label>
<input type="password" name="password" class="form-control">
<?php endif; ?>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_address'); ?></label>
<?php echo Form::text('address',null,['required' => 'required','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_whatsapp'); ?></label>
<?php echo Form::text('whatsapp',null,['required' => 'required','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.new_msg'); ?></label>
<select name="whatsapp_new_order" class="form-control">
<option value="0"><?php echo app('translator')->get('app.yes'); ?></option>
<option value="1"><?php echo app('translator')->get('app.no'); ?></option>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_main_image'); ?></label>
<input type="file" name="img" class="form-control">
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_gal_images'); ?></label>
<input type="file" name="gallery[]" class="form-control" multiple="true">
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_avg_del_time'); ?></label>
<?php echo Form::text('delivery_time',null,['class' => 'form-control']); ?>

</div>

<div class="form-group col-md-3">
<label for="inputEmail6"><?php echo app('translator')->get('app.store_avg_ppc'); ?></label>
<?php echo Form::text('per_person_cost',null,['class' => 'form-control']); ?>

</div>

<div class="form-group col-md-3">
<label for="inputEmail6"><?php echo app('translator')->get('app.can_msg'); ?></label>
<select name="chat" class="form-control">
<option value="0" <?php if($data->chat == 0): ?> selected <?php endif; ?>>No</option>
<option value="1" <?php if($data->chat == 1): ?> selected <?php endif; ?>>Yes</option>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.print_bill'); ?></label>
<select name="print_type" class="form-control">
<option value="0" <?php if($data->print_type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.a4'); ?></option>
<option value="1" <?php if($data->print_type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.thermal'); ?></option>
</select>
</div>

<div class="col-xl-12">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.store_units'); ?></label>
<input type="text" name="unit" class="form-control" value="<?php echo e($data->unit); ?>">
</fieldset>
</div>
</div>

<br>
<h4 class="sep"><?php echo app('translator')->get('app.payment_setting'); ?> <small style="font-size: 12px"><?php echo app('translator')->get('app.setting_desc'); ?></small></h4>
<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_pay_clinic'); ?></label>
<select name="cod" class="form-control">
<option value=""><?php echo app('translator')->get('app.s_select'); ?></option>
<option value="1" <?php if($data->cod == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.yes'); ?></option>
<option value="2" <?php if($data->cod == 2): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.no'); ?></option>
</select>
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_razor_pay'); ?></label>
<input type="text" name="razor_key" class="form-control" value="<?php echo e($data->razor_key); ?>">
</fieldset>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_stripe_api'); ?></label>
<input type="text" name="stripe_key" class="form-control" value="<?php echo e($data->stripe_key); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_stripe_sec'); ?></label>
<input type="text" name="stripe_skey" class="form-control" value="<?php echo e($data->stripe_skey); ?>">
</fieldset>
</div>

</div>

<?php if(isset($admin)): ?>
<br>
<h4 class="sep"><?php echo app('translator')->get('app.commision'); ?> <span style="font-size: 12px"><?php echo app('translator')->get('app.com_desc'); ?></span></h4>
<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.com_type'); ?></label>
<select name="com_type" class="form-control">
<option value="0" <?php if($data->com_type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.fix_amount'); ?></option>
<option value="1" <?php if($data->com_type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.in_per'); ?></option>
</select>
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.com_value'); ?></label>
<input type="text" name="com_value" class="form-control" value="<?php echo e($data->com_value); ?>">
</fieldset>
</div>
</div>
<?php endif; ?>

<br>
<h4 class="sep"><?php echo app('translator')->get('app.delivery_charges'); ?></h4>
<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.delivery_by'); ?></label>
<select name="delivery_by" class="form-control">
<option value="0" <?php if($data->delivery_by == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.by_admin'); ?></option>
<option value="1" <?php if($data->delivery_by == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.by_store'); ?></option>
</select>
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.km_fix'); ?> </label>
<input type="text" name="fix_km" class="form-control" value="<?php echo e($data->fix_km); ?>">
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.amount_fix'); ?> </label>
<input type="text" name="fix_amount" class="form-control" value="<?php echo e($data->fix_amount); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.amount_per_km'); ?> </label>
<input type="text" name="per_km" class="form-control" value="<?php echo e($data->per_km); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.max_area'); ?>  <small style="color:red"><?php echo app('translator')->get('app.max_area_desc'); ?> </small></label>
<input type="text" name="max_km" class="form-control" value="<?php echo e($data->max_km); ?>">
</fieldset>
</div>

</div>

<br>
<h4 class="sep"><?php echo app('translator')->get('app.geo'); ?></h4>
<?php echo $__env->make('store.google', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<br>
<h4 class="sep"><?php echo app('translator')->get('app.working_hr'); ?></h4>

<?php echo $__env->make('store.time', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.save'); ?></button>

<?php if(count($images)): ?>

<div class="row">

<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-2"><img src="<?php echo e(Asset('upload/store/gallery/'.$img->img)); ?>" height="60px"><br>

<?php if(isset($hasStore)): ?>

<a href="<?php echo e(Asset(env('store').'/removeImage?id='.$img->id)); ?>" onclick="return confirm('Are you sure?')" style="color:red">Remove</a>

<?php else: ?>

<a href="<?php echo e(Asset('removeImage?id='.$img->id)); ?>" onclick="return confirm('Are you sure?')" style="color:red">Remove</a>

<?php endif; ?>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php endif; ?>
</div>
</div>

<style type="text/css">
.sep
{
	color:black;
	font-size: 25px;
	font-weight: bold
}
</style><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store/form.blade.php ENDPATH**/ ?>