<?php require_once('connections/cleyEnLinea.php'); ?>
<?php include('connections/estandares.php'); ?>
<?php
$maxRows_impnoticia = 5;
$pageNum_impnoticia = 0;
if (isset($vvarible{'pageNum_impnoticia'})) {
  $pageNum_impnoticia = $vvarible{'pageNum_impnoticia'};
}
$startRow_impnoticia = $pageNum_impnoticia * $maxRows_impnoticia;
?>
<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$tipo=$vvarible{'tipo'};
$query_impnoticia = "SELECT *,DATE_FORMAT(fechapub,'%d') as dia,DATE_FORMAT(fechapub,'%m') as mes,DATE_FORMAT(fechapub,'%y') as ano
 from noticias where tipo='$tipo' AND estado = 0 ORDER BY fechapub DESC";
$query_limit_impnoticia = sprintf("%s LIMIT %d, %d", $query_impnoticia, $startRow_impnoticia, $maxRows_impnoticia);
$impnoticia = mysql_query($query_limit_impnoticia, $cleyenlinea) or die(mysql_error());
$row_num_impnoticia = mysql_num_rows($impnoticia);
$all_impnoticia = mysql_query($query_impnoticia);
$totalRows_impnoticia = mysql_num_rows($all_impnoticia);
?>

<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Noticias";
}
cambiarTituloPagina();
</script>

<h1>Las Noticias m&aacute;s Actuales</h1>

<?php if($totalRows_impnoticia > 0){ ?>
<?php for ($i = 1; $i <= $row_num_impnoticia; $i++){ ?>
<?php $row_impnoticia = mysql_fetch_assoc($impnoticia); ?>
<?php $idnoticia = $row_impnoticia['idnoticia']; ?>
<?php $imagen = $row_impnoticia['imagen']; ?>
<?php $mes = $row_impnoticia['mes']; ?>
    <span class="fechaEntrada"><?php echo $row_impnoticia['dia']; ?> <span style="font-weight:bold;"><?php mes($mes); ?></span> <?php echo $row_impnoticia['ano']; ?></span>
    <?php echo "<a href='#secciones/noticias/imprimir2.php&idnoticia=$idnoticia#comentario' title='Revisa o agrega un comentario'>" ?><?php include('consulta.php')?></a>
<div class="entradaNoticia">
<img src='img/noticias/miniatura<?php echo $imagen; ?>'/>
<h2><?php echo $row_impnoticia['titulo']; ?></h2>
    <p><?php echo $row_impnoticia['descripcion']; ?></p>
    <?php // echo $row_impnoticia['fechapub']; ?>
    <?php if($_SESSION['MM_Usernivel'] == 2){ ?><a onclick="return elegirOpcion('<?php echo "Esta a punto de borrar la Noticia con el nombre: &#8220;.".$row_impnoticia['titulo']."&#8221;"; ?>')" href='<?php echo "#".$ir."&tipo=".$vvarible{'tipo'}."&pageNum_impnoticia=".$vvarible{'pageNum_impnoticia'}."&delete=noticia&imagen=".$imagen."&idnoticia=".$row_impnoticia['idnoticia']; ?> 'style='margin-left:10px;'>Eliminar esta Noticia</a><?php } ?>
    <?php echo "<a href='#secciones/noticias/imprimir2.php&idnoticia=$idnoticia' class='navegacionAJAX'>Leer M&aacute;s</a>"; ?>
</div>
  <?php } ?>
  <?php $pag_num_impnoticia2 = $totalRows_impnoticia / $maxRows_impnoticia; ?>
  <?php $pag_num_impnoticia = floor($pag_num_impnoticia2); ?>
  <div id="cont-nav-pags">
  <?php if($vvarible{'pageNum_impnoticia'} > 0){ ?>
  <a style="float:left;" href="<?php echo "#".$ir."&tipo=".$vvarible{tipo}."&pageNum_impnoticia=".($vvarible{'pageNum_impnoticia'}-1); ?>" class='navegacionAJAX'><img src="img/flecha-atras.png" height="20px" width="30px" /><span>Anterior</span></a>
  <?php } ?> <?php if(($vvarible{'pageNum_impnoticia'} < $pag_num_impnoticia) && (($startRow_impnoticia + $i - 1) <> $totalRows_impnoticia)){?>
  <a  style="float:right;" href="<?php echo "#".$ir."&tipo=".$vvarible{'tipo'}."&pageNum_impnoticia=".($vvarible{'pageNum_impnoticia'}+1); ?>" class='navegacionAJAX'><span>Siguiente</span><img src="img/flecha-delante.png" height="20px" width="30px" /></a>
  <?php } ?>
  <span>
Resultados <?php echo ($startRow_impnoticia + 1)."-".($startRow_impnoticia + $i - 1)." de ".$totalRows_impnoticia; ?>
<?php }else{ ?>
No hay Noticias Ingresadas</span></div>
<?php } ?>
<?php mysql_free_result($impnoticia); ?>
<?php mysql_free_result($all_impnoticia); ?>