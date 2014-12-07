<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicamentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicamentos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('id_caso');
			$table->integer('medicamento');
			$table->integer('presentacion');
			$table->string('dosis_diaria');
			$table->date('fecha');
			$table->dateTime('hora');
			$table->string('descripcion');
			$table->integer('cantidad');
			$table->timestamps();

			$table->foreign('id_caso')->references('id')->on('casos');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medicamentos');
	}

}
