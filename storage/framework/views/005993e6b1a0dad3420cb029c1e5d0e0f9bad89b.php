<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>">
<head>
    <?php echo $__env->make('shop.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="shop bg-grey">
	<?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('shop.partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>