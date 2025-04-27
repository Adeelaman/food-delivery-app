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


<?php echo $__env->make('store_end.item.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>
</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_end.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store_end/item/add.blade.php ENDPATH**/ ?>