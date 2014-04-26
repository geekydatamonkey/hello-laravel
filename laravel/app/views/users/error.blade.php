@extends('layouts.base')

@section('body')
  <p>{{ link_to("/users","Back to Users")}}</p>

  <h1>Uh Oh!</h1>
  <p>Something's wrong. There's no user named {{{ $username }}}
@stop