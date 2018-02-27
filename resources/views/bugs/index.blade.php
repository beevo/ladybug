@extends('layouts.app')

@section('content')
<div class="row">
  <h3>
    Bugs
    <a href="/bugs/create" class="float-right waves-effect waves-light btn">
      <span class="hide-on-small-only">
        New Bug
      </span>
      <i class="hide-on-med-and-up material-icons">add</i>
    </a>
  </h3>

</div>
@foreach ($bugs as $key => $bug)
  <div class="card col s12 l8 row">
    <div class="card-content">

      <div class="card-title">
        <div class="bug-actions">
          <a href="/bugs/{{ $bug->id }}/edit" class="waves-effect waves-light btn grey">
            <span class="hide-on-small-only">
              Edit
            </span>
            <i class="hide-on-med-and-up material-icons">edit</i>
          </a>

        </div>
        <a href="/bugs/{{$bug->id}}">
          {{ $bug->title }} <i>#{{ $bug->id }}</i>
        </a>

      </div>
      {{ $bug->creator->email }} opened this bug {{ $bug->created_at }}
      <br>
      0 comments
    </div>

  </div>
@endforeach

@endsection
