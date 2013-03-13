<?php

class Create_Clientes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('clientes', function($table){
            // auto increment id (PK)
            $table->increments('id');

            // varchar
            $table->string('rfc', 13);
            $table->string('nombre');
            $table->string('calle');
            $table->string('no_exterior');
            $table->string('no_interior');
            $table->string('colonia');
            $table->string('localidad');
            $table->string('referencia');
            $table->string('municipio');
            $table->string('estado');
            $table->string('pais');
            $table->string('codigo_postal');
            $table->boolean('activo');
            // created_at | updated_at
            $table->timestamps();
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
