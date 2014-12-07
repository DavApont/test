<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagenes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('id_caso');
			$table->integer('tipo_imagen');
			$table->integer('imagen');
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
		Schema::drop('imagenes');
	}

}
