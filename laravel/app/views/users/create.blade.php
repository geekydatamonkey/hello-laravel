@extends('layouts.base')

@section('body')
    <h1>Create New User</h1>

    {{ Form::open(['route' => 'users.store']) }}
        <div class="form-control-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', Input::old('username'), ['placeholder' => 'username@domain.com']) }}
          {{ $errors->first('username', '<span class="error">:message</span>') }}
        </div>
        <div class="form-control-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', Input::old('password')) }}
            {{ $errors->first('password','<span class="error">:message</span>') }}
        </div>
        <div class="form-control-group">
          {{ Form::label('password_confirmation', 'Confirm Password:') }}
          {{ Form::password('password_confirmation', Input::old('password')) }}
          {{ $errors->first('password_confirmation','<span class="error">:message</span>') }}
        </div>

        <div class="form-button-group">
            {{ Form::submit('Create User') }}
        </div>
    {{ Form::close() }}
@stop