<style type="text/css">

.c
{
  margin-top: 20px;
}  

</style>

<div class="row">
<div class="col-md-12">
<select name="cate_id[]" class="form-control select2" onchange="filterData(this.value,<?php echo e($all); ?>)">
<option value=""><?php echo app('translator')->get('app.search_item'); ?></option>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($it['id']); ?>"><?php echo e($it['name']); ?> - <?php echo e($c.$it['price']); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>
<br>
<div>

<a href="javascript::void()" onClick="filterData(0,<?php echo e($all); ?>,0)">
<div class="chip chip-primary mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.all_item'); ?></span>
</div>
</div>
</a>

<?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<a href="javascript::void()" onClick="filterData(0,<?php echo e($all); ?>,<?php echo e($ct['id']); ?>)">
<div class="chip chip-success mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo e($ct['name']); ?></span>
</div>
</div>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row" style="height: 500px;overflow-y: scroll;">

<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-2 c" id="item_id_<?php echo e($item['id']); ?>">
<img src="<?php echo e($item['img']); ?>" width="100%">

<span style="display: block;margin-top: 10px;font-size: 14px"><?php echo e($item['name']); ?></span>

<?php if($item['count'] == 1): ?>

<div class="row" style="margin-top: 5px;font-size: 14px">
<div class="col-md-6"><?php echo e($c.$item['price']); ?></div>
<div class="col-md-6">
<?php if($item['stock']): ?>
<a href="javascript::void()" onClick="addItem(<?php echo e(json_encode($item)); ?>,<?php echo e($item['price']); ?>,0)">
<div class="chip chip-primary mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.add'); ?></span>
</div>
</div>
</a>
<?php else: ?>
<small style="color:red;font-size: 10px">Out of stock</small>
<?php endif; ?>
</div>
</div>

 
<?php elseif($item['count'] > 1): ?>

<div class="row" style="margin-top: 5px;font-size: 14px">
<div class="col-md-6"><?php echo e($c.$item['price']); ?></div>
<div class="col-md-6">
<?php if($item['stock']): ?>
<a data-toggle="modal" data-placement="top" href="javascript::void()" data-target="#addon<?php echo e($item['id']); ?>">
<div class="chip chip-primary mr-1">
<div class="chip-body">
<span class="chip-text"><?php echo app('translator')->get('app.add'); ?></span>
</div>
</div>
</a>
<?php else: ?>
<small style="color:red;font-size: 10px">Out of stock</small>
<?php endif; ?>
</div>
</div>

<?php endif; ?>

</div>

<?php echo $__env->make('store_end.order.addon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</div>
<script type="text/javascript">

function filterData(item_id,all,cate_id = 0)
{
  for(var i =0;i<all.length;i++)
  {           
    if(item_id > 0 && cate_id == 0 || item_id == 0 && cate_id > 0)
    {
      var tr      = document.getElementById("item_id_"+all[i].id); 
      var att     = document.createAttribute("style");
      att.value   = "display:none";
      tr.setAttributeNode(att);
    }
    else
    {
      var trial  = document.getElementById("item_id_"+all[i].id); 
      trial.removeAttribute("style");
    }
  }

   if(item_id > 0 && cate_id == 0)
   {
     var trial  = document.getElementById("item_id_"+item_id); 
     trial.removeAttribute("style");
   }
   else if(cate_id > 0 && item_id == 0)
   {      
     for(var i = 0;i<all.length;i++)
     {
       if(all[i].cate_id == cate_id)
       {
         var trial  = document.getElementById("item_id_"+all[i].id); 
         trial.removeAttribute("style");
       }
     }
   }
}

function showAll(all)
{
  for(var i =0;i<all.length;i++)
  {           
    var trial  = document.getElementById("item_id_"+all[i].id); 
    trial.removeAttribute("style");
  }

  var show      = document.getElementById("show"); 
  var att     = document.createAttribute("style");
  att.value   = "display:none";
  show.setAttributeNode(att);
}

</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store_end/order/item.blade.php ENDPATH**/ ?>