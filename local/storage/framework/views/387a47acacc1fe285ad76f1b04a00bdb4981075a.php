<div class="row">
<div class="col-md-9">

<div class="card">
<div class="card-content">
<div class="card-body">
<h4 class="card-title"><?php echo app('translator')->get('app.select_item'); ?>

<a href="<?php echo e(Asset(env('store').'/home')); ?>" style="float: right;font-size: 16px"><i class="fa fa-undo"></i> <?php echo app('translator')->get('app.go_back'); ?></a>

</h4>

<?php echo $__env->make('store_end.order.item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</div>
</div>
</div>

<div class="col-md-3">

<div class="card">
<div class="card-content">
<div class="card-body">
<h4 class="card-title"><?php echo app('translator')->get('app.selected_item'); ?></h4>

<?php if(isset($edit)): ?>
<?php ($item_total = []); ?>
<?php $__currentLoopData = $edit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($item_total[] = $row['price'] * $row['qty']); ?>
<input type="hidden" name="item_id[]" value="<?php echo e($row['id']); ?>">
<input type="hidden" name="qty_type[]" value="<?php echo e($row['qty_type']); ?>">

<div class="row cartClass" id="cart_<?php echo e($row['id']); ?>">

<div class="col-md-6"><?php echo e($row['item']); ?></div>
<div class="col-md-2"><input type="text" name="qty[]" value="<?php echo e($row['qty']); ?>" class='cartInput' onKeyup='calTotal()'></div>
<div class='col-md-2'><input type='text' name='price[]' value="<?php echo e($row['price']); ?>" class='cartInput' onKeyup='calTotal()'></div>
<div class='col-md-2'><a href='javascript::void()' onClick="removeItem(cart_<?php echo e($row['id']); ?>)" class='cartRemove'><i class='fa fa-times'></i></a></div>
</div>

<?php $__currentLoopData = $row['addon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<input type="hidden" name="addon_id_<?php echo e($addon->addon_id); ?>[]" value="<?php echo e($row['id']); ?>">

<div class="row cartClass" id="cart_<?php echo e($addon->addon_id); ?>">

<div class="col-md-6"><?php echo e($addon->addon); ?></div>
<div class="col-md-2"><input type="text" name="qty[]" value="<?php echo e($addon->qty); ?>" class='cartInput' onKeyup='calTotal()'></div>
<div class='col-md-2'><input type='text' name='price[]' value="<?php echo e($addon->price); ?>" class='cartInput' onKeyup='calTotal()'></div>
<div class='col-md-2'><a href='javascript::void()' onClick="removeItem(cart_<?php echo e($addon->addon_id); ?>)" class='cartRemove'><i class='fa fa-times'></i></a></div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<div id="myList" style="font-size: 12px">

</div>

<div class="row" style="margin-bottom: 10px">
<div class="col-md-8"><b><?php echo app('translator')->get('app.total_amount'); ?></b></div>
<?php if(isset($edit)): ?>
<div class="col-md-4" id="total" style="font-size: 14px;"><?php echo e($c.array_sum($item_total)); ?></div>
<?php else: ?>
<div class="col-md-4" id="total" style="font-size: 14px;"></div>
<?php endif; ?>
</div>

</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">

<h4 class="card-title"><?php echo app('translator')->get('app.cust_detail'); ?></h4>
<br>

<div class="row" style="margin-bottom: 10px">
<div class="col-md-12"><input type="text" name="name" class="form-control" required="required" placeholder="Name" value="<?php echo e($data->name); ?>"></div>
</div>

<div class="row" style="margin-bottom: 10px">
<div class="col-md-12"><input type="text" name="phone" class="form-control" required="required" placeholder="Phone" value="<?php echo e($data->phone); ?>"></div>
</div>

<div class="row" style="margin-bottom: 10px">
<div class="col-md-12">
<select name="otype" class="form-control" onchange="showField(this.value)">
<option value="2" <?php if($data->type == 2): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.pickup_dinein'); ?></option>
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.delivery'); ?></option>
</select>
</div>
</div>

<div class="row" <?php if(!isset($edit)): ?> style="margin-bottom: 20px;display: none" <?php endif; ?> id="address">
<div class="col-md-12"><input type="text" name="address" class="form-control" placeholder="<?php echo app('translator')->get('app.d_address'); ?>" value="<?php echo e($data->address); ?>"></div>
</div>

<div class="row" style="margin-bottom: 10px">
<div class="col-md-12"><input type="text" name="notes" class="form-control" placeholder="<?php echo app('translator')->get('app.onotes'); ?>" value="<?php echo e($data->notes); ?>"></div>
</div>

<div class="row" style="margin-bottom: 10px;margin-top: 20px">
<div class="col-md-8"><b><?php echo app('translator')->get('app.odiscount'); ?></b></div>
<div class="col-md-4"><input type="number" id="discount" name="discount" class="form-control" onkeyup="calTotal()" value="<?php echo e($data->discount); ?>"></div>
</div>

<div class="row" <?php if(!isset($edit)): ?> style="display: none" <?php endif; ?> id="delivery">
<div class="col-md-8"><b><?php echo app('translator')->get('app.d_charges'); ?></b></div>
<div class="col-md-4"><input type="number" id="d_charges" name="d_charges" class="form-control" onkeyup="calTotal()" value="<?php echo e($data->d_charges); ?>"></div>
</div>

<div class="row" style="margin-bottom: 10px;margin-top: 20px">
<div class="col-md-8"><b><?php echo app('translator')->get('app.gtotal'); ?></b></div>
<?php if(isset($edit)): ?>
<div class="col-md-4" id="grand" style="font-size: 18px;font-weight: bold"><?php echo e($c.$data->total); ?></div>

<?php else: ?>
<div class="col-md-4" id="grand" style="font-size: 18px;font-weight: bold"></div>
<?php endif; ?>
</div>

<input type="hidden" name="total_amount" id="total_amount" <?php if(isset($edit)): ?> value="<?php echo e($data->total); ?>" <?php endif; ?>>

<div class="row" style="margin-bottom: 10px;margin-top: 20px">
<div class="col-md-8"><button type="submit" class="btn btn-success"><?php echo app('translator')->get('app.add_order'); ?></button></div>
</div>

</div>
</div>
</div>


</div>
</div>

<?php echo $__env->make('store_end.order.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store_end/order/form.blade.php ENDPATH**/ ?>