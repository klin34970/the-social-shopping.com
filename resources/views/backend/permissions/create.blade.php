@extends('backend.layouts.app')
@section('title', trans('backend/global.permissions.title'))
@section('page-title', trans('backend/global.user-management.title'))

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['backend.permissions.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
			<h3 class="page-title">@lang('backend/global.permissions.title')</h3>
            @lang('backend/global.app_create')
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
            
        </div>
    </div>

    {!! Form::submit(trans('backend/global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

