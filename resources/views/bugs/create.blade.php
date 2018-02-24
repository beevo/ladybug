@extends('layouts.app')

@section('content')
  @guest
    <div class="alert card-panel yellow lighten-4 yellow-text text-darken-4">
      <a class="yellow darken-4 close yellow-text text-darken-4 btn-small btn-floating waves-effect waves-light">
        <i class="material-icons">close</i>
      </a>
      <b>Warning!</b> You must <a href="/login">login</a> to submit a new bug.

    </div>
  @endguest


<form method="POST" action="/bugs">
  @csrf
  <div class="card col s12 l8 row">
    <div class="card-content">
      <div class="card-title">
        Add New Bug
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="title" id="bug-title" data-length="1000" type="text"
          required class="validate">
          <label for="bug-title">Title</label>
          <span class="helper-text" data-error="Title is required."
          data-success=""></span>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="description" cols="20" data-length="5000"
          id="bug-description" class="materialize-textarea"></textarea>
          <label for="bug-description">Description</label>
        </div>
      </div>

    </div>

  </div>

  {{-- Make these collapsibl? --}}

  <div class="col s12 l4">
    <div class="chips"  id="bug-chips">
      <input class="custom-class">
    </div>
  </div>

  {{-- <div class="col s12 l4">
    <div class="chips"  id="assignee-chips">
      <input class="custom-class">
    </div>
  </div> --}}

  <div class="input-field col s12 l4">
    <select multiple name="assignees[]">
      {{-- <option value="{{ Auth::user()->id }}" selected>
        Me ({{ Auth::user()->email }})
      </option> --}}
      @auth
        @foreach ($users as $user)
          <option value="{{ $user->id }}" {{ $user->id == Auth::user()->id ? "selected" : "" }}>
            {{ $user->email }}
          </option>
        @endforeach
      @endauth
      @guest
        <option value="" selected>you@email.com</option>
        @for ($i=1; $i < 3; $i++)
          <option value="">coder{{ $i }}@email.com</option>
        @endfor
      @endguest
    </select>
    <label for="select">Assignees</label>
  </div>
  <div class="row">
    <div class="col s12">
      <button type="submit" class="btn btn-primary">
        Submit
      </button>
    </div>

  </div>
</form>
@endsection
