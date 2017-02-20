<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Journal</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a href="/" class="navbar-brand">Journal</a>
						<button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="menu">
						@if(Auth::guest())
						<ul class="nav navbar-nav">
							<li><a href="/">Wall</a></li>
							<li><a href="/guestbook">Guest book</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{ route('register') }}">Sign up</a></li>
							<li><a href="{{ route('login') }}">Sign in</a></li>
						</ul>
						@else
						<ul class="nav navbar-nav">
							<li><a href="/">Wall</a></li>
							<li><a href="/guestbook">Guest book</a></li>
							<li><a href="/profile">Profile</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Exit</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                {{ csrf_field() }}
	                            </form>
							</li>
						</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Ident from navbar, because navbar-fixed-top comes on top of the main container -->
	<div class="navbar-ident"></div>
	<!-- Ident from navbar, because navbar-fixed-top comes on top of the main container -->
	<div class="container">
		<div class="row">
			@yield('content')
			<!-- Search by tag and follow us block's -->
			@yield('sidebar')
		</div>
	</div>
</body>
</html>