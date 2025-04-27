<?php ($page = Request::segment(2)); ?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
<div class="navbar-header">
<ul class="nav navbar-nav flex-row">
<li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo e(Asset(env('store').'/home')); ?>">
<h2 class="brand-text mb-0" style="color:white"><i class="fa fa-clock-o"></i> <span id="shwTime"></span></h2>
</a></li>

<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    document.getElementById("shwTime").innerHTML = d.toLocaleTimeString();
}
</script>

</ul>
</div>
<div class="shadow-bottom"></div>
<div class="main-menu-content">
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<li class="<?php if($page == 'home' || $page == 'setting'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('home')); ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard"><?php echo app('translator')->get('app.dashboard'); ?></span></a>
<ul class="menu-content">
<li><a href="<?php echo e(Asset(env('store').'/home')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.home'); ?></span></a>
</li>
<li><a href="<?php echo e(Asset(env('store').'/setting')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce"><?php echo app('translator')->get('app.setting'); ?></span></a>
</li>
</ul>
</li>

<li class="<?php if($page == 'category'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/category')); ?>"><i class="fa fa-pencil-square-o"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.category'); ?></span></a></li>

<li class="<?php if($page == 'addonCate'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/addonCate')); ?>"><i class="fa fa-pencil-square-o"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.add_category'); ?></span></a></li>

<li class="<?php if($page == 'addon'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/addon')); ?>"><i class="fa fa-plus-square"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.addon'); ?></span></a></li>

<li class="<?php if($page == 'item'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/item')); ?>"><i class="fa fa-list"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.products'); ?></span></a></li>

<li class="<?php if($page == 'order/add'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/order/add?lid=0')); ?>"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.new_order'); ?></span></a></li>

<li class="<?php if($page == 'order'): ?> active <?php endif; ?> nav-item"><a href="#"><i class="fa fa-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard"><?php echo app('translator')->get('app.menu_manage_orders'); ?></span></a>
<ul class="menu-content">

<li><a href="<?php echo e(Asset(env('store').'/order?status=0')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.menu_new_orders'); ?></span></a>

<li><a href="<?php echo e(Asset(env('store').'/order?status=1')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.running_order'); ?></span></a>

<li><a href="<?php echo e(Asset(env('store').'/order?status=5')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.menu_completed_orders'); ?></span></a>

<li><a href="<?php echo e(Asset(env('store').'/order?status=2')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.menu_cancelled_orders'); ?></span></a>

</ul>
</li>

<li class="<?php if($page == 'delivery'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/delivery')); ?>"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.delivery_staff'); ?></span></a></li>


<li class="<?php if($page == 'user'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/user')); ?>"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.menu_user'); ?></span></a></li>

<li class="<?php if($page == 'report'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset(env('store').'/report')); ?>"><i class="fa fa-file"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.menu_reporting'); ?></span></a></li>


<li class=" nav-item"><a href="<?php echo e(Asset('logout')); ?>"><i class="fa fa-sign-out"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.logout'); ?></span></a></li>

</ul>
</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/store_end/layout/menu.blade.php ENDPATH**/ ?>