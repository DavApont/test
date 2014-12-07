<?php

class ServiciosTableSeeder extends Seeder{

	public function run(){
		foreach (range(1,9) as $index) {
			$servicio = new Servicio;
			$servicio->servicio = "Servicio-$index";
			$servicio->save();
		}
	}
}