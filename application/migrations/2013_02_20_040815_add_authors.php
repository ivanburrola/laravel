<?php

class Add_Authors {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	    DB::table('authors')->insert(array(
            'name'=>'Andrew Perkins',
            'bio' =>'Andrew Perkins is a really great author!',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
	    DB::table('authors')->where('name','=','Andrew Perkins');
	}

}
