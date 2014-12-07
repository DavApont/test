<?
	// Noticias PHP

	require_once("config.php");

	$Base = file($FicheroBase);
	$Orden = array_reverse($Base);

	if(empty($paginado)) {
		$paginado = 0;
	}

	$Mostrar = $paginado + $LimiteNoticias;

	for ($i = $paginado; $i < count($Orden) AND $i < $Mostrar; $i++) {
		$dato = explode("|@|", $Orden[$i]);

 	$nombre = $dato[1];
 	$email = $dato[2];
	$titulo = $dato[3];
	$contenido = $dato[4];
	$fecha = $dato[5];
	
	require_once("noticias.html");
	}

	// Paginacion de noticias

	function Paginacion() {
	global $LimiteNoticias, $Base;

	if($LimiteNoticias < count($Base)) {

	$Paginas = count($Base) / $LimiteNoticias;

	echo "<b>Historial de noticias : </b>";

	for($i = 0; $i < $Paginas; $i++) {
	echo "<a href=index.php?paginado=". $i * $LimiteNoticias .">". ( $i + 1 ) ."</a> \n";
	}
	return;
	}
	}
?>

  <table cellpadding="5" cellspacing="1" width="400" align="center">
  <tr>
  <td class="normal">
  <? Paginacion(); ?>
  </td>
  </tr>
  </table>
</body>
</html>