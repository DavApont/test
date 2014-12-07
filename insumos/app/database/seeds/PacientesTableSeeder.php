<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class PacientesTableSeeder extends Seeder {

	public function run()
	{

		foreach(range(1, 9) as $index)
		{
			$estado = Estado::find($index);
    		$municipio = $estado->municipios()->first();
    		$parroquia = $municipio->parroquias()->first();
    		
			$paciente = new Paciente;
			$paciente->cedula = '1234567'.$index;
			$paciente->nombres = 'nombre'.$index;
			$paciente->apellidos = 'apellidos'.$index;
			$paciente->fecha_nac = '19/04/200'.$index;
			$paciente->telefono_casa = '0254621478'.$index;
			$paciente->celular = '0416321456'.$index;
			$paciente->direccion_hab = 'san felipe';
			$paciente->email = 'nombre'.$index.'@localhost.com';
			$paciente->id_sexo = '1';
			$paciente->id_estado = $estado->id;
			$paciente->id_municipio = $municipio->id;
			$paciente->id_parroquia = $parroquia->id;

			$paciente->save();
		}
	}

}