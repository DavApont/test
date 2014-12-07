<?php

class ExamenLab extends \Eloquent {

	protected $table= 'examenes_lab';
	public function caso(){
		$this->belongsTo('Caso');
	}
}