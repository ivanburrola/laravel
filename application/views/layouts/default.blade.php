<!DOCTYPE html>
<html> 
<head>
    <title>{{ $title }}</title>
    {{ HTML::style('css/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('css/application.css') }}
</head>
<body>
    <section class="navbar">
        <nav class="navbar-inner">
            <ul class="nav">
                <li>{{ HTML::link_to_route('clientes','Clientes') }}</li>
                <li><a href="#">Tickets</a></li>
            </ul>
        </nav>
    </section>
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif

    @yield('content')
</body>
</html>
