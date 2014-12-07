<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCasosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('casos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('cama');
			$table->string('habitacion');
			$table->date('fecha_ingreso');
			$table->integer('servicio');
			$table->string('diagnostico');
			$table->integer('medico_caso');
			$table->date('fecha_egreso');
			$table->integer('id_paciente');
			$table->timestamps();

			$table->foreign('id_paciente')->references('id')->on('pacientes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('casos');
	}

}
