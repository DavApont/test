<div id="listadomedicamentos" class="listado">
	

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
  	<h2>Listado de Medicamentos</h2>
  </div>
  <div class="col-xs-6 col-md-4">.
	{{ link_to("#","Nuevo",array("id" =>"nuevomedicamento","class" => "btn btn-default nuevo", "role" => "button" ))}}
  </div>
</div>
<table class='table table-bordered'>
	<thead>
		<tr>
			<th>Medicamento</th>
			<th>Dosis Diaria</th>
			<th>Fecha</th>
			<th>Hora</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datosmedicamento as $medicamento)
			<tr id="medicamento-{{$medicamento->id}}">
				<td>{{ $medicamento->medicamento }}</td>
				<td>{{ $medicamento->dosis_diaria }}</td>
				<td>{{ $medicamento->fecha }}</td>
				<td>{{ $medicamento->hora }}</td>

			</tr>
		@endforeach
	</tbody>
	
</table>

{{ $datosmedicamento->links() }}

</div>