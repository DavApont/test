@extends('layouts.master')
@section('javascript')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#nuevomedicamento").on('click',function(evento){
				evento.preventDefault();
				$("#casos-medicinas").fadeIn(1500);
				$('#listadomedicamentos').fadeOut(1500);
			});

			$("#casos-medicinas").on("submit",function(){
				$(this).fadeOut(1500);
				$('#listadomedicamentos').fadeIn(1500);
			});

			$("#nuevomaterialmedico").on('click',function(evento){
				evento.preventDefault();
				$("#casos-material-medico").fadeIn(1500);
				$('#listadomaterialquirurgico').fadeOut(1500);
			});

			$("#casos-material-medico").on("submit",function(){
				$(this).fadeOut(1500);
				$('#listadomaterialquirurgico').fadeIn(1500);
			});

			$("#cancelar-medicamentos").on("click",function(){
				$("#casos-medicinas").fadeOut(1500);
				$('#listadomedicamentos').fadeIn(1500);
			});

			$("#cancelar-materialmedico").on("click",function(){
				$("#casos-material-medico").fadeOut(1500);
				$('#listadomaterialquirurgico').fadeIn(1500);
			});
		});
	</script>
@stop
@section('content')
    <h2>Datos del Caso</h2>
    {{ Form::model($caso,array('class' => 'form-horizontal'))}}
    	<div class="form-group">
			{{ Form::label('cama', 'Cama: ', array('class' => 'col-sm-2 control-label'))}}
			<div class="col-sm-4">
				{{ Form::text('cama', null,array('id' => 'cama','class' => 'form-control'))}}
			</div>
			 
    	</div>
		
		<div class="form-group">
			{{ Form::label('habitacion', 'Habitación: ', array('class' => 'col-sm-2 control-label'))}}
			<div class="col-sm-4">
				{{ Form::text('habitacion', null,array('id' => 'habitacion', 'class' => 'form-control'))}} 				
			</div>

		</div>
		
		<div class="form-group">
			{{ Form::label('fecha_ingreso', 'Fecha de Ingreso: ', array('class' => 'col-sm-2 control-label'))}}
			<div class="col-sm-4">
				{{ Form::text('fecha_ingreso', null,array('id' => 'fecha_ingreso', 'class' => 'form-control'))}} 
			</div>
						
		</div>

		<div class="form-group">
			{{ Form::label('servicio','Servicios:', array('class' => 'col-sm-2 control-label'))}}
			<div class="col-sm-4">
				{{ Form::select('servicio',$servicios, null, array('id' => 'servicio', 'class' => 'form-control'))}} 
			</div>
						
		</div>

		<div class="form-group">
			{{ Form::label('diagnostico', 'Diagnostico: ', array('class' => 'col-sm-2 control-label'))}}

			<div class="col-sm-4">
				{{ Form::text('diagnostico', null,array('id' => 'diagnostico', 'class' => 'form-control'))}} 	
			</div>
				
		</div>

		<div class="form-group">
			{{ Form::label('medico_caso', 'Medico del Caso: ', array('class' => 'col-sm-2 control-label'))}}
			<div class="col-sm-4">
				{{ Form::text('medico_caso', null,array('id' => 'medico_caso', 'class' => 'form-control'))}}
			</div>
						
		</div>

		<div class="form-group">
			{{ Form::label('fecha_egreso', 'Fecha de Egreso: ', array('class' => 'col-sm-2 control-label'))}}

			<div class="col-sm-4">
				{{ Form::text('fecha_egreso', null,array('id' => 'fecha_egreso', 'class' => 'form-control'))}} 	
			</div>
						
		</div>


    {{ Form::close() }}

    <ul class="nav nav-tabs">
    	<li class="active">
    		<a href="#medicina-suministrada" data-toggle="tab">Medicinas Suministradas</a>
    	</li>
    	<li>
    		<a href="#medico-quirurgico" data-toggle="tab">Material Médico Quirurgico</a>
     	</li>
     	<li>
    		<a href="#examenes" data-toggle="tab">Exámenes de Laboratorio</a>
     	</li>
     	<li>
    		<a href="#imagenes" data-toggle="tab">Control de Imagenes</a>
     	</li>
    </ul>
	<div class="tab-content">
		<div class="tab-pane active" id="medicina-suministrada"> 
		<!--<div style="display:none">-->
			{{ Form::open(array('url' => "pacientes/$paciente/casos/$caso->id/medicamentos",'id' => 'casos-medicinas','class' => 'form-horizontal','style' =>'display:none'))}}
				<div class="form-group">
					{{ Form::label('medicamento', 'Medicamento:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::select('medicamento',$medicamentos, null,
							array(
								'id' => 'medicamento',
								'class' => 'form-control'
							)
							) 
						}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::label('presentacion-medicina', 'Presentacion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('presentacion-medicina', '', array('id' => 'presentacion-medicina','class' => 'form-control'))}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::label('cantidad-medicina', 'Cantidad:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('cantidad-medicina', '', array('id' => 'cantidad-medicina','class' => 'form-control'))}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::label('unidad-medida', 'Unidad de Medida:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('unidad-medida', '', array('id' => 'unidad-medida','class' => 'form-control'))}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::label('dosis-diaria', 'Dosis Diaria:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('dosis-diaria', '', array('id' => 'dosis-diaria','class' => 'form-control'))}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::label('fecha-aplicacion-medicina', 'Fecha:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('fecha-aplicacion-medicina', '', array('id' => 'fecha-aplicacion-medicina','class' => 'form-control'))}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::label('hora-aplicacion-medicina', 'Hora:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('hora-aplicacion-medicina', '', array('id' => 'hora-aplicacion-medicina','class' => 'form-control'))}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::label('descripcion-aplicacion-medicina', 'Descripcion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::textarea('descripcion-aplicacion-medicina', '', array('id' => 'descripcion-aplicacion-medicina','class' => 'form-control'))}}
					</div>
					
				</div>

				<div class="form-group">
					{{ Form::submit("Guardar", array('class' => 'btn btn-primary'))}}
					{{ Form::button("Cancelar", array('id' => 'cancelar-medicamentos','class' => 'btn btn-primary'))}}			
				</div>

			{{ Form::close()}}
			<!--</div>-->
			@include('casos.medicamentos.index')
		</div>

		<div class="tab-pane" id="medico-quirurgico">
			{{ Form::open(array('url' => "pacientes/$paciente/casos/$caso->id/materialmedico",'id' => 'casos-material-medico','class' => 'form-horizontal','style' =>'display:none'))}}
				<div class="form-group">
					{{ Form::label('tipo-material-medico', 'Tipo de Material Médico:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::select('tipo-material-medico',$materialesmedicos, null,
								array(
									'id' => 'tipo-material-medico',
									'class' => 'form-control'
								)
								) 
						}}
						
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('presentacion-material-medico', 'Presentacion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('presentacion-material-medico', '', array('id' => 'presentacion-material-medico','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('cantidad-material-medico', 'Cantidad:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('cantidad-material-medico', '', array('id' => 'cantidad-material-medico','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('fecha-utilizacion-material-medico', 'Fecha de Utilizacion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('fecha-utilizacion-material-medico', '', array('id' => 'fecha-utilizacion-material-medico','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('hora-utilizacion-material-medico', 'Hora de Utilizacion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('hora-utilizacion-material-medico', '', array('id' => 'hora-utilizacion-material-medico','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('descripcion-material-quirurgico', 'Descripcion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::textarea('descripcion-material-quirurgico', '', array('id' => 'descripcion-material-quirurgico','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::submit("Guardar", array('class' => 'btn btn-primary'))}}
					{{ Form::button("Cancelar", array('id' => 'cancelar-materialmedico','class' => 'btn btn-primary'))}}			
				</div>
					
			{{ Form::close()}}
			@include('casos.materialmedico.index')
		</div>

		<div class="tab-pane" id="examenes">
			{{ Form::open(array('id' => 'casos-examenes','class' => 'form-horizontal'))}}
				<div class="form-group">
					{{ Form::label('rama-examenes', 'Rama:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::select('rama-examenes', 
								array(
									'rama1'=> 'Rama 1',
									'rama2'=> 'Rama 2',
									'rama3'=> 'Rama 3'
								), '',
								array(
									'id' => 'rama-examenes',
									'class' => 'form-control'
								)
								) 
						}}
						
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('examen', 'Examen:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::select('examen', 
								array(
									'examen1'=> 'Examen 1',
									'examen2'=> 'Examen 2',
									'examen3'=> 'Examen 3'
								), '',
								array(
									'id' => 'examen',
									'class' => 'form-control'
								)
								) 
						}}
						
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('cantidad-examenes', 'Cantidad:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('cantidad-examenes', '', array('id' => 'cantidad-examenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('fecha-examenes', 'Fecha de Registro:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('fecha-examenes', '', array('id' => 'fecha-examenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('hora-examenes', 'Hora de Registro:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('hora-examenes', '', array('id' => 'hora-examenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('descripcion-examenes', 'Descripcion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::textarea('descripcion-examenes', '', array('id' => 'descripcion-examenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::submit("Guardar", array('class' => 'btn btn-primary'))}}
					{{ Form::button("Cancelar", array('id' => 'cancelar-materialmedico','class' => 'btn btn-primary'))}}			
				</div>
					
			{{ Form::close()}}
		</div>

		<div class="tab-pane" id="imagenes">
			{{ Form::open(array('id' => 'casos-imagenes','class' => 'form-horizontal'))}}
				<div class="form-group">
					{{ Form::label('tipo-imagenes', 'Tipo de Imagen:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::select('tipo-imagenes', 
								array(
									'tipoimagen1'=> 'Tipo de Imagen 1',
									'tipoimagen2'=> 'Tipo de Imagen 2',
									'tipoimagen3'=> 'Tipo de Imagen 3'
								), '',
								array(
									'id' => 'tipo-imagenes',
									'class' => 'form-control'
								)
								) 
						}}
						
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('imagen', 'Imagen:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::select('imagen', 
								array(
									'imagen1'=> 'Imagen 1',
									'imagen2'=> 'Imagen 2',
									'imagen3'=> 'Imagen 3'
								), '',
								array(
									'id' => 'imagen',
									'class' => 'form-control'
								)
								) 
						}}
						
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('cantidad-imagenes', 'Cantidad:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('cantidad-imagenes', '', array('id' => 'cantidad-imagenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('fecha-imagenes', 'Fecha de Registro:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('fecha-imagenes', '', array('id' => 'fecha-imagenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('hora-imagenes', 'Hora de Registro:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::text('hora-imagenes', '', array('id' => 'hora-imagenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{ Form::label('descripcion-imagenes', 'Descripcion:', array('class' => 'col-sm-2 control-label'))}}

					<div class="col-sm-4">
						{{ Form::textarea('descripcion-imagenes', '', array('id' => 'descripcion-imagenes','class' => 'form-control'))}}
					</div>
				
				</div>

				<div class="form-group">
					{{-- Form::submit("Guardar", array('class' => 'btn btn-primary'))--}}
					<a href="casos" class="btn btn-primary">Guardar</a>
				</div>
					
			{{ Form::close()}}
		</div>
	</div>


@stop