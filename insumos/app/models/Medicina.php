<?php

class Medicina extends Eloquent{
	protected $table ='view_medicamentos';
	public static function lista(){
		return array(0 => "---Seleccione---") + self::all()->lists('des_articulo', 'cod_articulo');
	}
}