<?php 
$conexion = mysql_connect("localhost" , "root", "");

if(!$conexion){
die("Error: ".mysql_error());
}

mysql_select_db("bdinventario",$conexion);
$resultado = mysql_query("select  venta.fecha_venta, producto.nombre_producto, detalle_venta.cantidad_venta, detalle_venta.codigo_detalle_venta, venta.codigo_venta 
from venta, producto, detalle_venta 
where venta.codigo_venta=detalle_venta.codigo_venta and producto.codigo_producto=detalle_venta.codigo_producto");
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
                     
				    <th>Fecha Venta</th>
					<th>Producto</th>
					<th>Cantidad</th>
</tr>
</thead>

<tbody>
<?php
while($fila = mysql_fetch_array($resultado)){
?>

<tr>

<td><?=$fila['fecha_venta'] ?></td>
<td><?=$fila['nombre_producto'] ?></td>
<td><?=$fila['cantidad_venta'] ?></td>
</tr>

<?php
}
?>
</tbody>

</table>
</div>


</body>
</html>