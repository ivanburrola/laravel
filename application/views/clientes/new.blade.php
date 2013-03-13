@layout('layouts.default')

@section('content')
    <section class="container">

    <h1>Capturar Cliente</h1>

    <section class="input">

    {{ Form::open('clientes/create','POST', array('class' => 'form-horizontal')) }}
    {{ Form::token() }} 
    
    <?php
        Form::macro('bs_label', function($name, $value){
            return '<label for="' . $name . '" class="control-label">' . $value . '</label>';
        });
        
        Form::macro('bs_text_xxl', function($name, $value = null, $attributes = array()){
            $attributes['class'] = 'input-xxlarge';
            return Form::text($name, $value, $attributes);
        });
     
    ?>

            <h5>Raz&oacute;n social</h5>
        
        <section class="control-group">
            {{ Form::bs_label('rfc', 'RFC') }}
            <section class="controls">
                {{ Form::text('rfc',Input::old('rfc'), array('placeholder' => 'requerido')) }}
            </section>
        </section>
        

        <section class="control-group">
        {{ Form::bs_label('nombre', 'Nombre') }}
            <section class="controls">
                {{ Form::bs_text_xxl('nombre', Input::old('nombre'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

            <h5>Domicilio</h5>

        <section class="control-group">
            {{ Form::bs_label('calle', 'Calle') }}
            <section class="controls">
                {{ Form::bs_text_xxl('calle', Input::old('calle'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('no_exterior', 'No. Exterior') }}
            <section class="controls">
                {{ Form::text('no_exterior', Input::old('no_exterior'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('no_interior', 'No. Interior') }}
            <section class="controls">
                {{ Form::text('no_interior', Input::old('no_interior'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('colonia', 'Colonia') }}
            <section class="controls">
                {{ Form::bs_text_xxl('colonia', Input::old('colonia'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('localidad', 'Localidad') }}
            <section class="controls">
                {{ Form::text('localidad', Input::old('localidad'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('referencia', 'Referencia') }}
            <section class="controls">
                {{ Form::bs_text_xxl('referencia', Input::old('referencia'), array('placeholder' => 'opcional')) }}
            </section>
        </section>
    
        <section class="control-group">
            {{ Form::bs_label('municipio', 'Municipio') }}
            <section class="controls">
                {{ Form::text('municipio', Input::old('municipio'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('estado', 'Estado') }}
            <section class="controls">
                {{ Form::text('estado', Input::old('estado'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('pais','Pais') }}
            <section class="controls">
                {{ Form::text('pais', Input::old('pais'), array('placeholder' => 'requerido')) }}
            </section>
        </section>

        <section class="control-group">            
            {{ Form::bs_label('codigo_postal', 'Codigo Postal') }}
            <section class="controls">
                {{ Form::text('codigo_postal', Input::old('codigo_postal'), array('placeholder' => 'opcional')) }}
            </section>
        </section>

        <section class="control-group">
            {{ Form::bs_label('activo', 'Activo') }}
            <section class="controls">
                {{ Form::checkbox('activo','1', false) }}
            </section>
        </section>
        
        <section class="control-group">
            <section class="controls">
                {{ Form::submit('Capturar', array('class' => 'btn')) }}
            </section>
        </section>
        
    </ul>
    {{ Form::close() }}

    </section>

    </section>
@endsection
