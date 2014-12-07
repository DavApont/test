<?
set_time_limit(0);
$link = mysql_connect("localhost","root","vertrigo");
mysql_select_db("sccelular",$link);
$SQLselect = "SELECT FACTURA, COUNT(*) as 'nrepetido' FROM cliente GROUP BY FACTURA HAVING Count(*) > 1";
$seleccionr=mysql_query($SQLselect, $link) or die(mysql_error());
$totalRows_seleccionr = mysql_num_rows($seleccionr);
for ($i=1;$i<$totalRows_seleccionr;$i++){
	$fila = mysql_fetch_object($seleccionr);
	$FACTURA = $fila -> FACTURA;
	$nrepetido = $fila -> nrepetido;
	for ($a=1;$a<$nrepetido;$a++){
		mysql_select_db("sccelular",$link);
		$SQLselect2 = "SELECT * FROM cliente where FACTURA = '$FACTURA' order by id desc";
		$seleccionr2=mysql_query($SQLselect2, $link) or die(mysql_error());
		$fila2 = mysql_fetch_object($seleccionr2);
		$id = $fila2 -> id;
		mysql_select_db("sccelular",$link);
		mysql_query("DELETE FROM cliente WHERE id = $id",$link);
	}

}
?>