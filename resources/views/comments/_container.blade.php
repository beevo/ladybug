<div class="col s12 l8 bug-comments">
  <div class="card">
    <div class="card-content">
      <div class="card-title">
        Comments (<span id="comment-count">{{ $bug->comments->count() }}</span>)
      </div>
      <div id="comments-container">
        @auth
          <div class="card horizontal comment" id="comment-template">
            <div class="card-content col s12">
              <div class="chip">
                <img class="chip-icon" src="http://flathash.com/{{ Auth::user()->id }}">
                {{ Auth::user()->name }}
              </div>
              Just Now
              <p class="comment-content">
              </p>
            </div>
          </div>
        @endauth
        @foreach ($bug->comments as $key => $comment)
          {{-- TODO LOOK --}}
          <div class="card horizontal comment" data-commentid="{{$comment->id}}">
            <div class="card-content col s12">
              <div class="chip">
                <img class="chip-icon" src="http://flathash.com/{{ $comment->created_by }}">
                {{ $comment->creator->name }}
              </div>
              {{ $comment->updated_at->diffForHumans() }}
              <p class="comment-content">
                {{ $comment->content }}
              </p>
            </div>
          </div>
        @endforeach
      </div>

      <form id="post-comment" method="post">
        @csrf
        <input type="hidden" name="bug_id" value="{{$bug->id}}">
        <div class="card horizontal " id="new-comment">
          <div class="card-content col s12 ">
            <div class="input-field focus-textarea">
              <i class="material-icons prefix">mode_edit</i>
              <textarea required name="comment" class="materialize-textarea" data-length="5000"></textarea>
              <label>Leave a comment</label>
            </div>
            <div class="right-align  right">
              @auth
                <button class="btn waves-effect waves-light" type="submit">
                  <span class="hide-on-small-only">Comment</span>
                  <i class="material-icons hide-on-med-and-up">send</i>
                </button>
              @else
                <p><a href="/login">Login</a> to post comment.</p>
              @endauth
            </div>
          </div>
        </div>
      </form>

    </div>

  </div>
</div>
