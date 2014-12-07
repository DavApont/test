<?php
function listadoPlan() {
    $codigo_pedido = $_SESSION['codigo_pedido'];
    $datos = array();
    $sql = "SELECT * FROM producto, detalle_pedido , pedido 
	WHERE pedido.codigo_pedido = $codigo_pedido   and  detalle_pedido.codigo_pedido = pedido.codigo_pedido  and producto.codigo_producto = detalle_pedido.codigo_producto ";
    $resultado = mysql_query($sql);
    while ($registros = mysql_fetch_array($resultado)) {
        $datos[] = $registros;
    }
    return $datos;
}
$lista = listadoPlan();
?>

<?php for ($i = 0; $i < count($lista); $i++): ?>
<tr>
    <td><input type="checkbox" name="id_check[]" id="id_check[]" value="<?php echo $lista[$i]['codigo_detalle_pedido']; ?>"></td>
	<td><?php echo $lista[$i]['nombre_producto']; ?></td>
    <td><?php echo $lista[$i]['stop_min']; ?></td>
    <td><?php echo $lista[$i]['stop_max']; ?></td>
    <td><?php echo $lista[$i]['cantidad_existencia']; ?></td>

</tr>
<?php endfor; ?>