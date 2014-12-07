<?php
			if($_POST['buscar_user']){
				$result=mysql_query("SELECT * FROM user WHERE usuario='".$_POST['login']."';",$conexion);
				while($row = mysql_fetch_array($result)) {
						$id = $row[0];
						$user = $row[1];
						$pass = $row[2];
						$nombre = $row[3];
						$apellido = $row[4];
						$permiso = $row[5];
		   }
		   if($user == ''){
			   echo "<p class='normalText' align='center'>error el Usuario <b>".$_POST['login']."</b> no existe</p>";
			   }else{
?>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="edit_user" name="edit_user" method="post" action="">
<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
<table bgcolor="#FFFFFF" cellspacing="5" cellpadding="0" border="0">
  <tr>
    <td colspan="2"><strong><img src="images/user_edit.png" width="64" height="64" /><span class="weekDayCaption"><span class="normalText">Editar Usuario</span></span></strong></td>
  </tr>
  <tr>
    <td width="121" class="normalText">Nombre usuario</td>
    <td width="133"><input name="usuario" type="text" class="normalText" id="usuario" value="<?php echo $user; ?>" size="10" maxlength="4" readonly="readonly" /></td>
  </tr>
    <tr>
    <td width="121" class="normalText">Nombre</td>
    <td width="133"><input name="nombre" type="text" class="normalText" id="nombre" value="<?php echo $nombre; ?>" size="20" maxlength="20" /></td>
  </tr>
    <tr>
    <td width="121" class="normalText">Apellido</td>
    <td width="133"><input name="apellido" type="text" class="normalText" id="apellido" value="<?php echo $apellido; ?>" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td ><span class="normalText">Contraceña</span></td>
    <td><label>
      <input name="pass" type="text" class="normalText" id="pass" value="<?php echo $pass; ?>" size="10" maxlength="4" />
    </label></td>
  </tr>
  <tr>
    <td ><span class="normalText">Nivel de Acceso</span></td>
    <td><label>
      <input name="permiso" type="text" class="normalText" id="permiso" value="<?php echo $permiso; ?>" size="10" maxlength="4" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" name="edit_user" id="edit_user" class="normalText" value="Editar Usuario" />
    </label></td>
  </tr>
</table>
</form>
</center>
<?php } }else{ ?>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="edit_user" name="edit_user" method="post" action="">
<table width="223" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong><img src="images/user_edit.png" alt="Agregar Categoria" width="64" height="64" />Buscar Usuario</strong></td>
  </tr>
  <tr>
    <td width="67" class="normalText">Usuario</td>
    <td width="156"><label>
      <input type="text" class="normalText" name="login" id="login" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" onClick="return bususer();" class="normalText" name="buscar_user" id="buscar_user" value="Buscar" />
    </label></td>
  </tr>
</table>

</form>
</center>
<?php 
}?>