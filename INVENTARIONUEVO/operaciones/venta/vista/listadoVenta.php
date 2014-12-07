<?php
function listadoVenta() {
    $codigo_venta = $_SESSION['codigo_venta'];
    $datos = array();
    $sql = "SELECT * FROM producto, detalle_venta , venta 
	WHERE venta.codigo_venta = $codigo_venta   and  detalle_venta.codigo_venta = venta.codigo_venta  and producto.codigo_producto = detalle_venta.codigo_producto ";
    $resultado = mysql_query($sql);
    while ($registros = mysql_fetch_array($resultado)) {
        $datos[] = $registros;
    }
    return $datos;
}
$lista = listadoVenta();
?>

<?php for ($i = 0; $i < count($lista); $i++): ?>
<tr>
    <td><input type="checkbox" name="id_check[]" id="id_check[]" value="<?php echo $lista[$i]['codigo_detalle_venta']; ?>"></td>
	<td><?php echo $lista[$i]['nombre_producto']; ?></td>
	 <td><?php echo $lista[$i]['cantidad_venta']; ?></td>
    <td><?php echo $lista[$i]['cantidad_existencia']; ?></td>

</tr>
<?php endfor; ?>