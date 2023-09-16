<?php $__env->startSection('title', trans('backend/global.shop.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.shop.title')); ?>


<?php $__env->startSection('content'); ?>  
	<?php echo Form::model($shop, ['files'=> true, 'method' => 'PUT', 'route' => ['backend.shop.update', $shop->id]]); ?>

	
	<div class="row">
	
		<div class="col-12 col-xl-8 col-lg-8 col-md-12 col-sm-12">
		
			<?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<?php echo app('translator')->getFromJson('backend/global.fields-errors'); ?>
					<br><br>
					<ul>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			<?php endif; ?>
						
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><?php echo app('translator')->getFromJson('backend/global.shop.shop_information'); ?></h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="company"><?php echo app('translator')->getFromJson('backend/global.shop.fields.company'); ?></label>
								<?php echo Form::text('company', null, ['class' => 'form-control', 'id' => 'company', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_1"><?php echo app('translator')->getFromJson('backend/global.shop.fields.address_1'); ?></label>
								<?php echo Form::text('address_1', null, ['class' => 'form-control', 'id' => 'address_1', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_2"><?php echo app('translator')->getFromJson('backend/global.shop.fields.address_2'); ?></label>
								<?php echo Form::text('address_2', null, ['class' => 'form-control', 'id' => 'address_2', 'required' => false]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_3"><?php echo app('translator')->getFromJson('backend/global.shop.fields.address_3'); ?></label>
								<?php echo Form::text('address_3', null, ['class' => 'form-control', 'id' => 'address_3', 'required' => false]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="postcode"><?php echo app('translator')->getFromJson('backend/global.shop.fields.postcode'); ?></label>
								<?php echo Form::text('postcode', isset($geoip['postal_code']) ? $geoip['postal_code'] : null, ['class' => 'form-control', 'id' => 'postcode', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="city"><?php echo app('translator')->getFromJson('backend/global.shop.fields.city'); ?></label>
								<?php echo Form::text('city', isset($geoip['city']) ? $geoip['city'] : null, ['class' => 'form-control', 'id' => 'city', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="country"><?php echo app('translator')->getFromJson('backend/global.shop.fields.country'); ?></label>
								<div><?php echo Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'required' => true]); ?></div>
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_1"><?php echo app('translator')->getFromJson('backend/global.shop.fields.phone_1'); ?></label>
								<div><?php echo Form::text('phone_1', null, ['class' => 'form-control', 'id' => 'phone_1', 'required' => true]); ?></div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_2"><?php echo app('translator')->getFromJson('backend/global.shop.fields.phone_2'); ?></label>
								<div><?php echo Form::text('phone_2', null, ['class' => 'form-control', 'id' => 'phone_2', 'required' => false]); ?></div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="email"><?php echo app('translator')->getFromJson('backend/global.shop.fields.email'); ?></label>
								<?php echo Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="website"><?php echo app('translator')->getFromJson('backend/global.shop.fields.website'); ?></label>
								<?php echo Form::text('website', null, ['class' => 'form-control', 'id' => 'website', 'required' => false]); ?>

							</div>
						</div>
						
						<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

						
					</div>	
					
				</div>
			</div>
			
		</div>
		
		<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
		
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><?php echo app('translator')->getFromJson('backend/global.shop.shop_logo'); ?></h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="free_text"><?php echo app('translator')->getFromJson('backend/global.shop.fields.logo'); ?></label>
								<?php if($shop->logo): ?>
									<?php echo e(Form::file('logo', ['data-default-file' => '/storage' . $shop->logo . $shop->id . '/' . File::basename(File::glob(storage_path('app/public') . $shop->logo . $shop->id . '/200x200.*')[0]), 'class' => 'dropify', 'required' => false])); ?>

								<?php else: ?>
									<?php echo e(Form::file('logo', ['class' => 'dropify', 'required' => false])); ?>

								<?php endif; ?>
								<small>mimes:png; dimensions:ratio=1/1; min_width=200; min_height=200; max=500kb</small>
							</div>
						</div>
						
						<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

						
					</div>
					
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><?php echo app('translator')->getFromJson('backend/global.shop.company_information'); ?></h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="legal_form"><?php echo app('translator')->getFromJson('backend/global.shop.fields.legal_form'); ?></label>
								<?php echo Form::text('legal_form', null, ['class' => 'form-control', 'id' => 'legal_form', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="social_reason"><?php echo app('translator')->getFromJson('backend/global.shop.fields.social_reason'); ?></label>
								<?php echo Form::text('social_reason', null, ['class' => 'form-control', 'id' => 'social_reason', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="registration"><?php echo app('translator')->getFromJson('backend/global.shop.fields.registration'); ?></label>
								<?php echo Form::text('registration', null, ['class' => 'form-control', 'id' => 'registration', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="vat"><?php echo app('translator')->getFromJson('backend/global.shop.fields.vat'); ?></label>
								<?php echo Form::text('vat', null, ['class' => 'form-control', 'id' => 'vat', 'required' => false]); ?>

							</div>
						</div>
						
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="currency"><?php echo app('translator')->getFromJson('backend/global.shop.fields.currency'); ?></label>
								<?php echo Form::select('currency', trans('backend/global.shop.currencies'), null, ['class' => 'select2-tags', 'id' => 'currency', 'required' => true]); ?>

							</div>
						</div>
						
						<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

						
					</div>	
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><?php echo app('translator')->getFromJson('backend/global.shop.free_text'); ?></h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="free_text"><?php echo app('translator')->getFromJson('backend/global.shop.fields.free_text'); ?></label>
								<?php echo Form::text('free_text', null, ['class' => 'form-control', 'id' => 'free_text', 'required' => false]); ?>

							</div>
						</div>
						
						<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

						
					</div>
					
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><?php echo app('translator')->getFromJson('backend/global.shop.stripe'); ?></h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="key_public"><?php echo app('translator')->getFromJson('backend/global.shop.fields.key_public'); ?></label>
								<?php echo Form::text('key_public', $shop->stripe->key_public ? $shop->stripe->key_public : null, ['class' => 'form-control', 'id' => 'key_public', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="key_private"><?php echo app('translator')->getFromJson('backend/global.shop.fields.key_private'); ?></label>
								<?php echo Form::text('key_private', $shop->stripe->key_private ? $shop->stripe->key_private : null, ['class' => 'form-control', 'id' => 'key_private', 'required' => true]); ?>

							</div>
						</div>
						
						<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

						
					</div>
					
				</div>
			</div>	
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><?php echo app('translator')->getFromJson('backend/global.shop.facebook'); ?></h2>
				</div>
				<div class="panel-body">
				
					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="facebook_pixel_code"><?php echo app('translator')->getFromJson('backend/global.shop.fields.facebook_pixel_code'); ?></label>
								<?php echo Form::text('facebook_pixel_code', $shop->facebook_pixel ? $shop->facebook_pixel->facebook_pixel_code : null, ['class' => 'form-control', 'id' => 'facebook_pixel_code', 'required' => false]); ?>

							</div>
						</div>
						
						<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

						
					</div>
					
				</div>
			</div>			
			
		</div>
		
	</div>
	<?php echo Form::close(); ?>		
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
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

	<?php if(!$shop->phone_1): ?>
		$("#phone_1").intlTelInput("setCountry", "<?php echo e(isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us'); ?>");
	<?php endif; ?>
	<?php if(!$shop->phone_2): ?>
		$("#phone_2").intlTelInput("setCountry", "<?php echo e(isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us'); ?>");
	<?php endif; ?>
	$("#country").countrySelect();
	<?php if(!$shop->country): ?>
		$("#country").countrySelect("setCountry", "<?php echo e(isset($geoip['country']) ? $geoip['country'] : 'us'); ?>");
	<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>