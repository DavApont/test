<h1>Carga toda la informaci&oacute;n referente a las sesiones</h1>
<p>&Eacute;ste es un m&oacute;dulo din&aacute;mico especialmente dise&ntilde;ado en funci&oacute;n de la naturaleza tan diversa de los posibles elementos inherentes a las sesiones. Desde aqu&iacute; podr&aacute;s cargar todos los datos relacionados a cualquier tipo de sesi&oacute;n inmediatamente despu&eacute;s que la misma haya tenido lugar; solamente selecciona un tipo de sesi&oacute;n y agrega cuantos elementos sean necesarios.</p>
<hr />
<form action="" method="post" name="carses" id="carses" enctype="multipart/form-data">
	
    <fieldset>
    <legend>Datos de la Sesi&oacute;n</legend>
        <select name="tipo_sesion" class="tipo-sesion">
            <option selected="selected" value="NULL" >Selecciona el tipo de sesi&oacute;n</option>
            <option value="1" >Sesi&oacute;n Ordinaria</option>
            <option value="2" >Sesi&oacute;n Extraordinaria</option>
            <option value="3" >Sesi&oacute;n Solemne</option>
            <option value="4" >Sesi&oacute;n Comisi&oacute;n Delegada 1er Per&iacute;odo</option>
            <option value="5" >Sesi&oacute;n Comisi&oacute;n Delegada 2do Per&iacute;odo</option>
            <option value="6" >Sesi&oacute;n Acto Solemne</option>
        </select>
        <input type="text" name="nro_sesion" class="nro-sesion" size="10" style="width:auto;display:inline;padding:3px;margin-right:5px;" id="nro_sesion" />
        <input class="selecciona-fecha" name="fecha_sesion" type="text" value="<?php echo date("Y-m-d");?>" size="10" readonly="readonly" />
        <input type="hidden" style="margin:-10px 0px;" />
        
        <div id="sinTipoSesion">
            <p><img src="img/flechaArriba.png" width="30" height="30" />Elige primero un tipo de sesi&oacute;n de la lista de selecci&oacute;n de arriba...</p>
        </div> 
        
        <div id="campos-ordinaria">
        </div>
        
        <div id="campos-extraordinaria">
        </div>
        
        <div id="campos-solemne">
            <label for="motivo_solemne" class="etiq-motivo">Describe aqu&iacute; el motivo por el cual se realiz&oacute; la sesi&oacute;n solemne.</label>
            <textarea id="editor1c" name="motivo_solemne" cols="50" rows="2"></textarea>
        </div>
        
        <div id="campos-delegada1">
        </div>
        
        <div id="campos-delegada2">
        </div>
        
        <label for="materia_tratada" class="etiq-motivo">Describe aqu&iacute; lo tratado en la sesi&oacute;n, puedes utilizar una estructura de Listas Ordenadas de ser necesario. Adem&aacute;s cuentas con una diversidad de herramientas para dar formato.</label>
        <textarea id="editor3" name="materia_tratada" cols="50" rows="2"></textarea>
        
        <p class="nota" style="margin-top:15px;"><strong>IMPORTANTE:</strong> Recuerda eliminar los elementos que no necesites (Bien sean derechos de palabras, invitaciones a comparecencia o remisiones a comisiones) antes de hacer click sobre el bot&oacute;n Cargar Sesi&oacute;n.</p>
        <p class="nota"><strong>IMPORTANTE:</strong> En caso de existir una Remisi&oacute;n a Comisi&oacute;n de la cual no exista un n&uacute;mero de control, utilizar "S/N".</p>
        <p class="nota">S&oacute;lo dispones de 60 caracteres para la breve descripci&oacute;n en una Remisi&oacute;n a Comisi&oacute;n.</p>
        
        <input type="submit" value="Cargar Sesi&oacute;n" class="btnForm" name="carses" id="carses" />
        <input type="reset" value="Borrar Todo" class="btnForm" />
        <input type="hidden" name="MM_insert" value="carses" />
	</fieldset>

</form>