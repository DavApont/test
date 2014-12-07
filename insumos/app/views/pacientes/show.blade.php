@extends('layouts.master')

@section('javascript')
	@parent

	<script type="text/javascript">
		function eliminar(idPaciente,idCaso){
			if(confirm("¿Realmente desea Eliminar el Caso con el id: "+idCaso+"?")){
				$.ajax({
					type:"DELETE",
					url: idPaciente+"/casos/"+idCaso,
					success:function(data){
						alert(data.message);
						$("#caso-"+idCaso).remove();
					}
				})
			}
		}
	</script>
@stop
@section('content')
   
{{ Form::model($paciente,array('class' => 'form-horizontal'))}}

     <div class="form-group">
   	 <h2>Datos del Paciente</h2>
    </div>

    <div class="form-group">

  		{{ Form::label('cedula', 'Cedula:',array('class' => 'col-sm-2 control-label'))}}
	
		<div class="col-sm-4">  
    		{{ Form::text('cedula',null, array('id' => 'cedula','class' => 'form-control'))}}	
    	</div>
	</div>

	<div class="form-group">
	
  		{{ Form::label('nombres', 'Nombres:',array('class' => 'col-sm-2 control-label'))}}
  		<div class="col-sm-4"> 
    		{{ Form::text('nombres', null, array('id' => 'nombres','class' => 'form-control'))}}
    	</div>
    </div>

	<div class="form-group">
    	{{ Form::label('Apellidos', 'Apellidos:',array('class' => 'col-sm-2 control-label'))}}
    	<div class="col-sm-4"> 
    		{{ Form::text('apellidos', null, array('id' => 'apellidos','class' => 'form-control'))}}
    	</div>
    </div>

<div class="form-group">
		{{ Form::label('id_sexo', 'Sexo:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('id_sexo', array(
			0 => 'Seleccione',
			1=> 'Masculino',
			2=> 'Femenino'),null,array(
				'class' => 'form-control'
			))  
			}}
        </div>
	</div>
    <div class="form-group">

    	{{ Form::label('fecha_nac', 'Fecha Nacimiento:',array('class' => 'col-sm-2 control-label'))}}
    	<div  class="col-sm-4">
    		{{ Form::text('fecha_nac',null, array('id' => 'fecha_nac', 'class'=>'form-control'))}}
    	</div>

    </div>

     <div class="form-group">

    	{{ Form::label('telefono_casa', 'Telefono Casa:',array('class' => 'col-sm-2 control-label'))}}
		<div  class="col-sm-4">
    		{{ Form::text('telefono_casa', null, array('id' => 'telefono_casa','class'=>'form-control'))}}
    	</div>    
    </div>


    <div class="form-group">
    	{{ Form::label('celular', 'Celular:',array('class'=>'col-sm-2 control-label'))}}
		<div class="col-sm-4">
    		{{ Form::text('celular', null, array('id' => 'celular','class'=>'form-control'))}}
    	</div>
    </div>
    	
	
	<div class="form-group">   

		{{ Form::label('email', 'Dirección e-mail:',array('class' => 'col-sm-2 control-label' )) }}
		<div class="col-sm-4">
			{{ Form::email('email', null,array('id' => 'email','class'=>'form-control')) }}
		</div>
	</div>

    <div class="form-group">
			{{ Form::label('direccion_hab', 'Dirección: ', array('class' =>'col-sm-2 control-label')) }}

		<div class="col-sm-4">
			{{ Form::textarea('direccion_hab', null,array('id'=> 'direccion_hab', 'class'=>'form-control')) }}
		</div>
		
	</div>

	<div class="form-group">
		{{ Form::label('id_estado', 'Estado:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('id_estado', $estados,null,array(
				'class' => 'form-control estado'
			))  
			}}
        </div>
	</div>

	<div class="form-group">
		{{ Form::label('id_municipio', 'Municipio:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('id_municipio',$municipios,null,array(
				'class' => 'form-control municipio'
			))  
			}}
        </div>
	</div>

	<div class="form-group">
		{{ Form::label('id_parroquia', 'Parroquia:', array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('id_parroquia', $parroquias,null,array(
				'class' => 'form-control parroquia'
			)) 
			}}
        </div>
	</div>

   	

    {{ Form::close()}}
@include('casos.index')
    
@stop



