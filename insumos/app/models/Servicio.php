<?php

class Servicio extends \Eloquent {

	public static function nombre($id){
		return $servicio = self::find($id)->servicio;
	}

	public static function lista(){
		return array(0 => "---Seleccione---") + self::all()->lists('servicio', 'id');
	}
}