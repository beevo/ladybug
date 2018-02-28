@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}">
  <div class="card col s12 m8 l6 col-center">
    <div class="card-content">
      <span class="card-title">Login</span>
        @csrf
        <div class="row">
          <div class="col s12 input-field">
            @if ($errors->has('email'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <input id="email" type="email" name="email" value="{{ old('email') }}"
            required autofocus
            class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}" >
            <label for="email">Email</label>
          </div>
          <div class="col s12 input-field">
            @if ($errors->has('password'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <input id="password" type="password" name="password" required
            class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <label for="">
              <input class="filled-in" type="checkbox" name="remember" checked="checked">
              <span>
                Remember Me
              </span>
            </label>
          </div>
        </div>
    </div>
    <div class="card-action">
      <button type="submit" class="btn btn-primary">
        Login
      </button>
      <a class="btn btn-link" href="{{ route('password.request') }}">
      Forgot Password?
      </a>
    </div>
  </div>
</form>
@endsection
