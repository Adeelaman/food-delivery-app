<div class="card-content">
<div class="card-body">

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.image'); ?></label>
<input type="file" name="img" class="form-control" <?php if(!$data->id): ?> required="required" <?php endif; ?>>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6">Title</label>
<?php echo Form::text('title',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6">Description</label>
<?php echo Form::text('text',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.sort_no'); ?></label>
<?php echo Form::number('sort_no',null,['id' => 'code','class' => 'form-control']); ?>

</div>

<div class="form-group col-md-6">
<label for="inputEmail6"><?php echo app('translator')->get('app.status'); ?></label>
<select name="status" class="form-control">
<option value="0" <?php if($data->type == 0): ?> selected <?php endif; ?>>Enable</option>
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>>Disbaled</option>
</select>
</div>

</div>

<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.save'); ?></button>

</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/welcome/form.blade.php ENDPATH**/ ?>