<?php
$categ = $_GET[cat];
?>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="edit_user" name="edit_user" method="post" action="">
<table width="223" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td  align="center" colspan="3" class="normalText"><strong><img src="images/box.png" alt="Agregar Categoria" width="64" height="64" /> Lista de Producto</strong></td>
</tr>
<tr>
  <td>
  <?php  
$result=mysql_query("SELECT * FROM categoria order by nombre",$conexion);
while($row = mysql_fetch_array($result)) {
?>
<a href="?ir=link&url=list_prod.php&cat=<?Php echo "$row[1]"; ?>" class="textLinks_noUnderline"><?Php echo "$row[1]"; ?></a> 

<?Php
$i=$i++;
	if($i=6){
		 $j=$j++;
		 $i=0;
	}
}
   mysql_free_result($result);
?>
    <table width="400" border="0"  cellspacing="0">
<tr>
<td class="normalTextFormElementBlanco"><b>Nombre Producto</b></td>
<td class="normalTextFormElementBlanco"><b>Existencia A/M</b></td>
<td class="normalTextFormElementBlanco"><b>Precio</b></td>
</tr>

<?php
 $RegistrosAMostrar=50;
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }
if($categ==''){
 $Resultado=mysql_query("SELECT nombre,existencia_min,existencia_actual,precio FROM producto where activado = '' order by nombre LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
}else{
  $Resultado=mysql_query("SELECT nombre,existencia_min,existencia_actual,precio FROM producto where categoria = '".$categ."' and activado = '' order by nombre LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
}
 
 while($row=mysql_fetch_array($Resultado)){
?>
<tr <?php if($colorfila==0){?> 
class="normalTextFormElement"
    <?php $colorfila=1; }else{ ?>
class="normalTextFormElementBlanco"
<?php $colorfila=0; } ?>> 
<td><?php echo $row[0]; ?></td>
<td><?php echo $row[2]; echo "/"; echo $row[1]; ?></td>
<td><?php echo $row[3]; ?></td>
		 <?php  }?>
</tr>

<?php
if($categ==''){
 $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM producto where activado = ''",$conexion));
 }else{
 $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM producto where categoria = '".$categ."' and activado = '' ",$conexion));
 }
 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;
 $Res=$NroRegistros%$RegistrosAMostrar;
 if($Res>0) $PagUlt=floor($PagUlt)+1;
?> 
<tr>
<td colspan="2" align="center">
<?php if($PagAct>1) {?>
 	<a href="?ir=link&url=list_prod.php&cat=<?php echo $categ ?>&pag=1" class="textLinks_noUnderline">Primero</a>
	<a href="?ir=link&url=list_prod.php&cat=<?php echo $categ ?>&pag=<?php echo $PagAnt ?>" class="textLinks_noUnderline">Anterior</a>
    <span class="textLinks_noUnderline">Pagina <?php echo $PagAct ?>/<?php echo $PagUlt ?></span>
<?php }
 if($PagAct<$PagUlt) {?>
	 <a href="?ir=link&url=list_prod.php&cat=<?php echo $categ ?>&pag=<?php echo $PagSig ?>" class="textLinks_noUnderline">Siguiente</a> 
      	<span class="textLinks_noUnderline">Pagina <?php echo $PagAct ?>/<?php echo $PagUlt ?></span>
 <a href="?ir=link&url=list_prod.php&cat=<?php echo $categ ?>&pag=<?php echo $PagUlt ?>" class="textLinks_noUnderline">Ultimo</a>
<?php } ?>
</td>
</tr>
</table></td></tr>
</table>
</form>
</center>