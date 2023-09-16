@extends('backend.layouts.app')
@section('title', trans('backend/global.order.title'))
@section('page-title', trans('backend/global.order.title'))

@section('content')  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                {{ trans('backend/global.order.list') }}
            </h2>
        </div>
        <div class="panel-body">
			<div class="row">
                <div class="col-lg-12">
					<table id="orders" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>{{ trans('backend/global.order.reference') }}</th>
							<th>{{ trans('backend/global.order.date') }}</th>
							<th>{{ trans('backend/global.order.customer') }}</th>
							<th>{{ trans('backend/global.order.grand_total') }}</th>
							<th>{{ trans('backend/global.order.tax') }}</th>
							<th>{{ trans('backend/global.order.quantity') }}</th>
							<th>{{ trans('backend/global.order.status') }}</th>
							<th>{{ trans('backend/global.order.action') }}</th>
						</tr>
						</thead>
						<tbody>
						@if(count($orders))
							@foreach($orders as $order)
								<tr>
									<td>{{ $order->reference }}</td>
									<td>{{ $order->created_at }}</td>
									<td>{{ $order->address->lastname }} {{ $order->address->firstname }}</td>
									<td>{{ $order->getSymbolCurrency() }} {{ number_format($order->product_price * $order->product_quantity, 2) }}</td>
									<td>{{ $order->getSymbolCurrency() }} {{ number_format($order->product_tax * $order->product_quantity, 2) }}</td>
									<td>{{ $order->product_quantity }}</td>
									<td><span class="label label-order-{{$order->current_state}}">{{ trans('frontend/global.order.state.' . $order->current_state . '') }}</span></td>
									<td>
										<a href="{{ URL::route('backend.order.edit', ['order' => $order->id]) }}" type="button" class="btn btn-success margin-inline">{{ trans('backend/global.app_edit') }}</a>
										@if(auth()->user()->can('order_delete') || auth()->user()->can('order_manage'))
											{{ Form::open(['style' => 'display:inline;', 'method' => 'DELETE', 'route' => ['backend.order.destroy', $order->id]]) }}
											{{ Form::submit(trans('backend/global.app_delete'), array('class' => 'btn btn-danger margin-inline swal-btn-remove')) }}
											{{ Form::close() }}
											
										@endif
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
					<div class="text-center">{{ $orders->appends([])->links() }}</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('javascript')
<script>
$('#orders').DataTable({
	"responsive" : true,
	"paging":   false,
	"ordering": false,
	"info":     false,
	"filter":	false,
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
