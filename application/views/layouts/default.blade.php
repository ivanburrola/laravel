<!DOCTYPE html>
<html> 
<head>
    <title>{{ $title }}</title>
    {{ HTML::style('css/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('css/application.css') }}
</head>
<body>
    @if(Session::has('message'))
        <p style="color: green;">{{ Session::get('message') }}</p>
    @endif

    @yield('content')
</body>
</html>
