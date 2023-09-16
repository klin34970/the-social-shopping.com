<?php $__env->startSection('title', trans('backend/global.supplier.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.supplier.title')); ?>


<?php $__env->startSection('content'); ?>  

	<?php echo Form::model($supplier, ['method' => 'PUT', 'route' => ['backend.supplier.update', $supplier->id]]); ?>

	
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
					<h2><?php echo app('translator')->getFromJson('backend/global.supplier.supplier_information'); ?></h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="company"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.company'); ?></label>
								<?php echo Form::text('company', null, ['class' => 'form-control', 'id' => 'company', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_1"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.address_1'); ?></label>
								<?php echo Form::text('address_1', null, ['class' => 'form-control', 'id' => 'address_1', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_2"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.address_2'); ?></label>
								<?php echo Form::text('address_2', null, ['class' => 'form-control', 'id' => 'address_2', 'required' => false]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="address_3"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.address_3'); ?></label>
								<?php echo Form::text('address_3', null, ['class' => 'form-control', 'id' => 'address_3', 'required' => false]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="postcode"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.postcode'); ?></label>
								<?php echo Form::text('postcode', null, ['class' => 'form-control', 'id' => 'postcode', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="city"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.city'); ?></label>
								<?php echo Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="country"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.country'); ?></label>
								<div><?php echo Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'required' => true]); ?></div>
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_1"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.phone_1'); ?></label>
								<div><?php echo Form::text('phone_1', null, ['class' => 'form-control', 'id' => 'phone_1', 'required' => true]); ?></div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="phone_2"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.phone_2'); ?></label>
								<div><?php echo Form::text('phone_2', null, ['class' => 'form-control', 'id' => 'phone_2', 'required' => false]); ?></div>
								
							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="email"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.email'); ?></label>
								<?php echo Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="website"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.website'); ?></label>
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
					<h2><?php echo app('translator')->getFromJson('backend/global.supplier.company_information'); ?></h2>
				</div>
				<div class="panel-body">

					<div class="row">
					
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="legal_form"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.legal_form'); ?></label>
								<?php echo Form::text('legal_form', null, ['class' => 'form-control', 'id' => 'legal_form', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="social_reason"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.social_reason'); ?></label>
								<?php echo Form::text('social_reason', null, ['class' => 'form-control', 'id' => 'social_reason', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="registration"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.registration'); ?></label>
								<?php echo Form::text('registration', null, ['class' => 'form-control', 'id' => 'registration', 'required' => true]); ?>

							</div>
						</div>
						<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-control-label" for="vat"><?php echo app('translator')->getFromJson('backend/global.supplier.fields.vat'); ?></label>
								<?php echo Form::text('vat', null, ['class' => 'form-control', 'id' => 'vat', 'required' => false]); ?>

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
	$("form").submit(function() {
		$("#phone_1").val($("#phone_1").intlTelInput("getNumber"));
		$("#phone_2").val($("#phone_2").intlTelInput("getNumber"));
	});
	$("#phone_1").intlTelInput();
	$("#phone_2").intlTelInput();
	$("#country").countrySelect();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>