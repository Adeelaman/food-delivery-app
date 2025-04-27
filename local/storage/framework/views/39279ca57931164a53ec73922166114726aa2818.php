<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.add_new'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title"><?php echo app('translator')->get('app.add_new'); ?></h4>
</div>

<?php echo Form::model($data, ['url' => [$form_url],'files' => true]); ?>


<?php echo $__env->make('store.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>
</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/vendors/css/forms/select/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(Asset('app-assets/vendors/js/forms/select/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(Asset('app-assets/js/scripts/forms/select/form-select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store/add.blade.php ENDPATH**/ ?>