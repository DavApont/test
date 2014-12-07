 <p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="form1" name="form1" method="post" action="">
<table  bgcolor="#FFFFFF" cellspacing="5" cellpadding="0" border="0">
  <tr>
    <td colspan="2"><strong><img src="images/prod_add.png" width="64" height="64" /><span class="normalText">Crear Productos</span></strong></td>
  </tr>
  <tr>
    <td width="121" class="normalText">Categoria</td>
    <td width="133"><label>
      <select name="cat_pro" id="cat_pro" class="normalText">
<?php  
$result=mysql_query("SELECT * FROM categoria order by nombre",$conexion);
while($row = mysql_fetch_array($result)) {
?>
				<option value="<?Php echo "$row[1]"; ?>"><?Php echo "$row[1]"; ?></option>
<?Php
   }
   mysql_free_result($result);
?> 
      </select>
    </label></td>
  </tr>
  <tr>
    <td class="normalText">Nombre</td>
    <td><label>
      <input name="nom_pro" type="text" class="normalText" id="nom_pro" size="10" maxlength="45" />
    </label></td>
  </tr>
   <tr>
    <td class="normalText">Cantidad Minima</td>
    <td><label>
      <input name="cant_min_pro" type="text" class="normalText" id="cant_min_pro" size="10" maxlength="4" />
    </label></td>
  </tr>
 <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" name="crear_prod" id="crear_prod" class="normalText" value="Crear" />
    </label></td>
  </tr>
</table>
</form>
</center>
