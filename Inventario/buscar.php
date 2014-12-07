<?php
if($_POST['nom_pro']<>''){
$nombre = $_POST['nom_pro'];
}else{
$nombre = $_GET[prod];
}
echo $_POST['nom_pro'];
?>

<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="busfech" name="busfech" method="post" action="">
<table width="237" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong><img src="images/search.png" alt="Agregar Categoria" width="64" height="64" /> Ventas Por Producto </strong></td>
  </tr>
  <tr>
    <td width="81" class="normalText">Nombre Producto:</td>
    <td width="156">      <select name="nom_pro" class="normalText" id="nom_pro">
<?php  
$result=mysql_query("SELECT ID_producto, nombre,precio FROM producto order by nombre",$conexion);
while($row = mysql_fetch_array($result)) {
?>
				<option value="<?Php echo "$row[1]"; ?>"><?Php echo "$row[1]"; ?></option>
<?Php
   }
   mysql_free_result($result);
?> 
      </select>
</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" onClick="return busfecha();" class="normalText" name="buscar_fecha" id="buscar_fecha" value="Buscar" />
    </label></td>
  </tr>

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

 $Resultado=mysql_query("SELECT usuario, fecha, nom_pro, cantidad, comentario, garantia, precio FROM historia WHERE nom_pro = '$nombre'LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
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

 $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM historia WHERE nom_pro = '$nombre'",$conexion));
 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;
 $Res=$NroRegistros%$RegistrosAMostrar;
 if($Res>0) $PagUlt=floor($PagUlt)+1;
?> 

<?php if($PagAct>1) {?>
 	<a href="?ir=link&url=buscar.php&pag=1&prod=<?php echo $nombre;?>" class="textLinks_noUnderline">Primero</a>
	<a href="?ir=link&url=buscar.php&pag=<?php echo $PagAnt ?>&prod=<?php echo $nombre;?>" class="textLinks_noUnderline">Anterior</a>


<?php }
 if($PagAct<$PagUlt) {?>
 	<span class="textLinks_noUnderline">Pagina <?php echo $PagAct ?>/<?php echo $PagUlt ?></span>
	 <a href="?ir=link&url=buscar.php&pag=<?php echo $PagSig ?>&prod=<?php echo $nombre;?>" class="textLinks_noUnderline">Siguiente</a> 
 <a href="?ir=link&url=buscar.php&pag=<?php echo $PagUlt ?>&prod=<?php echo $nombre;?>" class="textLinks_noUnderline">Ultimo</a>
<?php } ?>

</form>
</center>
