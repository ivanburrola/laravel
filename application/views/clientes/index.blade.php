@layout('layouts.default')

@section('content')
    <h1>Clientes</h1>

    <p>{{ HTML::link_to_route('new_cliente', 'Capturar Cliente')}}</p>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>rfc</th>
            <th>nombre</th>
        </thead>
        <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->rfc}}</td>
            <td>{{$cliente->nombre}}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection
