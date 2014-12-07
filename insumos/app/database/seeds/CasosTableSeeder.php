<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CasosTableSeeder extends Seeder {

	public function run()
	{
		foreach(range(1, 9) as $indexPaciente)
		{
			$paciente = Paciente::find($indexPaciente);
			foreach(range(1,9) as $indexCaso)
			{

				$caso = new Caso;
				$caso->cama = 'cama'.$indexPaciente.'-'.$indexCaso;
				$caso->habitacion = 'habitacion'.$indexCaso;
				$caso->fecha_ingreso = '19/04/200'.$indexCaso;
				$caso->servicio = 1;
				$caso->diagnostico = 'diagnostico'.$indexPaciente.'-'.$indexCaso;;
				$caso->medico_caso = $indexPaciente.$indexCaso;
				$caso->fecha_egreso = '19/04/200'.$indexCaso;
				$caso->id_paciente = $paciente->id;
				
				$caso->save();
			}
		}
	}

}