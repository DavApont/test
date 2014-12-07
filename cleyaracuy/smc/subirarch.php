<?php
if ($_POST['subirarchivoprueba']) {
	$tamano = $_FILES["archivos"]['size'];
	$type = $_FILES["archivos"]['type'];
	$date = date('U');
	$archivo = $_FILES["archivos"]['name'];
	$nombre = $date.".".$tipo;
	$destino =  "../archivos/".$date.$_FILES['archivos']['name'];
	if (copy($_FILES['archivos']['tmp_name'],$destino)) {
		$upimg1="true";
	}
}
?>
<?php
if ($_POST['borrararchivo']) {
 unlink("../img/noticias/miniatura1259282083.png");
}
?>
<h1>Sube un archivo al Sistema</h1>
<p>&Eacute;ste es un m&oacute;dulo dise&ntilde;ado para permitirte subir o cargar ese archivo que al utilizar cualquier otro m&oacute;dulo en forma convencional no has podido subir. Bien sean im&aacute;genes para insertar dentro del cuerpo de una noticia o art&iacute;culo, o tambi&eacute;n archivos en formato PDF relacionados a alg&uacute;n otro tema.</p>
<p>S&oacute;lo selecciona de la lista desplegable el tipo de archivo que deseas subir, b&uacute;scalo y s&uacute;belo. As&iacute; de simple.</p>
<hr />
<?php echo $destino; ?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <p>
    <label>
      <input type="file" name="archivos" id="archivos" />
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="subirarchivoprueba" id="subirarchivoprueba" value="Enviar" />
    </label>
  </p>
</form>
<form id="form2" name="form2" method="post" action="" enctype="multipart/form-data">
  <label>
    <input type="submit" name="borrararchivo" id="borrararchivo" value="Borrar" />
  </label>
</form>
