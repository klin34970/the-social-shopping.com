@extends('backend.layouts.app')
@section('title', trans('backend/global.product.title'))
@section('page-title', trans('backend/global.product.title'))


@section('content')  

	{!! Form::model($product, ['method' => 'PUT', 'route' => ['backend.product.update', 'product' => $product], 'files'=> true]) !!}
		
		<div class="row">
	
		<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
		
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
			
			
			<div class="nav-tabs-horizontal">
				<ul class="nav nav-tabs" role="tablist" style="background:#fff;border-radius: 5px;border: 1px solid #dfe4ed;">
					<li class="nav-item">
						<a class="nav-link active" href="javascript: void(0);" data-toggle="tab" data-target="#tab-informations" role="tab">@lang('backend/global.product.informations')</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-gallery" role="tab">@lang('backend/global.product.gallery')</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-features" role="tab">@lang('backend/global.product.features')</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-attributes" role="tab">@lang('backend/global.product.attributes')</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab-variants" role="tab">@lang('backend/global.product.variants')</a>
					</li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab-informations" role="tabpanel">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>
								<div class="pull-right">
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-danger-outline {{ $product->active ? '' : 'active' }}">
											{!! Form::radio('active', 0) !!}
											@lang('backend/global.product.fields.disactive')
										</label>
										<label class="btn btn-success-outline {{ $product->active ? 'active' : '' }}">
											{!! Form::radio('active', 1) !!}
											@lang('backend/global.product.fields.active')
										</label>
									</div>
								</div>
								@lang('backend/global.product.product_information')</h2>
							</div>
							<div class="panel-body">

								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="title">@lang('backend/global.product.fields.title')</label>
											{!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'required' => true]) !!}
										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="sku">@lang('backend/global.product.fields.sku')</label>
											{!! Form::text('sku', null, ['class' => 'form-control', 'id' => 'sku', 'required' => false]) !!}
										</div>
									</div>
									
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="category">@lang('backend/global.product.fields.category')</label>
											{{ Form::select('category', array_combine(trans('backend/global.product.categories'), trans('backend/global.product.categories')), null, ['class' => 'select2-tags', 'required' => true]) }}
										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="short_description">@lang('backend/global.product.fields.short_description')</label>
											{!! Form::text('short_description', null, ['class' => 'form-control', 'id' => 'short_description', 'required' => true]) !!}
										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="full_description">@lang('backend/global.product.fields.full_description')</label>
											{!! Form::textarea('full_description', null, ['class' => 'form-control', 'id' => 'full_description', 'required' => false]) !!}
										</div>
									</div>

									
									{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
									
								</div>	
								
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>@lang('backend/global.product.shop_and_supplier')</h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="shop">@lang('backend/global.product.fields.shops')</label>
											{{ Form::select('shop', $shops, null, ['class' => 'select2-tags', 'id' => 'shop', 'required' => true]) }}
										</div>
									</div>
									
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="supplier">@lang('backend/global.product.fields.suppliers')</label>
											{{ Form::select('supplier', $suppliers, null, ['class' => 'select2-tags', 'id' => 'supplier', 'required' => true]) }}
										</div>	
									</div>
									
									{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
									
								</div>
								
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>@lang('backend/global.product.price')</h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="price">@lang('backend/global.product.fields.price')</label>
											{!! Form::number('price', null, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'price', 'required' => true]) !!}
										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="price_discount">@lang('backend/global.product.fields.price_discount')</label>
											{!! Form::number('price_discount', null, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'price_discount', 'required' => false]) !!}
										</div>
									</div>
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="virtual_stock">@lang('backend/global.product.fields.taxe')</label>
											{!! Form::number('taxe', null, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'taxe', 'required' => true]) !!}
										</div>
									</div>
									
									{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
									
								</div>
								
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>@lang('backend/global.product.stock')</h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="virtual_stock">@lang('backend/global.product.fields.virtual_stock')</label>
											{!! Form::number('virtual_stock', null, ['min' => 0, 'step' => 1, 'class' => 'form-control', 'id' => 'virtual_stock', 'required' => false]) !!}
										</div>
									</div>
									
									{!! Form::submit(trans('backend/global.app_save'), ['class' => 'pull-right btn btn-success margin-inline']) !!}
									
								</div>
								
							</div>
						</div>
						
					</div>
					<div class="tab-pane" id="tab-gallery" role="tabpanel">
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>@lang('backend/global.product.gallery')</h2>
							</div>
							<div class="panel-body">
								
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div id="upload">
											<div id="drop">
												<a>@lang('backend/global.product.browse')</a>
												<input type="file" name="upl" multiple />
											</div>
											<ul id="sortable">
												@if($product->images->count())
													@foreach($product->images as $image)
														<li class="ui-state-default" data-id="{{$image->filename}}">
															<img src="/storage/users/{{ $product->user_id }}/products/{{ $product->id }}/gallery/{{ File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $image->filename . '_50x50.*')[0]) }}">
															<div style="display:inline;width:48px;height:48px;"></div>
															<p>{{ File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $image->filename . '_50x50.*')[0]) }}</p>
															<span></span>
															<div role="button" class="btn btn-danger">@lang('backend/global.app_delete')</div>
														</li>
													@endforeach
												@endif
											</ul>
										
										<small>@lang('backend/global.product.image_requirement')</small>
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
								<h2>@lang('backend/global.product.features')</h2>
							</div>
							<div class="panel-body">
							
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									
										<div id="features-inputs">
										
											<ul id="sortable">
												@if($product->features->count())
													@foreach($product->features as $feature)
														<li class="ui-state-default" data-id="{{$feature->id}}">
															<div class="row">
																<div class="process">
																	<div role="button-save" class="btn btn-success">{{trans('backend/global.app_save')}}</div><div role="button-delete" class="btn btn-danger">{{trans('backend/global.app_delete')}}</div>
																</div>
																<div class="col-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">
																	<div class="form-group">
																		{!! Form::text('features_title', $feature->title, ['placeholder' => 'title', 'class' => 'form-control', 'id' => 'features_title']) !!}
																	</div>
																</div>
																<div class="col-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">
																	<div class="form-group">
																		{!! Form::text('features_description', $feature->description, ['placeholder' => 'description', 'class' => 'form-control', 'id' => 'features_description']) !!}
																	</div>
																</div>
															</div>
														</li>
													@endforeach
												@endif
											
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
								<h2>@lang('backend/global.product.attributes')</h2>
							</div>
							<div class="panel-body">
								
								<div class="row">
								
									<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									
										<div id="attributes-inputs">
										
											<ul id="sortable-attributes">
												
												@if($product->attributes->count())
													@foreach($product->attributes as $attribute)
														<li class="parent ui-state-default" data-id="{{$attribute->id}}">
															<div class="row">
																<div class="process-attributes">
																	<div role="button-save-attributes" class="btn btn-success">{{trans('backend/global.app_save')}}</div><div role="button-delete-attributes" class="btn btn-danger">{{trans('backend/global.app_delete')}}</div>
																</div>
																<div class="col-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">
																	<div class="form-group">
																		{!! Form::text('attributes_name', $attribute->name, ['placeholder' => 'name', 'class' => 'form-control', 'id' => 'attributes_name']) !!}
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
																						<ul id="sortable-attributes-values" data-id="{{$attribute->id}}">
																							@if($attribute->values->count())
																								@foreach($attribute->values as $value)
																									
																									<li class="ui-state-default" data-id="{{$value->id}}">
																										<div class="row">
																											<div class="process-attributes-values">
																												<div role="button-save-attributes-values" class="btn btn-success">{{trans('backend/global.app_save')}}</div><div role="button-delete-attributes-values" class="btn btn-danger">{{trans('backend/global.app_delete')}}</div>
																											</div>
																											<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
																												<div class="form-group">
																													{!! Form::text('attributes_values_value', $value->value, ['placeholder' => 'value', 'class' => 'form-control', 'id' => 'attributes_values_value']) !!}
																												</div>
																											</div>
																										</div>
																									</li>
																									
																								@endforeach
																							@endif
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	
																</div>
															</div>
														</li>
													@endforeach
												@endif
												
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
								<h2>@lang('backend/global.product.variants')</h2>
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
	
	{!! Form::close() !!}
	


