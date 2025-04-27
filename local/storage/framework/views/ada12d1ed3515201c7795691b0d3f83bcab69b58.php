<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.page_text'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<section id="basic-input">
<div class="row">
<div class="col-md-12">
<form action="<?php echo e($form_url); ?>" method="post" enctype="multipart/form-data">

<?php echo csrf_field(); ?>


<div class="card-content">
<div class="card-body">

<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="tab-content">
<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-pane" id="tabs_<?php echo e($l->id); ?>" aria-labelledby="home-tab" role="tabpanel">

<input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">

<div class="card">
<div class="card-content">
<div class="card-body">

<div class="form-row">
<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.about_us'); ?> <small>(<?php echo app('translator')->get('app.html'); ?>)</small></label>
<textarea name="l_about_us[]" class="form-control"><?php echo e($data->getSData($data->s_data,$l->id,0)); ?></textarea>
</div>
</div>
</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">
<div class="form-row">
<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.contact_us'); ?> <small>(<?php echo app('translator')->get('app.html'); ?>)</small></label>
<textarea name="l_contact_us[]" class="form-control"><?php echo e($data->getSData($data->s_data,$l->id,1)); ?></textarea>
</div>
</div>
</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">
<div class="form-row">
<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.faq'); ?> <small>(<?php echo app('translator')->get('app.html'); ?>)</small></label>
<textarea name="l_faq[]" class="form-control"><?php echo e($data->getSData($data->s_data,$l->id,2)); ?></textarea>
</div>
</div>
</div>
</div>
</div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane active" id="tabs_0" aria-labelledby="home-tab" role="tabpanel">

<div class="card">
<div class="card-content">
<div class="card-body">

<h4><?php echo app('translator')->get('app.about_us'); ?></h4>

<div class="form-row">
<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.about_us'); ?> <small>(<?php echo app('translator')->get('app.html'); ?>)</small></label>
<textarea name="about_us" class="form-control"><?php echo e($data->about_us); ?></textarea>
</div>
</div>


</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">

<div class="form-row">
<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.contact_us'); ?> <small>(<?php echo app('translator')->get('app.html'); ?>)</small></label>
<textarea name="contact_us" class="form-control"><?php echo e($data->contact_us); ?></textarea>
</div>
</div>
</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">

<div class="form-row">
<div class="form-group col-md-12">
<label for="inputEmail6"><?php echo app('translator')->get('app.faq'); ?> <small>(<?php echo app('translator')->get('app.html'); ?>)</small></label>
<textarea name="faq" class="form-control"><?php echo e($data->faq); ?></textarea>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.save'); ?></button>


</div>
</div>

</form>

</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/page/index.blade.php ENDPATH**/ ?>