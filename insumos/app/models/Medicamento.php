<?php

class Medicamento extends Eloquent {

	protected $table ='medicamentos';

	public static $rules = array();
	
	public function caso(){
		$this->belongsTo('Caso');
	}
}