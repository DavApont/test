<h1>Carga una efem&eacute;rides regional</h1>
<p>Desde este m&oacute;dulo podr&aacute;s redactar art&iacute;culos relacionados con las efem&eacute;rides regionales en la misma forma en que lo haces utilizando un editor de texto normal como Open Office Writer&reg;, Abisource Abiword&reg;, Microsoft Word&reg; o iWork Pages&reg;. Puedes crear tablas, insertar im&aacute;genes, dar formato de cualquier tipo y mucho m&aacute;s.</p>
<hr />

<form name="ingefem" method="post" action="" enctype="multipart/form-data" id="ingefem">
  <fieldset>
  <legend>Contenido de la efem&eacute;rides regional</legend>  
    <input class="selecciona-fecha" name="fecha_historia" type="text" value="<?php echo date("Y-m-d");?>" size="10" />
  <input type="text" name="titulo" id="titulo-e" />
    <label for="cuerpo">Escribe aqu&iacute; el cuerpo del art&iacute;culo relacionado con la efem&eacute;rides regional</label>
  <textarea name="cuerpo" id="editor2a" cols="45" rows="5"></textarea>
    <div>
    <label for="imgefe">Imagen principal de la efem&eacute;rides regional</label>
    <input type="file" name="imgefe" id="imgefe" >
    </div>
        <p class="nota">La imagen no debe medir mas de 263px de ancho por 233px de alto.</p>
        <p class="nota">La imagen debe estar en formato .PNG entrelazado.</p>
    <input type="submit" name="enviarefe" id="enviarefe" value="Enviar" class="btnForm">
    <input type="reset" value="Borrar Todo" class="btnForm" />
    </fieldset>
</form>