@extends('layouts.app')

@section('content')
  <div class="row">
    <form class="col s12" method="POST" action="{{ route('login') }}">
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
        </div>

        <div class="col s12 input-field">
          @if ($errors->has('password'))
          <span class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
          <input id="password" type="password" name="password" required
          class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}">
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



    <button type="submit" class="btn btn-primary">
      Login
      </button>
      <a class="btn btn-link" href="{{ route('password.request') }}">
      Forgot Your Password?
      </a>
    </form>
  </div>
@endsection
