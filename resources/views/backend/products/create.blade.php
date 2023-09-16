@extends('backend.layouts.app')
@section('title', trans('backend/global.product.title'))
@section('page-title', trans('backend/global.product.title'))


@section('content')  
	{!! Form::open(['method' => 'POST', 'route' => ['backend.product.store'], 'files'=> true]) !!}

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
					<h2>
					<div class="pull-right">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-danger-outline">
								{!! Form::radio('active', 0) !!}
								@lang('backend/global.product.fields.disactive')
							</label>
							<label class="btn btn-success-outline active">
								{!! Form::radio('active', 1, true) !!}
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
			
		</div>
		
		<div class="col-12 col-xl-4 col-lg-4 col-md-12 col-sm-12">
		
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
</script>
@endsection