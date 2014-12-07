<?php

class MaterialMedicoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($idPaciente,$idCaso)
	{
		$validator = Validator::make($data = Input::all(), MaterialMedQui::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$materialmedico = new MaterialMedQui;
			$materialmedico->id_caso = $idCaso;
			$materialmedico->mmq = Input::get('tipo-material-medico');
			$materialmedico->presentacion = Input::get('presentacion-material-medico');
			$materialmedico->cantidad = Input::get('cantidad-material-medico');
			$materialmedico->fecha = Input::get('fecha-utilizacion-material-medico');
			$materialmedico->hora = Input::get('hora-utilizacion-material-medico');
			$materialmedico->descripcion = Input::get('descripcion-material-quirurgico');

			$materialmedico->save();
			//Paciente::create($data);
		}

		//Paciente::create($data);

		return Redirect::to("pacientes/$idPaciente/casos/$idCaso");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}