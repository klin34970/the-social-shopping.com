<?php $__env->startSection('title', trans('frontend/global.app_home_title')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Header Block Full -->
    <div class="cwt__block cwt__header-fixed">
        <div class="container">
            <div class="cwt__header-fixed__container">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="cwt__logo cwt__logo--small">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="/imgs/logo/logo.png" alt="<?php echo e(trans('frontend/global.app_name')); ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <nav class="nav nav-inline pull-xs-right cwt__main-menu cwt__main-menu--dark">
                            <div class="cwt__mobile-menu">
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__main-menu__link--active cwt__js-click__preview"><?php echo e(trans('frontend/global.app_menu.preview')); ?></a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__features"><?php echo e(trans('frontend/global.app_menu.features')); ?></a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__about"><?php echo e(trans('frontend/global.app_menu.aboutus')); ?></a>
                            </div>
                            <a href="<?php echo e(route('auth.login')); ?>" class="nav-link btn btn-primary cwt__main-menu__link cwt__main-menu__link--button"><?php echo e(trans('frontend/global.app_menu.signin')); ?></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!-- Header Block -->
            <div class="cwt__block cwt__main-header" style="display: none;">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="cwt__logo">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="/imgs/logo/logo.png" alt="<?php echo e(trans('frontend/global.app_name')); ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <nav class="nav nav-inline pull-xs-right cwt__main-menu">
                            <div class="cwt__mobile-menu">
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__main-menu__link--active cwt__js-click__preview"><?php echo e(trans('frontend/global.app_menu.preview')); ?></a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__features"><?php echo e(trans('frontend/global.app_menu.features')); ?></a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__about"><?php echo e(trans('frontend/global.app_menu.aboutus')); ?></a>
                            </div>
                            <a href="<?php echo e(route('auth.login')); ?>" class="nav-link btn btn-primary cwt__main-menu__link cwt__main-menu__link--button"><?php echo e(trans('frontend/global.app_menu.signin')); ?></a>
                        </nav>
                    </div>
                </div>
            </div>

			
            <!-- Showcase Block -->
            <div class="cwt__block cwt__showcase cwt__utils__p-t-100">

			<?php echo trans('privacy_policy.text'); ?>

				
            </div>
			

        </div>
    </div>

	<?php echo $__env->make('frontend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>