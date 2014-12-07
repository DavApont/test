<h1>Ingresa un Titular al Sistema</h1>
<p>Desde esta secci&oacute;n podr&aacute;s ingresar un titular que ser&aacute; mostrado en la portada de la p&aacute;gina principal del sitio web del Consejo Legislativo del Estado Yaracuy. Cabe destacar que en primer lugar debes haber ingresado la noticia completa por el m&oacute;dulo Ingresar Noticia para que por esta secci&oacute;n puedas cargar su titular, ya que de lo contrario no ser&aacute; validado.</p>
<hr />
<?php echo $status." ".$error; ?>
<form action="<?php echo $ingtit; ?>" method="post" name="ingtit" id="ingtit" enctype="multipart/form-data">
	
    <fieldset>
    <legend>Datos de la Noticia</legend>
        <input class="selecciona-fecha" name="fechapub" type="text" value="<?php echo date("Y-m-d"); ?>" size="10" readonly="readonly" id="fechapub"/>
        <select name="tipo" id="tipo">
            <option selected="selected" value="NULL">Selecciona el tipo</option>
            <option value="1" >Noticia Regional</option>
            <option value="2" >Noticia Nacional</option>
            <option value="3" >Noticia Internacional</option>
        </select>
        <input type="submit" name="filtrartit" id="filtrartit" value="Consultar" class="btnForm" />
        <?php if( $totalRows_filtrartit <> "" ){ ?>
      <select name="not_rel" size="1" id="not_rel">
            <option selected="selected" value="NULL" style="width:150px;">Noticia relacionada</option>
            <?php 	for ($i=1;$i<=$totalRows_filtrartit;$i++){ $filatit = mysql_fetch_object($totalfiltrartit); ?>
            <option value="<?php $idnoticia = $filatit -> idnoticia; echo $idnoticia; ?>" ><?php $titulo = $filatit -> titulo; echo $titulo; ?></option>0
  ............................          <?php } ?>
        </select>

        <select name="prioridad" id="prioridad">
        <option selected="selected" value="NULL">Prioridad</option>
            <option value="0" >Normal</option>
            <option value="1" >Alta</option>
        </select>
    </fieldset>
    
    <fieldset>
    <legend>Contenido de la Noticia</legend>
        <input name="titulotit" id="titulotit" type="text" class="introduce-titular" style="margin-bottom:0px;" />
<p class="contador"></p>
		<label for="descripcion">Escribe aqu&iacute; la descripci&oacute;n breve de la noticia (225 caracteres m&aacute;x.)</label>
        <textarea id="editor1a" name="editor1a" cols="50" rows="2"></textarea>
        <div>
	        <label for="imagen">Imagen del Titular</label>
	        <input type="file" name="imagentit" id="imagentit" value="" size="32" />
        </div>
        <p class="nota">La imagen del titular no debe medir mas de 200px de ancho por 180px de alto.</p>
        <p class="nota">La imagen debe estar en formato .PNG entrelazado.</p>
        <input type="submit" value="Ingresar Titular" class="btnForm" id="ingtit" name="ingtit" />
      <input type="reset" value="Borrar Todo" class="btnForm" />
        <input type="hidden" name="MM_insert" value="ingtit" />
		<?php } ?>
	</fieldset>

</form>