<?php
function agregar_ceros($numero) {
	$decimales = explode(".",$numero);
	$diferencia = 3 - strlen($decimales[0]);
	for($i = 0 ; $i < $diferencia; $i++){
		$numero_con_ceros.= 0;
	}
	$numero_con_ceros.= $numero;
	echo $numero_con_ceros;
}
?>

