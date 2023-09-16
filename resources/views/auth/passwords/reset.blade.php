@extends('frontend.layouts.auth')

@section('content')

    <div class="single-page-block">
        <div class="single-page-block-inner effect-3d-element">
            <div class="blur-placeholder"><!-- --></div>
            <div class="single-page-block-form">
                <h3 class="text-center">
                    <i class="icmn-enter margin-right-10"></i>
                    @lang('frontend/global.app_changepasswordform')
                </h3>
                <br />
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were problems with input:
						<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                <form id="form" name="form" method="POST" action="{{ url('password/reset') }}">
                    <div class="form-group">
                        <input id="email" class="form-control" placeholder="Email" name="email" type="text" value="{{ old('email') }}">
                    </div>
					
					<div class="form-group">
						<input id="password" class="form-control password" name="password" type="password" placeholder="Password">
					</div>
					
					<div class="form-group">
                        <input id="password_confirmation" class="form-control password_confirmation password" name="password_confirmation" type="password" placeholder="Password Confirmation">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150">@lang('frontend/global.app_changepassword')</button>
                    </div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="token" value="{{ $token }}">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
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
@endsection
