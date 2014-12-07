<?php require_once('connections/cleyEnLinea.php'); ?>
<?php include('connections/estandares.php'); ?>
<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$sql = "SELECT *,DATE_FORMAT(fechapub,'%d') as dia,DATE_FORMAT(fechapub,'%m') as mes,DATE_FORMAT(fechapub,'%Y') as ano from efemeride WHERE DATE_FORMAT(fechapub,'%d') = ".$_POST['dia']." AND DATE_FORMAT(fechapub,'%m') = ".$_POST['mes'];
$vector = mysql_query($sql, $cleyenlinea) or die(mysql_error());
$cantidad = mysql_num_rows($vector);
?>
<?php for($i=1;$i<=$cantidad;$i++){ $resultados=mysql_fetch_assoc($vector); ?>
<p><?php echo $resultados['dia']; ?> <?php mes($resultados['mes']); ?> <?php echo $resultados['ano']; ?> <?php echo $resultados['titulo']; ?> <?php echo $resultados['cuerpo']; ?></p><?php } ?>