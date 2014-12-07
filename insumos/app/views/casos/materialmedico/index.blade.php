<div id="listadomaterialquirurgico" class="listado">
	

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
  	<h2>Listado de Material Medico</h2>
  </div>
  <div class="col-xs-6 col-md-4">.
	{{ link_to("#","Nuevo",array("id"=>"nuevomaterialmedico","class" => "btn btn-default nuevo", "role" => "button" ))}}
  </div>
</div>
<table class='table table-bordered'>
	<thead>
		<tr>
			<th>Material Medico</th>
			<th>Cantidad</th>
			<th>Fecha</th>
			<th>Hora</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datosmaterialmedico as $materialmedico)
			<tr id="materialmedico-{{$materialmedico->id}}">
				<td>{{ $materialmedico->mmq }}</td>
				<td>{{ $materialmedico->cantidad }}</td>
				<td>{{ $materialmedico->fecha }}</td>
				<td>{{ $materialmedico->hora }}</td>

			</tr>
		@endforeach
	</tbody>
	
</table>

{{ $datosmedicamento->links() }}

</div>