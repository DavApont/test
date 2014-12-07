<?php

class Estado extends \Eloquent {


	public function municipios(){
		return $this->hasMany('Municipio','id_estado');
	}

	public static function lista(){
		return array(0 => "---Seleccione---") + self::all()->lists('estado', 'id');
	}
}