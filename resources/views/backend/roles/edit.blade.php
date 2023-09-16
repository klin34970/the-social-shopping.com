@extends('backend.layouts.app')
@section('title', trans('backend/global.roles.title'))
@section('page-title', trans('backend/global.user-management.title'))
@section('content')
    
    
    {!! Form::model($role, ['method' => 'PUT', 'route' => ['backend.roles.update', $role->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
			<h3 class="page-title">@lang('backend/global.roles.title')</h3>
            @lang('backend/global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('permission', 'Permissions', ['class' => 'control-label']) !!}
                    {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $role->permissions()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('permission'))
                        <p class="help-block">
                            {{ $errors->first('permission') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('backend/global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

