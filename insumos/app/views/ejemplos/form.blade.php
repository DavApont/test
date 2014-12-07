@extends('layouts.master')

@section('content')
    
    {{ Form::open(array('class' => 'form-horizontal')) }}
    <div class="col-sm-6">
    <div class="panel panel-info panel-content-1">
    	<div class="panel-heading"><span class="fa fa-wheelchair"></span> Datos del Paciente</div>
    	<div class="panel-body">
            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-user form-control-feedback"></span>
                    <input type="text" class="form-control" id="inputError2" placeholder="Nombre">
                </div>
            </div>
            
            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-user form-control-feedback"></span>
                    <input type="text" class="form-control" id="inputError2" placeholder="Apellidos">
                </div>
            </div>
            
            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-calendar form-control-feedback"></span>
                    <input type="text" class="form-control" id="inputError2" placeholder="Fecha Nacimiento">
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-phone form-control-feedback"></span>
                    <input type="text" class="form-control" id="inputError2" placeholder="Telefono Casa">
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-mobile form-control-feedback"></span>
                    <input type="text" class="form-control" id="inputError2" placeholder="Celular">
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <span class="fa fa-envelope-o form-control-feedback"></span>
                    <input type="text" class="form-control" id="inputError2" placeholder="Dirección e-mail">
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <div class="col-sm-12">
                    <textarea class="form-control" id="inputError2" placeholder="Dirección" rows="7"></textarea>
                    <span class="fa fa-envelope-o form-control-feedback"></span>
                </div>
            </div>

    		<div class="form-group">
    			<div class="col-sm-12">
    				{{ Form::select('estado', array(
    				''=> 'Estado',
    				'estado2'=> 'Estado2',
    				'estado3'=> 'Estado3'), '',
                            array(
                                'id' => 'medicamento',
                                'class' => 'form-control'
                            )
                            ) 
    			}}
    		</div>
    	</div>

    	<div class="form-group">
    		<div class="col-sm-12">
    			{{ Form::select('ciudad', array(
    			''=> 'Ciudad',
    			'ciudad2'=> 'ciudad2',
    			'ciudad3'=> 'Ciudad3'), '',
                            array(
                                'id' => 'medicamento',
                                'class' => 'form-control'
                            )
                            ) 
    		}}
    	</div>
    </div>
</div>
<div class="panel-footer">
    <div class="form-group">
    	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
    </div>
</div>
</div>
</div>

<div class="col-sm-6">
	<div class="panel panel-danger panel-content-1">
		<div class="panel-heading"><span class="fa fa-stethoscope"></span> Datos del Caso</div>
		<div class="panel-body">

            <div class="form-group has-feedback has-feedback-right">
                <div class="col-sm-12">
                    <span class="fa fa-envelope-o form-control-feedback"></span>
                    <input type="text" class="form-control" id="inputError2" placeholder="Dirección e-mail">
                </div>
            </div>
            
            <div class="form-group has-feedback has-feedback-right">
                <div class="col-sm-12">
                    <textarea class="form-control" id="inputError2" placeholder="Dirección" rows="7"></textarea>
                    <span class="fa fa-envelope-o form-control-feedback"></span>
                </div>
            </div>


		</div>
		<div class="panel-footer">
			<div class="form-group">
				{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</div>
</div> 
    {{ Form::close()}}
@stop