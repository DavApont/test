<?php
use MrJuliuss\Syntara\Controllers\BaseController;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getPaciente(){
		$this->layout = View::make('paciente');
        $this->layout->title = 'Paciente';

        // add breadcrumb to current page
        $this->layout->breadcrumb = array(
            array(
                'title' => 'Paciente',
                'link' => 'dashboard/home',
                'icon' => 'glyphicon-home'
            ),
            array(
                'title' => 'Paciente',
                'link' => 'dashboard/paciente',
                'icon' => 'glyphicon-plus'
            ),
        );
	}

}