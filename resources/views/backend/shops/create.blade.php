@extends('backend.layouts.app')
@section('title', trans('backend/global.shop.title'))
@section('page-title', trans('backend/global.shop.title'))


@section('content')  

	{!! Form::open(['files'=> true, 'method' => 'POST', 'route' => ['backend.shop.store']]) !!}
		
	<div class="row">
	
		<div class="col-12 col-xl-8 col-lg-8 col-md-12 col-sm-12">
		
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					@lang('backend/global.fields-errors')
					<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
						
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>@lang('backend/global.shop.shop_information')</h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="company">@lang('backend/global.shop.fields.company')</label>
								{!! Form::text('company', null, ['class' => 'form-control', 'id' => 'company', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_1">@lang('backend/global.shop.fields.address_1')</label>
								{!! Form::text('address_1', null, ['class' => 'form-control', 'id' => 'address_1', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_2">@lang('backend/global.shop.fields.address_2')</label>
								{!! Form::text('address_2', null, ['class' => 'form-control', 'id' => 'address_2', 'required' => false]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_3">@lang('backend/global.shop.fields.address_3')</label>
								{!! Form::text('address_3', null, ['class' => 'form-control', 'id' => 'address_3', 'required' => false]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="postcode">@lang('backend/global.shop.fields.postcode')</label>
								{!! Form::text('postcode', isset($geoip['postal_code']) ? $geoip['postal_code'] : null, ['class' => 'form-control', 'id' => 'postcode', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="city">@lang('backend/global.shop.fields.city')</label>
								{!! Form::text('city', isset($geoip['city']) ? $geoip['city'] : null, ['class' => 'form-control', 'id' => 'city', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="country">@lang('backend/global.shop.fields.country')</label>
								<div>{!! Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'required' => true]) !!}</div>
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_1">@lang('backend/global.shop.fields.phone_1')</label>
								<div>{!! Form::text('phone_1', null, ['class' => 'form-control', 'id' => 'phone_1', 'required' => true]) !!}</div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_2">@lang('backend/global.shop.fields.phone_2')</label>
								<div>{!! Form::text('phone_2', null, ['class' => 'form-control', 'id' => 'phone_2', 'required' => false]) !!}</div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="email">@lang('backend/global.shop.fields.email')</label>
								{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="website">@lang('backend/global.shop.fields.website')</label>
								{!! Form::text('website', null, ['class' => 'form-control', 'id' => 'website', 'required' => false]) !!}
							</div>
						</div>
						
						{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
						
					</div>	
					
				</div>
			</div>
			
		</div>
		
		<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
		
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>@lang('backend/global.shop.shop_logo')</h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="free_text">@lang('backend/global.shop.fields.logo')</label>
								{{ Form::file('logo', ['class' => 'dropify', 'required' => false]) }}
								<small>mimes:png; dimensions:ratio=1/1; min_width=200; min_height=200; max=500kb</small>
							</div>
						</div>
						
						{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
						
					</div>
					
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>@lang('backend/global.shop.company_information')</h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="legal_form">@lang('backend/global.shop.fields.legal_form')</label>
								{!! Form::text('legal_form', null, ['class' => 'form-control', 'id' => 'legal_form', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="social_reason">@lang('backend/global.shop.fields.social_reason')</label>
								{!! Form::text('social_reason', null, ['class' => 'form-control', 'id' => 'social_reason', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="registration">@lang('backend/global.shop.fields.registration')</label>
								{!! Form::text('registration', null, ['class' => 'form-control', 'id' => 'registration', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="vat">@lang('backend/global.shop.fields.vat')</label>
								{!! Form::text('vat', null, ['class' => 'form-control', 'id' => 'vat', 'required' => false]) !!}
							</div>
						</div>
						
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="currency">@lang('backend/global.shop.fields.currency')</label>
								{!! Form::select('currency', trans('backend/global.shop.currencies'), null, ['class' => 'select2-tags', 'id' => 'currency', 'required' => true]) !!}
							</div>
						</div>
						
						{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
						
					</div>	
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>@lang('backend/global.shop.free_text')</h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="free_text">@lang('backend/global.shop.fields.free_text')</label>
								{!! Form::text('free_text', null, ['class' => 'form-control', 'id' => 'free_text', 'required' => false]) !!}
							</div>
						</div>
						
						{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
						
					</div>
					
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>@lang('backend/global.shop.stripe')</h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="key_public">@lang('backend/global.shop.fields.key_public')</label>
								{!! Form::text('key_public', null, ['class' => 'form-control', 'id' => 'key_public', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="key_private">@lang('backend/global.shop.fields.key_private')</label>
								{!! Form::text('key_private', null, ['class' => 'form-control', 'id' => 'key_private', 'required' => true]) !!}
							</div>
						</div>
						
						{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
						
					</div>
					
				</div>
			</div>	

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>@lang('backend/global.shop.facebook')</h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="facebook_pixel_code">@lang('backend/global.shop.fields.facebook_pixel_code')</label>
								{!! Form::text('facebook_pixel_code', null, ['class' => 'form-control', 'id' => 'facebook_pixel_code', 'required' => false]) !!}
							</div>
						</div>
						
						{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
						
					</div>
					
				</div>
			</div>	
			
		</div>
		
	</div>
	{!! Form::close() !!}
	
@stop



@section('javascript')
<script>
	$('.dropify').dropify();
	$('.select2-tags').select2({
		tags: true,
		tokenSeparators: [',', ' ']
	});
	$("form").submit(function() {
		$("#phone_1").val($("#phone_1").intlTelInput("getNumber"));
		$("#phone_2").val($("#phone_2").intlTelInput("getNumber"));
	});
	$("#phone_1").intlTelInput();
	$("#phone_2").intlTelInput();

	$("#phone_1").intlTelInput("setCountry", "{{ isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us' }}");
	$("#phone_2").intlTelInput("setCountry", "{{ isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us' }}");

	$("#country").countrySelect();


	$("#country").countrySelect("setCountry", "{{ isset($geoip['country']) ? $geoip['country'] : 'us' }}");
</script>
@endsection