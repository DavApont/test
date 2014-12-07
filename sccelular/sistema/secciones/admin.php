<?php 

mysql_select_db($database, $conexion);
$enviar = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $enviar .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

$Result1 = mysql_query("UPDATE config SET nombrerazon='$_POST[razonsocial]',direccion='$_POST[direccion]',rif='$_POST[rif]',nit='$_POST[nit]',
telefonos='$_POST[telefono]',iva='$_POST[iva]' where id=1 ", $conexion) or die(mysql_error());

?>

<center><p class="titulocajitas" >Los Datos han sido actualizados con exito.</p>
</center>
<?php

}else{

mysql_select_db($database, $conexion);
$result=mysql_query("SELECT nombrerazon,direccion,rif,nit,telefonos,iva FROM config Where id=1", $conexion);

while($config=mysql_fetch_row($result)){
?>
   <form action="<?php echo $enviar; ?>" method="POST" name="form1" id="form1">
<center>
  <table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="12%" class="titulocajitas" scope="row">Nombre Razon Social</td>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="razonsocial" type="text" class="negrita" id="razonsocial" value="<?Php echo "$config[0]"; ?>" size="45" maxlength="255"/>
      </label>    </td>
  </tr>
  <tr>
    <td width="12%" class="titulocajitas" scope="row">Direccion</td>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="direccion" type="text" class="negrita" id="direccion" value="<?Php echo "$config[1]"; ?>" size="45" maxlength="255"/>
      </label>    </td>
  </tr>
    <tr>
    <td width="12%" class="titulocajitas" scope="row">RIF</td>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="rif" type="text" class="negrita" id="rif" value="<?Php echo "$config[2]"; ?>" size="45" maxlength="20"/>
      </label>    </td>
  </tr>
  <tr>
    <td width="12%" class="titulocajitas" scope="row">NIT</td>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="nit" type="text" class="negrita" id="nit" value="<?Php echo "$config[3]"; ?>" size="45" maxlength="20"/>
      </label>    </td>
  </tr>
  <tr>
    <td width="12%" class="titulocajitas" scope="row">Telefono</td>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="telefono" type="text" class="negrita" id="telefono" value="<?Php echo "$config[4]"; ?>" size="45" maxlength="20"/>
      </label>    </td>
  </tr>
  <tr>
    <td width="12%" class="titulocajitas" scope="row">I.V.A</td>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="iva" type="text" class="negrita" id="iva" value="<?Php echo "$config[5]"; ?>" size="45" maxlength="10"/>
      </label>    </td>
  </tr>
  <tr>
    
  </tr>
</table>

  <label>
    <input type="hidden" name="MM_insert" value="form1" />
    <input type="submit" name="enviar" id="enviar" class="negrita" value="::    Actualizar    ::">
  </label>
</center>
</form>
<?Php
}
mysql_close($conexion);

}
?>