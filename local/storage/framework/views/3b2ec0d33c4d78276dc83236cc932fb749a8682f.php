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
<?php echo Form::text('l_name[]',$data->getSData($data->s_data,$l->id,0),['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.desc'); ?></label>
<?php echo Form::text('l_desc[]',$data->getSData($data->s_data,$l->id,1),['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.feat'); ?></label>
<?php echo Form::text('l_feat[]',$data->getSData($data->s_data,$l->id,2),['id' => 'code','class' => 'form-control']); ?>

</div>

</div>


</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane active" id="tabs_0" aria-labelledby="home-tab" role="tabpanel">
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.name'); ?></label>
<?php echo Form::text('name',null,['id' => 'code','class' => 'form-control','required']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.desc'); ?></label>
<?php echo Form::text('description',null,['id' => 'code','class' => 'form-control','required']); ?>

</div>

<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.feat'); ?></label>
<?php echo Form::text('feat',null,['id' => 'code','class' => 'form-control','required']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.plan_price'); ?></label>
<?php echo Form::text('price',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-3">
<label for="inputEmail6"><?php echo app('translator')->get('app.plan_item'); ?></label>
<?php echo Form::text('item_limit',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="basicInput">POS</label>
<select name="pos" class="form-control" required="required">
<option value="0" <?php if($data->pos == 0): ?> selected <?php endif; ?>>Yes</option>
<option value="1" <?php if($data->pos == 1): ?> selected <?php endif; ?>>No</option>
</select>
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.plan_time_type'); ?></label>
<select name="valid_type" class="form-control" required="required">
<option value="0" <?php if($data->valid_type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.days'); ?></option>
<option value="1" <?php if($data->valid_type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.month'); ?></option>
<option value="2" <?php if($data->valid_type == 2): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.year'); ?></option>
</select>
</fieldset>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"> <?php echo app('translator')->get('app.plan_time_value'); ?></label>
<?php echo Form::text('valid_value',null,['id' => 'code','class' => 'form-control','required' => 'required']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.sort_no'); ?></label>
<?php echo Form::number('sort_no',null,['id' => 'code','class' => 'form-control']); ?>

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
</div>
</div>
</div>
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.save'); ?></button>


</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/plan/form.blade.php ENDPATH**/ ?>