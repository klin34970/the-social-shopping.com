@extends('backend.layouts.app')
@section('title', trans('backend/global.customer.title'))
@section('page-title', trans('backend/global.customer.title'))


@section('content')  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                {{ trans('backend/global.customer.list') }}
            </h2>
        </div>
        <div class="panel-body">
			<div class="row">
                <div class="col-lg-12">
					<table id="orders" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>{{ trans('backend/global.customer.name') }}</th>
							<th>{{ trans('backend/global.customer.location') }}</th>
							<th>{{ trans('backend/global.customer.orders') }}</th>
							<th>{{ trans('backend/global.customer.last_order') }}</th>
							<th>{{ trans('backend/global.customer.total_spent') }}</th>
						</tr>
						</thead>
						<tbody>
						@if(count($orders))
							@foreach($orders as $order)
								<tr>
									<td>{{ $order->customer->lastname }}</td>
									<td>{{ $order->customer->addresses->first()->country }}</td>
									<td>{{ $order->total_order }}</td>
									<td>{{ $order->created_at }}</td>
									<td>{{ $order->getSymbolCurrency() }} {{ number_format($order->total_spent, 2) }}</td>
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
