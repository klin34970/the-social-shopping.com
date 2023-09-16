<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    @include('frontend.partials.head')
</head>
<body>
@yield('content')
@include('frontend.partials.javascripts')
</body>
</html>