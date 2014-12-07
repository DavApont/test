<?php require_once('connections/cleyEnLinea.php'); ?>
<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_autoridades = "SELECT * FROM comisiones ORDER BY id_com";
$autoridades = mysql_query($query_autoridades, $cleyenlinea) or die(mysql_error());
$row_autoridades = mysql_fetch_assoc($autoridades);
$totalRows_autoridades = mysql_num_rows($autoridades);
?>
<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_diputados = "SELECT * FROM diputados";
$diputados = mysql_query($query_diputados, $cleyenlinea) or die(mysql_error());
$totalRows_diputados = mysql_num_rows($diputados);
?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Comisiones - Autoridades";
}
cambiarTituloPagina();
</script>

<h1>Autoridades de las Comisiones</h1>
<?php do { ?>

<?php //--------------------------------------------------------------------------------------// ?>
<?php //--------------------------------------------------------------------------------------// ?>

<?php $id_com = $row_autoridades['id_com']; ?>
<table width="498">
<caption><?php echo $row_autoridades['nombre_com']; ?></caption>
    <tr>
    	<td width="116" align="center" valign="middle">Presidente</td>
    	<td width="370" align="center" valign="middle">
		<?php
			$diputados = mysql_query($query_diputados, $cleyenlinea) or die(mysql_error());
			for ($j=1;$j<=$totalRows_diputados;$j++){
			$row_diputados = mysql_fetch_assoc($diputados);
				if ($row_diputados['id_dip']==$row_autoridades['idpredte_com_dip']){
					$nomb_dip=$row_diputados['nomb_dip'];
					$id_dip=$row_diputados['id_dip'];
					$vinculo='secciones/informacion/infodip.php';
					echo "<a href='index.php?id=2&vinculo=$vinculo&iddip=$id_dip'>$nomb_dip</a>";
				}
			}
		?>
        </td>
    </tr>
    <tr>
    	<td align="center" valign="middle">Vice-Presidente</td>
    	<td align="center" valign="middle">
        <?php
			$diputados = mysql_query($query_diputados, $cleyenlinea) or die(mysql_error());
			for ($j=1;$j<=$totalRows_diputados;$j++){
			$row_diputados = mysql_fetch_assoc($diputados);
				if ($row_diputados['id_dip']==$row_autoridades['idvpredte_com_dip']){
					$nomb_dip=$row_diputados['nomb_dip'];
					$id_dip=$row_diputados['id_dip'];
					$vinculo='secciones/informacion/infodip.php';
					echo "<a href='index.php?id=2&vinculo=$vinculo&iddip=$id_dip'>$nomb_dip</a>";
				}
			}
		?>
        </td>
    </tr>
    <tr>
    	<td align="center" valign="middle">Miembro</td>
    	<td align="center" valign="middle">
		<?php
			$diputados = mysql_query($query_diputados, $cleyenlinea) or die(mysql_error());
			for ($j=1;$j<=$totalRows_diputados;$j++){
			$row_diputados = mysql_fetch_assoc($diputados);
				if ($row_diputados['id_dip']==$row_autoridades['idmiembro_com_dip']){
					$nomb_dip=$row_diputados['nomb_dip'];
					$id_dip=$row_diputados['id_dip'];
					$vinculo='secciones/informacion/infodip.php';
					echo "<a href='index.php?id=2&vinculo=$vinculo&iddip=$id_dip'>$nomb_dip</a>";
				}
			}
		?>
        </td>
    </tr>
    <tr>
    	<td align="center" valign="middle">Agenda</td>
        <td align="center" valign="middle"><?php echo "N/I"; ?></td>
    </tr>
    <tr>
    	<td align="center" valign="middle">Correo Electr&oacute;nico</td>
        <td align="center" valign="middle">
		<?php
			echo $row_autoridades['correo_com'];
		?>
    </tr>
</table>

<?php //--------------------------------------------------------------------------------------// ?>
<?php //--------------------------------------------------------------------------------------// ?>

<?php } while ($row_autoridades = mysql_fetch_assoc($autoridades)); ?>
<?php
mysql_free_result($autoridades);
?>
