@extends('layouts.master')

@section('javascript')
<script type="text/javascript">
	function eliminar(id){
		if(confirm("¿Realmente desea Eliminar el Paciente con el id: "+id+"?")){
			$.ajax({
				type:"DELETE",
				url: "pacientes/"+id,
				success:function(data){
					alert(data.message);
					$("#paciente-"+id).remove();
				}
			})
		}
	}
</script>
@stop
@section('content')

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
  	<h2>Listado de Pacientes</h2>
  </div>
  <div class="col-xs-6 col-md-4">.
	{{ link_to('pacientes/create',"Nuevo",array("class" => "btn btn-default", "role" => "button" ))}}
  </div>
</div>

<table class='table table-bordered'>
	<thead>
		<tr>
			<th>Cedula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Sexo</th>
			<th>Telefono Celular</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pacientes as $paciente)
			<tr id="paciente-{{$paciente->id}}">
				<td>{{ $paciente->cedula }}</td>
				<td>{{ $paciente->nombres }}</td>
				<td>{{ $paciente->apellidos }}</td>
				<td>{{ $paciente->id_sexo}}</td>
				<td>{{ $paciente->celular }}</td>
				<td>
					{{ link_to("pacientes/$paciente->id","Ver",array("class" => "btn btn-primary", "role" => "button"))}}
					{{ link_to("pacientes/$paciente->id/edit","Editar",array("class" => "btn btn-primary", "role" => "button"))}}

					{{ link_to("pacientes/$paciente->id/casos","Ver casos",array("class" => "btn btn-primary", "role" => "button"))}}
				 	<a href="javascript:eliminar({{$paciente->id}})" class="btn btn-primary" role="button">Borrar</a>
				 
				</td>
			</tr>
		@endforeach
	</tbody>
	
</table>

{{ $pacientes->links() }}
@stop