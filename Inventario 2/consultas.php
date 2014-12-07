<?php
/*  Inicio Modulo Logeo! */
			if($_POST['Login']){
				$sql="SELECT `ID_user`, `usuario`, `password`, `nombre`, `apellido`, `permiso` FROM `mod_inventario`.`user` 
					WHERE `user`.`usuario`='".$_POST['user']."' AND `user`.`password`='".$_POST['pword']."' LIMIT 1";
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
/*  Fin Modulo Logeo! */

/* Inicio Modulo Buscar */

		/* buscar_fecha */

/* Fin Modulo Buscar*/

/*  Inicio Modulo Usuarios! */
	/* Crear Usuarios */
			if($_POST['crear_user']){
				if($_POST['usuario'] <> '' && $_POST['pass'] <> '' && $_POST['nombre'] <> '' && $_POST['apellido'] <> ''){
						$sql = "INSERT INTO user (usuario, password, nombre, apellido, permiso) VALUES 
						('".$_POST["usuario"]."', '".$_POST["pass"]."', '".$_POST["nombre"]."', '".$_POST["apellido"]."', '1')";
							if (@mysql_query($sql , $conexion)){ 
								$log = "Registro agregado correctamente en la base de datos";
							}else{
								$log = "Error inesperado en la inserción del registro en la base de datos";
								
							}
				}else{
					$log = "Error el campo no puede estar vacio";
				}
				
			}

	/* Editar Usuarios */
			if($_POST['edit_user']){
			$sql ="UPDATE user SET nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."', password='".$_POST['pass']."',
					permiso='".$_POST['permiso']."'  WHERE ID_user='".$_POST['id']."'";
				if (@mysql_query($sql , $conexion)){ 
					$log = "Registro agregado correctamente en la base de datos";
				}else{
					$log = "Error inesperado en la inserción del registro en la base de datos";
				}
			}

/* Fin Modulo Usuarios! */

/* Inicio Modulo Categoria*/

		/* Crear Categorias */
		
		if($_POST['crear_cat']){
		 		if($_POST['nom_cat'] <> ''){
					 $sql = "INSERT INTO categoria  VALUES (NULL, '".$_POST["nom_cat"]."')";
						if (@mysql_query($sql , $conexion)){ 
							$log = "Registro agregado correctamente en la base de datos";
						}else{
							$log = "Error inesperado en la inserción del registro en la base de datos";
						}
				}else{
					$log = "Error el campo no puede estar vacio";
			
				}
		}
		
		/* Editar Categorias */
		if($_POST['editar_cat']){
			$sql ="UPDATE categoria SET nombre='".$_POST['nom_cat']."' WHERE ID_Categoria='".$_POST['id']."'";
				if (@mysql_query($sql , $conexion)){ 
					$log = "Registro agregado correctamente en la base de datos";
				}else{
					$log = "Error inesperado en la inserción del registro en la base de datos";
				}
			}
/* Fin Modulo Categoria */

/* Inicio Modulo Producto */
		/* Crear Productos*/
		if($_POST['crear_prod']){
			if($_POST['nom_pro'] <> '' && $_POST["cant_min_pro"] <>'' && $_POST["cat_pro"] <> ''){
				  $nom_pro = $_POST["nom_pro"];
				  $cant_min_pro = $_POST["cant_min_pro"];
				  $cant_act_pro = "0";
				  $cat_pro = $_POST["cat_pro"];
				  $preci_pro = "0";
					$sql = "INSERT INTO producto VALUES (NULL, '$nom_pro', '$cant_min_pro', '$cant_act_pro', '$cat_pro', '$preci_pro','')";
						if ($agregar = @mysql_query($sql , $conexion)){ 
								$log = "Registro agregado correctamente en la base de datos"; 
						}else{ 
								$log = "Error inesperado en la inserción del registro en la base de datos"; 
						}
			}else{
				$log = "Error el campo no puede estar vacio";
		}}
		
		/* Cargar Productos */
		if($_POST['cargar_pro']){
				$cod_prod = $_POST['prod'];
				
				if($_POST['cant_pro'] <>''){
				$sql = "UPDATE producto SET existencia_actual=existencia_actual+'".$_POST['cant_pro']."', precio='".$_POST['preci_pro']."' WHERE ID_producto='$cod_prod'";
						if (@mysql_query($sql , $conexion)){ 
		$mostrar=mysql_query("SELECT nombre,existencia_actual FROM producto WHERE ID_producto = '$cod_prod'",$conexion);
				while($row = mysql_fetch_array($mostrar)) {
				$nompro = "$row[0]";  
				$exist_actu = "$row[1]";  
				 }
							$log = "Registro agregado correctamente en la base de datos '".$nompro."' '".$exist_actu."'";
						}else{
							$log = "Error inesperado en la inserción del registro en la base de datos";
						}
				}else{
							$log = "Debe ingresar un valor";
				}
				
		}
		/* Editar Productos */
		if($_POST['edit_prod']){
			$sql ="UPDATE producto SET nombre='".$_POST['nom_pro']."',categoria='".$_POST['categoria']."',existencia_min='".$_POST['cant_min_pro']."', activado='".$_POST['activado']."' WHERE ID_producto='".$_POST['id']."'";
				if (@mysql_query($sql , $conexion)){ 
					$log = "Registro agregado correctamente en la base de datos";
				}else{
					$log = "Error inesperado en la inserción del registro en la base de datos";
				}
		}
		/* Descargar Productos */
		
		if($_POST['Descargar']){
				$cod_prod = $_POST['producto'];
				$result=mysql_query("SELECT existencia_actual FROM producto WHERE ID_producto = '$cod_prod'",$conexion);
				while($row = mysql_fetch_array($result)) {
				
				$exist_actu = "$row[0]";  
		
				   }
				$result2=mysql_query("SELECT nombre, precio FROM producto WHERE ID_producto = '$cod_prod'",$conexion);
				while($row = mysql_fetch_array($result2)) {
				
				$nombreprodu = "$row[0]";  
				$precioprodu = "$row[1]";  
				   }
				$ptotal = $_POST['cant_pro']*$precioprodu;
			if($_POST['cant_pro']<>''){
				if($_POST['cant_pro'] <= $exist_actu ){
		
						$sql = "UPDATE producto SET existencia_actual=existencia_actual-'".$_POST['cant_pro']."' 
								WHERE ID_producto='$cod_prod'";
						// Null,usuario,fecha,cantidad,comentario,garantia //
							if (@mysql_query($sql , $conexion)){ 
								$log = "Registro agregado correctamente en la base de datos";
									}else{
								$log = "Error Sql1";
									}
						$sql2 = "INSERT INTO historia (usuario, fecha, nom_pro, cantidad, precio, comentario, garantia) VALUES
				('".$_POST['nombre']."', '".$_POST['fecha']."', '$nombreprodu', '".$_POST['cant_pro']."',
								 '$ptotal','".$_POST['msg']."', '".$_POST['garantia']."');";
								if (@mysql_query($sql2 , $conexion)){ 
								$queda = $exist_actu - $_POST['cant_pro'];
								$log = "Registro agregado correctamente en la base de datos resta ".$queda."";
									}else{
								$log = "Error Sql2";
									}							
							}else{
							$log = "Esta Descargando Mas de La Existencia Actual que es <b>$exist_actu</b>";
				}
					/* Desconectar al Descargar*/
					
			}else{
			$log = "La cantidad debe ser mayor a 0";
			}
		}
/* Fin Modulo Producto */

/* Cerrar Cuenta*/
	if($_GET['log']=='off'){
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
		header("location: ?ir=link&url=login.php");
		
	}
	
/* Seguridad*/
		if(($_GET['url']=='login.php') && ($_SESSION['ID_user']<>'')){
		header("location: ?ir=link&url=desc_prod.php");
			if(($_SESSION['permiso']=='10')){
				header("location: ?ir=link&url=panel_admin.php");
			}
		}elseif(($_GET['url']<>'login.php') && (!isset($_SESSION['ID_user']))){
			header("location: ?ir=link&url=login.php");
		}
?>