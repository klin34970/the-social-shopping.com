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

    <!-- Preview Block -->
    <div class="cwt__block cwt__preview">
        <div class="cwt__preview__container">
            <div class="cwt__preview__title">
                <?php echo e(trans('frontend/global.app_preview.title')); ?>

                <br />
                <?php echo e(trans('frontend/global.app_preview.title2')); ?>

            </div>
            <a href="<?php echo e(route('home.registration')); ?>" class="btn btn-primary cwt__action__button">
                <?php echo e(trans('frontend/global.app_preview.subscription')); ?><br /><small><?php echo e(trans('frontend/global.app_preview.description')); ?></small>
            </a>
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
                <div class="cwt__cube">
                    <div class="cwt__cube__inner" id="rotating-cube"><!-- --></div>
                </div>
                <h1 class="cwt__showcase__heading">
                    <span class="cwt__showcase__heading__text" id="showcase-type"></span>
                </h1>
                <p class="cwt__showcase__description">
                    <?php echo trans('frontend/global.app_showcase.title'); ?>

                </p>
                <div class="cwt__showcase__devices">
                    <div class="cwt__showcase__laptop">
                        <div class="cwt__showcase__laptop__shadow"><!-- --></div>
                        <div class="cwt__showcase__laptop__bg">
                            <div class="cwt__showcase__box">
                                <img src="/imgs/frontend/laptop.jpg" class="cwt__showcase__box__gif" />
                            </div>
                        </div>
                    </div>
                    <div class="cwt__showcase__mobile hidden-sm-down">
                        <div class="cwt__showcase__box">
                            <img src="/imgs/frontend/mobile.jpg" class="cwt__showcase__box__gif" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Block -->
            <div class="cwt__block cwt__features">
                <h1 class="cwt__block-title">
                    <?php echo e(trans('frontend/global.app_feature.title')); ?>

                </h1>
                <div class="cwt__features__container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="cwt__features__item">
                                <i class="cwt__features__icon lnr lnr-cloud-sync"><!-- --></i>
                                <span class="cwt__features__title">
                                    <?php echo e(trans('frontend/global.app_feature.section1title')); ?>

                                </span>
                                <div class="cwt__features__descr">
									<?php echo e(trans('frontend/global.app_feature.section1description')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="cwt__features__item">
                                <i class="cwt__features__icon lnr lnr-pie-chart"><!-- --></i>
                                <span class="cwt__features__title">
                                    <?php echo e(trans('frontend/global.app_feature.section2title')); ?>

                                </span>
                                <div class="cwt__features__descr">
                                    <?php echo e(trans('frontend/global.app_feature.section2description')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="cwt__features__item">
                                <i class="cwt__features__icon lnr lnr-cart"><!-- --></i>
                                <span class="cwt__features__title">
                                    <?php echo e(trans('frontend/global.app_feature.section3title')); ?>

                                </span>
                                <div class="cwt__features__descr">
                                    <?php echo e(trans('frontend/global.app_feature.section3description')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="cwt__features__item">
                                <i class="cwt__features__icon lnr icmn-credit-card"><!-- --></i>
                                <span class="cwt__features__title">
                                    <?php echo e(trans('frontend/global.app_feature.section4title')); ?>

                                </span>
                                <div class="cwt__features__descr">
                                    <?php echo e(trans('frontend/global.app_feature.section4description')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="cwt__features__item">
                                <i class="cwt__features__icon lnr lnr-store"><!-- --></i>
                                <span class="cwt__features__title">
                                    <?php echo e(trans('frontend/global.app_feature.section5title')); ?>

                                </span>
                                <div class="cwt__features__descr">
                                    <?php echo e(trans('frontend/global.app_feature.section5description')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="cwt__features__item">
                                <i class="cwt__features__icon lnr lnr-select"><!-- --></i>
                                <span class="cwt__features__title">
                                    <?php echo e(trans('frontend/global.app_feature.section6title')); ?>

                                </span>
                                <div class="cwt__features__descr">
                                    <?php echo e(trans('frontend/global.app_feature.section6description')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Block -->
            <div class="cwt__block cwt__action">
                <div class="cwt__action__container">
                    <div class="cwt__action__container-inner">
                        <a href="<?php echo e(route('home.registration')); ?>" class="btn btn-primary cwt__action__button">
                            <?php echo e(trans('frontend/global.app_preview.subscription')); ?><br /><small><?php echo e(trans('frontend/global.app_preview.description')); ?></small>
                        </a>
                    </div>
                </div>
            </div>

            <!-- About Us -->
            <div class="cwt__block cwt__about">
                <h1 class="cwt__block-title">
                    <?php echo e(trans('frontend/global.app_aboutus.title')); ?>

                </h1>
                <div class="cwt__about__container">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo e(trans('frontend/global.app_aboutus.part1')); ?>

                        </div>
                        <div class="col-lg-6">
                            <?php echo e(trans('frontend/global.app_aboutus.part2')); ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

	<?php echo $__env->make('frontend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
;$(function(){
$('#showcase-type').typed({
	strings: ['<?php echo e(trans("frontend/global.app_showcase.text1")); ?>', '<?php echo e(trans("frontend/global.app_showcase.text2")); ?>', '<?php echo e(trans("frontend/global.app_showcase.text3")); ?>'],
	typeSpeed: 30,
	loop: true,
	backDelay: 1000,
	cursorChar: ''
});
});
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>