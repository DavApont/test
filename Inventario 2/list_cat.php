<table width="400" border="0" cellspacing="0">
<td class="normalTextFormElementBlanco"><b>Nombre Categoria</b></td>

<?php
 $RegistrosAMostrar=10;
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }

 $Resultado=mysql_query("SELECT nombre FROM categoria order by nombre LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
 while($row=mysql_fetch_array($Resultado)){
?>
<tr 
<?php if($colorfila==0){?> 
class="normalTextFormElement"
    <?php $colorfila=1; }else{ ?>
class="normalTextFormElementBlanco"
<?php $colorfila=0; } ?>"> 
<td><?php echo $row[0]; ?></td>
		 <?php  }?>

</table>
<?php

 $NroRegistros=mysql_num_rows(mysql_query("SELECT nombre FROM categoria ",$conexion));
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