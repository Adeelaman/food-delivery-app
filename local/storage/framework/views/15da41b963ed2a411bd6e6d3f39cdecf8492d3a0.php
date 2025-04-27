<div class="card-content">
<div class="card-body">

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.image'); ?></label>
<input type="file" name="img" class="form-control" <?php if(!$data->id): ?> required="required" <?php endif; ?>>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.sort_no'); ?></label>
<?php echo Form::number('sort_no',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.link_to'); ?></label>
<select name="link_to" class="form-control">
<option value="0" <?php if($data->link_to == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.none'); ?></option>
<option value="1" <?php if($data->link_to == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.store'); ?></option>
<option value="2" <?php if($data->link_to == 2): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.category'); ?></option>
<option value="3" <?php if($data->link_to == 3): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.custom'); ?></option>
</select>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.link_id'); ?> <small style="float: right;color:red"> &nbsp;<?php echo app('translator')->get('app.link_desc'); ?></small></label>
<?php echo Form::number('link_id',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.banner_type'); ?></label>
<select name="type" class="form-control">
<option value="0" <?php if($data->type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.slider'); ?></option>
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.Static'); ?></option>
</select>
</div>

</div>

<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.save'); ?></button>

</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/slider/form.blade.php ENDPATH**/ ?>