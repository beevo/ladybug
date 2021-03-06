<form id="bug-form" method="POST" action="{{ $bug->id ? '/bugs/'.$bug->id : '/bugs'}}">
  @method($method)
  @csrf
  <div class="col s12 l8">
    <div class="card">
      <div class="card-content">
        <div class="card-title">
          @if ($method == "POST")
            Add New Bug
          @else
            Edit
            <a href="/bugs/{{ $bug->id }}">
              Bug <i>#{{ $bug->id }}</i>
            </a>
          @endif
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input name="title" id="bug-title" data-length="1000" type="text"
            required class="validate" value="{{ $bug->title }}">
            <label for="bug-title">Title</label>
            <span class="helper-text" data-error="Title is required."
            data-success=""></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea name="description" cols="20" data-length="5000"
            id="bug-description" class="materialize-textarea">{{ $bug->description }}</textarea>
            <label for="bug-description">Description</label>
          </div>
        </div>

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
        <div class="chips" id="bug-chips">
          @foreach ($bug->tags as $key => $tag)
            <data value="{{ $tag->name }}"></data>
          @endforeach
          <input class="custom-class">
        </div>
      </div>
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
          <option value="{{ $user->id }}" {{ $user->id == Auth::user()->id ? "selected" : "" }}>{{ $user->email }}</option>
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
      @if ($method == "POST")
        <button type="submit" class="btn btn-primary">
          Submit
        </button>
      @else
        <button type="submit" class="btn">
          Save
        </button>
      @endif

    </div>

  </div>
</form>
