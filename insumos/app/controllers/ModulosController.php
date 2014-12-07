<?php

class ModulosController extends \BaseController {

	/**
	 * Display a listing of modulos
	 *
	 * @return Response
	 */
	public function index()
	{
		$modulos = Modulo::all();

		return View::make('modulos.index', compact('modulos'));
	}

	/**
	 * Show the form for creating a new modulo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('modulos.create');
	}

	/**
	 * Store a newly created modulo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Modulo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Modulo::create($data);

		return Redirect::route('modulos.index');
	}

	/**
	 * Display the specified modulo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$modulo = Modulo::findOrFail($id);

		return View::make('modulos.show', compact('modulo'));
	}

	/**
	 * Show the form for editing the specified modulo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$modulo = Modulo::find($id);

		return View::make('modulos.edit', compact('modulo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$modulo = Modulo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Modulo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$modulo->update($data);

		return Redirect::route('modulos.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Modulo::destroy($id);

		return Redirect::route('modulos.index');
	}

}