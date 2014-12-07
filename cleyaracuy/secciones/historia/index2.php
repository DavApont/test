<?php require_once('connections/cleyEnLinea.php'); ?>
<?php include('connections/estandares.php'); ?>
<?php
$maxRows_impnoticias = 10;
$pageNum_impnoticias = 0;
if (isset($_GET['pageNum_impnoticias'])) {
  $pageNum_impnoticias = $_GET['pageNum_impnoticias'];
}
$startRow_impnoticias = $pageNum_impnoticias * $maxRows_impnoticias;
$idhistoria=$vvarible{'idhistoria'};
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_impnoticias = "SELECT *,DATE_FORMAT(fechapub,'%d') as dia,DATE_FORMAT(fechapub,'%m') as mes,DATE_FORMAT(fechapub,'%y') as ano FROM historia_cley where idhistoria=$idhistoria";
$query_limit_impnoticias = sprintf("%s LIMIT %d, %d", $query_impnoticias, $startRow_impnoticias, $maxRows_impnoticias);
$impnoticias = mysql_query($query_limit_impnoticias, $cleyenlinea) or die(mysql_error());
$row_impnoticias = mysql_fetch_assoc($impnoticias);

if (isset($_GET['totalRows_impnoticias'])) {
  $totalRows_impnoticias = $_GET['totalRows_impnoticias'];
} else {
  $all_impnoticias = mysql_query($query_impnoticias);
  $totalRows_impnoticias = mysql_num_rows($all_impnoticias);
}
$totalPages_impnoticias = ceil($totalRows_impnoticias/$maxRows_impnoticias)-1;
?>
<?php
mysql_free_result($impnoticias);
?>
<?php //------------------------------------ Estructura de Noticia ------------------------------ ?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Historia de Yaracuy - <?php ?>";
}
cambiarTituloPagina();
</script>

<h1>Algo de Historia de nuestro hermoso estado Yaracuy</h1>

<div id="cont-noticia">
<?php $imagen=$row_impnoticias['imagen']; ?>
    <h3 class="antetitulo"><?php echo $row_impnoticias['antetitulo']; ?></h3>
    <h2 class="tituloNot"><?php echo $row_impnoticias['titulo']; ?></h2>
    <span class="datosEmisor" style="font-weight:bold;"><?php echo $row_impnoticias['periodista']; ?></span>
    <span class="datosEmisor"><?php echo $row_impnoticias['emisor']; ?></span>
	<span class="fechaNot"><?php echo $row_impnoticias['dia']; ?> <?php $mes = $row_impnoticias['mes']; ?> <span style="font-weight:bold;"><?php mes($mes); ?></span> <?php echo $row_impnoticias['ano']; ?></span>
  <hr />
    <?php echo "<img src='img/noticias/$imagen' class='img-ppal-not' />"; ?>
    <span>
	<?php echo $row_impnoticias['descripcion']; ?>
	<span style="display:block;clear:both;"><span></span><?php echo $row_impnoticias['cuerpo']; ?></span>
    </span>
    <span id="opciones-not">
    <a href="javascript:history.back(1)" title="Ir a la p&aacute;gina anterior">Volver Atr&aacute;s</a>
    </span>
    <hr />
</div>
<?php //------------------------------------ Inicio de Comentarios ------------------------------ ?>
<p>  
  <?php
$maxRows_comentario = 7;
$pageNum_comentario = 0;
if (isset($_GET['pageNum_comentario'])) {
  $pageNum_comentario = $_GET['pageNum_comentario'];
}
$startRow_comentario = $pageNum_comentario * $maxRows_comentario;
?>
  <?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_comentario = "SELECT *,DATE_FORMAT(fecha,'%d') as dia,DATE_FORMAT(fecha,'%m') as mes,DATE_FORMAT(fecha,'%y') as ano
 from comentarios where idnoticia_comentario='$idnoticia' and seccion = '2' ORDER BY idcomentario DESC";
$query_limit_comentario = sprintf("%s LIMIT %d, %d", $query_comentario, $startRow_comentario, $maxRows_comentario);
$comentario = mysql_query($query_limit_comentario, $cleyenlinea) or die(mysql_error());
$row_comentario = mysql_fetch_assoc($comentario);
?>
  
</p>

<?php
if (isset($_GET['totalRows_comentario'])) {
  $totalRows_comentario = $_GET['totalRows_comentario'];
} else {
  $all_comentario = mysql_query($query_comentario);
  $totalRows_comentario = mysql_num_rows($all_comentario);
}
$totalPages_comentario = ceil($totalRows_comentario/$maxRows_comentario)-1;

$queryString_comentario = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_comentario") == false && 
        stristr($param, "totalRows_comentario") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_comentario = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_comentario = sprintf("&totalRows_comentario=%d%s", $totalRows_comentario, $queryString_comentario);
 ?>
<p><a name="comentario"></a>
<div id="cont-noticia">
<?php do { ?>
<p>
<?php echo $row_comentario['dia']; ?> &nbsp; <?php $mes = $row_comentario['mes']; mes($mes); ?> &nbsp; <?php echo $row_comentario['ano']; ?>
<h2><?php echo $row_comentario['usuario']; ?></h2>
<p>
  <?php echo $row_comentario['comentario']; ?>
<p>
<?php } while ($row_comentario = mysql_fetch_assoc($comentario)); ?>


<p>
  <?php if ($pageNum_comentario > 0) { ?>
    <?php } ?>
	<?php if ($pageNum_comentario > 0) {?>
      <a href="<?php printf("%s?pageNum_comentario=%d%s#comentario", $currentPage, max(0, $pageNum_comentario - 1), $queryString_comentario); ?>" class='navegacionAJAX'>Anterior</a>
    <?php }?>
    <?php if ($pageNum_comentario < $totalPages_comentario) { ?>
      <a href="<?php printf("%s?pageNum_comentario=%d%s#comentario", $currentPage, min($totalPages_comentario, $pageNum_comentario + 1), $queryString_comentario); ?>" class='navegacionAJAX'>Siguiente</a>
        <?php }?>
    <?php if ($pageNum_comentario < $totalPages_comentario) { ?>
        <?php } ?>

Resultados <?php echo ($startRow_comentario + 1) ?> - <?php echo min($startRow_comentario + $maxRows_comentario, $totalRows_comentario) ?> de <?php echo $totalRows_comentario ?>

  <?php //-------------------------------------insertar comentarios------------------------------ ?>
</p>
</div>
<p>&nbsp; </p>
<form id="form1" name="form1" method="post" action="<?php echo $ingresarcomentario; ?>">
  <p>
    <label>
      <input name="nombre" type="text" id="nombre" value="Nombre" />
    </label>
  </p>
  <p>
    <label>
      <input name="email" type="text" id="email" value="email" />
    </label>
  </p>
  <p>
    <label>
      <textarea name="comentario" id="comentario" cols="45" rows="5">comentario</textarea>
    </label>
  </p>
  <p>
    <label>
      <input type="submit" value="Enviar" />
    </label>
  </p>
  <input type="hidden" name="envcomentario" value="form1" />
  <input type="hidden" name="seccion" value="2" />
</form>
<p>&nbsp;</p>
<p>
  <?php //----------------------------------inicio ver de comentarios----------------------------?>
