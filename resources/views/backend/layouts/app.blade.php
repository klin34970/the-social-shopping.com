<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	@include('backend.partials.head')
</head>
<body class="menu-top theme-dark menu-static colorful-enabled">
@include('backend.partials.sidebar')
@include('backend.partials.topbar')
<section class="page-content">
	<div class="page-content-inner">
		@yield('content')
	</div>
</section>
@include('backend.partials.footer')
<div class="main-backdrop"><!-- --></div>
@include('backend.partials.javascripts')
</body>
</html>