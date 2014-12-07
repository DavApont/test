<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pacientes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('cedula');
			$table->string('nombres');
			$table->string('apellidos');
			$table->date('fecha_nac');
			$table->integer('id_estado');
			$table->integer('id_municipio');
			$table->integer('id_parroquia');
			$table->string('direccion_hab');
			$table->string('telefono_casa');
			$table->string('celular');
			$table->string('email');
			$table->integer('id_sexo');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pacientes');
	}

}
