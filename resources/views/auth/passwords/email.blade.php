@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('password.email') }}">
  <div class="card col s12 m6">
    <div class="card-content">
      {{-- TODO finish styling  --}}
      <span class="card-title">Reset Password</span>
      @if (session('status'))
      <div class="alert alert-success">
      {{ session('status') }}
      </div>
      @endif

      @csrf

      <div class="row">
        <div class="input-field col s12 ">
          <input id="email" type="email" class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
          <label for="email">E-Mail Address</label>
          @if ($errors->has('email'))
          <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>

    </div>
    <div class="card-action">
      <button type="submit" class="btn btn-primary">
      Send Password Reset Link
      </button>
    </div>
  </div>

</form>
@endsection
