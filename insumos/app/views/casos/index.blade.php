<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
  	<h2>Listado de Casos</h2>
  </div>
  <div class="col-xs-6 col-md-4">.
	{{ link_to("pacientes/$paciente->id/casos/create","Nuevo",array("class" => "btn btn-default", "role" => "button" ))}}
  </div>
</div>

<table class='table table-bordered'>
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
		@foreach ($casos as $caso)
			<tr id="caso-{{$caso->id}}">
				<td>{{ $caso->cama }}</td>
				<td>{{ $caso->habitacion }}</td>
				<td>{{ $caso->fecha_ingreso }}</td>
				<td>{{ Servicio::nombre($caso->servicio)}}</td>
				<td>{{ $caso->diagnostico }}</td>
				<td>
				{{ link_to("pacientes/$paciente->id/casos/$caso->id","Ver",array("class" => "btn btn-primary", "role" => "button"))}}

				{{ link_to("pacientes/$paciente->id/casos/$caso->id/edit","Editar",array("class" => "btn btn-primary", "role" => "button"))}}
				 <a href="javascript:eliminar({{$paciente->id.",".$caso->id}})" class="btn btn-primary" role="button">Borrar</a>
				</td>
			</tr>
		@endforeach
	</tbody>
	
</table>

{{ $casos->links() }}
