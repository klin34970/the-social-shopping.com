<?php $__env->startSection('title', trans('backend/global.product.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.product.title')); ?>


<?php $__env->startSection('content'); ?>  

	<?php echo Form::model($product, ['method' => 'PUT', 'route' => ['backend.product.update', 'product' => $product], 'files'=> true]); ?>

		
		<div class="row">
	
		<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
		
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
			
			
			<div class="nav-tabs-horizontal">
				<ul class="nav nav-tabs" role="tablist" style="background:#fff;border-radius: 5px;border: 1px solid #dfe4ed;">
					<li class="nav-item">
						<a class="nav-link active" href="javascript: void(0);" data-toggle="tab" data-target="#tab-informations" role="tab"><?php echo app('translator')->getFromJson('backend/global.product.informations'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-gallery" role="tab"><?php echo app('translator')->getFromJson('backend/global.product.gallery'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-features" role="tab"><?php echo app('translator')->getFromJson('backend/global.product.features'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-attributes" role="tab"><?php echo app('translator')->getFromJson('backend/global.product.attributes'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-variants" role="tab"><?php echo app('translator')->getFromJson('backend/global.product.variants'); ?></a>
					</li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab-informations" role="tabpanel">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>
								<div class="pull-right">
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-danger-outline <?php echo e($product->active ? '' : 'active'); ?>">
											<?php echo Form::radio('active', 0); ?>

											<?php echo app('translator')->getFromJson('backend/global.product.fields.disactive'); ?>
										</label>
										<label class="btn btn-success-outline <?php echo e($product->active ? 'active' : ''); ?>">
											<?php echo Form::radio('active', 1); ?>

											<?php echo app('translator')->getFromJson('backend/global.product.fields.active'); ?>
										</label>
									</div>
								</div>
								<?php echo app('translator')->getFromJson('backend/global.product.product_information'); ?></h2>
							</div>
							<div class="panel-body">

								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="title"><?php echo app('translator')->getFromJson('backend/global.product.fields.title'); ?></label>
											<?php echo Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'required' => true]); ?>

										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="sku"><?php echo app('translator')->getFromJson('backend/global.product.fields.sku'); ?></label>
											<?php echo Form::text('sku', null, ['class' => 'form-control', 'id' => 'sku', 'required' => false]); ?>

										</div>
									</div>
									
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="category"><?php echo app('translator')->getFromJson('backend/global.product.fields.category'); ?></label>
											<?php echo e(Form::select('category', array_combine(trans('backend/global.product.categories'), trans('backend/global.product.categories')), null, ['class' => 'select2-tags', 'required' => true])); ?>

										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="short_description"><?php echo app('translator')->getFromJson('backend/global.product.fields.short_description'); ?></label>
											<?php echo Form::text('short_description', null, ['class' => 'form-control', 'id' => 'short_description', 'required' => true]); ?>

										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="full_description"><?php echo app('translator')->getFromJson('backend/global.product.fields.full_description'); ?></label>
											<?php echo Form::textarea('full_description', null, ['class' => 'form-control', 'id' => 'full_description', 'required' => false]); ?>

										</div>
									</div>

									
									<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

									
								</div>	
								
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><?php echo app('translator')->getFromJson('backend/global.product.shop_and_supplier'); ?></h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="shop"><?php echo app('translator')->getFromJson('backend/global.product.fields.shops'); ?></label>
											<?php echo e(Form::select('shop', $shops, null, ['class' => 'select2-tags', 'id' => 'shop', 'required' => true])); ?>

										</div>
									</div>
									
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="supplier"><?php echo app('translator')->getFromJson('backend/global.product.fields.suppliers'); ?></label>
											<?php echo e(Form::select('supplier', $suppliers, null, ['class' => 'select2-tags', 'id' => 'supplier', 'required' => true])); ?>

										</div>	
									</div>
									
									<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

									
								</div>
								
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><?php echo app('translator')->getFromJson('backend/global.product.price'); ?></h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="price"><?php echo app('translator')->getFromJson('backend/global.product.fields.price'); ?></label>
											<?php echo Form::number('price', null, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'price', 'required' => true]); ?>

										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="price_discount"><?php echo app('translator')->getFromJson('backend/global.product.fields.price_discount'); ?></label>
											<?php echo Form::number('price_discount', null, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'price_discount', 'required' => false]); ?>

										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="virtual_stock"><?php echo app('translator')->getFromJson('backend/global.product.fields.taxe'); ?></label>
											<?php echo Form::number('taxe', null, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'taxe', 'required' => true]); ?>

										</div>
									</div>
									
									<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

									
								</div>
								
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><?php echo app('translator')->getFromJson('backend/global.product.stock'); ?></h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="virtual_stock"><?php echo app('translator')->getFromJson('backend/global.product.fields.virtual_stock'); ?></label>
											<?php echo Form::number('virtual_stock', null, ['min' => 0, 'step' => 1, 'class' => 'form-control', 'id' => 'virtual_stock', 'required' => false]); ?>

										</div>
									</div>
									
									<?php echo Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']); ?>

									
								</div>
								
							</div>
						</div>
						
					</div>
					<div class="tab-pane" id="tab-gallery" role="tabpanel">
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><?php echo app('translator')->getFromJson('backend/global.product.gallery'); ?></h2>
							</div>
							<div class="panel-body">
								
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div id="upload">
											<div id="drop">
												<a><?php echo app('translator')->getFromJson('backend/global.product.browse'); ?></a>
												<input type="file" name="upl" multiple />
											</div>
											<ul id="sortable">
												<?php if($product->images->count()): ?>
													<?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li class="ui-state-default" data-id="<?php echo e($image->filename); ?>">
															<img src="/storage/users/<?php echo e($product->user_id); ?>/products/<?php echo e($product->id); ?>/gallery/<?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $image->filename . '_50x50.*')[0])); ?>">
															<div style="display:inline;width:48px;height:48px;"></div>
															<p><?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $image->filename . '_50x50.*')[0])); ?></p>
															<span></span>
															<div role="button" class="btn btn-danger"><?php echo app('translator')->getFromJson('backend/global.app_delete'); ?></div>
														</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</ul>
										
										<small><?php echo app('translator')->getFromJson('backend/global.product.image_requirement'); ?></small>
										</div>
									
									</div>
								
								</div>
							</div>
						</div>
						
					</div>
					<div class="tab-pane" id="tab-features" role="tabpanel">
						
						<div id="features" class="panel panel-default">
							<div class="panel-heading">
								<div class="pull-right">
									<div role="button" class="btn btn-primary"><i class="icmn-plus"></i></div>
								</div>
								<h2><?php echo app('translator')->getFromJson('backend/global.product.features'); ?></h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									
										<div id="features-inputs">
										
											<ul id="sortable">
												<?php if($product->features->count()): ?>
													<?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li class="ui-state-default" data-id="<?php echo e($feature->id); ?>">
															<div class="row">
																<div class="process">
																	<div role="button-save" class="btn btn-success"><?php echo e(trans('backend/global.app_save')); ?></div><div role="button-delete" class="btn btn-danger"><?php echo e(trans('backend/global.app_delete')); ?></div>
																</div>
																<div class="col-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">
																	<div class="form-group">
																		<?php echo Form::text('features_title', $feature->title, ['placeholder' => 'title', 'class' => 'form-control', 'id' => 'features_title']); ?>

																	</div>
																</div>
																<div class="col-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">
																	<div class="form-group">
																		<?php echo Form::text('features_description', $feature->description, ['placeholder' => 'description', 'class' => 'form-control', 'id' => 'features_description']); ?>

																	</div>
																</div>
															</div>
														</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											
											</ul>
											
										</div>
										
									</div>
									
								</div>
								
							</div>
						</div>
			
					</div>
					<div class="tab-pane" id="tab-attributes" role="tabpanel">
					
						<div id="attributes" class="panel panel-default">
							<div class="panel-heading">
								<div class="pull-right">
									<div role="button-attributes" class="btn btn-primary"><i class="icmn-plus"></i></div>
								</div>
								<h2><?php echo app('translator')->getFromJson('backend/global.product.attributes'); ?></h2>
							</div>
							<div class="panel-body">
								
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									
										<div id="attributes-inputs">
										
											<ul id="sortable-attributes">
												
												<?php if($product->attributes->count()): ?>
													<?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li class="parent ui-state-default" data-id="<?php echo e($attribute->id); ?>">
															<div class="row">
																<div class="process-attributes">
																	<div role="button-save-attributes" class="btn btn-success"><?php echo e(trans('backend/global.app_save')); ?></div><div role="button-delete-attributes" class="btn btn-danger"><?php echo e(trans('backend/global.app_delete')); ?></div>
																</div>
																<div class="col-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">
																	<div class="form-group">
																		<?php echo Form::text('attributes_name', $attribute->name, ['placeholder' => 'name', 'class' => 'form-control', 'id' => 'attributes_name']); ?>

																	</div>
																</div>
																<div class="col-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">
																	
																	<div id="attributes-values" class="panel panel-default">
																		<div class="panel-heading">
																			<div class="pull-right">
																				<div role="button-attributes-values" class="btn btn-primary"><i class="icmn-plus"></i></div>
																			</div>
																		</div>
																		<div class="panel-body">
																			<div class="row">
																				<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
																					<div id="attributes-values-inputs">
																						<ul id="sortable-attributes-values" data-id="<?php echo e($attribute->id); ?>">
																							<?php if($attribute->values->count()): ?>
																								<?php $__currentLoopData = $attribute->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																									
																									<li class="ui-state-default" data-id="<?php echo e($value->id); ?>">
																										<div class="row">
																											<div class="process-attributes-values">
																												<div role="button-save-attributes-values" class="btn btn-success"><?php echo e(trans('backend/global.app_save')); ?></div><div role="button-delete-attributes-values" class="btn btn-danger"><?php echo e(trans('backend/global.app_delete')); ?></div>
																											</div>
																											<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
																												<div class="form-group">
																													<?php echo Form::text('attributes_values_value', $value->value, ['placeholder' => 'value', 'class' => 'form-control', 'id' => 'attributes_values_value']); ?>

																												</div>
																											</div>
																										</div>
																									</li>
																									
																								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																							<?php endif; ?>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	
																</div>
															</div>
														</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
												
											</ul>
											
										</div>
									
									</div>
								
								</div>
							</div>
						</div>
					
					</div>
					
					<div class="tab-pane" id="tab-variants" role="tabpanel">
					
						<div id="variants" class="panel panel-default">
							<div class="panel-heading">
								<h2><?php echo app('translator')->getFromJson('backend/global.product.variants'); ?></h2>
							</div>
							<div class="panel-body">
								
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									
										
											<table id="tvariants" class="vertical-middle table table-hover nowrap" width="100%">
												<thead class="thead-inverse">
													<tr>
														<th>#</th>
														<th>sku</th>
														<th>price</th>
														<th>discount</th>
														<th>stock</th>
														<th>action</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
									</div>
								
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
						
			
			
		</div>
		
	</div>
	
	<?php echo Form::close(); ?>

	


