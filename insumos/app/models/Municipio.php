<?php

class Municipio extends \Eloquent {


	public function estado(){
		return $this->belongsTo('Estado');
	}

	public function parroquias(){
		return $this->hasMany('Parroquia','id_municipio');
	}

	public static function lista($id_estado){
		return array(0 => "---Seleccione un Estado---") + Estado::findOrFail($id_estado)->municipios()->lists('municipio', 'id');
	}
}