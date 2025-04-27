<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.setting'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<form action="<?php echo e($form_url); ?>" method="post">

<div class="card">
<div class="card-content">
<div class="card-body">

<h4 class="card-title"><?php echo app('translator')->get('app.setting'); ?></h4>

<?php echo e(csrf_field()); ?>


<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_name'); ?></label>
<input type="text" class="form-control" id="basicInput" value="<?php echo e($data->name); ?>" required="required" name="name">
</fieldset>
</div>
<div class="col-xl-6">
<fieldset class="form-group">
<label for="helpInputTop"><?php echo app('translator')->get('app.s_email'); ?></label>
<input type="email" class="form-control" id="helpInputTop" value="<?php echo e($data->email); ?>" required="required" name="email">
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="disabledInput">Phone Number</label>
<input type="number" class="form-control" required="required" value="<?php echo e($data->phone); ?>" name="phone">
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="disabledInput">Whatsapp Number</label>
<input type="number" class="form-control" value="<?php echo e($data->whatsapp); ?>" name="whatsapp">
</fieldset>
</div>
<div class="col-xl-6">
<fieldset class="form-group">
<label for="disabledInput"><?php echo app('translator')->get('app.s_username'); ?></label>
<input type="text" class="form-control" required="required" value="<?php echo e($data->username); ?>" name="username">
</fieldset>
</div>
</div>
</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">

<h4 class="card-title"><?php echo app('translator')->get('app.s_app_setting'); ?></h4>

<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_app_lang'); ?></label>
<select name="lang" class="form-control">
<option value=""><?php echo app('translator')->get('app.s_select'); ?></option>
<option value="0" <?php if($data->lang == 0): ?> selected <?php endif; ?>>English</option>
<?php $__currentLoopData = $lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($l->id); ?>" <?php if($data->lang == $l->id): ?> selected <?php endif; ?>><?php echo e($l->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_currency'); ?></label>
<input type="text" name="currency" class="form-control" value="<?php echo e($data->currency); ?>">
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_currency_code'); ?></label>
<input type="text" name="currency_code" class="form-control" value="<?php echo e($data->currency_code); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.web_app_url'); ?></label>
<input type="text" name="web_app" class="form-control" value="<?php echo e($data->web_app); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.refral'); ?></label>
<input type="text" name="point_who" class="form-control" value="<?php echo e($data->point_who); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.ref_point'); ?></label>
<input type="text" name="point_use" class="form-control" value="<?php echo e($data->point_use); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput">Terms & Condition URL</label>
<input type="text" name="term" class="form-control" value="<?php echo e($data->term); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput">Signup Verify Type</label>
<select name="verify_type" class="form-control">
<option value="0" <?php if($data->verify_type == 0): ?> selected <?php endif; ?>>None</option>
<option value="1" <?php if($data->verify_type == 1): ?> selected <?php endif; ?>>With Twilio SMS</option>
<option value="2" <?php if($data->verify_type == 2): ?> selected <?php endif; ?>>Other SMS API</option>
<option value="3" <?php if($data->verify_type == 3): ?> selected <?php endif; ?>>With Email</option>
</select>
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput">Tip Amount (Coma Seprated,) <span style="color:red;margin-left: 20px">Leave empty if you dont to use</span></label>
<input type="text" name="tip_amount" class="form-control" value="<?php echo e($data->tip_amount); ?>" placeholder="5,10,15">
</fieldset>
</div>

<div class="col-xl-12">
<fieldset class="form-group">
<label for="basicInput">Other SMS API <span style="color:red;margin-left: 20px">Replace Number field with {num} and message field with {msg} any other field if need {other}</span></label>
<input type="text" name="sms_api" class="form-control" value="<?php echo e($data->sms_api); ?>" placeholder="https://www.smsapi.com?num={num}&msg={msg}&username=test&password=123">
</fieldset>
</div>

<div class="col-xl-12">
<fieldset class="form-group">
<label for="basicInput">Bank Transfer Detail</label>
<textarea name="bank_transfer" class="form-control"><?php echo $data->bank_transfer; ?></textarea>
</fieldset>
</div>
</div>

</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">

<h4 class="card-title"><?php echo app('translator')->get('app.s_payment_api'); ?> <small style="font-size: 12px;float: right"><?php echo app('translator')->get('app.s_api_msg'); ?></small></h4>

