<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    @include('shop.partials.head')
</head>
<body class="shop bg-grey">
	@yield('content')
	@include('shop.partials.javascripts')
</body>
</html>