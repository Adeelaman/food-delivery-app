
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo app('translator')->get('app.ov_order_detail'); ?></title>

</head>
<body>
<style type="text/css">
td
{
	padding:10px 10px !important;
}

@media  print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }


}

</style>

<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;

     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<br>
<a style="padding: 10px 20px;border:1px solid gray;border-radius: 10px;" onclick="printDiv('printableArea')">Print Receipt</a>

<div id="printableArea">

<?php if(Auth::guard('store')->user()->print_type == 0): ?>

<style type="text/css">
td
{
	padding:10px 10px;
}
</style>

<h1 align="center"><?php echo app('translator')->get('app.ov_order_no'); ?> #<?php echo e($data->id); ?></h1>
<table width="60%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_order_store'); ?></b></td>
<td width="60%"><?php echo e($data->store); ?></td>
</tr>

<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_user'); ?></b></td>
<td width="60%"><?php echo e($data->name); ?></td>
</tr>

<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_phone'); ?></b></td>
<td width="60%"><?php echo e($data->name); ?></td>
</tr>

<?php if($data->address): ?>
<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_address'); ?></b></td>
<td width="60%"><?php echo e($data->address); ?></td>
</tr>
<?php endif; ?>

<tr>
<td width="40%"><b>Order Type</b></td>
<td width="60%"><?php if($data->type == 1): ?> Delivery <?php else: ?> Pickup/Dinein <?php endif; ?></td>
</tr>

<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_order_date'); ?></b></td>
<td width="60%"><?php echo e(date('d-M-Y h:i:A',strtotime($data->created_at))); ?></td>
</tr>

</table>

