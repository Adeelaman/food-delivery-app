<table class="table mb-0">
<thead >
<tr>
<th><?php echo app('translator')->get('app.order_id'); ?></th>
<th><?php echo app('translator')->get('app.order_store'); ?></th>
<th><?php echo app('translator')->get('app.order_user'); ?></th>
<th><?php echo app('translator')->get('app.order_phone'); ?></th>
<th><?php echo app('translator')->get('app.order_address'); ?></th>
<th><?php echo app('translator')->get('app.order_tamount'); ?></th>
<th class="text-right"><?php echo app('translator')->get('app.option'); ?></th>
</tr>
</thead>
<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="10%"><?php echo e($row->id); ?></td>

<td width="15%"><a href="<?php echo e(Asset('getReport?id='.$row->store_id)); ?>" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="View all orders from <?php echo e($row->store); ?>"><?php echo e($row->store); ?></a>

<br>
<?php if($row->status == 0): ?>

<small style="color:blue"><?php echo app('translator')->get('app.new_order'); ?></small>

<?php elseif($row->status == 1): ?>

<small style="color:green"><?php echo app('translator')->get('app.order_confirm'); ?></small>

<?php elseif($row->status == 2): ?>

<small style="color:red"><?php echo app('translator')->get('app.order_cancel'); ?></small>

<?php elseif($row->status == 3): ?>

<small style="color:red"><?php echo app('translator')->get('app.delivery_assign'); ?></small>

<?php elseif($row->status == 4): ?>

<small style="color:blue"><?php echo app('translator')->get('app.on_the_way'); ?></small>

<?php elseif($row->status == 5): ?>

<small style="color:red"><?php echo app('translator')->get('app.completed'); ?></small>

<?php endif; ?>

</td>
<td width="12%"><?php echo e($row->name); ?></td>
<td width="12%"><?php echo e($row->phone); ?></td>
<td width="23%"><?php echo e($row->address); ?>


<br><small style="color:green"><?php echo e(date('d-M-Y h:i:A',strtotime($row->created_at))); ?></small>

<?php if($row->odate == 2): ?>

<br><small style="color:red"><?php echo app('translator')->get('app.delivery_date'); ?> : <?php echo e(date('d-M-Y',strtotime($row->order_date))); ?> | <?php echo e($row->order_time); ?></small>

<?php endif; ?>

</td>
<td width="10%"><?php echo e($c); ?><?php echo e($row->total); ?></td>

<td width="20%" class="text-right">
<?php echo $__env->make('order.button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/order/table.blade.php ENDPATH**/ ?>