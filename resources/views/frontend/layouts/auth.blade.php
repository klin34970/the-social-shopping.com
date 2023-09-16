<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	@include('backend.partials.head')
</head>
<body class="theme-default">

<section class="page-content">
	<div class="page-content-inner" style="background-image: url(/imgs/frontend/auth.jpg)">

		<div class="single-page-block-header">
			<div class="row">
				<div class="col-lg-4">
					<div class="logo">
						<a href="{{route('home')}}">
							<img src="/imgs/logo/logo.png" alt="@lang('frontend/global.app_home')" />
						</a>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="single-page-block-header-menu">
						<ul class="list-unstyled list-inline">
							<li><a href="{{route('home')}}">@lang('frontend/global.app_home')</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@yield('content')
		<div class="single-page-block-footer text-center">
			<ul class="list-unstyled list-inline">
				<li><a href="javascript: void(0);">Contacts</a></li>
			</ul>
		</div>
		<!-- End Login Omega Page -->
	</div>
</section>
@include('backend.partials.javascripts')
<div class="main-backdrop"><!-- --></div>

</body>
</html>