<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_pay_clinic'); ?></label>
<select name="cod" class="form-control">
<option value=""><?php echo app('translator')->get('app.s_select'); ?></option>
<option value="0" <?php if($data->cod == 0): ?> selected <?php endif; ?>>Yes</option>
<option value="1" <?php if($data->cod == 1): ?> selected <?php endif; ?>>No</option>
</select>
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_razor_pay'); ?></label>
<input type="text" name="razor_key" class="form-control" value="<?php echo e($data->razor_key); ?>">
</fieldset>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_stripe_api'); ?></label>
<input type="text" name="stripe_key" class="form-control" value="<?php echo e($data->stripe_key); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_stripe_sec'); ?></label>
<input type="text" name="stripe_skey" class="form-control" value="<?php echo e($data->stripe_skey); ?>">
</fieldset>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput">Paypal ID</label>
<input type="text" name="paypal_id" class="form-control" value="<?php echo e($data->paypal_id); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput">PayStack ID</label>
<input type="text" name="paystack_id" class="form-control" value="<?php echo e($data->paystack_id); ?>">
</fieldset>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput">FlutterWave Public Key</label>
<input type="text" name="fw_key" class="form-control" value="<?php echo e($data->fw_key); ?>">
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="basicInput">FlutterWave Counsumer id</label>
<input type="text" name="fw_ci" class="form-control" value="<?php echo e($data->fw_ci); ?>">
</fieldset>
</div>

<div class="col-xl-3">
<fieldset class="form-group">
<label for="basicInput">FlutterWave Mac</label>
<input type="text" name="fw_mac" class="form-control" value="<?php echo e($data->fw_mac); ?>">
</fieldset>
</div>
</div>

</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">

<h4 class="card-title"><?php echo app('translator')->get('app.s_push_api'); ?> <small style="font-size: 12px;float: right"><?php echo app('translator')->get('app.s_push_get'); ?> <a href="https://onesignal.com/" target="_blank">from here</a></small></h4>

<b><?php echo app('translator')->get('app.user_app'); ?></b>

<div class="row">
<div class="col-xl-4">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_app_api'); ?></label>
<input type="text" name="push_app_id" class="form-control" value="<?php echo e($data->push_app_id); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_rest_api'); ?></label>
<input type="text" name="push_rest_api" class="form-control" value="<?php echo e($data->push_rest_api); ?>">
</fieldset>
</div>

<div class="col-xl-2">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_google_api'); ?></label>
<input type="text" name="push_google" class="form-control" value="<?php echo e($data->push_google); ?>">
</fieldset>
</div>
</div>

<b><?php echo app('translator')->get('app.delivery_app'); ?></b>

<div class="row">
<div class="col-xl-4">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_app_api'); ?></label>
<input type="text" name="d_push_app_id" class="form-control" value="<?php echo e($data->d_push_app_id); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_rest_api'); ?></label>
<input type="text" name="d_push_rest_api" class="form-control" value="<?php echo e($data->d_push_rest_api); ?>">
</fieldset>
</div>

<div class="col-xl-2">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_google_api'); ?></label>
<input type="text" name="d_push_google" class="form-control" value="<?php echo e($data->d_push_google); ?>">
</fieldset>
</div>
</div>

<b><?php echo app('translator')->get('app.store_app'); ?></b>

<div class="row">
<div class="col-xl-4">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_app_api'); ?></label>
<input type="text" name="s_push_app_id" class="form-control" value="<?php echo e($data->s_push_app_id); ?>">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_rest_api'); ?></label>
<input type="text" name="s_push_rest_api" class="form-control" value="<?php echo e($data->s_push_rest_api); ?>">
</fieldset>
</div>

<div class="col-xl-2">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_push_google_api'); ?></label>
<input type="text" name="s_push_google" class="form-control" value="<?php echo e($data->s_push_google); ?>">
</fieldset>
</div>
</div>

</div>
</div>
</div>

<div class="card">
<div class="card-content">
<div class="card-body">

<h4 class="card-title"><?php echo app('translator')->get('app.s_choose_password'); ?></h4>


<div class="row">
<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_current_password'); ?> <small>(<?php echo app('translator')->get('app.s_save_msg'); ?>)</small></label>
<input type="password" class="form-control" required="required" name="password">
</fieldset>
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput"><?php echo app('translator')->get('app.s_change_password'); ?> <small>(<?php echo app('translator')->get('app.s_change_pass_msg'); ?>)</small></label>
<input type="password" class="form-control" name="new_password">
</fieldset>
</div>
</div>

<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo app('translator')->get('app.s_save'); ?></button>
</div>
</div>
</div>
</form>

</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/dashboard/setting.blade.php ENDPATH**/ ?>