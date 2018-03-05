<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }}</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
		<link href="{{ asset('css/app.css') }}?time={{ time() }}" rel="stylesheet">
	</head>
	<body>
		<div>
			<nav>
				<div class="nav-wrapper">
					<div class="container">
						<a href="{{ url('/') }}" class="brand-logo">
							{{ config('app.name', 'Laravel') }}
						</a>
						<ul class="right hide-on-med-and-down">
							@include('layouts._menu_links')
						</ul>
					</div>

					<a href="#" data-target="mobile-demo" class="sidenav-trigger">
						<i class="material-icons">menu</i>
					</a>


				</div>
			</nav>
			<ul class='sidenav' id="mobile-demo">
				@include('layouts._menu_links')
			</ul>
			<div class="container">
				<div class="row" id="app">
					@yield('content')
				</div>
			</div>
			@include('layouts._footer')
		</div>
		<!-- Scripts -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
		<script src="{{ asset('js/app.js') }}?time=<?= time(); ?>"></script>
  </body>
</html>
