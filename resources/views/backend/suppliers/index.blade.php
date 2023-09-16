@extends('backend.layouts.app')
@section('title', trans('backend/global.supplier.title'))
@section('page-title', trans('backend/global.supplier.title'))


@section('content')  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                <div class="dropdown pull-right">
                    <a href="{{URL::route('backend.supplier.create')}}" class="btn btn-primary">
						{{ trans('backend/global.supplier.add_supplier') }}
                    </a>
                </div>
                {{ trans('backend/global.supplier.list') }}
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
					<table id="suppliers" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>#</th>
							<th>{{ trans('backend/global.supplier.company') }}</th>
							<th>{{ trans('backend/global.supplier.email') }}</th>
							<th>{{ trans('backend/global.supplier.registration') }}</th>
							<th>{{ trans('backend/global.supplier.actions') }}</th>
						</tr>
						</thead>
						<tbody>
						@if(count($suppliers))
							@foreach($suppliers as $supplier)
								<tr>
									<td>{{ $supplier->id }}</td>
									<td>{{ $supplier->company }}</td>
									<td>{{ $supplier->email }}</td>
									<td>{{ $supplier->registration }}</td>
									<td>
										<a href="{{ URL::route('backend.supplier.edit', ['supplier' => $supplier->id]) }}" type="button" class="btn btn-success margin-inline">{{ trans('backend/global.app_edit') }}</a>
										@if(auth()->user()->can('shop_delete') || auth()->user()->can('shop_manage'))
											{{ Form::open(['style' => 'display:inline;', 'method' => 'DELETE', 'route' => ['backend.supplier.destroy', $supplier->id]]) }}
											{{ Form::submit(trans('backend/global.app_delete'), array('data-products' => $supplier->products->count(), 'class' => 'btn btn-danger margin-inline swal-btn-remove')) }}
											{{ Form::close() }}
											
										@endif
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
					<div class="text-center">{{ $suppliers->appends([])->links() }}</div>
				</div>
			</div>
		</div>
	</div>
@stop


@section('javascript')
<script>
$('#suppliers').DataTable({
	"responsive" : true,
	"paging":   false,
	"ordering": false,
	"info":     false,
	"filter":	false,
});
$('.swal-btn-remove').click(function(e){
	e.preventDefault();
	console.log($(e.target).data('products'));
	swal({
		title: "{{trans('backend/global.app_are_you_sure')}}",
		text: $(e.target).data('products') + " {{trans('backend/global.supplier.related')}}. {{trans('backend/global.app_notable')}}",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "{{trans('backend/global.app_yes_remove')}}",
		cancelButtonText: "{{trans('backend/global.app_cancel')}}",
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
