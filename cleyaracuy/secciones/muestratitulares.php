<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$sql_imptitular = "SELECT * FROM titular ORDER BY fecha DESC";
$query_imptitular = mysql_query($sql_imptitular, $cleyenlinea) or die(mysql_error());
$totalRows_imptitular = mysql_num_rows($query_imptitular);
if ($totalRows_imptitular > 5){
	$totalRows_imptitular = 5;
}
for ($f=1;$f<=$totalRows_imptitular;$f++){
	$fila = mysql_fetch_assoc($query_imptitular);
?>
<div><img src='img/cartelera/<?php echo $fila['imagen']; ?>' /><h1><?php echo $fila['titulo']; ?></h1>
<?php echo $fila['descripcion']; ?><a href="#secciones/noticias/imprimir.php&tipo=1">M&aacute;s Noticias Actuales</a><a href='#secciones/noticias/imprimir2.php&idnoticia=<?php echo $fila['cod_not']; ?>' class='navegacionAJAX'>Leer M&aacute;s</a> <?php if($_SESSION['MM_Usernivel'] == 2){ ?><a onclick="return elegirOpcion()" href='<?php echo "#portada.php&tipo=".$vvarible{'tipo'}."&delete=titular&imagen=".$fila['imagen']."&idtitular=".$fila['id']; ?> 'style='margin-left:10px;'>Eliminar</a><?php } ?></div>
<?php } ?>