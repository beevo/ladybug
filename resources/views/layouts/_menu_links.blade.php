@guest
<li><a href="{{ route('login') }}">Login</a></li>
<li><a href="{{ route('register') }}">Register</a></li>
@else
<li>
  <a href="!#">
    {{ Auth::user()->name }}
  </a>
</li>
<li>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <a href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    Logout
  </a>
</li>
@endguest
<li><a href="/bugs">Bugs</a></li>
