@extends('layouts.app')

@section('content')
  @guest
    <div class="alert card-panel yellow lighten-4 yellow-text text-darken-4">
      <a class="yellow darken-4 close yellow-text text-darken-4 btn-small btn-floating waves-effect waves-light">
        <i class="material-icons">close</i>
      </a>
      <b>Warning!</b> You must <a href="/login">login</a> to edit this bug.
    </div>
  @endguest

  @include('bugs._bug_form', [
    'method' => 'PUT'
  ])

@endsection
