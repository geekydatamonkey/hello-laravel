@extends('layouts.base')

@section('body')
  <p>{{ link_to("/users","Back to Users")}}</p>

  <h1>{{ $user->username }}</h1>
  <p>User since: {{ $user->created_at }}</p>
@stop