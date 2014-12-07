<?php
if (!isset($_SESSION)) {
  session_start();
}
$ExistEstandares="SI";
set_time_limit(0);
$limit = $_GET['limit'];
if ($limit == 1){
	$MM_limit="../index.php";
	header("Location: " . $MM_limit );
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
$id=$_GET['id'];
$vinculo=$_GET['vinculo'];
if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "nivel";
  $MM_irLoginBien = "index.php?id=$id&vinculo=$vinculo";
  $MM_irLoginBienAdmin = "smc/index.php";
  $MM_irLoginMal = "index.php?id=$id&vinculo=$vinculo";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_cleyenlinea, $cleyenlinea);
  	
  $LoginRS__query=sprintf("SELECT * FROM usuario WHERE nombreusuario='$loginUsername' AND contrasena='$password'"); 
   
  $LoginRS = mysql_query($LoginRS__query, $cleyenlinea) or die(mysql_error());
  $row_Login = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');
    
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
	$_SESSION['MM_Userdepartamento'] = $row_Login['departamento'];
	$_SESSION['MM_Usernombre'] = $row_Login['nombre'];
	$_SESSION['MM_Usernivel'] = $row_Login['nivel'];
	$_SESSION['MM_ultimolog'] = $row_Login['ultimolog'];
	$_SESSION['MM_iduser'] = $row_Login['idusuario'];
	$_SESSION['MM_imagen'] = $row_Login['imagen'];
	$_SESSION['MM_nivelforo'] = $row_Login['nivelforo'];
	$fecha = date('Y-m-d g:i:sa');
	$iduser= $_SESSION['MM_iduser'];
	$estado=0;
	if ($row_Login['estado'] == 0){
		$estado = 1;
	}else{
		$estado = 0;
	}
	$_SESSION['MM_estado'] = $estado;
	mysql_query("UPDATE usuario SET ultimolog = '$fecha', estado = $estado WHERE idusuario = $iduser",$cleyenlinea);
	mysql_query("INSERT INTO registrolog (idusuario,horalog) VALUES ($iduser, '$fecha')",$cleyenlinea);
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_irLoginBien = $_SESSION['PrevUrl'];	
    }
		if ($row_Login['nivel'] > 1){
			header("Location: " . $MM_irLoginBienAdmin );
		}else{
			header("Location: " . $MM_irLoginBien );
		}
  }
  else {
    header("Location: " . $MM_irLoginMal );
  }
}
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
	$_SESSION['MM_Username'] = NULL;
	$_SESSION['MM_UserGroup'] = NULL;
	$_SESSION['MM_Userdepartamento'] = NULL;
	$_SESSION['MM_Usernombre'] = NULL;
	$_SESSION['MM_Usernivel'] = NULL;
	$_SESSION['PrevUrl'] = NULL;
	$_SESSION['MM_ultimolog'] = NULL;
	$_SESSION['MM_iduser'] = NULL;
	$_SESSION['MM_estado'] = NULL;
	$_SESSION['MM_imagen'] = NULL;
	$_SESSION['MM_nivelforo'] = NULL;
	unset($_SESSION['MM_imagen']);
	unset($_SESSION['MM_Username']);
	unset($_SESSION['MM_UserGroup']);
	unset($_SESSION['MM_Userdepartamento']);
	unset($_SESSION['MM_Usernombre']);
	unset($_SESSION['MM_Usernivel']);
	unset($_SESSION['PrevUrl']);
	unset($_SESSION['MM_ultimolog']);
	unset($_SESSION['MM_iduser']);
	unset($_SESSION['MM_estado']);
	unset($_SESSION['MM_nivelforo']);
	$iduser= $_SESSION['MM_iduser'];
	$fecha = date('Y-m-d g:i:sa');
	mysql_select_db($database_cleyenlinea, $cleyenlinea);
	mysql_query("UPDATE registrolog SET horadeslog = '$fecha' WHERE idusuario = $iduser and horadeslog IS NULL",$cleyenlinea);
	$logoutGoTo = "";
	if ($logoutGoTo) {
		header("Location: $logoutGoTo");
	exit;
	}
}