@stop

@section('pre-javascript')
	<script>
		var csrf_token = "{{ csrf_token() }}";
		
		var sSave = "{{trans('backend/global.app_save')}}";
		var sDelete = "{{trans('backend/global.app_delete')}}";
		
		var feature_position = "{{ URL::route('backend.product.update.feature.position', ['product' => $product]) }}";
		var feature_create = "{{ URL::route('backend.product.create.feature', ['product' => $product]) }}";
		var feature_delete = "{{ URL::route('backend.product.delete.feature', ['product' => $product]) }}";
		
		var attribute_position = "{{ URL::route('backend.product.update.attribute.position', ['product' => $product]) }}";
		var attribute_create = "{{ URL::route('backend.product.create.attribute', ['product' => $product]) }}";
		var attribute_delete = "{{ URL::route('backend.product.delete.attribute', ['product' => $product]) }}";
		
		var attribute_value_position = "{{ URL::route('backend.product.update.attribute.value.position', ['product' => $product]) }}";
		var attribute_value_create = "{{ URL::route('backend.product.create.attribute.value', ['product' => $product]) }}";
		var attribute_value_delete = "{{ URL::route('backend.product.delete.attribute.value', ['product' => $product]) }}";
		
		var gallery_position = "{{ URL::route('backend.product.update.gallery.position', ['product' => $product]) }}";
		var gallery_create = "{{ URL::route('backend.product.update.gallery', ['product' => $product]) }}";
		var gallery_delete = "{{ URL::route('backend.product.delete.gallery', ['product' => $product]) }}";
		
		
		
		var variants = "{{ URL::route('backend.product.variants', ['product' => $product]) }}";
		var variant_create = "{{ URL::route('backend.product.variant.create', ['product' => $product]) }}";
		var variant_delete = "{{ URL::route('backend.product.variant.delete', ['product' => $product]) }}";
	</script>
@endsection

@section('javascript')
	<script>
		
		$('.select2-tags').select2({
			tags: true,
			tokenSeparators: [',', ' ']
		});
		
		populate_combinations(false);		
	</script>
@endsection