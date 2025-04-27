<?php ($page = Request::segment(1)); ?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
<div class="navbar-header">
<ul class="nav navbar-nav flex-row">
<li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo e(Asset('home')); ?>">
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
<li><a href="<?php echo e(Asset('home')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.home'); ?></span></a>
</li>
<li><a href="<?php echo e(Asset('setting')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce"><?php echo app('translator')->get('app.setting'); ?></span></a>
</li>
</ul>
</li>
<li class="<?php if($page == 'language'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('language')); ?>"><i class="fa fa-flag"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.app_lang'); ?></span></a></li>

<li class="<?php if($page == 'slider'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('slider')); ?>"><i class="fa fa-image"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.home_slider'); ?></span></a></li>

<li class="<?php if($page == 'plan'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('plan')); ?>"><i class="fa fa-credit-card-alt"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.sub_plan'); ?></span></a></li>

<li class="<?php if($page == 'fiance'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('fiance')); ?>"><i class="fa fa-money"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.fiance'); ?></span></a></li>

<li class="<?php if($page == 'city' || $page == 'store' || $page == 'cate'): ?> active <?php endif; ?> nav-item"><a href="#"><i class="fa fa-home"></i><span class="menu-title" data-i18n="Dashboard"><?php echo app('translator')->get('app.manage_stores'); ?></span></a>
<ul class="menu-content">

<li><a href="<?php echo e(Asset('cate')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.store_category'); ?></span></a></li>

<li><a href="<?php echo e(Asset('store')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.stores'); ?></span></a>
</li>

</ul>
</li>

<li class="<?php if($page == 'page'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('page')); ?>"><i class="fa fa-file"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.page_text'); ?></span></a></li>

<li class="<?php if($page == 'delivery'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('delivery')); ?>"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.delivery_staff'); ?></span></a></li>

<li class="<?php if($page == 'offer'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('offer')); ?>"><i class="fa fa-tags"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.coupon'); ?></span></a></li>

<li class="<?php if($page == 'text'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('text')); ?>"><i class="fa fa-language"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.app_text'); ?></span></a></li>

<li class="<?php if($page == 'order'): ?> active <?php endif; ?> nav-item"><a href="#"><i class="fa fa-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard"><?php echo app('translator')->get('app.manage_orders'); ?></span></a>
<ul class="menu-content">

<li><a href="<?php echo e(Asset('order?status=0')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.new_orders'); ?></span></a>

<li><a href="<?php echo e(Asset('order?status=1')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.running_order'); ?></span></a>

<li><a href="<?php echo e(Asset('order?status=5')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.completed_orders'); ?></span></a>

<li><a href="<?php echo e(Asset('order?status=2')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics"><?php echo app('translator')->get('app.cancelled_orders'); ?></span></a>


</ul>
</li>

<li class="<?php if($page == 'push'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('push')); ?>"><i class="fa fa-bell"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.push'); ?></span></a></li>

<li class="<?php if($page == 'appUser'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('appUser')); ?>"><i class="fa fa-users"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.app_user'); ?></span></a></li>

<li class="<?php if($page == 'report'): ?> active <?php endif; ?> nav-item"><a href="<?php echo e(Asset('report')); ?>"><i class="fa fa-file"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.reporting'); ?></span></a></li>


<li class=" nav-item"><a href="<?php echo e(Asset('logout')); ?>"><i class="fa fa-sign-out"></i><span class="menu-title" data-i18n="Email"><?php echo app('translator')->get('app.logout'); ?></span></a></li>

</ul>
</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/saas_pos/local/resources/views/layout/menu.blade.php ENDPATH**/ ?>