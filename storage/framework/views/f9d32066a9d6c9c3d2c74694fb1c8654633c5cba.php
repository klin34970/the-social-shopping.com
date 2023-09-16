<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>">
<head>
	<?php echo $__env->make('backend.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="theme-default">

<section class="page-content">
	<div class="page-content-inner" style="background-image: url(/imgs/frontend/auth.jpg)">

		<div class="single-page-block-header">
			<div class="row">
				<div class="col-lg-4">
					<div class="logo">
						<a href="<?php echo e(route('home')); ?>">
							<img src="/imgs/logo/logo.png" alt="<?php echo app('translator')->getFromJson('frontend/global.app_home'); ?>" />
						</a>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="single-page-block-header-menu">
						<ul class="list-unstyled list-inline">
							<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->getFromJson('frontend/global.app_home'); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php echo $__env->yieldContent('content'); ?>
		<div class="single-page-block-footer text-center">
			<ul class="list-unstyled list-inline">
				<li><a href="javascript: void(0);">Contacts</a></li>
			</ul>
		</div>
		<!-- End Login Omega Page -->
	</div>
</section>
<?php echo $__env->make('backend.partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-backdrop"><!-- --></div>

</body>
</html>