@layout('layouts.default')

@section('content')
    <h1>Capturar Cliente</h1>

    <section class="input">

    {{ Form::open('csectionentes/create','POST', array('class' => 'form-horizontal')) }}
    {{ Form::token() }} 
       
            <span class="legend">Raz&oacute;n social</span>
        
        <section class="control-group">
            {{ Form::label('rfc', 'RFC', array('class' => 'control-label')) }}
            <section class="controls">
                {{ Form::text('rfc') }}
            </section>
        </section>
        

        <section class="control-group">
        {{ Form::label('nombre', 'Nombre' , array('class' => 'control-label')) }}
            <section class="controls">
                {{ Form::text('nombre') }}
            </section>
        </section>

            <span class="legend">Domicilio</span>

        <section class="control-group">
            {{ Form::label('calle', 'Calle' , array('class' => 'control-label')) }}
            <section class="controls">
                {{ Form::text('calle') }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::label('no_exterior', 'No. Exterior') }}
            <section class="controls">
                {{ Form::text('no_exterior') }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::label('no_interior', 'No. Interior') }}
            <section class="controls">
                {{ Form::text('no_interior') }}
            </section>
        </section>

        <section class="control-group">
        {{ Form::label('colonia', 'Colonia') }}
            <section class="controls">
                {{ Form::text('colonia') }}
            </section>
        </section>

        <section class="control-group">
        {{ Form::label('localidad', 'Localidad') }}
        {{ Form::text('localidad') }}
        </section>

        <section class="control-group">
        {{ Form::label('referencia', 'Referencia') }}
        {{ Form::text('referencia') }}
        </section>
    
        <section class="control-group">
        {{ Form::label('municipio', 'Municipio') }}
        {{ Form::text('municipio') }}
        </section>

        <section class="control-group">
        {{ Form::label('estado', 'Estado') }}
        {{ Form::text('estado') }}
        </section>

        <section class="control-group">
        {{ Form::label('pais','Pais') }}
        {{ Form::text('pais') }}
        </section>

        <section class="control-group">
        {{ Form::label('codigo_postal', 'Codigo Postal') }}
        {{ Form::text('codigo_postal') }}
        </section>

        <section class="control-group">
        {{ Form::label('activo', 'Activo') }}
        {{ Form::checkbox('activo','1', false) }}
        </section>
        <section>
        {{ Form::submit('Capturar', array('class' => 'btn')) }}
        </section>
        
    </ul>
    {{ Form::close() }}

    </section>
@endsection
