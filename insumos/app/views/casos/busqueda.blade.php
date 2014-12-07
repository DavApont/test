@extends('layouts.master')
@section('javascript')
 <script type="text/javascript">
 $(document).ready(function(){
		$("#busqueda").autocomplete({
			//source: availableTags
			source: function( request, response ) {
			    $.ajax({
			        url: "{{url('paciente/"+$("#busqueda").val()+"')}}",
			        dataType: "json",
			        success: function( data ) {
			            response( $.map( data, function( item ) {
			                return {
			                    label: item.cedula + ' | '+ item.nombres + ' ' +item.apellidos,
			                    value: item.nombres + ' ' +item.apellidos,
			                    idpaciente: item.id
			                }
			            }));
			        }
			    });
			},

			select: function(evento,ui){
				$.ajax({
			        url: "{{url('casos/"+ui.item.idpaciente+"')}}",
			        dataType: "json",
			        success: function( data ) {
			        	$("#resultado tbody").html("");
			        	$.map( data, function( item ) {
			        		console.log(ui.item.value);
			            	$("#nombre-paciente").text(ui.item.value);
			            	$("#resultado tbody").append('\
			            		<tr> \
				            		<td>'+item.cama+'</td> \
				            		<td>'+item.habitacion+'</td> \
				            		<td>'+item.fecha_ingreso+'</td> \
				            		<td>'+item.servicio+'</td> \
				            		<td>'+item.diagnostico+'</td> \
				            		<td> \
				            			{{ link_to("pacientes/'+ui.item.idpaciente+'/casos/'+item.id+'","Ver",array("class" => "btn btn-primary", "role" => "button"))}} \
				{{ link_to("pacientes/'+ui.item.idpaciente+'/casos/'+item.id+'/edit","Editar",array("class" => "btn btn-primary", "role" => "button"))}} \
				 <a href="javascript:eliminar('+ui.item.idpaciente+','+item.id+')" class="btn btn-primary" role="button">Borrar</a> \
				            		</td> \
			            		</tr>')
			            });
			        }
			    });
			}
		});
	});
</script>
@stop
@section('content')
<div class="input-group">
  <span class="input-group-addon"><span class="fa fa-search fa-lg"></span></span>
  <div class="ui-widget">
  	<input id="busqueda" type="text" class="form-control" placeholder="Busqueda de casos por paciente">
  </div>
  
</div>
<h1>Casos de: <span id="nombre-paciente"></span></h1>
<table id="resultado" class="table table-striped">
	<thead>
		<tr>
			<th>Cama</th>
			<th>Habitacion</th>
			<th>Fecha de Ingreso</th>
			<th>Servicio</th>
			<th>Diagnóstico</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td colspan="6">Haga la Busqueda de Un Paciente</td>
		</tr>

	</tbody>
</table>

@stop