<?php $__env->stopSection(); ?>

<?php $__env->startSection('pre-javascript'); ?>
	<script>
		var csrf_token = "<?php echo e(csrf_token()); ?>";
		
		var sSave = "<?php echo e(trans('backend/global.app_save')); ?>";
		var sDelete = "<?php echo e(trans('backend/global.app_delete')); ?>";
		
		var feature_position = "<?php echo e(URL::route('backend.product.update.feature.position', ['product' => $product])); ?>";
		var feature_create = "<?php echo e(URL::route('backend.product.create.feature', ['product' => $product])); ?>";
		var feature_delete = "<?php echo e(URL::route('backend.product.delete.feature', ['product' => $product])); ?>";
		
		var attribute_position = "<?php echo e(URL::route('backend.product.update.attribute.position', ['product' => $product])); ?>";
		var attribute_create = "<?php echo e(URL::route('backend.product.create.attribute', ['product' => $product])); ?>";
		var attribute_delete = "<?php echo e(URL::route('backend.product.delete.attribute', ['product' => $product])); ?>";
		
		var attribute_value_position = "<?php echo e(URL::route('backend.product.update.attribute.value.position', ['product' => $product])); ?>";
		var attribute_value_create = "<?php echo e(URL::route('backend.product.create.attribute.value', ['product' => $product])); ?>";
		var attribute_value_delete = "<?php echo e(URL::route('backend.product.delete.attribute.value', ['product' => $product])); ?>";
		
		var gallery_position = "<?php echo e(URL::route('backend.product.update.gallery.position', ['product' => $product])); ?>";
		var gallery_create = "<?php echo e(URL::route('backend.product.update.gallery', ['product' => $product])); ?>";
		var gallery_delete = "<?php echo e(URL::route('backend.product.delete.gallery', ['product' => $product])); ?>";
		
		
		
		var variants = "<?php echo e(URL::route('backend.product.variants', ['product' => $product])); ?>";
		var variant_create = "<?php echo e(URL::route('backend.product.variant.create', ['product' => $product])); ?>";
		var variant_delete = "<?php echo e(URL::route('backend.product.variant.delete', ['product' => $product])); ?>";
	</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script>
		
		$('.select2-tags').select2({
			tags: true,
			tokenSeparators: [',', ' ']
		});
		
		populate_combinations(false);		
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>