<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$sql_imptitular = "SELECT * FROM noticias WHERE estado = 0 ORDER BY fechapub DESC";
$query_imptitular = mysql_query($sql_imptitular, $cleyenlinea) or die(mysql_error());
$totalRows_imptitular = mysql_num_rows($query_imptitular);
if ($totalRows_imptitular > 15){
	$totalRows_imptitular = 15;
}
?>
<ul id="cintillo">
	<li><span class="etiquetasTit">Otros Titulares de Inter&eacute;s:</span></li>
    <?php $saltar=0; for ($j=1;$j<=$totalRows_imptitular;$j++){
	$fila = mysql_fetch_assoc($query_imptitular); ?>
     
    <li><span><?php echo $fila['fechapub']; ?></span><a href="#secciones/noticias/imprimir2.php&idnoticia=<?php echo $fila['idnoticia']; ?>"><?php echo $fila['titulo']; ?></a></li>
	<?php } ?>
   	<li><span class="etiquetasTit">.:: Noticias - Consejo Legislativo del Estado Yaracuy ::.</span></li> 
</ul>
