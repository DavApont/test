<?php
	/* Crear Rutas */
			if($_POST['addruta']){
				if($_POST['ruta'] <> '' && $_POST['costo'] <> '' && $_POST['codigo'] <> '' 	){
						$sql = "INSERT INTO rutas (nombre, precio, codigo) VALUES 
						('".$_POST["ruta"]."', '".$_POST["costo"]."', '".$_POST["codigo"]."')";
							if (@mysql_query($sql , $conexion)){ 
								$log = "Registro agregado correctamente en la base de datos";
							}else{
								$log = "Error inesperado en la inserción del registro en la base de datos";
								
							}
				}else{
					$log = "Error ningun campo puede estar vacio";
				}
				
			}

	/* Agregar Viaje */
			if($_POST['addviaje']){
				if($_POST['ruta'] <> '' && $_POST['adicional'] <> '' && $_POST['chofer'] <> '' && $_POST['placa'] <> ''){

	$buscarrutas=mysql_query("SELECT nombre, precio FROM rutas WHERE codigo = '".$_POST['ruta']."'",$conexion);
	while($row=mysql_fetch_array($buscarrutas)){
	
		$nrutas = $row[0]; 
		$prutas = $row[1];
												}


						$sql = "		INSERT INTO viajes (rutas, adicional, chofer, placa, precio) VALUES 
				('$nrutas', '".$_POST["adicional"]."', '".$_POST["chofer"]."','".$_POST["placa"]."', '$prutas')";
							if (mysql_query($sql , $conexion)){ 
								$log = "Registro agregado correctamente en la base de datos";
							}else{
								$log = "Error inesperado en la inserción del registro en la base de datos";
								
							}
				}else{
					$log = "Error ningun campo puede estar vacio";
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

?>