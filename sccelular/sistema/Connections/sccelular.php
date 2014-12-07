<?php
$hostname = "localhost";
$database = "sccelular";
$username = "root";
$password = "";
$conexion = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
?>