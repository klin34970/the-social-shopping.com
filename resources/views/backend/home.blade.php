 @inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', trans('backend/global.user-management.title'))
@section('page-title', trans('backend/global.user-management.title'))

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
			@if(!Auth::user()->shops->count())
				<div class="alert alert-warning" role="alert">
					@lang('backend/global.app_home_create_shop')<br><a href="{{URL::route('backend.shop.create') }}" class="text-uppercase" href="">@lang('backend/global.app_click_here')</a>
				</div>
			@endif
			@if(!Auth::user()->suppliers->count())
				<div class="alert alert-warning" role="alert">
					@lang('backend/global.app_home_create_supplier')<br><a href="{{URL::route('backend.supplier.create') }}" class="text-uppercase" href="">@lang('backend/global.app_click_here')</a>
				</div>
			@endif
		</div>
	</div>
	
	
@endsection

@section('javascript') 
@endsection