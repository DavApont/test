<h1>Sube Proyectos de Ley o Leyes Sancionadas</h1>
<p></p>
<hr />
<form action="" method="post" name="subley" id="subley" enctype="multipart/form-data">
	
    <fieldset>
    <legend>Datos de la Ley</legend>
        <select name="tipo_ley" class="tipo-ley">
            <?php if ($_POST['tipo_ley'] == NULL){ ?><option selected="selected" value="NULL">Selecciona el tipo de ley</option><?php } ?>
            <option value="1" <?php if ($_POST['tipo_ley'] == 1){ ?>selected="selected"<?php } ?>>Ley Promulgada</option>
            <option value="2" <?php if ($_POST['tipo_ley'] == 2){ ?>selected="selected"<?php } ?>>Ley Sancionada</option>
            <option value="3" <?php if ($_POST['tipo_ley'] == 3){ ?>selected="selected"<?php } ?>>Proyecto de Ley (2da Discusi&oacute;n)</option>
            <option value="4" <?php if ($_POST['tipo_ley'] == 4){ ?>selected="selected"<?php } ?>>Proyecto de Ley (1era Discusi&oacute;n)</option>
            <option value="5" <?php if ($_POST['tipo_ley'] == 5){ ?>selected="selected"<?php } ?>>Proyecto de Ley (En Comisi&oacute;n)</option>
        </select>
        <input class="selecciona-fecha" name="fecha_ley" type="text" value="<?php echo date("Y-m-d");?>" size="10" readonly="readonly" />
        <input type="hidden" style="margin:-10px 0px;" />
        <input type="submit" name="filtrarses" id="filtrarses" value="Buscar &nbsp; Sesi&oacute;n" class="btnForm" />
        <input type="hidden" name="id_tiposesion" value="1" />
    </fieldset>
        <?php if($_POST['tipo_ley'] <> ""){ ?>
    <fieldset>
        <select name="nro_sesion" style="width:auto;">
            <option selected="selected" value="NULL" >Nro. Sesi&oacute;n</option>
            <?php for($i=1;$i<=$numrows;$i++){ ?>
            <?php $fetch=mysql_fetch_assoc($query); ?>
                <option value="<?php echo $fetch['sesion']; ?>" ><?php echo $fetch['sesion']; ?></option>
            <?php } ?>
            <option value="OTRO" >OTRO...</option>
        </select>
        <input name="OTRO" type="text" style="margin-top:15px;" size="4" />
        <?php if(($_POST['tipo_ley'] == 3) OR ($_POST['tipo_ley'] == 4) OR ($_POST['tipo_ley'] == 5)){ ?>
        <select class='nombre_comision' style='width:auto'>
            <option selected='selected' value='NULL'>Selecciona una Comisi&oacute;n</option>
            <option value='1'>Mesa y Pol&iacute;tica</option>
            <option value='2'>Finanzas y Asuntos Laborales</option>
            <option value='3'>Contralor&iacute;a, Servicios y Obras P&uacute;blicas</option>
            <option value='4'>Educaci&oacute;n, Cultura, Deporte y Recreaci&oacute;n</option>
            <option value='5'>Salud, Sociales, Drogas y Derechos Humanos</option>
            <option value='6'>Agr&iacute;cola, Ambiente y Asuntos Vecinales</option>
            <option value='7'>Legislaci&oacute;n, Estilo y Ordenamiento Territorial</option>
      </select>
        <?php } ?>
        <input type="text" name="titulo" class="titulo-ley" style="margin-top:15px;" />
               
		<div>
            <label for="ruta_ley">Archivo a subir (Formato PDF)</label>
            <input type="file" name="ruta_ley" value="" size="32" />
        </div>
        
        <input type="submit" value="Cargar Ley" class="btnForm" name="carley" id="carley" />
        <input type="reset" value="Borrar Todo" class="btnForm" />
        <input type="hidden" name="MM_insert" value="carses" />
        <?php } ?>
	</fieldset>

</form>