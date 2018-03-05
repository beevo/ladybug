@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="card col s12">
    <div class="card-content">
      <span class="card-title">
        Register
      </span>
      <div class="row">
        <div class="col l6 s12 input-field">
          <input id="name" type="text"
            class="validate {{ $errors->has('name') ? ' is-invalid' : '' }}"
            name="name" value="{{ old('name') }}" required autofocus>
          <label for="name">Name</label>
          @if ($errors->has('name'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="col l6 s12 input-field">
          <input id="email" type="email"
            class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}"
            name="email" value="{{ old('email') }}" required>
            <label for="email">Email</label>
          @if ($errors->has('email'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="col l6 s12 input-field">
          <input id="password" type="password"
            class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}"
            name="password" required>
          <label for="password"></label>
          @if ($errors->has('password'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        <div class="col l6 s12 input-field">
          <input id="password-confirm" type="password" class="validate " name="password_confirmation" required>
          <label for="password_confirmation">Confirm Password</label>
        </div>
      </div>
    </div>
    <div class="card-action">
      <button type="submit" class="btn btn-primary">
          Register
      </button>
    </div>
  </div>
</form>
@endsection
