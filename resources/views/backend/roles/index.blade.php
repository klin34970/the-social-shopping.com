@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', trans('backend/global.roles.title'))
@section('page-title', trans('backend/global.user-management.title'))
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="page-title">@lang('backend/global.roles.title')</h3>
			<a href="{{ route('backend.roles.create') }}" class="btn btn-success">@lang('backend/global.app_add_new')</a>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('backend/global.roles.fields.name')</th>
                        <th>@lang('backend/global.roles.fields.permission')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($roles) > 0)
                        @foreach ($roles as $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td></td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions()->pluck('name') as $permission)
                                        <span class="label label-info label-many">{{ $permission }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('backend.roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('backend/global.app_edit')</a>
                                    {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("backend/global.app_are_you_sure")."');",
                                        'route' => ['backend.roles.destroy', $role->id])) !!}
                                    {!! Form::submit(trans('backend/global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('backend/global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop