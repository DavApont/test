<?php include("connections/foro.php"); ?>
<?php
$sql="SELECT * FROM foro";
mysql_select_db($database_cleyenlinea_foro, $cleyenlinea_foro);
$vector=mysql_query($sql, $cleyenlinea_foro) or die(mysql_error());
$cantidad=mysql_num_rows($vector);
?>
<h1>Foro de Discucion</h1>
<table width="100%" border="1">
<?php for ($j=1;$j<=$cantidad;$j++){ ?>
<?php $resultados=mysql_fetch_assoc($vector); ?>
<?php if($resultados['tipo']==1){ ?>
  <tr>
    <td>&nbsp;</td>
    <td>TEMAS</td>
    <td>MENSAJE</td>
    <td>&Uacute;LTIMO MENSAJE</td>
  </tr>
<?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<?php } ?>
</table>
<?php mysql_free_result($vector);?>