<br><br>
<b style="margin-left: 20%;"><?php echo app('translator')->get('app.ov_order_items'); ?></b>
<br><br>
<table width="60%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr>
<td width="15%"><b><?php echo app('translator')->get('app.ov_s_no'); ?></b></td>
<td width="40%"><b><?php echo app('translator')->get('app.ov_item'); ?></b></td>
<td width="15%"><b>Price</b></td>
<td width="15%"><?php echo app('translator')->get('app.ov_qty'); ?></b></td>
<td width="15%"><b><?php echo app('translator')->get('app.ov_total'); ?></b></td>
</tr>
<?php ($i = 0); ?>
<?php ($total = []); ?>
<?php $__currentLoopData = $item->getItem($data->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($i++); ?>
<?php ($total[] = $row['price'] * $row['qty']); ?>
<tr>
<td width="15%"><?php echo e($i); ?></td>
<td width="40%"><?php echo e($row['item']); ?></td>
<td width="15%"><?php echo e($c.$row['price']); ?></td>
<td width="15%"><?php echo e($row['qty']); ?></td>
<td width="15%"><?php echo e($c.$row['price'] * $row['qty']); ?></td>
</tr>
<?php ($a = 0); ?>
<?php $__currentLoopData = $row['addon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($a++); ?>
<?php ($total[] = $addon->price * $addon->qty); ?>
<tr>
<td width="15%"><?php echo e($a); ?></td>
<td width="40%"><?php echo e($addon->addon); ?></td>
<td width="15%"><?php echo e($c.$addon->price); ?></td>
<td width="15%">1</td>
<td width="15%"><?php echo e($c.$addon->price * $addon->qty); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b><?php echo app('translator')->get('app.ov_sub_total'); ?></b></td>
<td width="15%"><?php echo e($c.array_sum($total)); ?></td>
</tr>

<?php if($data->discount > 0): ?>
<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b>Discount</b></td>
<td width="15%"><?php echo e($c.$data->discount); ?></td>
</tr>
<?php endif; ?>

<?php if($data->d_charges > 0): ?>
<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b><?php echo app('translator')->get('app.view_delivery'); ?></b></td>
<td width="15%"><?php echo e($c.$data->d_charges); ?></td>
</tr>
<?php endif; ?>

<?php if($data->d_charges > 0): ?>
<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b><?php echo app('translator')->get('app.ov_delivery_charges'); ?></b></td>
<td width="15%"><?php echo e($c.$data->d_charges); ?></td>
</tr>
<?php endif; ?>

<?php if($data->tip > 0): ?>
<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b>Tip For Rider</b></td>
<td width="15%"><?php echo e($c.$data->tip); ?></td>
</tr>
<?php endif; ?>

<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b><?php echo app('translator')->get('app.ov_grand_total'); ?></b></td>
<td width="15%"><?php echo e($c.$data->total); ?></td>
</tr>

<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b>Payment Method</b></td>
<td width="15%">

<?php if($data->payment_method == 1): ?>

Cash on Delivery

<?php elseif($data->payment_method == 2 || $data->payment_method == 3): ?>

Online Paid

<?php endif; ?>

<?php if($data->total == $data->ecash): ?>
Paid with eCash
<?php elseif($data->ecash > 0): ?>
<p>eCash Paid <?php echo e($data->ecash); ?></p>
<p>Payable Balance <?php echo e(($data->total - $data->ecash) + $data->tip); ?></p>
<?php endif; ?>

</td>
</tr>

</table>

<?php else: ?>

<!--For thermal printer-->
<table width="272px" border="1" cellspacing="0" cellpadding="0">

<tr>
<td>
<table width="100%" cellpadding="2" cellspacing="2" align="center" style="font-size: 12px">
<tr>
<td width="40%"><b>Order ID</b></td>
<td width="60%"><?php echo e($data->id); ?></td>
</tr>

<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_order_store'); ?></b></td>
<td width="60%"><?php echo e($data->store); ?></td>
</tr>

<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_user'); ?></b></td>
<td width="60%"><?php echo e($data->name); ?></td>
</tr>

<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_phone'); ?></b></td>
<td width="60%"><?php echo e($data->name); ?></td>
</tr>

<?php if($data->address): ?>
<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_address'); ?></b></td>
<td width="60%"><?php echo e($data->address); ?></td>
</tr>
<?php endif; ?>

<tr>
<td width="40%"><b>Order Type</b></td>
<td width="60%"><?php if($data->type == 1): ?> Delivery <?php else: ?> Pickup/Dinein <?php endif; ?></td>
</tr>

<tr>
<td width="40%"><b><?php echo app('translator')->get('app.ov_order_date'); ?></b></td>
<td width="60%"><?php echo e(date('d-M-Y h:i:A',strtotime($data->created_at))); ?></td>
</tr>

</table>

<hr>

<table width="100%" cellpadding="2" cellspacing="2" style="font-size: 12px">
<tr>
<td width="15%"><b><?php echo app('translator')->get('app.ov_s_no'); ?></b></td>
<td width="40%"><b><?php echo app('translator')->get('app.ov_item'); ?></b></td>
<td width="15%"><?php echo app('translator')->get('app.ov_qty'); ?></b></td>
<td width="15%"><b>Price</b></td>

</tr>
<?php ($i = 0); ?>
<?php ($total = []); ?>
<?php $__currentLoopData = $item->getItem($data->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($i++); ?>
<?php ($total[] = $row['price'] * $row['qty']); ?>
<tr>
<td width="10%"><?php echo e($i); ?></td>
<td width="60%"><?php echo e($row['item']); ?></td>
<td width="15%"><?php echo e($row['qty']); ?></td>
<td width="15%"><?php echo e($c.$row['price']); ?></td>

</tr>
<?php ($a = 0); ?>
<?php $__currentLoopData = $row['addon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($a++); ?>
<?php ($total[] = $addon->price * $addon->qty); ?>
<tr>
<td width="10%"><?php echo e($a); ?></td>
<td width="60%"><?php echo e($addon->addon); ?></td>
<td width="15%"><?php echo e($addon->qty); ?></td>
<td width="15%"><?php echo e($c.$addon->price); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<tr>
<td width="10%">&nbsp;</td>
<td width="60%">&nbsp;</td>
<td width="15%"><b><?php echo app('translator')->get('app.ov_sub_total'); ?></b></td>
<td width="15%"><?php echo e($c.array_sum($total)); ?></td>
</tr>

<?php if($data->discount > 0): ?>
<tr>
<td width="10%">&nbsp;</td>
<td width="60%">&nbsp;</td>
<td width="15%"><b>Discount</b></td>
<td width="15%"><?php echo e($c.$data->discount); ?></td>
</tr>
<?php endif; ?>

<?php if($data->d_charges > 0): ?>
<tr>
<td width="10%">&nbsp;</td>
<td width="60%">&nbsp;</td>
<td width="15%"><b><?php echo app('translator')->get('app.ov_delivery_charges'); ?></b></td>
<td width="15%"><?php echo e($c.$data->d_charges); ?></td>
</tr>
<?php endif; ?>

<?php if($data->tip > 0): ?>
<tr>
<td width="15%">&nbsp;</td>
<td width="40%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="15%"><b>Tip For Rider</b></td>
<td width="15%"><?php echo e($c.$data->tip); ?></td>
</tr>
<?php endif; ?>

<tr>
<td width="10%">&nbsp;</td>
<td width="60%">&nbsp;</td>
<td width="15%"><b><?php echo app('translator')->get('app.ov_grand_total'); ?></b></td>
<td width="15%"><?php echo e($c.$data->total); ?></td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="60%">&nbsp;</td>
<td width="15%"><b>Payment Method</b></td>
<td width="15%">

<?php if($data->payment_method == 1): ?>

Cash on Delivery

<?php elseif($data->payment_method == 2 || $data->payment_method == 3): ?>

Online Paid

<?php endif; ?>

<?php if($data->total == $data->ecash): ?>
Paid with eCash
<?php elseif($data->ecash > 0): ?>
<p>eCash Paid <?php echo e($data->ecash); ?></p>
<p>Payable Balance <?php echo e(($data->total - $data->ecash) + $data->tip); ?></p>

<?php endif; ?>

</td>
</tr>

</table>

</td>
</tr>

</table>

<?php endif; ?>
</div>
</body><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/order/view.blade.php ENDPATH**/ ?>