$var = $_SERVER['REQUEST_URI'];
$var1=$var{1};
$var2=$var{2};
$var3=$var{3};
$var="$var1$var2$var3";
if ($var=="smc"){
	if ($_SESSION['MM_Usernombre'] <> ""){
	}else{
		header("Location: ../");
	}
}
	

if (!function_exists("ValorDeCadenaSQL")) {
function ValorDeCadenaSQL($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (($_POST["envcomentario"]) AND ($_POST['ajax'] == 'no')) {
	$insertSQL = "INSERT INTO comentarios (idnoticia_comentario,usuario,comentario,email,fecha) VALUES ('".$_GET['id']."', '".$_POST['nombre']."', '".$_POST['comentario']."', '".$_POST['email']."', '".date("Y-n-j-w-h-i-s-a")."')";
	mysql_select_db($database_cleyenlinea, $cleyenlinea);
	mysql_query($insertSQL, $cleyenlinea) or die(mysql_error());
}
#######################-----------------------------------------#############################
# Inicio de noticia
if ($_POST['ingnot']) {
	$tamano = $_FILES["imggr"]['size'];
	$type = $_FILES["imggr"]['type'];
	$tipo = $type[6].$type[7].$type[8];
	$date = date('U');
	$archivo = $_FILES["imggr"]['name'];
	$nombre = $date.".".$tipo;
	if ($tipo == 'png')
		if ($archivo != "") {
			// Ingresar imagen Grande
			$destino =  "../img/noticias/".$date.".".$tipo;
			if (copy($_FILES['imggr']['tmp_name'],$destino)) {
				$array = getimagesize("../img/noticias/$date.$tipo");
				$status = "Archivo subido: <b>".$archivo."</b>   ".$array[0]."x".$array[1];
				$upimg1="true";
				if (($array[0] <> 263) OR ($array[1] <> 233)){
					$origen = "../img/noticias/$date.$tipo";
					unlink ($origen);
					$upimg1="false";
					mensajefin("La imagen 1 Sobrepasa las dimenciones Requeridas");
				}
			} else {
				mensajefin("Error al subir el archivo");
			}
			# Fin Imagen Grande
			// Ingresar Imagen Pequeña
			$destino2 =  "../img/noticias/miniatura".$date.".".$tipo;
			if (copy($_FILES['imgmin']['tmp_name'],$destino2)) {
				$array2 = getimagesize("../img/noticias/miniatura$date.$tipo");
				$status2 = "Archivo subido: <b>".$archivo."</b>   ".$array2[0]."x".$array2[1];
				$upimg2="true";
				if (($array2[0] > 200) OR ($array2[1] > 160)){
					$origen2 = "../img/noticias/miniatura$date.$tipo";
					unlink ($origen2);
					$upimg2="false";
					mensajefin("La imagen 2 Sobrepasa las dimenciones Requeridas");
				}
			} else {
				mensajefin("Error al subir el archivo 2");
			}
			# Fin de Imagen Pequeña
			} else {
				mensajefin("Error al subir archivo");
	}
	
}
if(($upimg1 == "true") && ($upimg2 == "true")){
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}
	
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "ingnot")) {
		$insertSQL = sprintf("INSERT INTO noticias (fechapub, prioridad, emisor, imagen, titulo, descripcion, cuerpo, tipo, periodista, antetitulo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
		   ValorDeCadenaSQL($_POST['fechapub'], "date"),
		   ValorDeCadenaSQL($_POST['prioridad'], "int"),
		   ValorDeCadenaSQL($_SESSION['MM_Userdepartamento'], "text"),
		   ValorDeCadenaSQL($nombre, "text"), 
		   ValorDeCadenaSQL($_POST['titulo'], "text"),
		   ValorDeCadenaSQL($_POST['descripcion'], "text"),
		   ValorDeCadenaSQL($_POST['cuerpo'], "text"),
		   ValorDeCadenaSQL($_POST['tipo'], "int"),
		   ValorDeCadenaSQL($_POST['periodista'], "text"),
		   ValorDeCadenaSQL($_POST['antetitulo'], "text"),
		   ValorDeCadenaSQL($_POST['prioridad'], "int"));
		$fincargar="Noticia Cargada Satifactoriamente";
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		$Result1 = mysql_query($insertSQL, $cleyenlinea) or die(mysql_error());
		// $insertGoTo = "index.php?id=2&vinculo=ingnot.php";
		//  if (isset($_SERVER['QUERY_STRING'])) {
		//    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		//    $insertGoTo .= $_SERVER['QUERY_STRING'];
		//  }
		// header(sprintf("Location: %s", $insertGoTo));
		mensajefin("Noticia Cargada Satisfactoriamente");
	}
}
# fin de noticia
#######################-----------------------------------------#############################
?>

