<?php #app/models/User.php

class User extends Eloquent {

	 /**
	  * The database table used by the model.
	  *
	  * @var string
	  */
	 protected $table = 'seguridad.users';

	 public function throttle()
	 {
	 	return $this->hasOne('Throttle');
	 }

	 public function groups(){
	 	return $this->belongsToMany('Group','seguridad.users_groups');
	 }

	 public function setPasswordAttribute($value){
	 	$this->attributes['password'] = Hash::make($value);
	 }


	 public function resetPassword(){
	 	$this->setPasswordAttribute('123');
	 }

}