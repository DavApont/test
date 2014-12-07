<?php $i=0; ?>  
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