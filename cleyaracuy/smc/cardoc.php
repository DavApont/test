<h1>Ingresa un documento al Sistema</h1>
<p>Desde este m&oacute;dulo podr&aacute;s cargar los documentos emanados desde el seno de la plenaria del Consejo Legislativo del Estado Yaracuy, bien sean acuerdos, resoluciones, traspasos, cr&eacute;ditos adicionales, rectificaciones presupuestarias, disminuciones presupuestarias, en fin, cualquier clase de documento aprobado en sesión.</p>
<p>S&oacute;lo completa los datos descriptivos del documento y c&aacute;rgalo en formato PDF. As&iacute; de simple, pero ten en cuenta que s&oacute;lo puedes cargar un documento que guarde relaci&oacute;n con alguna sesi&oacute;n previamente cargada por el m&oacute;dulo Cargar Sesi&oacute;n.</p>
<hr />
<?php echo $tipo; ?>
<form action="" method="post" name="carDoc" id="carDoc" enctype="multipart/form-data">
	
    <fieldset>
    <legend>Buscar Sesi&oacute;n</legend>
        <select name="id_tiposesion" style="width:auto;">
            <option <?php if ($_POST['id_tiposesion'] == ""){ ?>selected="selected"<?php } ?> value="NULL" >Tipo Sesi&oacute;n</option>
            <option value="1" <?php if ($_POST['id_tiposesion'] == 1){ ?>selected="selected"<?php } ?>>Ordinaria</option>
            <option value="2" <?php if ($_POST['id_tiposesion'] == 2){ ?>selected="selected"<?php } ?>>Extraordinaria</option>
            <option value="3" <?php if ($_POST['id_tiposesion'] == 3){ ?>selected="selected"<?php } ?>>Sesion Solemne</option>
            <option value="4" <?php if ($_POST['id_tiposesion'] == 4){ ?>selected="selected"<?php } ?>>C. D. 1er Per&iacute;odo</option>
            <option value="5" <?php if ($_POST['id_tiposesion'] == 5){ ?>selected="selected"<?php } ?>>C. D. 2do Per&iacute;odo</option>
            <option value="6" <?php if ($_POST['id_tiposesion'] == 6){ ?>selected="selected"<?php } ?>>Acto Solemne</option>
        </select>
          <input type="submit" name="filtrarses" id="filtrarses" value="Buscar &nbsp; Sesi&oacute;n" class="btnForm" />
	</fieldset>
</form>
          <?php if($_POST['filtrarses']){ ?>
          <?php if(($numrows > 0) OR ($_POST['id_tiposesion'] == 6)){ ?>

<form action="" method="post" name="carDoc2" id="carDoc2" enctype="multipart/form-data">
        <fieldset> 
        <legend>Datos del Documento</legend> 
        <?php if ($_POST['id_tiposesion'] <> 6){ ?>
        <select name="nro_sesion" style="width:auto;">
        <option selected="selected" value="NULL" >Nro. Sesi&oacute;n</option>
        <?php for($i=1;$i<=$numrows;$i++){ ?>
        <?php $fetch=mysql_fetch_assoc($query); ?>
            <option value="<?php echo $fetch['sesion']; ?>" ><?php echo $fetch['sesion']; ?></option>
        <?php } ?>
        </select>
        <select name="tipo_doc" class="tipo-doc" style="width:auto;">
            <option selected="selected" value="0" >Tipo de Documento</option>
            <option value="1" >Cr&eacute;dito Adicional Gob.</option>
            <option value="2" >Traspaso Gob.</option>
            <option value="3" >Rectificaci&oacute;n Presupuestaria Gob.</option>
            <option value="4" >Disminuci&oacute;n Presupuestaria Gob.</option>
            <option value="5" >Cr&eacute;dito Adicional CLEY</option>
            <option value="6" >Traspaso CLEY</option>
            <option value="7" >Acuerdo CLEY</option>
            <option value="8" >Resoluci&oacute;n CLEY</option>
            <option value="9" >Reimpresi&oacute;n por error</option>
            <option value="10" >Acta Sesi&oacute;n Ordinaria</option>
            <option value="11" >Acta Sesi&oacute;n Extraordinaria</option>
            <option value="12" >Acta Sesi&oacute;n Solemne</option>
            <option value="13" >Acta Sesi&oacute;n C. D. 1er Per&iacute;odo</option>
            <option value="14" >Acta Sesi&oacute;n C. D. 2do Per&iacute;odo</option>
        </select>
        
        <div id="campos-gob">
        </div>
        
        <div id="campos-cley1">
        </div>
        
        <div id="campos-cley2">
        </div>
        
        <div id="sinTipoDoc">
            <p><img src="img/flechaArriba.png" width="30" height="30" />Elige primero un tipo de Documento de la lista de selecci&oacute;n de arriba...</p>
        </div>
        <?php } ?>
        
        <label for="observaciones_doc">Si consideras pertinente alguna observaci&oacute;n sobre el documento que est&aacute;s cargando, escribela aqu&iacute;. Trata de ser muy preciso para as&iacute; facilitar las b&uacute;squedas de archivos a los usuarios.</label>
        <textarea id="editor1b" name="observaciones_doc" cols="50" rows="2"></textarea>
        
		<div>
            <label for="ruta_doc">Archivo a subir (Formato PDF)</label>
            <input type="file" name="ruta_doc" value="" size="32" />
        </div>
        <p class="nota"><strong>IMPORTANTE:</strong> El archivo a subir debe estar en formato PDF de lo contrario no ser&aacute; validado.</p>
        <input type="submit" name="btncardoc" id="btncardoc" value="Cargar Documento" class="btnForm" />
        <input type="reset" value="Borrar Todo" class="btnForm" />
        <input type="hidden" name="MM_insert" value="carDoc" />
	</fieldset>
</form>
<?php }else{ ?>
<br /><br /><br />
<h1>No se encontraron sesiones cargadas que coincidan con su criterio de b&uacute;squeda.<br />Por favor intente de nuevo.</h1>
<?php } ?>
<?php } ?>
