<?php require_once('connections/cleyEnLinea.php'); ?>
<?php include('connections/estandares.php'); ?>
<?php
$dom=date('j')-date('w');
$sab=$dom+6;
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$sql = "SELECT *,DATE_FORMAT(fechapub,'%d') as dia, DATE_FORMAT(fechapub,'%m') as mes, DATE_FORMAT(fechapub,'%Y') as ano FROM efemeride WHERE DATE_FORMAT(fechapub,'%d') >= $dom AND DATE_FORMAT(fechapub,'%d') <= $sab AND DATE_FORMAT(fechapub,'%m') <= ".date('n');
$vector = mysql_query($sql, $cleyenlinea) or die(mysql_error());
$cantidad = mysql_num_rows($vector);
?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Efem\xe9rides Regionales";
}
cambiarTituloPagina();
</script>

<h1>Conoce un poco m&aacute;s de nuestras Ef&eacute;merides Regionales</h1>

<p>El Consejo Legislativo del Estado Yaracuy comprometido con un proceso de rescate cultural y de reconstrucci&oacute;n social a trav&eacute;s del fortalecimiento de los valores regionalistas y de la yaracuyanidad, se ha propuesto crear y poner a disposici&oacute;n del colectivo yaracuyano, el m&aacute;s completo y diverso <strong>Banco de Datos Hist&oacute;ricos</strong> referentes a las efem&eacute;rides regionales.</p>

<h2>Efem&eacute;rides de esta Semana</h2>
<?php for($i=1;$i<=$cantidad;$i++){ ?>
<?php $resultados=mysql_fetch_assoc($vector); ?>
<?php $dia=$resultados['dia']-$dom; ?>
<p><?php diasemana($dia); ?><?php echo $resultados['dia']; ?><?php mes($resultados['mes']); ?><?php echo $resultados['ano']; ?><?php echo $resultados['titulo']; ?><?php echo $resultados['cuerpo']; ?></p>
<?php } ?>
<h2>&iquest;Buscas una Efem&eacute;rides o una fecha en espec&iacute;fico?</h2>

<form class="form_regular" id="buscar-efemerides" name="buscar_efemerides" method="" action="">
    <fieldset>
    <legend>Elige una Fecha</legend>
    <select name="dia" id="dia">
    	<option value="NULL" selected="selected">Selecciona un D&iacute;a</option>
		<?php for($i=1;$i<=31;$i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
    </select>
    <select name="mes" id="mes">
    	<option value="NULL" selected="selected">Selecciona un Mes</option>
		<?php for($i=1;$i<=12;$i++){ ?>
        <option value="<?php echo $i; ?>"><?php mes($i); ?></option>
        <?php } ?>
    </select>
        <input type="button" class="btnFormAJAX" name="ir" id="ir" value="Buscar fecha">
    </fieldset>
</form>

<div id="cont-form-efem">
</div>