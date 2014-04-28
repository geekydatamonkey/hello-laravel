@extends('layouts.base')

@section('body')
    <h1>Users</h1>

    <p><a href="{{ URL::route('users.create') }}">Create New User</a></p>

    @if (! $users->isEmpty())
        <ul>
            @foreach ($users as $user)
                <li>{{ link_to("/users/{$user->username}", "{$user->username}") }}</li>
            @endforeach
        </ul>
    @else
        <p>There are no users.</p>
    @endif
@stop
