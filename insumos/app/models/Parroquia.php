<?php

class Parroquia extends \Eloquent {



	public function municipio(){
		return $this->belongsTo('Municipio');
	}

	public static function lista($id_municipio){
		return array(0 => "---Seleccione un Municipio---") + Municipio::findOrFail($id_municipio)->parroquias()->lists('parroquia', 'id');
	}
}