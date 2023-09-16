<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>">
<head>
	<?php echo $__env->make('backend.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="menu-top theme-dark menu-static colorful-enabled">
<?php echo $__env->make('backend.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('backend.partials.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="page-content">
	<div class="page-content-inner">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
</section>
<?php echo $__env->make('backend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-backdrop"><!-- --></div>
<?php echo $__env->make('backend.partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>