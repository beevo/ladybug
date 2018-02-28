@extends('layouts.app')

@section('content')
@csrf
<div class="col s12 l8">
  <div class="card">
    <div class="card-content">

      <div class="card-title">
        <div class="right">
          <a href="/bugs/{{ $bug->id }}/edit" class="waves-effect waves-light btn grey">
            <span class="hide-on-small-only">
              Edit
            </span>
            <i class="hide-on-med-and-up material-icons">edit</i>
          </a>
          <a href="/bugs/create" class="waves-effect waves-light btn">
            <span class="hide-on-small-only">
              New Bug
            </span>
            <i class="hide-on-med-and-up material-icons">add</i>
          </a>
        </div>
        {{ $bug->title }}
        <i>#{{ $bug->id }}</i>
      </div>
      {{ $bug->creator->email }} opened this bug {{ $bug->created_at }}
    </div>
    <div class="card-content">
      @if ($bug->description)
        {!! nl2br(htmlspecialchars($bug->description)) !!}
      @else
        <i>No description provided.</i>
      @endif
    </div>

  </div>

</div>

{{-- Make these collapsibl? --}}

<div class="col s12 l4">
  <div class="card">
    <div class="card-content">
      <div class="card-title">
        Tags
      </div>
      @foreach ($bug->tags as $key => $tag)
        <div class="chip">
          <a href="#"><?= $tag->name ?></a>
        </div>
      @endforeach
    </div>
  </div>


</div>

{{-- <div class="col s12 l4">
  <div class="chips"  id="assignee-chips">
    <input class="custom-class">
  </div>
</div> --}}

<div class="col s12 l4">
  Assignees Go Here
</div>

@include('comments._container')

@endsection