<?php
// Inicio de cargar seccion
$carses = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $carses .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["carses"])) && ($_POST["envcomentario"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO derecho_palabra (id_sesion,pderechop,mderechop) VALUES (%s, %s, %s)",
                       ValorDeCadenaSQL($_GET['nro_sesion'], "text"),
					   ValorDeCadenaSQL($_POST['persona-dp1'], "text"),
                       ValorDeCadenaSQL($_POST['motivo-dp1'], "text"));
  mysql_select_db($database_cleyenlinea, $cleyenlinea);
  $Result1 = mysql_query($insertSQL, $cleyenlinea) or die(mysql_error());

  $insertGoTo = "index.php?id=2&vinculo=carses.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
// fin
?>
<?php function mensajefin($msj){ ?>
<script type="text/javascript" language="javascript">
	alert("<?php echo $msj; ?>");
</script>
<?php } ?>
<?php
if ($_POST['filtrartit']){
	$fechapub=$_POST['fechapub'];
	$tipo=$_POST['tipo'];
	mysql_select_db($database_cleyenlinea, $cleyenlinea);
	$query_filtrartit = "SELECT * FROM noticias where fechapub = '$fechapub' and tipo = '$tipo'";
	$totalfiltrartit=mysql_query($query_filtrartit, $cleyenlinea) or die(mysql_error());
	$totalRows_filtrartit = mysql_num_rows($totalfiltrartit);
}
?>
<?php
if ($_POST['ingtit']){
	$titulotit=$_POST['titulotit'];
	$editor1a=$_POST['editor1a'];
	$not_rel=$_POST['not_rel'];
	$prioridad=$_POST['prioridad'];
	$tamano = $_FILES["imagentit"]['size'];
	$type = $_FILES["imagentit"]['type'];
	$tipo = $type[6].$type[7].$type[8];
	$date = date('U');
	$archivo = $_FILES["imagentit"]['name'];
	$nombre = $date.".".$tipo;
	if ($tipo == 'png'){
		if ($archivo != "") {
			$destino =  "../img/cartelera/".$date.".".$tipo;
			if (copy($_FILES['imagentit']['tmp_name'],$destino)) {
				$array = getimagesize("../img/cartelera/$date.$tipo");
				$status = "Archivo subido: <b>".$archivo."</b>".$array[0]."x".$array[1];
				if (($array[0] <> 200) OR ($array[1] <> 180)){
					$origen = "../img/cartelera/$date.$tipo";
					unlink ($origen);
					$error = "true";
				}
				if(isset($error)){
					$status = "LA IMAGEN SOBRE PASA LAS DIMENSIONES REQUERIDAS 200px X 180px";
				}else{
					mysql_select_db($database_cleyenlinea, $cleyenlinea);
					$sql = "SELECT fechapub FROM noticias where idnoticia = '$not_rel'";
					$query=mysql_query($sql, $cleyenlinea) or die(mysql_error());
					$fechapub=mysql_fetch_assoc($query);
					$sql_ing_not="INSERT INTO titular (fecha,cod_not,prioridad,titulo,descripcion,imagen,usuario) VALUES ('".$fechapub['fechapub']."' , '$not_rel' , '$prioridad' , '$titulotit' , '$editor1a' , '$date.$tipo','".$_SESSION['MM_iduser']."' )";
					mysql_select_db($database_cleyenlinea, $cleyenlinea);
					mysql_query($sql_ing_not, $cleyenlinea) or die(mysql_error());
				}
			}else{
				$status = "ERROR AL SUBIR EL ARCHIVO POR FAVOR INTENTE NUEVAMENTE";
			}
		}
	}else{
		$status = "EL ARCHIVO NO CUMPLE CON LA EXTENSION REQUERIDA: '.PNG'";
	}
}

?>

<?php
if($_POST['carses']){
	$i = 1;
	$veces = 0;
	$sqlderecho_p = "INSERT INTO derecho_p (sesion,ciudadano,asunto,decision) VALUES ";
	$sqlinvitacion_c = "INSERT INTO invitacion_c (sesion,n_invitacion,ciudadano,ente) VALUES ";
	$sqlremision_c = "INSERT INTO remision_c (sesion,comision,tipo,n_doc,descripcion) VALUES ";
	$finn="FALSE";
	$fin=0;
	while($finn == "FALSE"){
		$veces = $veces + 1;
		if($veces == 1){
			// Ingresar derecho de palabra
			if($_POST["persona-dp$i"]){
				$sqlderecho_p = $sqlderecho_p."('".$_POST["nro_sesion"]."','".$_POST["persona-dp$i"]."','".$_POST["motivo-dp$i"]."','".$_POST["decision-dp$i"]."')";
				$fin=0;
				$derecho_p="TRUE";
			}else{ $fin = $fin + 1; }
			// Ingresar Invitación de Comparecencia
			if($_POST["nro-ic$i"]){
				$sqlinvitacion_c = $sqlinvitacion_c."('".$_POST["nro_sesion"]."','".$_POST["nro-ic$i"]."','".$_POST["persona-ic$i"]."','".$_POST["ente-ic$i"]."')";
				$invitacion_c="TRUE";
				$fin=0;
			}else{ $fin = $fin + 1; }
			// Ingresar Remisión a Comisión
			if($_POST["comision-rc$i"]){
				$sqlremision_c = $sqlremision_c."('".$_POST["nro_sesion"]."','".$_POST["comision-rc$i"]."','".$_POST["tipo-rc$i"]."','".$_POST["nro-doc$i"]."','".$_POST["desc-doc$i"]."')";
				$remision_c="TRUE";
				$fin=0;
			}else{ $fin = $fin + 1; }
		}
		if($veces > 1){
			// Ingresar derecho de palabra
			if($_POST["persona-dp$i"]){
				$sqlderecho_p = $sqlderecho_p.",('".$_POST["nro_sesion"]."','".$_POST["persona-dp$i"]."','".$_POST["motivo-dp$i"]."','".$_POST["decision-dp$i"]."')";
				$derecho_p="TRUE";
				$fin=0;
			}else{ $fin = $fin + 1; }
			// Ingresar Invitación de Comparecencia
			if($_POST["nro-ic$i"]){
				$sqlinvitacion_c = $sqlinvitacion_c.",('".$_POST["nro_sesion"]."','".$_POST["nro-ic$i"]."','".$_POST["persona-ic$i"]."','".$_POST["ente-ic$i"]."')";
				$invitacion_c="TRUE";
				$fin=0;
			}else{ $fin = $fin + 1; }
			// Ingresar Remisión a Comisión
			if($_POST["comision-rc$i"]){
				$sqlremision_c = $sqlremision_c.",('".$_POST["nro_sesion"]."','".$_POST["comision-rc$i"]."','".$_POST["tipo-rc$i"]."','".$_POST["nro-doc$i"]."','".$_POST["desc-doc$i"]."')";
				$remision_c="TRUE";
				$fin=0;
			}else{ $fin = $fin + 1; }
		}
		if($fin > 10){
			$finn = "TRUE";
		}
		$i = $i + 1;
	}
	if(($_POST['nro_sesion'] > 0) AND ($_POST['nro_sesion'] < 99999999)){
		$sql_ses="INSERT INTO sesion (fecha_sesion,tipo,sesion,resumen,motivo_solemne) VALUES ('".$_POST['fecha_sesion']."','".$_POST['tipo_sesion']."','".$_POST['nro_sesion']."','".$_POST['materia_tratada']."','".$_POST['motivo_solemne']."')";
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		mysql_query($sql_ses, $cleyenlinea) or die(mysql_error());
		if((isset($derecho_p)) AND ($derecho_p == "TRUE")){
			mysql_select_db($database_cleyenlinea, $cleyenlinea);
			mysql_query($sqlderecho_p, $cleyenlinea) or die(mysql_error());
		}
		if((isset($invitacion_c)) AND ($invitacion_c == "TRUE")){
			mysql_select_db($database_cleyenlinea, $cleyenlinea);
			mysql_query($sqlinvitacion_c, $cleyenlinea) or die(mysql_error());
		}
		if((isset($remision_c)) AND ($remision_c == "TRUE")){
			mysql_select_db($database_cleyenlinea, $cleyenlinea);
			mysql_query($sqlremision_c, $cleyenlinea) or die(mysql_error());
		}
	}
}
?>
<?php
if($_POST['filtrarses']){
	$sql = "SELECT * FROM sesion where tipo = '".$_POST['id_tiposesion']."'";
	mysql_select_db($database_cleyenlinea, $cleyenlinea);
	$query=mysql_query($sql, $cleyenlinea) or die(mysql_error());
	$numrows=mysql_num_rows($query);
}
?>
<?php
if($_POST['enviarhistory']){
	$tamano = $_FILES["imghistory"]['size'];
	$type = $_FILES["imghistory"]['type'];
	$tipo = $type[6].$type[7].$type[8];
	$date = date('U');
	$archivo = $_FILES["imghistory"]['name'];
	$nombreimg = $date.".".$tipo;
	if ($tipo == 'png'){
		if ($archivo != "") {
			$destino =  "../img/historia_cley/".$date.".".$tipo;
			if (copy($_FILES['imghistory']['tmp_name'],$destino)) {
				$array = getimagesize("../img/historia_cley/$date.$tipo");
				$status = "Archivo subido: <b>".$archivo."</b>".$array[0]."x".$array[1];
				if (($array[0] > 200) OR ($array[1] > 180)){
					$origen = "../img/historia_cley/$date.$tipo";
					unlink ($origen);
					$error = "true";
				}
				if(isset($error)){
					$status = "LA IMAGEN SOBRE PASA LAS DIMENSIONES REQUERIDAS 200px X 180px";
				}else{
					$sql="INSERT INTO historia_cley (fechapub,emisor,imagen,titulo,descripcion,cuerpo,periodista) VALUES ('".$_POST['fecha_historia']."','".$_SESSION['MM_Userdepartamento']."','$nombreimg','".$_POST['titulo']."','".$_POST['descripcion']."','".$_POST['cuerpo']."','".$_SESSION['MM_Usernombre']."')";
					mysql_select_db($database_cleyenlinea, $cleyenlinea);
					mysql_query($sql, $cleyenlinea) or die(mysql_error());
				}
			}else{
				$status = "ERROR AL SUBIR EL ARCHIVO POR FAVOR INTENTE NUEVAMENTE";
			}
		}
	}else{
		$status = "EL ARCHIVO NO CUMPLE CON LA EXTENSION REQUERIDA: '.PNG'";
		$sql="INSERT INTO historia_cley (fechapub,emisor,titulo,descripcion,cuerpo,periodista) VALUES ('".$_POST['fecha_historia']."','".$_SESSION['MM_Userdepartamento']."','".$_POST['titulo']."','".$_POST['descripcion']."','".$_POST['cuerpo']."','".$_SESSION['MM_Usernombre']."')";
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		mysql_query($sql, $cleyenlinea) or die(mysql_error());
	}
}
?>
<?php
if($_POST['btncardoc']){
	$tamano = $_FILES["ruta_doc"]['size'];
	$type = $_FILES["ruta_doc"]['type'];
	$tipo = $type[12].$type[13].$type[14];
	$date = date('U');
	$archivo = $_FILES["ruta_doc"]['name'];
	$nombrearch = $date.".".$tipo;
	if ($tipo == 'pdf'){
		if ($archivo != "") {
			$destino =  "../secciones/salonsesiones/documentos/".$date.".".$tipo;
			if (copy($_FILES['ruta_doc']['tmp_name'],$destino)) {
				$array = getimagesize("../secciones/salonsesiones/documentos/$date.$tipo");
				$status = "Archivo subido: <b>".$archivo."</b>".$array[0]."x".$array[1];
				$sql="INSERT INTO documentos (nro_sesion,tipo_doc,nro_doc,nro_oficio,monto_bs,observaciones_doc,archivo,nomoriginal,iduser) VALUES ('".$_POST['nro_sesion']."','".$_POST['tipo_doc']."','".$_POST['nro_doc']."','".$_POST['nro_oficio']."','".$_POST['monto_bs']."','".$_POST['observaciones_doc']."','$nombrearch','$archivo','".$_SESSION['MM_iduser']."')";
				mysql_select_db($database_cleyenlinea, $cleyenlinea);
				mysql_query($sql, $cleyenlinea) or die(mysql_error());
			}else{
				$status = "ERROR AL SUBIR EL ARCHIVO POR FAVOR INTENTE NUEVAMENTE";
			}
		}
	}else{
		$status = "EL ARCHIVO NO CUMPLE CON LA EXTENSION REQUERIDA: '.PDF'";
	}
}
?>
<?php
if($_POST['enviarefe']){
	$tamano = $_FILES["imgefe"]['size'];
	$type = $_FILES["imgefe"]['type'];
	$tipo = $type[6].$type[7].$type[8];
	$date = date('U');
	$archivo = $_FILES["imgefe"]['name'];
	$nombreimg = $date.".".$tipo;
	if ($tipo == 'png'){
		if ($archivo != "") {
			$destino =  "../img/efemerides/".$date.".".$tipo;
			if (copy($_FILES['imgefe']['tmp_name'],$destino)) {
				$array = getimagesize("../img/efemerides/$date.$tipo");
				$status = "Archivo subido: <b>".$archivo."</b>".$array[0]."x".$array[1];
				if (($array[0] > 200) OR ($array[1] > 180)){
					$origen = "../img/efemerides/$date.$tipo";
					unlink ($origen);
					$error = "true";
				}
				if(isset($error)){
					mensajefin("LA IMAGEN SOBRE PASA LAS DIMENSIONES REQUERIDAS 200px X 180px");
				}else{
					$sql="INSERT INTO efemeride (fechapub,emisor,imagen,titulo,cuerpo,periodista) VALUES ('".$_POST['fecha_historia']."','".$_SESSION['MM_Userdepartamento']."','$nombreimg','".$_POST['titulo']."','".$_POST['cuerpo']."','".$_SESSION['MM_Usernombre']."')";
					mysql_select_db($database_cleyenlinea, $cleyenlinea);
					mysql_query($sql, $cleyenlinea) or die(mysql_error());
				}
			}else{
				mensajefin("ERROR AL SUBIR EL ARCHIVO POR FAVOR INTENTE NUEVAMENTE");
			}
		}
	}else{
		mensajefin("EL ARCHIVO NO CUMPLE CON LA EXTENSION REQUERIDA: '.PNG' IMAGEN NO SUBIDA");
		$sql="INSERT INTO efemeride (fechapub,emisor,titulo,cuerpo,periodista) VALUES ('".$_POST['fecha_historia']."','".$_SESSION['MM_Userdepartamento']."','".$_POST['titulo']."','".$_POST['cuerpo']."','".$_SESSION['MM_Usernombre']."')";
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		mysql_query($sql, $cleyenlinea) or die(mysql_error());
		mensajefin("EFEMERIDE CARGADA SATISFACTORIAMENTE SIN IMAGEN");
	}
}
if (isset($vvarible{'delete'}) AND ($_SESSION['MM_Usernivel'] == 2)) {
	if ($vvarible{'delete'} == "noticia") {
		$sql="DELETE FROM noticias WHERE idnoticia = ".$vvarible{'idnoticia'}." LIMIT 1";
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		mysql_query($sql, $cleyenlinea) or die(mysql_error());
		$sql="SELECT * FROM titular WHERE cod_not = '".$vvarible{'idnoticia'}."'";
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		$vector=mysql_query($sql, $cleyenlinea) or die(mysql_error());
		$cantidad=mysql_num_rows($vector);
		if($cantidad > 0){
			$resultados=mysql_fetch_assoc($vector);
			$sql="DELETE FROM titular WHERE cod_not = ".$vvarible{'idnoticia'};
			mysql_select_db($database_cleyenlinea, $cleyenlinea);
			mysql_query($sql, $cleyenlinea) or die(mysql_error());
			$titular = "img/cartelera/".$resultados['imagen'];
			unlink ($titular);
		}
		$noticia = "img/noticias/".$vvarible{'imagen'};
		$noticiamini = "img/noticias/miniatura".$vvarible{'imagen'};
		unlink ($noticia);
		unlink ($noticiamini);
		$sql="DELETE FROM comentarios WHERE idnoticia_comentario = ".$vvarible{'idnoticia'};
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		mysql_query($sql, $cleyenlinea) or die(mysql_error());
	}
	if ($vvarible{'delete'} == "titular") {
		$sql="DELETE FROM titular WHERE id = ".$vvarible{'idtitular'};
		mysql_select_db($database_cleyenlinea, $cleyenlinea);
		mysql_query($sql, $cleyenlinea) or die(mysql_error());
		$titular = "img/cartelera/".$vvarible{'imagen'};
		unlink ($titular);
		mysql_close();
	}
}
?>
<?php
if($_POST['carley']){
	$tamano = $_FILES["ruta_ley"]['size'];
	$type = $_FILES["ruta_ley"]['type'];
	$tipo = $type[12].$type[13].$type[14];
	$date = date('U');
	$archivo = $_FILES["ruta_ley"]['name'];
	$nombrearch = $date.".".$tipo;
	if ($tipo == 'pdf'){
		if ($archivo != "") {
			$destino =  "../secciones/salonsesiones/documentos/".$date.$archivo;
			if (copy($_FILES['ruta_ley']['tmp_name'],$destino)) {
				$array = getimagesize("../secciones/salonsesiones/documentos/$date.$tipo");
				$status = "Archivo subido: <b>".$archivo."</b>".$array[0]."x".$array[1];
				$sql="INSERT INTO documentos (nro_sesion,tipo_doc,nro_doc,nro_oficio,monto_bs,observaciones_doc,archivo,nomoriginal,iduser) VALUES ('".$_POST['nro_sesion']."','".$_POST['tipo_doc']."','".$_POST['nro_doc']."','".$_POST['nro_oficio']."','".$_POST['monto_bs']."','".$_POST['observaciones_doc']."','$nombrearch','$archivo','".$_SESSION['MM_iduser']."')";
				mysql_select_db($database_cleyenlinea, $cleyenlinea);
				mysql_query($sql, $cleyenlinea) or die(mysql_error());
			}else{
				$status = "ERROR AL SUBIR EL ARCHIVO POR FAVOR INTENTE NUEVAMENTE";
			}
		}
	}else{
		$status = "EL ARCHIVO NO CUMPLE CON LA EXTENSION REQUERIDA: '.PDF'";
	}
}
include("funciones.php");
?>


