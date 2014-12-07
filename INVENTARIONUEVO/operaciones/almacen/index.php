<?php 
$conexion = mysql_connect("localhost" , "root", "");

if(!$conexion){
die("Error: ".mysql_error());
}

mysql_select_db("bdinventario",$conexion);
$resultado = mysql_query("select  producto.nombre_producto, departamento.codigo_departamento,  departamento.nombre_departamento, producto.cantidad_existencia
 from producto , departamento 
	where departamento.codigo_departamento=producto.codigo_departamento");
?>

<html>

<head>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.js" type="text/javascript"></script>

<style type="text/css">
@import "css/jquery.dataTables.css";
</style>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
$('#datatables').dataTable();
})
</script>

</head>


<body>

<div>
<table id="datatables">

<thead>
<tr>
                     
				    <th>Departamento</th>
					<th>Producto</th>
					<th>Cantidad Disponible</th>
</tr>
</thead>

<tbody>
<?php
while($fila = mysql_fetch_array($resultado)){
?>

<tr>

<td><?=$fila['nombre_departamento'] ?></td>
<td><?=$fila['nombre_producto'] ?></td>
<td><?=$fila['cantidad_existencia'] ?></td>
</tr>

<?php
}
?>
</tbody>

</table>
</div>


</body>
</html>