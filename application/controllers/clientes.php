<?php

class Clientes_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        return View::make('clientes.index')
            ->with('title','Clientes')
            ->with('clientes', Cliente::all())
            ->with('total', Cliente::count());
    }

    public function get_new()
    {
        return View::make('clientes.new')
            ->with('title', 'Capturar Cliente');
    }

    public function post_create()
    {
        $validation = Cliente::validate(Input::all());

        if($validation->fails()){
            return Redirect::to_route('new_cliente')
                    ->with_errors($validation)
                    ->with_input();
        } else {
            $cliente = new Cliente(Input::all());
            $cliente->save();

            return Redirect::to_route('clientes')
                ->with('message', 'El cliente fue capturado exitosamente');
        }
    }

    public function get_view($id){
         return View::make('clientes.view')
            ->with('title', 'Cliente')
            ->with('cliente', Cliente::find($id));
    }
    
}
