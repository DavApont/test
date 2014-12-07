<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_contarcomentarios = "SELECT idcomentario FROM comentarios WHERE idnoticia_comentario = '$idnoticia' and seccion = '2'";
$contarcomentarios = mysql_query($query_contarcomentarios, $cleyenlinea) or die(mysql_error());
$totalRows_contarcomentarios = mysql_num_rows($contarcomentarios);
echo $totalRows_contarcomentarios;
?>
