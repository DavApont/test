<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialMedQuiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('material_med_qui', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('id_caso');
			$table->integer('mmq');
			$table->integer('presentacion');
			$table->integer('cantidad');
			$table->date('fecha');
			$table->dateTime('hora');
			$table->string('descripcion');
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
		Schema::drop('material_med_qui');
	}

}
