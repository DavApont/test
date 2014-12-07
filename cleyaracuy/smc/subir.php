<?php
if($boton) {
   if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name'])) {
     if($HTTP_POST_FILES['archivo']['size'] < 85000) {
       if($HTTP_POST_FILES['archivo']['type']=="image/gif") {
			   copy($HTTP_POST_FILES['archivo']['tmp_name'], $HTTP_POST_FILES['archivo']['name']);
			   $subio = true;
	 }
   }
}

   if($subio) {
      echo "El archivo subio con exito";
   } else {
      echo "El archivo no cumple con las reglas establecidas";
   }
   die();
}
?> 
<form action="<?php=$PHP_SELF?>" method="post" enctype="multipart/form-data" name="form1">
  <p align="center">Archivo
   <input name="archivo" type="file" id="archivo">
  </p>
  <p align="center"><input name="boton" type="submit" id="boton" value="Enviar"></p>
</form>