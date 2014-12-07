<?php require_once('connections/cleyEnLinea.php'); ?>
<?php include('connections/estandares.php'); ?>
<?php
$sql="SELECT *,DATE_FORMAT(fecha,'%d') as dia,DATE_FORMAT(fecha,'%m') as mes,DATE_FORMAT(fecha,'%Y') as ano FROM leyes";
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$vector=mysql_query($sql, $cleyenlinea) or die(mysql_error());
$cantidad=mysql_num_rows($vector);
?>
<h1>Instrumentos Legales de &Aacute;mbito Regional</h1>
<p></p>
<?php for($i=1;$i<=$cantidad;$i++){ ?>
<?php $resultados=mysql_fetch_assoc($vector); ?>
<div class="entradaLey">
<h4><?php echo bbparse($resultados['titulo']); ?></h4>
<span>Gaceta N&deg; <?php echo $resultados['gaceta']; ?> / <?php echo $resultados['dia']; ?> de <?php mes($resultados['mes']); ?> del a&ntilde;o <?php echo $resultados['ano']; ?></span>
<a href="secciones/legislacion/lr/<?php echo $resultados['archivo']; ?>" title="Descargar esta Ley en formato PDF" target="_blank">Descargar</a>
</div>
<?php } ?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Legislaci\xf3n - Leyes Regionales";
}
cambiarTituloPagina();
</script>
