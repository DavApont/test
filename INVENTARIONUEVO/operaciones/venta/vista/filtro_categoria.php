<?php

	include('../../../conexion.php');
	conectar();


	$consulta = "select * from producto where codigo_departamento=$_POST[elegido]";
	$campos= mysql_query($consulta);
 	if(mysql_num_rows($campos)) {
		while($detalles = mysql_fetch_array($campos)) {
			echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[2].' - <'.$detalles[5].'></OPTION>';
		}

	}

//}


?>
