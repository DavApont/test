	<script type="text/javascript">
	$(function() {
		$("#fecha_inicio").datepicker();
		$("#fecha_final").datepicker();
	});
	</script>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="busfech" name="busfech" method="post" action="">
<table width="237" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong> Ventas Por Fecha </strong></td>
  </tr>
  <tr>
    <td width="81" class="normalText">Fecha Inicio:</td>
    <td width="156"><label>
      <input class="normalText" type="text" id="fecha_inicio" name="fecha_inicio">
    </label></td>
  </tr>
    <tr>
    <td width="81" class="normalText">Fecha Final:</td>
    <td width="156"><label>
      <input class="normalText" type="text" id="fecha_final" name="fecha_final"></p>
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" onClick="return busfecha();" class="normalText" name="buscar_fecha" id="buscar_fecha" value="Buscar" />
    </label></td>
  </tr>
<p align="right" class="negrita">Fecha: <?php echo $_POST['fecha_inicio']; ?> AL <?php echo $_POST['fecha_final']; ?></p>
<table width="700" class="negrita" border="1" cellpadding="0" bordercolor="#000000" cellspacing="0">
  <tr>
    <td colspan="5" align="center" bordercolor="#000000"><span class="negrita">Relacion de Viajes</span></td>
    <td colspan="3" align="center" bordercolor="#000000">&nbsp;</td>
    <td width="5%" align="center" bordercolor="#000000">&nbsp;</td>
    <td width="6%" align="center" bordercolor="#000000">&nbsp;</td>
  </tr>
  <tr>
    <td width="3%" align="center" bordercolor="#000000"><span class="negrita">N#</span></td>
    <td width="15%" align="center" bordercolor="#000000"><span class="negrita">Viaje por rutas</span></td>
    <td width="9%" align="center" bordercolor="#000000"><span class="negrita">PRECIO</span></td>
    <td width="13%" align="center" bordercolor="#000000"><span class="negrita">ADICIONAL</span></td>
    <td width="23%" align="center" bordercolor="#000000"><span class="negrita">precio adicional (100,00)bsf</span></td>
    <td width="11%" align="center" bordercolor="#000000"><span class="negrita">SUB-TOTAL</span></td>
    <td width="7%" align="center" bordercolor="#000000"><span class="negrita">IVA 12%</span></td>
    <td width="8%" align="center" bordercolor="#000000"><span class="negrita">TOTAL</span></td>
    <td align="center" bordercolor="#000000"><span class="negrita">CHOFER</span></td>
    <td align="center" bordercolor="#000000"><span class="negrita">PLACA</span></td>
  </tr>

<?php 

 $Resultado=mysql_query("SELECT rutas, adicional, chofer, placa, precio FROM viajes WHERE fecha >= '".$_POST['fecha_inicio']."' AND fecha <= '".$_POST['fecha_final']."'",$conexion);
 while($row=mysql_fetch_array($Resultado)){
?>
<tr> 
<?php 
$i = $i +1;
?>
   <td align="center">
<?php echo $i;?>
</td>
    <td align="center">
	<?php echo $row[0]; ?>
    </td>
    <td align="center">
	<?php 
	$precio[$i] = $row[4];
	echo $precio[$i];	
	?>
    </td>
    <td align="center">
	<?php $adicional[$i] = $row[1]; 
	echo $adicional[$i]?>
    </td>
    <td align="center">
<?php $adici[$i] =$row[1];
$adicit[$i] = $adici[$i] * '100';
echo $adicit[$i]; ?></td>
    <td align="center">
<?php 
$subto[$i]= $adicit[$i] + $precio[$i];
echo $subto[$i]; ?></td>
    <td align="center">
<?php $iva[$i] = $subto[$i] * '0.12';
echo $iva[$i] ?></td>
    <td align="center">
<?php $total[$i]= $subto[$i] + $iva[$i];
echo $total[$i]; ?></td>
    <td align="center"><?php echo $row[2]; ?></td>
    <td align="center"><?php echo $row[3]; ?></td>
  </tr>
		 <?php  }?>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center" bordercolor="#000000">Total</td>
    <td align="center" bordercolor="#000000">
<?php 
for ($j = 1; $j <= $i; $j++) {
    $total= $precio[$i] + $total;} 
	echo $total; ?></td>
    <td align="center" bordercolor="#000000">&nbsp;</td>
    <td align="center" bordercolor="#000000">&nbsp;</td>
    <td align="center" bordercolor="#000000">&nbsp;</td>
    <td align="center" bordercolor="#000000">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>


</form>
</center>
