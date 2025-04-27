<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.edit_form'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title"><?php echo app('translator')->get('app.edit_form'); ?></h4>
</div>

<?php echo Form::model($data, ['url' => [$form_url],'files' => true,'method' => 'PATCH']); ?>


<?php echo $__env->make('slider.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>

</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/slider/edit.blade.php ENDPATH**/ ?>