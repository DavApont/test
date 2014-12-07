<?php

class Imagen extends \Eloquent {

	public function caso(){
		$this->belongsTo('Caso');
	}
}