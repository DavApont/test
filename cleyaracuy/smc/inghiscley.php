<h1>Crea un Art&iacute;culo sobre la Historia Yaracuyana</h1>
<p>Desde este m&oacute;dulo podr&aacute;s redactar un art&iacute;culo relacionado con la historia regional en la misma forma en que lo haces utilizando un editor de texto normal como Open Office Writer&reg;, Abisource Abiword&reg;, Microsoft Word&reg; o iWork Pages&reg;. Puedes crear tablas, insertar im&aacute;genes, dar formato de cualquier tipo y mucho m&aacute;s.</p>
<hr />
<form name="inghiscley" method="post" action="" enctype="multipart/form-data" id="inghiscley" >
  <fieldset>
  <legend>Contenido de la Noticia</legend>  
  <input class="selecciona-fecha" name="fecha_historia" type="text" value="<?php echo date("Y-m-d");?>" size="10" readonly="readonly" id="fechapub" />
  	<input type="text" name="titulo" id="titulo-h" />
    <label for="descripcion">Escribe aqu&iacute; la descripci&oacute;n breve del Art&iacute;culo (Ser&aacute; el primer p&aacute;rrafo dentro del cuerpo del art&iacute;culo y adem&aacute;s tambi&eacute;n aparecer&aacute; en los resultados de la p&aacute;gina de b&uacute;squeda de art&iacute;culos)</label>
    <textarea name="descripcion" id="editor1a" cols="45" rows="5"></textarea>
    <label for="cuerpo">Escribe aqu&iacute; el cuerpo del art&iacute;culo</label>
    <textarea name="cuerpo" id="editor2a" cols="45" rows="5"></textarea>
	<div>
    <label for="imghistory">Imagen principal del art&iacute;culo</label>
    <input type="file" name="imghistory" id="imghistory" >
    </div>
        <p class="nota">La imagen no debe medir mas de 263px de ancho por 233px de alto.</p>
        <p class="nota">La imagen debe estar en formato .PNG entrelazado.</p>
    <input type="submit" name="enviarhistory" id="enviarhistory" class="btnForm" value="Enviar">
    <input type="reset" value="Borrar Todo" class="btnForm" />
    </fieldset>
</form>