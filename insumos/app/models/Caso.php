<?php

class Caso extends \Eloquent {

	// Add your validation rules here

	// Don't forget to fill this array
	public static $rules = array();

	protected $fillable = array('id','cama',
		'habitacion',
		'fecha_ingreso',
		'servicio',
		'diagnostico',
		'medico_caso',
		'fecha_egreso',
		'id_paciente');

	public function paciente(){
		return $this->belongsTo('Paciente');
	}

	public function examenes(){
		return $this->hasMany('ExamenLab');
	}

	public function imagenes(){
		return $this->hasMany('Imagen');
	}

	public function materiales_medicos(){
		return $this->hasMany('MaterialMedQui','id_caso');
	}

	public function medicamentos(){
		return $this->hasMany('Medicamento','id_caso');
	}
}