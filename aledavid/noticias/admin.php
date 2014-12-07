<html>
<head>
<title>Administración</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<script languaje="Javascript">
<!--
function Smile(texto){
 document.form.contenido.value = document.form.contenido.value + texto;
}
// -->
</script>
</head>
<body>
<?
	include("config.php");
	
	// Remplazar TAGS

	function Remplazar() {
	global $contenido;
	$contenido = str_replace("[:)]","<img src=\"ikon/sonrisa.gif\">", $contenido);
	$contenido = str_replace("[:(]","<img src=\"ikon/triste.gif\">", $contenido);
	$contenido = str_replace("[;)]","<img src=\"ikon/ginando.gif\">", $contenido);
	$contenido = str_replace("[8)]","<img src=\"ikon/ojotes.gif\">", $contenido);
	$contenido = str_replace("[:P]","<img src=\"ikon/lengua.gif\">", $contenido);
	$contenido = str_replace("[:D]","<img src=\"ikon/risa.gif\">", $contenido);
	$contenido = str_replace("[cool]","<img src=\"ikon/cool.gif\">", $contenido);
	$contenido = str_replace("[llorar]","<img src=\"ikon/llorando.gif\">", $contenido);
	$contenido = str_replace("[enojo]","<img src=\"ikon/enojado.gif\">", $contenido);
	$contenido = str_replace("[duda]","<img src=\"ikon/duda.gif\">", $contenido);
	$contenido = str_replace("[bien]","<img src=\"ikon/bien.gif\">", $contenido);
	$contenido = str_replace("[mal]","<img src=\"ikon/mal.gif\">", $contenido);
	return;
	}

	switch($accion) {
	case panel:

	// Panel de administración

	if($NombreAdmin == $user AND $ContraseñaAdmin == $pass) {
?>
  <span class="normal"><b>Panel de administración :</b></span>
  <p>
  <form name="form" action="admin.php" method="post">
  <input type="hidden" name="user" value="<?= $user ?>">
  <input type="hidden" name="pass" value="<?= $pass ?>">
  <select size="1" name="accion">
  <option selected>Selecciona una opción</option>
  <option>---------------</option>
  <option value="nuevo">Publicar una noticia</option>
  <option value="borrar">Borrar una noticia</option>
  </select>
  <p>
  <input type="submit" value="Entrar" class="formulario">
  </form>
<?
	} else {
?>
  <p align="center">
  <span class="normal" style="font-size:13pt"><b>Error : Nombre ó contraseña falsos.</b></span>
  </p>
<?
	}
	break;
	case nuevo:

	// Enviar nueva noticia

	if($NombreAdmin == $user AND $ContraseñaAdmin == $pass) {
?>
  <span class="normal"><b>Nueva noticia :</b></span>
  <p>
  <form name="form" action="admin.php" method="post">
  <input type="hidden" name="accion" value="publicar">
  <input type="hidden" name="user" value="<?= $user ?>">
  <input type="hidden" name="pass" value="<?= $pass ?>">
  <span class="normal">Nombre :</span><br>
  <input type="text" name="nombre" size="20" class="formulario"><br>
  <span class="normal">E-mail :</span><br>
  <input type="text" name="email" size="20" class="formulario"><br>
  <span class="normal">Titulo :</span><br>
  <input type="text" name="titulo" size="20" class="formulario"><br>
  <span class="normal">Contenido :</span><br>
  <textarea rows="10" name="contenido" cols="35" class="formulario"></textarea>
  <p>
  <a href="javascript:Smile('[:)]')"><img src="ikon/sonrisa.gif" border="0">&nbsp;
  <a href="javascript:Smile('[:(]')"><img src="ikon/triste.gif" border="0">&nbsp;
  <a href="javascript:Smile('[enojo]')"><img src="ikon/enojado.gif" border="0">&nbsp;
  <a href="javascript:Smile('[;)]')"><img src="ikon/ginando.gif" border="0">&nbsp;
  <a href="javascript:Smile('[cool]')"><img src="ikon/cool.gif" border="0">&nbsp;
  <a href="javascript:Smile('[:P]')"><img src="ikon/lengua.gif" border="0">&nbsp;
  <a href="javascript:Smile('[8)]')"><img src="ikon/ojotes.gif" border="0">&nbsp;
  <a href="javascript:Smile('[:D]')"><img src="ikon/risa.gif" border="0">&nbsp;
  <a href="javascript:Smile('[llorar]')"><img src="ikon/llorando.gif" border="0">&nbsp;
  <a href="javascript:Smile('[bien]')"><img src="ikon/bien.gif" border="0">&nbsp;
  <a href="javascript:Smile('[mal]')"><img src="ikon/mal.gif" border="0">&nbsp;
  <a href="javascript:Smile('[duda]')"><img src="ikon/duda.gif" border="0"></a>
  <p>
  <input type="submit" value="Enviar" class="formulario">
  </form>
<?
	} else {
?>
  <p align="center">
  <span class="normal" style="font-size:13pt"><b>Error : Identificate de nuevo.</b></span>
  </p>
<?
	}
	break;
	case publicar:

	// Publicar nueva noticia

	if($NombreAdmin == $user AND $ContraseñaAdmin == $pass) {

	$fecha = date("d/m/Y");

	// Comprobación de campos

	$nombre = trim($nombre);
	$email = trim($email);
	$titulo = trim($titulo);
	$contenido = trim($contenido);

	if(empty($nombre)) {
  		$error[] = "Y tu nombre???";
	}
	if($email != "") {
 		if (!ereg("^[^@]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,}$", $email)) {
			$error[] = "Tu e-mail no es valido, si quieres no lo pongas";
		}
	}
	if(empty($titulo)) {
  		$error[] = "Te falto el titulo!";
	}
	if(empty($contenido)) {
		$error[] = "Ja, y el contenido de la noticia";
	}

	if($error) {
?>
  <span class="normal" style="font-size:13pt"><b>Error :</b></span>
  <p>
  <span class="normal">
<?
	// Si existe un error se muestra

	for($i = 0; $i < sizeof($error); $i++) {
  		echo "- $error[$i]<br>";
	}
?>
  </span>
<?
	} else {

	// Filtramos la noticia

	Remplazar();
	$contenido = ereg_replace("\r\n","<br>", $contenido);

	//  Guardamos la noticia en el fichero

	$fp = fopen($FicheroId,"r");
	$id = fread($fp, filesize($FicheroId));
	$id ++;
	fclose($fp);

	$fp = fopen($FicheroId, "w");
	fwrite($fp, $id);
	fclose($fp);

	$firma = "$id|@|$nombre|@|$email|@|$titulo|@|$contenido|@|$fecha|@|\n";
	$fp = fopen($FicheroBase, "a");
	fwrite($fp, $firma);
	fclose($fp);
?>
  <p align="center">
  <span class="normal" style="font-size:13pt"><b>La noticia se ha publicado con éxito!</b></span>
  <meta http-equiv="Refresh" content="2; URL="admin.php">
  </p>
<?
	}
	} else {
?>
  <p align="center">
  <span class="normal" style="font-size:13pt"><b>Error : Identificate de nuevo.</b></span>
  </p>
<?
	}
	break;

	// Borrar una noticia	

	case borrar:

	if($NombreAdmin == $user AND $ContraseñaAdmin == $pass) {

	if($idmensaje) {

	$Base = file($FicheroBase);

	for ($i = 0; $i < count($Base); $i++) {
	$dato = explode("|@|", $Base[$i]);

	if ($dato[0] == $idmensaje) {
	$Base[$i] = "";
	
	$fp = fopen("$FicheroBase", "w+");
	for ($i = 0; $i < count($Base); $i++) {
	fwrite($fp, $Base[$i]);
	}
	fclose($fp);
?>
  <p align="center">
  <span class="normal" style="font-size:13pt"><b>La noticia se ha eliminado con exito!</b></span>
  <meta http-equiv="Refresh" content="2; URL="admin.php">
  </p>
<?
	}
	}
	} else {
?>
  <span class="normal"><b>Borrar una noticia :</b></span>
  <p>
  <form action="admin.php" method="post">
  <input type="hidden" name="accion" value="borrar">
  <input type="hidden" name="user" value="<?= $user ?>">
  <input type="hidden" name="pass" value="<?= $pass ?>">
  <span class="normal">Número de noticia :</span><br>
  <input type="text" name="idmensaje" size="20" class="formulario">
  <p>
  <input type="submit" value="Borrar" class="formulario">
  </form>
  <hr size="1" width="300" noshade>
  <p>
  <table width="500" cellspacing="4" align="center" class="pequeña">
<?
	$Base = file($FicheroBase);

	for ($i = 0; $i < count($Base); $i++) {
	$dato = explode("|@|", $Base[$i]);

	$dato[4] = str_replace("<br>", " - ", $dato[4]);
?>
  <tr>
  <td width="200"><b>Número de noticia :</b> <?= $dato[0] ?></td>
  <td width="300"><br><?= $dato[4] ?></td>
  </tr>
<?
	}
?>
  <table>
<?
	}
	} else {
?>
  <p align="center">
  <span class="normal" style="font-size:13pt"><b>Error : Identificate de nuevo.</b></span>
  </p>
<?
	}
	break;
	default:
?>
  <span class="normal"><b>Identificate :</b></span>
  <p>
  <form name="form" action="admin.php" method="post">
  <input type="hidden" name="accion" value="panel">
  <span class="normal">Nombre :</span><br>
  <input type="text" name="user" size="20" class="formulario"><br>
  <span class="normal">Contraseña :</span><br>
  <input type="password" name="pass" size="20" class="formulario">
  <p>
  <input type="submit" value="Entrar" class="formulario">
  </form>
  <p>
  <span class="normal"><a href="index.php">Volver</a></span>
<?
	}
?>
</body>
</html>
