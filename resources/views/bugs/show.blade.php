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
      <br>
      0 comments
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
<div class="col s12 l8 bug-comments">
  <div class="card">
    <div class="card-content">
      <div class="card-title">
        Comments
      </div>

      <div class="card horizontal">
        <div class="card-content">
          <div class="chip">
            <img src="https://picsum.photos/100/100" alt="Contact Person">
            Jane Doe
          </div>
          5 hours ago
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
      <div class="card horizontal " id="new-comment">
        <div class="card-content ">
          <div class="input-field col s12 focus-textarea">
            <i class="material-icons prefix">mode_edit</i>
            <textarea class="materialize-textarea" data-length="5000"></textarea>
            <label>Leave a comment</label>
          </div>
          <div class="right-align col 12 right">
            <button class="btn waves-effect waves-light grey" type="button">
              Close Bug
            </button>
            <button class="btn waves-effect waves-light" type="submit">
              <span class="hide-on-small-only">Comment</span>
              <i class="material-icons hide-on-med-and-up">send</i>
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
