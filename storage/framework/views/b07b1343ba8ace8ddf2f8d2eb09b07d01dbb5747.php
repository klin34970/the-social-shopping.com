<div class="row">
	<div class="col-lg-4">
		<div class="cui-ecommerce--catalog--item">
			<span id="item-status">

			</span>
			<div class="cui-ecommerce--catalog--item--img">
				
				<a href="javascript: void(0);">
					<?php if($product->images->count()): ?>
					<img onclick="$('.gallery a:first').click()" src="/storage/users/<?php echo e($product->user_id); ?>/products/<?php echo e($product->id); ?>/gallery/<?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $product->images->first()->filename . '_200x200.*')[0])); ?>" />
					<?php endif; ?>
				</a>
			</div>
		</div>
		<?php if($product->images->count()): ?>
			<div class="gallery cui-ecommerce--product--photos clearfix">
				<?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a class="cui-ecommerce--product--photos-item" href="/storage/users/<?php echo e($product->user_id); ?>/products/<?php echo e($product->id); ?>/gallery/<?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $image->filename . '_original.*')[0])); ?>">
							<img src="/storage/users/<?php echo e($product->user_id); ?>/products/<?php echo e($product->id); ?>/gallery/<?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $image->filename . '_50x50.*')[0])); ?>" />
						</a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endif; ?>
	</div>
	
		<div class="col-lg-8">
			<div class="cui-ecommerce--product--sku">
				<span id="item-sku">

				</span>
				<br />
			</div>
			<h4 class="cui-ecommerce--product--main-title"><?php echo e($product->title); ?></h4>
			
			<span id="item-price">

			</span>
			
			<hr />
			<div class="cui-ecommerce--product--descr">
				<?php echo e($product->short_description); ?>

			</div>
			<hr />
			<div class="cui-ecommerce--product--controls">
			
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
			
				<?php echo Form::open(['id' => 'order', 'method' => 'POST', 'route' => ['order.index', 'order' => $product->unique_id]]); ?>

				
					<?php if($product->attributes->count()): ?>
						<?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($attribute->values->count()): ?>
								<div class="form-group row">
									<div class="col-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
										<label class="form-control-label"><?php echo e($attribute->name); ?></label>
									</div>
									<div class="col-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
										<div class="">
											<?php echo e(Form::select('attributes["'.$attribute->name.'"]', $attribute->values->pluck('value', 'id'), \Session::get($product->unique_id . '_' . $attribute->name) ? \Session::get($product->unique_id . '_' . $attribute->name) : null, ['id' => $attribute->name, 'class' => 'form-control'])); ?>

										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<span id="item-quantity"></span>
					
					<button id="show-customer-details" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#customer" aria-expanded="false" aria-controls="customer">
						<i class="icmn-cart5 margin-right-5"></i>
						<?php echo app('translator')->getFromJson('frontend/global.product.buy_now'); ?>
					</button>
					<br />
					<div class="collapse" id="customer">
					
						<div class="row">
						
							<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="email"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.email'); ?></label>
									<?php echo Form::text('email', Auth::user() ? Auth::user()->email : null, ['class' => 'form-control', 'id' => 'email', 'required' => true, 'autocomplete' => true]); ?>

								</div>
							</div>
							<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="company"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.company'); ?></label>
									<?php echo Form::text('company', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->company : null, ['class' => 'form-control', 'id' => 'company', 'required' => false, 'autocomplete' => true]); ?>

								</div>
							</div>
							
							<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="lastname"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.lastname'); ?></label>
									<?php echo Form::text('lastname', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->lastname : null, ['class' => 'form-control', 'id' => 'lastname', 'required' => true, 'autocomplete' => true]); ?>

								</div>
							</div>
							<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="firstname"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.firstname'); ?></label>
									<?php echo Form::text('firstname', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->firstname : null, ['class' => 'form-control', 'id' => 'firstname', 'required' => true, 'autocomplete' => true]); ?>

								</div>
							</div>
							
										
							<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="address_1"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.address_1'); ?></label>
									<?php echo Form::text('address_1', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->address_1 : null, ['class' => 'form-control', 'id' => 'address_1', 'required' => true, 'autocomplete' => true]); ?>

								</div>
							</div>
							<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="address_2"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.address_2'); ?></label>
									<?php echo Form::text('address_2', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->address_2 : null, ['class' => 'form-control', 'id' => 'address_2', 'required' => false, 'autocomplete' => true]); ?>

								</div>
							</div>
							<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="address_3"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.address_3'); ?></label>
									<?php echo Form::text('address_3', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->address_3 : null, ['class' => 'form-control', 'id' => 'address_3', 'required' => false, 'autocomplete' => true]); ?>

								</div>
							</div>
							
							<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="postcode"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.postcode'); ?></label>
									<?php echo Form::text('postcode', isset($geoip['postal_code']) ? $geoip['postal_code'] : ((Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->postcode : null), ['class' => 'form-control', 'id' => 'postcode', 'required' => true, 'autocomplete' => true]); ?>

								</div>
							</div>
							<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="city"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.city'); ?></label>
									<?php echo Form::text('city', isset($geoip['city']) ? $geoip['city'] : ((Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->city : null), ['class' => 'form-control', 'id' => 'city', 'required' => true, 'autocomplete' => true]); ?>

								</div>
							</div>
							<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="country"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.country'); ?></label>
									<div><?php echo Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'required' => true, 'autocomplete' => true]); ?></div>
								</div>
							</div>
							
							
							<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="phone_1"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.phone_1'); ?></label>
									<div><?php echo Form::text('phone_1', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->phone_1 : null, ['class' => 'form-control', 'id' => 'phone_1', 'required' => true, 'autocomplete' => true]); ?></div>
									
								</div>
							</div>
							
							<div class="col-12 col-xl-6 col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="phone_2"><?php echo app('translator')->getFromJson('frontend/global.shipping.fields.phone_2'); ?></label>
									<div><?php echo Form::text('phone_2', (Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->phone_2 : null, ['class' => 'form-control', 'id' => 'phone_2', 'required' => false, 'autocomplete' => true]); ?></div>
									
								</div>
							</div>
							
							<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div id="card-element"></div>
								<div id="card-errors" role="alert"></div>
							</div>
							
							<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<button type="submit" id="payment" class="btn btn-primary btn-block" type="button">
									<i class="icmn-credit-card margin-right-5"></i>
									<?php echo app('translator')->getFromJson('frontend/global.product.payment'); ?>
								</button>
							</div>
							
						</div>
						
					</div>
					
				<?php echo Form::close(); ?>	
				
			</div>
			<div class="cui-ecommerce--product--info">
				<div class="nav-tabs-horizontal">
					<ul class="nav nav-tabs" role="tablist">

						<?php if($product->full_description): ?>
							<li class="nav-item">
								<a class="nav-link active" href="javascript: void(0);" data-toggle="tab" data-target="#tab1" role="tab"><?php echo app('translator')->getFromJson('frontend/global.product.description'); ?></a>
							</li>

						<?php endif; ?>
						<?php if($product->features->count()): ?>
							<li class="nav-item">
								<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab2" role="tab"><?php echo app('translator')->getFromJson('frontend/global.product.features'); ?></a>
							</li>

						<?php endif; ?>
					</ul>
					

					<div class="tab-content padding-vertical-20">
						<?php if($product->full_description): ?>
							<div class="tab-pane active" id="tab1" role="tabpanel">
								<?php echo e($product->full_description); ?>

							</div>

						<?php endif; ?>
						<?php if($product->features->count()): ?>
							<div class="tab-pane" id="tab2" role="tabpanel">
								<dl class="dl-horizontal user-profile-dl">
									<?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<dt><?php echo e($feature->title); ?></dt>
									<dd><?php echo e($feature->description); ?></dd>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</dl>
							</div>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	
	
</div>
