<?php

function conectar()
	{

		$conexion = mysql_connect("localhost", "root","");
mysql_select_db("bdinventario", $conexion);

	} 

 
?>