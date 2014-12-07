<h1>Ingresa una Noticia al Sistema</h1>
<p>Desde este m&oacute;dulo podr&aacute;s redactar una noticia de la misma forma en que lo haces utilizando un editor de texto normal como Open Office Writer&reg;, Abisource Abiword&reg;, Microsoft Word&reg; o iWork Pages&reg;. Puedes crear tablas, insertar im&aacute;genes, dar formato de cualquier tipo y mucho m&aacute;s.</p>
<hr />
<form action="<?php echo $editFormAction; ?>" method="post" name="ingnot" id="ingnot" enctype="multipart/form-data">
	
    <fieldset>
    <legend>Datos de la Noticia</legend>
        <input class="selecciona-fecha" name="fechapub" type="text" value="<?php echo date("Y-m-d");?>" size="10" readonly="readonly" id="fechapub" />
        <select name="tipo">
            <option selected="selected" value="NULL" >Selecciona el tipo</option>
            <option value="1" >Noticia Regional</option>
            <option value="2" >Noticia Nacional</option>
            <option value="3" >Noticia Internacional</option>
        </select>
        <select name="prioridad">
            <option selected="selected" value="NULL" >Selecciona la prioridad</option>
            <option value="0" >Normal</option>
            <option value="1" >Alta</option>
        </select>
      <select name="periodista">
          <option selected="selected" value="Jos&eacute; Luis M&aacute;rquez">Jos&eacute; Luis M&aacute;rquez</option>
          <option value="Stefanie Ramirez">Stefanie Ramirez</option>
      </select>
    </fieldset>
    
    <fieldset>
    <legend>Contenido de la Noticia</legend>
        <input type="text" name="antetitulo" class="introduce-antetitulo" />
        <input type="text" name="titulo" class="introduce-titulo" style="margin-bottom:0px;" value="<?php echo $_POST['titulo']; ?>" />
		<label for="descripcion">Escribe aqu&iacute; la descripci&oacute;n breve de la noticia (Ser&aacute; el primer p&aacute;rrafo dentro del cuerpo de la noticia y adem&aacute;s tambi&eacute;n aparecer&aacute; en los resultados de la p&aacute;gina de b&uacute;squeda de noticias)</label>
        <textarea id="editor1a" name="descripcion" cols="50" rows="2"></textarea>
        <label for="cuerpo">Escribe aqu&iacute; el cuerpo de la noticia</label>
        <textarea id="editor2a" name="cuerpo" cols="50" rows="20"></textarea>
	  <div>
            <label for="imagen">Imagen principal de la noticia</label>
            <input type="file" name="imggr" value="" size="32" id="imggr" />
        </div>
        <div>
          <label for="miniatura">Imagen miniatura de la noticia</label>
            <input type="file" name="imgmin" value="" size="32" id="imgmin" />
        </div>
        <p class="nota">La imagen principal no debe medir mas de 263px de ancho por 233px de alto.</p>
        <p class="nota">La miniatura no debe medir mas de 200px de ancho por 160px de alto.</p>
        <p class="nota">Ambas im&aacute;genes deben estar en formato .PNG entrelazado.</p>
        <input type="submit" value="Ingresar Noticia" class="btnForm" name="ingnot" id="ingnot" />
        <input type="reset" value="Borrar Todo" class="btnForm" />
        <input type="hidden" name="MM_insert" value="ingnot" />
	</fieldset>

</form>