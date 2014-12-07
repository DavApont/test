<table width="400" border="0" cellspacing="0">
<tr class="negrita" bgcolor="#CCFFFF">
<td> <b>Codigo</b></td>
<td><b>Nombre </b></td>
<td><b>Precio</b></td>
</tr>

<?php
 $RegistrosAMostrar=10;
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }

 $Resultado=mysql_query("SELECT codigo,nombre,precio FROM rutas LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
 while($row=mysql_fetch_array($Resultado)){
?>
<tr 
<?php if($colorfila==0){?> 
class="negrita" bgcolor="#FFFFFF"
    <?php $colorfila=1; }else{ ?>
class="negrita" bgcolor="#CCFFFF"
<?php $colorfila=0; } ?>"> 
<td><?php echo $row[0]; ?></td>
<td><?php echo $row[1]; ?></td>
<td><?php echo $row[2]; ?></td>
		 <?php  }?>
</tr>
</table>
<?php

 $NroRegistros=mysql_num_rows(mysql_query("SELECT nombre FROM rutas ",$conexion));
 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;
 $Res=$NroRegistros%$RegistrosAMostrar;
 if($Res>0) $PagUlt=floor($PagUlt)+1;
?> 

<?php if($PagAct>1) {?>
 	<a href="?ir=link&url=list_cat.php&pag=1" class="textLinks_noUnderline">Primero</a>
	<a href="?ir=link&url=list_cat.php&pag=<?php echo $PagAnt ?>" class="textLinks_noUnderline">Anterior</a>


<?php }
 if($PagAct<$PagUlt) {?>
 	<span class="textLinks_noUnderline">Pagina <?php echo $PagAct ?>/<?php echo $PagUlt ?></span>
	 <a href="?ir=link&url=list_cat.php&pag=<?php echo $PagSig ?>" class="textLinks_noUnderline">Siguiente</a> 
 <a href="?ir=link&url=list_cat.php&pag=<?php echo $PagUlt ?>" class="textLinks_noUnderline">Ultimo</a>
<?php } ?>