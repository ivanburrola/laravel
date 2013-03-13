@layout('layouts.default')

@section('content')
    <section class="container">
    <h1>Clientes</h1>

    <p>{{ HTML::link_to_route('new_cliente', 'Agregar', null, array('class' => 'btn btn-primary'))}}</p>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>rfc</th>
            <th>nombre</th>
        </thead>
        <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->rfc}}</td>
            <td>{{ HTML::link_to_route('cliente',$cliente->nombre, array($cliente->id))}}</td>
        </tr>
    @endforeach
        </tbody>
    </table>

    <p> Registros: {{ $total }} </p>
    </section>
@endsection
