<?php

class CasosController extends \BaseController {

	/**
	 * Display a listing of casos
	 *
	 * @return Response
	 */
	public function index($pacienteId)
	{
		$paciente=Paciente::find($pacienteId);
		
		$casos = $paciente->casos()->paginate(5);
		return View::make('casos.index',compact('paciente','casos'));

	}

	/**
	 * Show the form for creating a new caso
	 *
	 * @return Response
	 */
	public function create($pacienteId)
	{
		$tipos = Servicio::all()->lists('servicio', 'id');
      	$servicios = array(0 => "---Seleccione---") + $tipos;
      	$medicamentos = Medicina::lista();
      	$materialesmedicos = MaterialMedico::lista();
		return View::make('casos.create')->with(array('paciente' => $pacienteId,'servicios' => $servicios,'medicamentos' =>$medicamentos,'materialesmedicos' =>$materialesmedicos));
	}

	/**
	 * Store a newly created caso in storage.
	 *
	 * @return Response
	 */
	public function store($pacienteId)
	{
		$validator = Validator::make($data = Input::all(), Caso::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$caso = new Caso;
			$caso->cama = Input::get('cama');
			$caso->habitacion = Input::get('habitacion');
			$caso->fecha_ingreso = Input::get('fecha_ingreso');
			$caso->servicio = Input::get('servicio');
			$caso->diagnostico = Input::get('diagnostico');
			$caso->medico_caso = Input::get('medico_caso');
			$caso->fecha_egreso= Input::get('fecha_egreso');
			$caso->id_paciente = $pacienteId;

			$caso->save();
			//$dataCompleta = array_add($data, 'id_paciente', $pacienteId);
			//Caso::create($dataCompleta);
		}

		

		return Redirect::to("pacientes/$pacienteId");
	}

	/**
	 * Display the specified caso.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($pacienteId,$casoId)
	{
      	$servicios = Servicio::lista();
		$caso = Paciente::findOrFail($pacienteId)
							->casos()
							->find($casoId);
		$medicamentos = Medicina::lista();
      	$materialesmedicos = MaterialMedico::lista();
      	$datosmedicamento = $caso->medicamentos()->paginate(5);
      	$datosmaterialmedico = $caso->materiales_medicos()->paginate(5);
      	$paciente = $pacienteId;
		return View::make('casos.show', compact('caso','servicios','medicamentos','materialesmedicos','datosmedicamento','datosmaterialmedico','paciente'));
	}

	/**
	 * Show the form for editing the specified caso.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($pacienteId,$casoId)
	{

		$paciente = Paciente::find($pacienteId);
		$caso = $paciente->casos()->find($casoId);
      	$servicios = Servicio::lista();
      	$medicamentos = Medicina::lista();
      	$materialesmedicos = MaterialMedico::lista();
      	$datosmedicamento = $caso->medicamentos()->paginate(5);
      	$datosmaterialmedico = $caso->materiales_medicos()->paginate(5);
		return View::make('casos.edit', compact('paciente','caso','servicios','medicamentos','materialesmedicos','datosmedicamento','datosmaterialmedico'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($pacienteId,$casoId)
	{
		$caso = Paciente::findOrFail($pacienteId)
				->casos()
				->findOrFail($casoId);

		$validator = Validator::make($data = Input::all(), Caso::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$caso->update($data);

		return Redirect::to("pacientes/$pacienteId");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($pacienteId,$casoId)
	{
		Caso::destroy($casoId);

		return Response::json(array(
            'message'         =>     'Caso Eliminado con Exito!'
        ),200);
	}

}