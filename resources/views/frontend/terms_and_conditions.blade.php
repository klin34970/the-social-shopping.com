@extends('frontend.layouts.app')

@section('title', trans('frontend/global.app_home_title'))

@section('content')

    <!-- Header Block Full -->
    <div class="cwt__block cwt__header-fixed">
        <div class="container">
            <div class="cwt__header-fixed__container">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="cwt__logo cwt__logo--small">
                            <a href="{{route('home')}}">
                                <img src="/imgs/logo/logo.png" alt="{{trans('frontend/global.app_name')}}" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <nav class="nav nav-inline pull-xs-right cwt__main-menu cwt__main-menu--dark">
                            <div class="cwt__mobile-menu">
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__main-menu__link--active cwt__js-click__preview">{{trans('frontend/global.app_menu.preview')}}</a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__features">{{trans('frontend/global.app_menu.features')}}</a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__about">{{trans('frontend/global.app_menu.aboutus')}}</a>
                            </div>
                            <a href="{{route('auth.login')}}" class="nav-link btn btn-primary cwt__main-menu__link cwt__main-menu__link--button">{{trans('frontend/global.app_menu.signin')}}</a>
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
                            <a href="{{route('home')}}">
                                <img src="/imgs/logo/logo.png" alt="{{trans('frontend/global.app_name')}}" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <nav class="nav nav-inline pull-xs-right cwt__main-menu">
                            <div class="cwt__mobile-menu">
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__main-menu__link--active cwt__js-click__preview">{{trans('frontend/global.app_menu.preview')}}</a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__features">{{trans('frontend/global.app_menu.features')}}</a>
                                <a href="javascript: void(0);" class="nav-link cwt__main-menu__link cwt__js-click__about">{{trans('frontend/global.app_menu.aboutus')}}</a>
                            </div>
                            <a href="{{route('auth.login')}}" class="nav-link btn btn-primary cwt__main-menu__link cwt__main-menu__link--button">{{trans('frontend/global.app_menu.signin')}}</a>
                        </nav>
                    </div>
                </div>
            </div>

			
            <!-- Showcase Block -->
            <div class="cwt__block cwt__showcase cwt__utils__p-t-100">

			{!! trans('terms_and_conditions.text') !!}
				
            </div>
			

        </div>
    </div>

	@include('frontend.partials.footer')
@endsection

