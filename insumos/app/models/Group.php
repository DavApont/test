<?php

class Group extends Eloquent {

	 /**
	  * The database table used by the model.
	  *
	  * @var string
	  */
	 protected $table = 'seguridad.groups';

	 public function users(){
	 	return $this->belongsTo('User','seguridad.users_groups');
	 }

}	