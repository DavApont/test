<?php
class MaterialMedico extends Eloquent{
	protected $table ='view_material_medico_quirurgico';


	public static function lista(){
		return array(0 => "---Seleccione---") + self::all()->lists('des_articulo', 'cod_articulo');
	}
}