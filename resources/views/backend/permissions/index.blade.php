@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', trans('backend/global.permissions.title'))
@section('page-title', trans('backend/global.user-management.title'))
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
			<h3 class="page-title">@lang('backend/global.permissions.title')</h3>
            <a href="{{ route('backend.permissions.create') }}" class="btn btn-success">@lang('backend/global.app_add_new')</a>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($permissions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('backend/global.permissions.fields.name')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($permissions) > 0)
                        @foreach ($permissions as $permission)
                            <tr data-entry-id="{{ $permission->id }}">
                                <td></td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a href="{{ route('backend.permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('backend/global.app_edit')</a>
                                    {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("backend/global.app_are_you_sure")."');",
                                        'route' => ['backend.permissions.destroy', $permission->id])) !!}
                                    {!! Form::submit(trans('backend/global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('backend/global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop