<?php

class PacientesController extends \BaseController {

	/**
	 * Display a listing of pacientes
	 *
	 * @return Response
	 */
	public function index()
	{
		$pacientes = Paciente::paginate(5);
		return View::make('pacientes.index', compact('pacientes'));
	}

	/**
	 * Show the form for creating a new paciente
	 *
	 * @return Response
	 */
	public function create()
	{
		$estados = Estado::lista();
		return View::make('pacientes.create',compact('estados'));
	}

	/**
	 * Store a newly created paciente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Paciente::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$paciente = new Paciente;
			$paciente->cedula = Input::get('cedula');
			$paciente->nombres = Input::get('nombres');
			$paciente->apellidos = Input::get('apellidos');
			$paciente->fecha_nac = Input::get('fechanac');
			$paciente->telefono_casa = Input::get('telefonocasa');
			$paciente->celular = Input::get('celular');
			$paciente->direccion_hab = Input::get('direccion');
			$paciente->email = Input::get('email');
			$paciente->id_sexo = Input::get('sexo');
			$paciente->id_estado = Input::get('estado');
			$paciente->id_municipio = Input::get('municipio');
			$paciente->id_parroquia = Input::get('parroquia');

			$paciente->save();
		}

		//Paciente::create($data);

		return Redirect::route('pacientes.index');
	}

	/**
	 * Display the specified paciente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$paciente = Paciente::findOrFail($id);

		$estados = Estado::lista();
		$municipios = Municipio::lista($paciente->id_estado);
		$parroquias = Parroquia::lista($paciente->id_municipio);

		$casos = $paciente->casos()->paginate(5);
		return View::make('pacientes.show', compact('paciente','casos','estados','municipios','parroquias'));
	}

	/**
	 * Show the form for editing the specified paciente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$paciente = Paciente::findOrFail($id);
		$estados = Estado::lista();
		$municipios = Municipio::lista($paciente->id_estado);
		$parroquias = Parroquia::lista($paciente->id_municipio);
		return View::make('pacientes.edit',compact('paciente','estados','municipios','parroquias'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$paciente = Paciente::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Paciente::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$paciente->cedula = Input::get('cedula');
			$paciente->nombres = Input::get('nombres');
			$paciente->apellidos = Input::get('apellidos');
			$paciente->fecha_nac = Input::get('fecha_nac');
			$paciente->telefono_casa = Input::get('telefono_casa');
			$paciente->celular = Input::get('celular');
			$paciente->direccion_hab = Input::get('direccion_hab');
			$paciente->email = Input::get('email');
			$paciente->id_sexo = Input::get('id_sexo');
			$paciente->id_estado = Input::get('id_estado');
			$paciente->id_municipio = Input::get('id_municipio');
			$paciente->id_parroquia = Input::get('id_parroquia');

			$paciente->save();
		}

		return Redirect::route('pacientes.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Paciente::destroy($id);
		return Response::json(array(
            'message'         =>     'Paciente Eliminado con Exito!'
        ),200);
		
	}

}
