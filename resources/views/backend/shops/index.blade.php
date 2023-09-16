@extends('backend.layouts.app')
@section('title', trans('backend/global.shop.title'))
@section('page-title', trans('backend/global.shop.title'))


@section('content')  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                <div class="dropdown pull-right">
                    <a href="{{URL::route('backend.shop.create')}}" class="btn btn-primary">
						{{ trans('backend/global.shop.add_shop') }}
                    </a>
                </div>
                {{ trans('backend/global.shop.list') }}
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
					<table id="shops" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>#</th>
							<th>{{ trans('backend/global.shop.company') }}</th>
							<th>{{ trans('backend/global.shop.email') }}</th>
							<th>{{ trans('backend/global.shop.registration') }}</th>
							<th>{{ trans('backend/global.shop.actions') }}</th>
						</tr>
						</thead>
						<tbody>
						@if(count($shops))
							@foreach($shops as $shop)
								<tr>
									<td>{{ $shop->id }}</td>
									<td>{{ $shop->company }}</td>
									<td>{{ $shop->email }}</td>
									<td>{{ $shop->registration }}</td>
									<td>
										<a href="{{ URL::route('backend.shop.edit', ['shop' => $shop->id]) }}" type="button" class="btn btn-success margin-inline">{{ trans('backend/global.app_edit') }}</a>
										@if(auth()->user()->can('shop_delete') || auth()->user()->can('shop_manage'))
											{{ Form::open(['style' => 'display:inline;', 'method' => 'DELETE', 'route' => ['backend.shop.destroy', $shop->id]]) }}
											{{ Form::submit(trans('backend/global.app_delete'), array('data-products' => $shop->products->count(), 'class' => 'btn btn-danger margin-inline swal-btn-remove')) }}
											{{ Form::close() }}
											
										@endif
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
					<div class="text-center">{{ $shops->appends([])->links() }}</div>
				</div>
			</div>
		</div>
	</div>
@stop


@section('javascript')
<script>
$('#shops').DataTable({
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
		text: $(e.target).data('products') + " {{trans('backend/global.shop.related')}}. {{trans('backend/global.app_notable')}}",
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
