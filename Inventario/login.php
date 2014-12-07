
<?php $i=0; ?><center>
<p class="normalText" align="center"><?php echo $log; ?></p>
<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0" width="0%">
<tr>
<td width="100%">

<form name="entrar" method="post" action="">
<table bgcolor="#FFFFFF" cellspacing="5" cellpadding="0" border="0">
<tr>
<td colspan="3"><font class="normalText"><b><strong><img src="images/security.png" width="64" height="64"></strong>Usuarios</b></font></td>
</tr>
<tr>
<td nowrap class="normalText" align="left">Nombre de usuario:</td><td nowrap class="normalText"><label>
  <input type="text" name="user" id="user" class="normalText" />
</label></td>
</tr>

<tr>
<td nowrap class="normalText">Contraseña:</td><td nowrap class="normalText" align="left"><label>
  <input type="password" name="pword" id="pword" class="normalText" />
</label></td>
</tr>
<tr>
<td></td><td colspan="3" nowrap class="normalText"><label>
 <input type="submit"  onClick="return login();" name="Login" class="btnTextFont" value="Iniciar sesi&oacute;n">
</label></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</td>
</tr>
</table>

    
  
    <table>
    <tr>
    <td><p><font class="normalText"><b>N#</b></font><font class="normalText"></font></p></td>
    <td><p><font class="normalText"><b>- Nombre Producto</b></font><font class="normalText"></font></p></td>
    <td><p><font class="normalText"><b>- Actual/Minima</b></font><font class="normalText"></font></p></td>
    </tr>
    <tr>
     <?php  
$result=mysql_query("SELECT ID_producto, nombre, existencia_actual, existencia_min FROM producto where existencia_actual <= existencia_min order by nombre",$conexion);
while($row = mysql_fetch_array($result)) {
?>
<tr>
	<td><font class="normalText"><b><center><?Php $i=$i+1; echo "$i"; ?></b></center></font></td>
    <td><font class="normalText"><b><?Php echo "$row[1]"; ?></b></font></td>
    <td><font class="normalText"><b><center><?Php echo "$row[2]"; ?> / <?Php echo "$row[3]"; ?> </center></b></font></td>	
</tr>
<?php
   }
   mysql_free_result($result);
?>

    </tr>
    </table>

</center>