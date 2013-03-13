<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UFT-8">
    <title>Wordpush</title>
    {{ HTML::style('css/style.css') }}
</head>
<body>
    <header>
        @if ( Auth::guest())
            {{ HTML::link('admin', 'Login') }}
        @else
            {{ HTML::link('logout', 'Logout') }}
        @endif
        <hr />
        <h1>Wordpush</h1>
        <h2>Code is Limmericks</h2>
    <header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
