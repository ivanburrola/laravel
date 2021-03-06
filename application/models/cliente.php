<?php

class Cliente extends Eloquent {

    public static $table = 'clientes';

    public static $accessible = array('rfc', 'nombre');
    public static $rules = array(
        'rfc' => 'required|min:12|max:13'
    ); 


    public function contactos(){
        return $this->has_many('Contacto');
    }

    public static function validate($data){
        return Validator::make($data, static::$rules);
    }
}
