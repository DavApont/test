<?php

class Paciente extends \Eloquent {
	// Add your validation rules here
    public static $rules = array();

	// Don't forget to fill this array
	protected $fillable = array('id');


	public function casos(){
		return $this->hasMany('Caso','id_paciente');
	}

}