<a class="btn btn-icon btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.order_vdetail'); ?>" href="<?php echo e(Asset('orderView?id='.$row->id)); ?>" target="_blank"><i class="fa fa-eye"></i></a>


<?php if($row->status == 0): ?>

<a class="btn btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.confirm_order'); ?>" href="<?php echo e(Asset('orderStatus?status=1&id='.$row->id)); ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-check"></i></a>

<a class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.cancel_order'); ?>" href="<?php echo e(Asset('orderStatus?status=2&id='.$row->id)); ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-times"></i></a>

<?php elseif($row->status == 1): ?>

<?php if($row->delivery_by == 0 && $row->type == 1): ?>
<a class="btn btn-icon btn-dark mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-placement="top" data-original-title="Add Addons" href="javascript::void()" data-target="#assign<?php echo e($row->id); ?>"><i class="fa fa-link"></i></a>

<?php echo $__env->make('order.assign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

<?php elseif($row->status == 3 || $row->status == 4 || $row->type != 1): ?>

<a class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo app('translator')->get('app.complete_order'); ?>" href="<?php echo e(Asset('orderStatus?status=5&id='.$row->id)); ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-check"></i></a>

<?php endif; ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/order/button.blade.php ENDPATH**/ ?>