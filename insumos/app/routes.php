<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	$estados = Estado::lista();
	return View::make('pacientes.create',compact('estados'));
});

Route::get('ejemplo',function(){
	$servicios = array();
	for($i= 1; $i <= 10 ; $i++){
		$servicios[$i] = "Servicio $i";
	}
	return View::make('ejemplos/form',array('servicios' => $servicios));
});

/*Route::get('casos',function(){
	$servicios = array();
	for($i= 1; $i <= 10 ; $i++){
		$servicios[$i] = "Servicio $i";
	}
	return View::make('casos', array('servicios' => $servicios));
});
*/
Route::get('user/login', function()
{
    return View::make('login');
});

Route::post('user/login', function()
{
    // Set login credentials
    $credentials = array(
        'login'    => Input::get('login'),
        'password' => Input::get('password'),
        );

    $remember = Input::get('remember') ? true : false;

    // Try to authenticate the user
    $user = Sentry::authenticate($credentials, $remember);

    return Redirect::intended('dashboard');
});

Route::get('user/logout', function()
{
    Sentry::logout();

    return Redirect::to('user/login');
});


Route::get('dashboard/paciente', array(
    'as' => 'test_home',
    'before' => 'basicAuth|hasPermissions:user.create',
    'uses' => 'HomeController@getPaciente'
    )
);

Route::resource('modulos', 'ModulosController');

Route::resource('pacientes','PacientesController');

Route::resource('pacientes.casos','CasosController');

Route::resource('pacientes.casos.medicamentos','MedicamentosController');

Route::resource('pacientes.casos.materialmedico','MaterialMedicoController');

Route::get('municipios/{id}',function($id){
    $estado = Estado::findOrFail($id);
    $municipios = array(0 => "---Seleccione---") + $estado->municipios()
                                                          ->get()
                                                          ->lists('municipio', 'id');
    return Response::json($municipios);
});

Route::get('parroquias/{id}',function($id){
    $municipio = Municipio::findOrFail($id);
    $parroquias = array(0 => "---Seleccione---") + $municipio->parroquias()
                                                          ->get()
                                                          ->lists('parroquia', 'id');
    return Response::json($parroquias);
});

Route::get('casos',function(){
    return View::make('casos/busqueda');
});

Route::get('paciente/{nombre}',function($nombre){
    $pacientes = Paciente::where('nombres','LIKE',"%$nombre%")
                            ->orWhere('apellidos','LIKE',"%$nombre%")
                            ->orWhere('cedula','LIKE',"%$nombre%")
                            ->get();
    return Response::json($pacientes);
});

Route::get('paciente/{id_servicio}/{nombre}',function($id_servicio,$nombre){
    

    $pacientes =Paciente::where('casos.servicio','=',$id_servicio)->where('nombres','LIKE',"%$nombre%")
                            ->orWhere('apellidos','LIKE',"%$nombre%")
                            ->orWhere('cedula','LIKE',"%$nombre%")
                            ->join('casos','casos.id_paciente','=','pacientes.id')->select('pacientes.nombres','pacientes.apellidos','pacientes.id','pacientes.cedula','casos.servicio')->distinct()->get();
                            
                            //exit($pacientes);
    return Response::json($pacientes);
});


Route::get('casos/{pacienteId}',function($pacienteId){
    $paciente=Paciente::find($pacienteId);
    $casos = $paciente->casos()->join('servicios', 'casos.servicio', '=', 'servicios.id')
            ->select('casos.cama', 'casos.habitacion', 'casos.fecha_ingreso','servicios.servicio','casos.diagnostico','casos.id')
            ->get();
    return Response::json($casos);
});

Route::get('casos/{pacienteId}/{servicioId}',function($pacienteId,$servicioId){
    $paciente=Paciente::find($pacienteId);
    $casos = $paciente->casos()->join('servicios', 'casos.servicio', '=', 'servicios.id')
            ->select('casos.cama', 'casos.habitacion', 'casos.fecha_ingreso','servicios.servicio','casos.diagnostico','casos.id')
            ->where('casos.servicio','=',$servicioId)->get();
    return Response::json($casos);
});


Route::get('busquedaservicio',function(){
    $servicios = Servicio::lista();
    return View::make('busqueda/busquedaservicio',compact('servicios'));
});