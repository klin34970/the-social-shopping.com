@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', trans('backend/global.user-management.title'))
@section('page-title', trans('backend/global.user-management.title'))

@section('content')
    

    <div class="panel panel-default">
		<div class="panel-heading">
            <h3>
                @lang('backend/global.users.title')
            </h3>
			<a href="{{ route('backend.users.create') }}" class="btn btn-success">@lang('backend/global.app_add_new')</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('backend/global.users.fields.name')</th>
                        <th>@lang('backend/global.users.fields.email')</th>
                        <th>@lang('backend/global.users.fields.roles')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td></td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles()->pluck('name') as $role)
                                        <span class="label label-info label-many">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('backend.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('backend/global.app_edit')</a>
                                    {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("backend/global.app_are_you_sure")."');",
                                        'route' => ['backend.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('backend/global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop