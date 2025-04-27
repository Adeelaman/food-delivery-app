<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="tab_0" data-toggle="tab" href="#tabs_0" aria-controls="home" role="tab" aria-selected="true"><img src="<?php echo e(Asset('upload/language/en.png')); ?>" style="width: 25px"> English</a>
</li>

<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="nav-item">
<a class="nav-link" id="tab_<?php echo e($l->id); ?>" data-toggle="tab" href="#tabs_<?php echo e($l->id); ?>" aria-controls="home" role="tab" aria-selected="true"><img src="<?php echo e(Asset('upload/language/'.$l->icon)); ?>" style="width: 25px"> <?php echo e($l->name); ?></a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<br><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/language/header.blade.php ENDPATH**/ ?>