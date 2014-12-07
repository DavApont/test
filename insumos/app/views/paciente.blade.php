@extends('layouts.master')

@section('content')

    {{ Form::open(array('method' => 'POST','url'=> 'pacientes','class' => 'form-horizontal')) }}

     <div class="form-group">
   	 <h2>Datos del Paciente</h2>
    </div>

    <div class="form-group">

  		{{ Form::label('cedula', 'Cedula:',array('class' => 'col-sm-2 control-label'))}}
	
		<div class="col-sm-4">  
    		{{ Form::text('cedula', '', array('id' => 'cedula','class' => 'form-control'))}}	
    	</div>
	</div>

	<div class="form-group">
	
  		{{ Form::label('nombres', 'Nombres:',array('class' => 'col-sm-2 control-label'))}}
  		<div class="col-sm-4"> 
    		{{ Form::text('nombres', '', array('id' => 'nombres','class' => 'form-control'))}}
    	</div>
    </div>

	<div class="form-group">
    	{{ Form::label('Apellidos', 'Apellidos:',array('class' => 'col-sm-2 control-label'))}}
    	<div class="col-sm-4"> 
    		{{ Form::text('apellidos', '', array('id' => 'apellidos','class' => 'form-control'))}}
    	</div>
    </div>

<div class="form-group">
		{{ Form::label('sexo', 'Sexo:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('sexo', array(
			'1'=> 'Masculino',
			'2'=> 'Femenino')) 
			}}
        </div>
	</div>
    <div class="form-group">

    	{{ Form::label('fechanac', 'Fecha Nacimiento:',array('class' => 'col-sm-2 control-label'))}}
    	<div  class="col-sm-4">
    		{{ Form::text('fechanac', '', array('id' => 'fechanac', 'class'=>'form-control'))}}
    	</div>

    </div>

     <div class="form-group">

    	{{ Form::label('telefonocasa', 'Telefono Casa:',array('class' => 'col-sm-2 control-label'))}}
		<div  class="col-sm-4">
    		{{ Form::text('telefonocasa', '', array('id' => 'telefonocasa','class'=>'form-control'))}}
    	</div>    
    </div>


    <div class="form-group">
    	{{ Form::label('celular', 'Celular:',array('class'=>'col-sm-2 control-label'))}}
		<div class="col-sm-4">
    		{{ Form::text('celular', '', array('id' => 'celular','class'=>'form-control'))}}
    	</div>
    </div>
    	
	
	<div class="form-group">   

		{{ Form::label('email', 'Dirección e-mail:',array('class' => 'col-sm-2 control-label' )) }}
		<div class="col-sm-4">
			{{ Form::email('email', '',array('id' => 'email','class'=>'form-control')) }}
		</div>
	</div>

    <div class="form-group">
			{{ Form::label('direccion', 'Dirección: ', array('class' =>'col-sm-2 control-label')) }}

		<div class="col-sm-4">
			{{ Form::textarea('direccion', '',array('id'=> 'direccion', 'class'=>'form-control')) }}
		</div>
		
	</div>

	<div class="form-group">
		{{ Form::label('estado', 'Estado:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('estado', array(
			'1'=> 'Estado1',
			'2'=> 'Estado2',
			'3'=> 'Estado3'), '') 
			}}
        </div>
	</div>

	<div class="form-group">
		{{ Form::label('municipio', 'Municipio:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('municipio', array(
			'1'=> 'Municipio1',
			'2'=> 'Municipio2',
			'3'=> 'Municipio3'), '') 
			}}
        </div>
	</div>

	<div class="form-group">
		{{ Form::label('parroquia', 'Parroquia:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('parroquia', array(
			'1'=> 'Parroquia1',
			'2'=> 'Parroquia2',
			'3'=> 'Parroquia3'), '') 
			}}
        </div>
	</div>

	<div class="form-group">
			{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
			{{--<a href="casos" class="btn btn-primary">Guardar</a>--}}
	</div>

	 
    	

    {{ Form::close()}}

    
@stop
{{--@include('casos',array('servicios' => $servicios))--}}

{{--@section('content')--}}

{{--{{var_dump($currentUser);}}--}}


