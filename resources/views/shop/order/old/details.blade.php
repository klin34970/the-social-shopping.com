<h3>
	<i class="icmn-location2 cui-wizard--steps--icon"></i>
	<span class="cui-wizard--steps--title">@lang('frontend/global.shipping.shipment')</span>
</h3>
<section>
	<div class="row">
	
	
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4>@lang('frontend/global.shipping.shipment_details')</h4>
			
			
			<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="email">@lang('frontend/global.shipping.fields.email')</label>
					{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => true, 'autocomplete' => true]) !!}
				</div>
			</div>
			<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="company">@lang('frontend/global.shipping.fields.company')</label>
					{!! Form::text('company', null, ['class' => 'form-control', 'id' => 'company', 'required' => false, 'autocomplete' => true]) !!}
				</div>
			</div>
			
			
			
			
			<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="lastname">@lang('frontend/global.shipping.fields.lastname')</label>
					{!! Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname', 'required' => true, 'autocomplete' => true]) !!}
				</div>
			</div>
			<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="firstname">@lang('frontend/global.shipping.fields.firstname')</label>
					{!! Form::text('firstname', null, ['class' => 'form-control', 'id' => 'firstname', 'required' => true, 'autocomplete' => true]) !!}
				</div>
			</div>
			
						
			<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="address_1">@lang('frontend/global.shipping.fields.address_1')</label>
					{!! Form::text('address_1', null, ['class' => 'form-control', 'id' => 'address_1', 'required' => true, 'autocomplete' => true]) !!}
				</div>
			</div>
			<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="address_2">@lang('frontend/global.shipping.fields.address_2')</label>
					{!! Form::text('address_2', null, ['class' => 'form-control', 'id' => 'address_2', 'required' => false, 'autocomplete' => true]) !!}
				</div>
			</div>
			<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="address_3">@lang('frontend/global.shipping.fields.address_3')</label>
					{!! Form::text('address_3', null, ['class' => 'form-control', 'id' => 'address_3', 'required' => false, 'autocomplete' => true]) !!}
				</div>
			</div>
			
			<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="postcode">@lang('frontend/global.shipping.fields.postcode')</label>
					{!! Form::text('postcode', isset($geoip['postal_code']) ? $geoip['postal_code'] : null, ['class' => 'form-control', 'id' => 'postcode', 'required' => true, 'autocomplete' => true]) !!}
				</div>
			</div>
			<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="city">@lang('frontend/global.shipping.fields.city')</label>
					{!! Form::text('city', isset($geoip['city']) ? $geoip['city'] : null, ['class' => 'form-control', 'id' => 'city', 'required' => true, 'autocomplete' => true]) !!}
				</div>
			</div>
			<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="country">@lang('frontend/global.shipping.fields.country')</label>
					<div>{!! Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'required' => true, 'autocomplete' => true]) !!}</div>
				</div>
			</div>
			
			
			<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="phone_1">@lang('frontend/global.shipping.fields.phone_1')</label>
					<div>{!! Form::text('phone_1', null, ['class' => 'form-control', 'id' => 'phone_1', 'required' => true, 'autocomplete' => true]) !!}</div>
					
				</div>
			</div>
			
			<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="form-control-label" for="phone_2">@lang('frontend/global.shipping.fields.phone_2')</label>
					<div>{!! Form::text('phone_2', null, ['class' => 'form-control', 'id' => 'phone_2', 'required' => false, 'autocomplete' => true]) !!}</div>
					
				</div>
			</div>
				
		</div>	

	</div>
</section>