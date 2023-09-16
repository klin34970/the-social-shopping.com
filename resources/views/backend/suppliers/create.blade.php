@extends('backend.layouts.app')
@section('title', trans('backend/global.supplier.title'))
@section('page-title', trans('backend/global.supplier.title'))


@section('content')
  
	{!! Form::open(['files'=> true, 'method' => 'POST', 'route' => ['backend.supplier.store']]) !!}
		
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
					<h2>@lang('backend/global.supplier.supplier_information')</h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="company">@lang('backend/global.supplier.fields.company')</label>
								{!! Form::text('company', null, ['class' => 'form-control', 'id' => 'company', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_1">@lang('backend/global.supplier.fields.address_1')</label>
								{!! Form::text('address_1', null, ['class' => 'form-control', 'id' => 'address_1', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_2">@lang('backend/global.supplier.fields.address_2')</label>
								{!! Form::text('address_2', null, ['class' => 'form-control', 'id' => 'address_2', 'required' => false]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_3">@lang('backend/global.supplier.fields.address_3')</label>
								{!! Form::text('address_3', null, ['class' => 'form-control', 'id' => 'address_3', 'required' => false]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="postcode">@lang('backend/global.supplier.fields.postcode')</label>
								{!! Form::text('postcode', null, ['class' => 'form-control', 'id' => 'postcode', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="city">@lang('backend/global.supplier.fields.city')</label>
								{!! Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="country">@lang('backend/global.supplier.fields.country')</label>
								<div>{!! Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'required' => true]) !!}</div>
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_1">@lang('backend/global.supplier.fields.phone_1')</label>
								<div>{!! Form::text('phone_1', null, ['class' => 'form-control', 'id' => 'phone_1', 'required' => true]) !!}</div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_2">@lang('backend/global.supplier.fields.phone_2')</label>
								<div>{!! Form::text('phone_2', null, ['class' => 'form-control', 'id' => 'phone_2', 'required' => false]) !!}</div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="email">@lang('backend/global.supplier.fields.email')</label>
								{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="website">@lang('backend/global.supplier.fields.website')</label>
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
					<h2>@lang('backend/global.supplier.company_information')</h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="legal_form">@lang('backend/global.supplier.fields.legal_form')</label>
								{!! Form::text('legal_form', null, ['class' => 'form-control', 'id' => 'legal_form', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="social_reason">@lang('backend/global.supplier.fields.social_reason')</label>
								{!! Form::text('social_reason', null, ['class' => 'form-control', 'id' => 'social_reason', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="registration">@lang('backend/global.supplier.fields.registration')</label>
								{!! Form::text('registration', null, ['class' => 'form-control', 'id' => 'registration', 'required' => true]) !!}
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="vat">@lang('backend/global.supplier.fields.vat')</label>
								{!! Form::text('vat', null, ['class' => 'form-control', 'id' => 'vat', 'required' => false]) !!}
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
	$("form").submit(function() {
		$("#phone_1").val($("#phone_1").intlTelInput("getNumber"));
		$("#phone_2").val($("#phone_2").intlTelInput("getNumber"));
	});
	$("#phone_1").intlTelInput();
	$("#phone_2").intlTelInput();
	$("#country").countrySelect();
</script>
@endsection