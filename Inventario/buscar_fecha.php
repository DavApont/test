<?php
if($_POST[fecha_inicio]<>''){
$fi = $_POST[fecha_inicio];
$ff = $_POST[fecha_final];
}else{
$fi = $_GET[fi];
$ff = $_GET[ff];
}
?>
	<script type="text/javascript">
	$(function() {
		$("#fecha_inicio").datepicker();
		$("#fecha_final").datepicker();
	});
	</script>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="busfech" name="busfech" method="POST" action="">
<table width="237" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong><img src="images/calendar.png" alt="Agregar Categoria" width="64" height="64" /> Ventas Por Fecha </strong></td>
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
</form>

<table width="800" border="0" cellspacing="0">
<td class="normalTextFormElementBlanco"><b>Nombre Usuario</b></td>
<td class="normalTextFormElementBlanco"><b>Fecha</b></td>
<td class="normalTextFormElementBlanco"><b>Nombre Producto</b></td>
<td class="normalTextFormElementBlanco"><b>Cantidad</b></td>
<td class="normalTextFormElementBlanco"><b>Comentario</b></td>
<td class="normalTextFormElementBlanco"><b>Garantia</b></td>
<td class="normalTextFormElementBlanco"><b>Precio</b></td>

<?php 
 $RegistrosAMostrar=10;
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }

 $Resultado=mysql_query("SELECT usuario, fecha, nom_pro, cantidad, comentario, garantia, precio FROM historia WHERE fecha >= '$fi' AND fecha <= '$ff' LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
 while($row=mysql_fetch_array($Resultado)){
?>
<tr 
<?php if($colorfila==0){?> 
class="normalTextFormElement"
    <?php $colorfila=1; }else{ ?>
class="normalTextFormElementBlanco"
<?php $colorfila=0; } ?>"> 
<td><?php echo $row[0]; ?></td>
<td><?php echo $row[1]; ?></td>
<td><?php echo $row[2]; ?></td>
<td><?php echo $row[3]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><?php if($row[5] ==0){
		echo "No";
}else{ echo "Si"; }?></td>
<td><?php echo $row[6]; ?></td>
		 <?php  }?>

</table>
<?php

 $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM historia WHERE fecha >= '".$fi."' AND fecha <= '".$ff."'",$conexion));
 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;
 $Res=$NroRegistros%$RegistrosAMostrar;
 if($Res>0) $PagUlt=floor($PagUlt)+1;
?> 

<?php if($PagAct>1) {?>
 	<a href="?ir=link&url=buscar_fecha.php&fi=<?php echo $fi;?>&ff=<?php echo $ff;?>&pag=1" class="textLinks_noUnderline">Primero</a>
	<a href="?ir=link&url=buscar_fecha.php&fi=<?php echo $fi;?>&ff=<?php echo $ff;?>&pag=<?php echo $PagAnt ?>" class="textLinks_noUnderline">Anterior</a>


<?php }
 if($PagAct<$PagUlt) {?>
 	<span class="textLinks_noUnderline">Pagina <?php echo $PagAct ?>/<?php echo $PagUlt ?></span>
	 <a href="?ir=link&url=buscar_fecha.php&fi=<?php echo $fi;?>&ff=<?php echo $ff;?>&pag=<?php echo $PagSig ?>" class="textLinks_noUnderline">Siguiente</a> 
 <a href="?ir=link&url=buscar_fecha.php&fi=<?php echo $fi;?>&ff=<?php echo $ff;?>&pag=<?php echo $PagUlt ?>" class="textLinks_noUnderline">Ultimo</a>
<?php } ?>


</center>
