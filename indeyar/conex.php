<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$clave_acceso_bd = "";
$base_datos = "indeyar";
if (!$conexion = mysql_pconnect("$servidor", "$usuario", "$clave_acceso_bd")){
	die ("Error en conexión, reintente más tarde por favor");
}
if (!mysql_select_db($base_datos, $conexion)){ 
	die ("Error en conexión a base de datos, reintente más tarde por favor");
}
?>