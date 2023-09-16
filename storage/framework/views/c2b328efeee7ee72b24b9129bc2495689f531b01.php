<?php $__env->startSection('content'); ?>   
    <div class="single-page-block">
        <div class="single-page-block-inner effect-3d-element">
            <div class="blur-placeholder"><!-- --></div>
            <div class="single-page-block-form">
                <h3 class="text-center">
                    <i class="icmn-enter margin-right-10"></i>
                    <?php echo app('translator')->getFromJson('frontend/global.app_registrationform'); ?>
                </h3>
                <br />
				<?php if(count($errors) > 0): ?>
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were problems with input:
						<br><br>
						<ul>
							<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><?php echo e($error); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				<?php endif; ?>
                <form id="form" name="form" method="POST" action="<?php echo e(route('home.registration')); ?>">
					<div class="form-group">
                        <input id="lastname" class="form-control" name="lastname" type="text" placeholder="Lastname">
                    </div>
					<div class="form-group">
                        <input id="firstname" class="form-control" name="firstname" type="text" placeholder="Firstname">
                    </div>
                    <div class="form-group">
                        <input id="email" class="form-control" placeholder="Email" name="email" type="text">
                    </div>
                    <div class="form-group">
                        <input id="password" class="form-control password" name="password" type="password" placeholder="Password">
                    </div>
					<div class="form-group">
                        <input id="password_confirmation" class="form-control password_confirmation password" name="password_confirmation" type="password" placeholder="Password Confirmation">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150"><?php echo app('translator')->getFromJson('frontend/global.app_signup'); ?></button>
                    </div>
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>   
<script>
    $(function() {

        // Add class to body for change layout settings
        $('body').addClass('single-page single-page-inverse');

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Set Background Image for Form Block
        function setImage() {
            var imgUrl = $('.page-content-inner').css('background-image');

            $('.blur-placeholder').css('background-image', imgUrl);
        };

        function changeImgPositon() {
            var width = $(window).width(),
                    height = $(window).height(),
                    left = - (width - $('.single-page-block-inner').outerWidth()) / 2,
                    top = - (height - $('.single-page-block-inner').outerHeight()) / 2;


            $('.blur-placeholder').css({
                width: width,
                height: height,
                left: left,
                top: top
            });
        };

        setImage();
        changeImgPositon();

        $(window).on('resize', function(){
            changeImgPositon();
        });

        // Mouse Move 3d Effect
        var rotation = function(e){
            var perX = (e.clientX/$(window).width())-0.5;
            var perY = (e.clientY/$(window).height())-0.5;
            TweenMax.to(".effect-3d-element", 0.4, { rotationY:15*perX, rotationX:15*perY,  ease:Linear.easeNone, transformPerspective:1000, transformOrigin:"center" })
        };

        if (!cleanUI.hasTouch) {
            $('body').mousemove(rotation);
        }

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>