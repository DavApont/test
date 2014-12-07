<?php

class MedicamentosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($idPaciente,$idCaso)
	{
		$caso = Caso::find($idCaso);
		$medicamentos = $caso->medicamentos()->paginate(5);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($idPaciente,$idCaso)
	{
		$validator = Validator::make($data = Input::all(), Medicamento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$medicamento = new Medicamento;
			$medicamento->id_caso = $idCaso;
			$medicamento->medicamento = Input::get('medicamento');
			$medicamento->presentacion = Input::get('presentacion-medicina');
			$medicamento->cantidad = Input::get('cantidad-medicina');
			$medicamento->dosis_diaria = Input::get('dosis-diaria');
			$medicamento->fecha = Input::get('fecha-aplicacion-medicina');
			$medicamento->hora = Input::get('hora-aplicacion-medicina');
			$medicamento->descripcion = Input::get('descripcion-aplicacion-medicina');

			$medicamento->save();
			//Paciente::create($data);
		}

		//Paciente::create($data);
		return Redirect::to("pacientes/$idPaciente/casos/$idCaso");
		//return Redirect::to('pacientes.index');
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