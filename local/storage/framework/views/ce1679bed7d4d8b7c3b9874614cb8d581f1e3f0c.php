<?php echo $__env->make('store_end.layout.pos_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section id="basic-input" style="padding: 10px 10px">
<div class="row">
<div class="col-md-12">

<?php echo Form::open(['url' => [Asset(env('store').'/order/add')],'method' => 'POST']); ?>


<?php echo $__env->make('store_end.order.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>
</div>
</div>
</section>

<?php echo $__env->make('store_end.layout.pos_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store_end/order/test.blade.php ENDPATH**/ ?>