<?php
if(Session::has('locale') && Session::get('locale') == "ae")
{
  $dir = "rtl";
  $css = "css-rtl";
}
else
{
  $dir = "ltr";
  $css = "css";
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="<?php echo e($dir); ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title><?php echo $__env->yieldContent('title'); ?></title>
<link rel="apple-touch-icon" href="<?php echo e(Asset('app-assets/images/ico/apple-icon-120.png')); ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(Asset('app-assets/images/ico/favicon.ico')); ?>">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet') }}">

<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/vendors/css/vendors.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/vendors/css/charts/apexcharts.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/vendors/css/extensions/tether-theme-arrows.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/vendors/css/extensions/tether.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/vendors/css/extensions/shepherd-theme-default.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/vendors/css/extensions/sweetalert2.min.css')); ?>">


<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'/bootstrap.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//bootstrap-extended.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//colors.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//components.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//themes/dark-layout.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//themes/semi-dark-layout.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//core/menu/menu-types/vertical-menu.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//core/colors/palette-gradient.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//pages/dashboard-analytics.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//pages/card-analytics.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('app-assets/'.$css.'//plugins/tour/tour.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(Asset('assets/'.$css.'//style.css')); ?>">
<?php echo $__env->yieldContent('css'); ?>

</head>


<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">


<?php echo $__env->make('store_end.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('store_end.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="app-content content">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body">

<?php if(Session::has('message')): ?>
<div class="alert alert-success mt-1 alert-validation-msg" role="alert">
<i class="feather icon-check-circle mr-1 align-middle"></i>
<span><?php echo e(Session::get('message')); ?></span>
</div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
<div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
<i class="feather icon-info mr-1 align-middle"></i>
<span><?php echo e(Session::get('error')); ?></span>
</div>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

</div>
</div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script src="<?php echo e(Asset('app-assets/vendors/js/vendors.min.js')); ?>"></script>

<script src="<?php echo e(Asset('app-assets/vendors/js/ui/jquery.sticky.js')); ?>"></script>
<script src="<?php echo e(Asset('app-assets/vendors/js/charts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(Asset('app-assets/vendors/js/extensions/tether.min.js')); ?>"></script>
<script src="<?php echo e(Asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>


<script src="<?php echo e(Asset('app-assets/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(Asset('app-assets/js/core/app.js')); ?>"></script>
<script src="<?php echo e(Asset('app-assets/js/scripts/components.js')); ?>"></script>

<script src="<?php echo e(Asset('app-assets/js/scripts/pages/dashboard-analytics.js')); ?>"></script>

<?php echo $__env->yieldContent('js'); ?>

<script type="text/javascript">

function confirmAlert(url)
{
	Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "success",
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            confirmButtonClass: 'btn btn-success',
          }
        )

        window.location = url;
      }
    })
}

</script>

</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/store_end/layout/main.blade.php ENDPATH**/ ?>