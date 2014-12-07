 <p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" value="<?php echo date ( "Y-m-d" );?>" name="fecha" />
<table width="379" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2"><strong><img src="images/prod_des.png" width="64" height="64" /><span class="titulo"><span class="normalText">Descargar Productos</span></span></strong></td>
  </tr>
  <tr>
    <td width="120" class="normalText">Nombre Producto</td>
    <td width="257"><label>
      <select name="producto" class="normalText" id="producto">
<?php  
$result=mysql_query("SELECT ID_producto, nombre,precio FROM producto where activado = '' order by nombre",$conexion);
while($row = mysql_fetch_array($result)) {
?>
				<option value="<?Php echo "$row[0]"; ?>"><?Php echo "$row[1]"; ?> - <<?Php echo "$row[2]"; ?>></option>
<?Php
   }
   mysql_free_result($result);
?> 
      </select>
    </label></td>
  </tr>
  <tr>
    <td class="normalText">Cantidad</td>
    <td><label>
      <input name="cant_pro" class="normalText" type="text" id="cant_pro" size="10" maxlength="4" />
    </label></td>
  </tr>
  <tr>
    <td class="normalText">Descargado Por:</td>
    <td class="normalText"><input name="nombre" type="text" class="normalText" id="cant_pro" value="<?php echo $_SESSION['nombre'];?> <?php echo $_SESSION['apellido']; ?>" size="30" maxlength="30" readonly="readonly" /></td>
    
  </tr>
    <tr>
    <td class="normalText">Comentario:</td>
<td class="normalText"><label>
    <textarea name="msg" class="normalText" id="msg" cols="35" rows="5"></textarea>
  </label></td>
    
  </tr>
    <tr>
    <td class="normalText">Tomado Por Garantia:</td>
    <td class="normalText"><label>
      <input name="garantia" type="checkbox" id="garantia" value="1">
    </label></td>
    
  </tr>
  <tr>
    <td height="39" colspan="2" align="center"><label>
      <input name="Descargar" type="submit" class="caja" id="Descargar" value="Descargar" />
    </label></td>
  </tr>
</table>
</form>
</center>