@extends('layouts.base')

@section('body')
    <h1>Create New User</h1>

    {{ Form::open(['route' => 'users.store']) }}
        <div class="form-control-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', Input::old('username'), ['placeholder' => 'username@domain.com']) }}
        </div>
        <div class="form-control-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', Input::old('password')) }}
        </div>

        <div class="form-button-group">
            {{ Form::submit('Create User') }}
        </div>
    {{ Form::close() }}
@stop