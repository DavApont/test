<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$clave_acceso_bd = "";
$base_datos = "mod_inventario";
if (!$conexion = mysql_pconnect("$servidor", "$usuario", "$clave_acceso_bd")){
	die ("Error en conexión, reintente más tarde por favor");
}
if (!mysql_select_db($base_datos, $conexion)){ 
	die ("Error en conexión a base de datos, reintente más tarde por favor");
}
/*
if($_POST['login']){
			$sql="SELECT `ID_user`, `usuario`, `password`, `nombre`, `apellido`, `permiso` FROM `mod_inventario`.`user` WHERE `user`.`usuario`='".$_POST['user']."' AND `user`.`password`='".$_POST['pword']."' LIMIT 1";
			$consulta=mysql_query($sql,$conexion);
			$vector=mysql_fetch_array($consulta);
			if($vector['usuario']<>''){
				$_SESSION['ID_user']=$vector['ID_user'];
				$_SESSION['usuario']=$vector['usuario'];
				$_SESSION['nombre']=$vector['nombre'];
				$_SESSION['apellido']=$vector['apellido'];
				$_SESSION['permiso']=$vector['permiso'];
			}
		}
		if($_POST['Descargar']){
		$cod_prod = $_POST["producto"];
		$result=mysql_query("SELECT `existencia_actual FROM producto WHERE ID_producto = $cod_prod",$conexion);
		while($row = mysql_fetch_array($result)) {
		
		$exist_actu = "$row[0]";  
		   }
		   mysql_free_result($result);
		if($exist_actual <= $_POST["cant_pro"]){
		
				$sql = "UPDATE `mod_inventario`.`producto` SET `existencia_actual`='$exist_actu' WHERE `ID_producto`='1' ;)";
				if (@mysql_query($sql , $conexion)){ 
					$log = "Registro agregado correctamente en la base de datos";
				}else{
					$log = "Error inesperado en la inserción del registro en la base de datos";
				}
		}else{
					$log = "Esta Descargando Mas de La Existencia Actual que es $exist_actu";
			}
		
			// UPDATE `mod_inventario`.`producto` SET `existencia_actual`=`existencia_actual`-10 WHERE `ID_producto`='2'
				if(($_SESSION['permiso']<'10')){
					$_SESSION['ID_user']=NULL;
					$_SESSION['usuario']=NULL;
					$_SESSION['nombre']=NULL;
					$_SESSION['apellido']=NULL;
					$_SESSION['permiso']=NULL;
					unset($_SESSION['ID_user']);
					unset($_SESSION['usuario']);
					unset($_SESSION['nombre']);
					unset($_SESSION['apellido']);
					unset($_SESSION['permiso']);
				}
		}
		if($_POST['crear_cat']){
			$sql = "INSERT INTO categoria  VALUES (NULL, '".$_POST["nom_cat"]."')";
			if (@mysql_query($sql , $conexion)){ 
				$log = "Registro agregado correctamente en la base de datos";
			}else{
				$log = "Error inesperado en la inserción del registro en la base de datos";
				
			}
		}
		//------>Alta seguridad
		if(($_GET['url']=='login.php') && ($_SESSION['ID_user']<>'')){
					header("location: ?ir=link&url=desc_prod.php");
							if(($_SESSION['permiso']=='10')){
					header("location: ?ir=link&url=panel_admin.php");
				}
		}elseif(($_GET['url']<>'login.php') && (!isset($_SESSION['ID_user']))){
			header("location: ?ir=link&url=login.php");
		} */
?>