<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="form1" name="form1" method="post" action="">
<table bgcolor="#FFFFFF" cellspacing="5" cellpadding="0" border="0">
  <tr>
    <td colspan="2"><strong><img src="images/prod_carg.png" width="64" height="64" /><span class="weekDayCaption"><span class="normalText">Cargar Productos</span></span></strong></td>
  </tr>
  <tr>
    <td width="121" class="normalText">Nombre Producto</td>
    <td width="133"><label>
      <select class="normalText" name="prod" id="prod">
<?php  
$result=mysql_query("SELECT ID_producto, nombre FROM producto where activado = '' order by nombre",$conexion);
while($row = mysql_fetch_array($result)) {
?>
				<option value="<?Php echo "$row[0]"; ?>"><?Php echo "$row[1]"; ?></option>
<?Php
   }
   mysql_free_result($result);
?> 
      </select>
    </label></td>
  </tr>
  <tr>
    <td ><span class="normalText">Cantidad</span></td>
    <td><label>
      <input name="cant_pro" class="normalText" type="text" id="cant_pro" size="10" maxlength="4" />
    </label></td>
  </tr>
  <tr>
    <td ><span class="normalText">Precio</span></td>
    <td><label>
      <input name="preci_pro" class="normalText" type="text" id="cant_pro" size="10" maxlength="4" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" name="cargar_pro" id="cargar_pro" class="normalText" value="Cargar Produto" />
    </label></td>
  </tr>
</table>
</form>
</center>