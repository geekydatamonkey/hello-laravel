@extends('layouts.base')

@section('body')
  <h1>Users</h1>
  <ul>
    @foreach ($users as $user)
      <li>{{ link_to("/users/{$user->username}", "{$user->username}") }}</li>
    @endforeach
  </ul>
@stop
