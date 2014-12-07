@extends('layouts.master')

@section('javascript')
	@parent
@stop
@section('content')

    {{ Form::open(array('method' => 'POST','url'=> 'pacientes','class' => 'form-horizontal')) }}
    <div class="panel panel-info panel-content-1">
    	<div class="panel-heading"><span class="fa fa-wheelchair"></span> Datos del Paciente</div>

    	<div class="panel-body">

	        <div class="form-group has-feedback has-feedback-left">
		        <div class="col-sm-12">
		            <span class="fa fa-user form-control-feedback"></span>
		            {{ Form::text('cedula', '', array('id' => 'cedula','class' => 'form-control','placeholder'=>'Cedula'))}}
		            
		        </div>
        	</div>

	    	<div class="form-group has-feedback has-feedback-left">
	            <div class="col-sm-12">
	                <span class="fa fa-user form-control-feedback"></span>
	                {{ Form::text('nombres', '', array('id' => 'nombres','class' => 'form-control', 'placeholder' => 'nombres'))}}
	            </div>
	        </div>

	        <div class="form-group has-feedback has-feedback-left">
		        <div class="col-sm-12">
		            <span class="fa fa-user form-control-feedback"></span>
		            {{ Form::text('apellidos', '', array('id' => 'apellidos','class' => 'form-control', 'placeholder' => 'Apellidos'))}}
		        </div>
	        </div>

	        <div class="form-group has-feedback has-feedback-left">
		        <div class="col-sm-12">
		            <span class="fa fa-user form-control-feedback"></span>
		            {{ Form::select('sexo', array(
						'1'=> 'Masculino',
						'2'=> 'Femenino'),null,array(
							'class' => 'form-control','placeholder' => 'Sexo'
						)) 
					}}
		        </div>
	        </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-calendar form-control-feedback"></span>
                    {{ Form::text('fechanac', '', array('id' => 'fechanac', 'class'=>'form-control', 'placeholder' => 'Fecha de Nacimiento'))}}
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-phone form-control-feedback"></span>
                    {{ Form::text('telefonocasa', '', array('id' => 'telefonocasa','class'=>'form-control', 'placeholder' => 'Telefono Casa'))}}
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-mobile form-control-feedback"></span>
                    {{ Form::text('celular', '', array('id' => 'celular','class'=>'form-control', 'placeholder' => 'Celular'))}}
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-envelope-o form-control-feedback"></span>
                    {{ Form::email('email', '',array('id' => 'email','class'=>'form-control', 'placeholder' => 'Direccion E-mail')) }}
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    {{ Form::textarea('direccion', '',array('id'=> 'direccion', 'class'=>'form-control', 'placeholder' => 'Direccion')) }}
                    <span class="fa fa-envelope-o form-control-feedback"></span>
                </div>
            </div>

            <div class="form-group">
    			<div class="col-sm-12">
    				{{ Form::select('estado', $estados,null,array(
						'class' => 'form-control estado'
					))  
					}}
    			</div>
    		</div>

    		<div class="form-group">
    			<div class="col-sm-12">
    				{{ Form::select('municipio', array('0' =>'---Seleccione un Estado---'),null,array(
						'class' => 'form-control municipio'
					))  
					}}
    		</div>
    		</div>

    		<div class="form-group">
    			<div class="col-sm-12">
    				{{ Form::select('parroquia', array('0' => '---Seleccione un Municipio---'),null,array(
						'class' => 'form-control parroquia'
					)) 
					}}
    		</div>
    		</div>

    		<div class="form-group">
				{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
			{{--<a href="casos" class="btn btn-primary">Guardar</a>--}}
			</div>
    	</div>
    </div>
    

    

	

	 
    	

    {{ Form::close()}}

    
@stop
{{--@include('casos',array('servicios' => $servicios))--}}

{{--@section('content')--}}

{{--{{var_dump($currentUser);}}--}}


