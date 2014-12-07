<?php

class MaterialMedQui extends \Eloquent {

	protected $table ='material_med_qui';
	
	public static $rules = array();
	
	public function caso(){
		$this->belongsTo('Caso');
	}
}