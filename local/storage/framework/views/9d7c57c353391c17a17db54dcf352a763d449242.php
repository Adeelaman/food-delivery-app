<?php $__env->startSection('title'); ?> App Text <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">App Text</h4>
</div>

<?php echo Form::open(['url' => [Asset('text')],'files' => true]); ?>


<?php echo $__env->make('text.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>
</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/text/index.blade.php ENDPATH**/ ?>