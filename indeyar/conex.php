<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$clave_acceso_bd = "";
$base_datos = "indeyar";
if (!$conexion = mysql_pconnect("$servidor", "$usuario", "$clave_acceso_bd")){
	die ("Error en conexi�n, reintente m�s tarde por favor");
}
if (!mysql_select_db($base_datos, $conexion)){ 
	die ("Error en conexi�n a base de datos, reintente m�s tarde por favor");
}
?>