<?Php
$result=mysql_query("SELECT * FROM user;",$conexion);
while($row = mysql_fetch_array($result)) {
				$u_user = $row[0];
   }
   mysql_free_result($result);
   $user= $u_user + '1' ;
?> 
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="form1" name="form1" method="post" action="">
<table bgcolor="#FFFFFF" cellspacing="5" cellpadding="0" border="0">
  <tr>
    <td colspan="2"><strong><img src="images/user_add.png" width="64" height="64" /><span class="weekDayCaption"><span class="normalText">Agregar Usuario</span></span></strong></td>
  </tr>
  <tr>
    <td width="121" class="normalText">Nombre usuario</td>
    <td width="133"><input name="usuario" type="text" class="normalText" id="usuario" value="<?php agregar_ceros($user); ?>" size="10" maxlength="4" readonly="readonly" /></td>
  </tr>
    <tr>
    <td width="121" class="normalText">Nombre</td>
    <td width="133"><input name="nombre" type="text" class="normalText" id="nombre" size="20" maxlength="20" /></td>
  </tr>
    <tr>
    <td width="121" class="normalText">Apellido</td>
    <td width="133"><input name="apellido" type="text" class="normalText" id="apellido" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td ><span class="normalText">Contraseña</span></td>
    <td><label>
      <input name="pass" class="normalText" type="text" id="pass" size="10" maxlength="4" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" name="crear_user" id="crear_user" class="normalText" value="Crear Usuario" />
    </label></td>
  </tr>
</table>
</form>
</center>