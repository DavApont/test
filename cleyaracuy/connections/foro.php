<?php
session_start();
$hostname_cleyenlinea_foro = "localhost";
$database_cleyenlinea_foro = "cleyarac_foro";
$username_cleyenlinea_foro = "cleyarac";
$password_cleyenlinea_foro = "cleygerencia";
$cleyenlinea_foro = mysql_pconnect($hostname_cleyenlinea_foro, $username_cleyenlinea_foro, $password_cleyenlinea_foro) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php
if($_POST['btncrearforo']){
	$sql="INSERT INTO foro (tipo,padre,nombre,descripcion,reglamento,moderador,fecha) VALUES ('".$_POST['tipo']."','".$_POST['padre']."','".bbparse($_POST['nombre'])."','".bbparse($_POST['descripcion'])."','".$_POST['reglamento']."','".$_POST['moderador']."','".date('Y-m-d')."')";
	mysql_select_db($database_cleyenlinea_foro, $cleyenlinea_foro);
	mysql_query($sql, $cleyenlinea_foro) or die(mysql_error());
}
if($ExistEstandares<>"SI"){
	include("funciones.php");
}
?>