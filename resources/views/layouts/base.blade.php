<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    @yield('styles')
</head>
<body>
    <nav class="navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('home') }}">Dropbox Music</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('home') }}">Home</a></li>
            @if (Auth::check())
                <li><a href="{{ route('settings') }}">Settings</a></li>
                <li><a href="{{ route('logout') }}">Log out</a></li>
            @else
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Log in</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>