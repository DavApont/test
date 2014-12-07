<h1>Crea un Art&iacute;culo e ingr&eacute;salo al Sistema</h1>
<p>Desde este m&oacute;dulo podr&aacute;s redactar un art&iacute;culo de cualquier tipo de la misma forma en que lo haces utilizando un editor de texto normal como Open Office Writer&reg;, Abisource Abiword&reg;, Microsoft Word&reg; o iWork Pages&reg;. Puedes crear tablas, insertar im&aacute;genes, dar formato de cualquier tipo y mucho m&aacute;s.</p>
<hr />

<form action="<?php echo $editFormAction; ?>" method="post" name="ingnot" id="ingnot" enctype="multipart/form-data">
	
    <fieldset>
    <legend>Datos del Art&iacute;culo</legend>
        <input class="selecciona-fecha" name="fechapub" type="text" value="<?php echo date("Y-m-d");?>" size="10" readonly="readonly" />
        <select name="prioridad">
            <option selected="selected" value="NULL" >Selecciona la prioridad</option>
            <option value="0" >Normal</option>
            <option value="1" >Alta</option>
        </select>
    </fieldset>
    
    <fieldset>
    <legend>Contenido del Art&iacute;culo</legend>
        <input type="text" name="titulo" class="titulo-art" />
        <label for="cuerpo">Escribe aqu&iacute; el cuerpo del art&iacute;culo</label>
        <textarea id="editor2a" name="cuerpo" cols="50" rows="20"></textarea>
		<div>
            <label for="imagen">Imagen principal del Art&iacute;culo</label>
            <input type="file" name="imagen" value="" size="32" />
        </div>
        <div>
            <label for="miniatura">Imagen miniatura del Art&iacute;culo</label>
            <input type="file" name="miniatura" value="" size="32" />
        </div>
        <p class="nota">La imagen principal no debe medir mas de 263px de ancho por 233px de alto.</p>
        <p class="nota">La miniatura no debe medir mas de 200px de ancho por 160px de alto.</p>
        <p class="nota">Ambas im&aacute;genes deben estar en formato .PNG entrelazado.</p>
        <input type="submit" value="Ingresar Art&iacute;culo" class="btnForm" />
        <input type="reset" value="Borrar Todo" class="btnForm" />
        <input type="hidden" name="MM_insert" value="ingnot" />
	</fieldset>

</form>