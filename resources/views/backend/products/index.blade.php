@extends('backend.layouts.app')
@section('title', trans('backend/global.product.title'))
@section('page-title', trans('backend/global.product.title'))


@section('content')  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                {{ trans('backend/global.product.list') }}
            </h2>
        </div>
        <div class="panel-body">
			<div class="row">
                <div class="col-lg-12">
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
					<table id="products" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>#</th>
							<th>{{ trans('backend/global.product.thumbnail') }}</th>
							<th>{{ trans('backend/global.product.title2') }}</th>
							<th>{{ trans('backend/global.product.category') }}</th>
							<th>{{ trans('backend/global.product.sku') }}</th>
							<th>{{ trans('backend/global.product.price') }}</th>
							<th>{{ trans('backend/global.product.virtual_stock') }}</th>
							<th>{{ trans('backend/global.product.status') }}</th>
							<th>{{ trans('backend/global.product.link') }}</th>
							<th>{{ trans('backend/global.product.actions') }}</th>
						</tr>
						</thead>
						<tbody>
						@if(count($products))
							@foreach($products as $product)
								<tr>
									<td>{{$product->id}}</td>
									<td>
									@if($product->images->count())
										<a href="{{ URL::route('backend.product.edit', ['product' => $product->id]) }}" class="cui-ecommerce--dashboard--list--img"><img src="/storage/users/{{ $product->user_id }}/products/{{ $product->id }}/gallery/{{ File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $product->images->first()->filename . '_50x50.*')[0]) }}"></a>
									@endif
									</td>
									<td>{{ $product->title }}</td>
									<td>{{ $product->category }}</td>
									<td>{{ $product->sku }}</td>
									<td>{{ ($product->shop->getSymbolCurrency()) }} {!! $product->price_discount ? number_format($product->price_discount, 2).'<small style="display: block;text-decoration: line-through;">'.number_format($product->price, 2).'</small>' : number_format($product->price, 2) !!}</td>
									<td>{{ $product->virtual_stock }}</td>
									<td>{!! $product->active ? '<span class="label label-success">'.trans('backend/global.app_enabled').'</span>' : '<span class="label label-danger">'.trans('backend/global.app_disabled').'</span>' !!}</td>
									<td><a target="_blank" href="{{URL::route('product.index', ['unique_id' => $product->unique_id])}}">{{ $product->unique_id }}</a></td>
									<td>
										<a href="{{ URL::route('backend.product.edit', ['product' => $product->id]) }}" type="button" class="btn btn-success margin-inline">{{ trans('backend/global.app_edit') }}</a>
										@if(auth()->user()->can('shop_product_delete') || auth()->user()->can('shop_product_manage'))
											{{ Form::open(['style' => 'display:inline;', 'method' => 'DELETE', 'route' => ['backend.product.destroy', $product->id]]) }}
											{{ Form::submit(trans('backend/global.app_delete'), array('class' => 'btn btn-danger margin-inline swal-btn-remove')) }}
											{{ Form::close() }}
											
										@endif
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
					<div class="text-center">{{ $products->appends([])->links() }}</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('javascript')
<script>
$('#products').DataTable({
	"responsive" : true,
	"paging":   false,
	"ordering": false,
	"info":     false,
	"filter":	false,
	"autoWidth": false
});
$('.swal-btn-remove').click(function(e){
	e.preventDefault();
	swal({
		title: "{{trans('backend/global.app_are_you_sure')}}",
		text: "{{trans('backend/global.app_notable')}}",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, remove it",
		cancelButtonText: "Cancel",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			setTimeout(function(){
				$(e.target).parent().submit()
			}, 1000);
			swal({
				title: "{{trans('backend/global.app_delete')}}",
				text: "{{trans('backend/global.app_deleted')}}",
				type: "{{trans('backend/global.app_success')}}",
				confirmButtonClass: "btn-success"
			});
		} else {
			swal({
				title: "{{trans('backend/global.app_cancelled')}}",
				text: "{{trans('backend/global.app_safe')}}",
				type: "error",
				confirmButtonClass: "btn-danger"
			});
		}
	});
});
</script>
@endsection
