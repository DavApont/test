<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_imptitular = "SELECT * FROM noticias ORDER BY fechapub DESC";
$countimptitular = mysql_query($query_imptitular, $cleyenlinea) or die(mysql_error());
$totalRows_imptitular = mysql_num_rows($countimptitular);
?>

<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- AQUÍ EMPIEZA LA CARTELERA DESLIZABLE QUE MUESTRA TITULARES DE LAS NOTICIAS MÁS RELEVANTES -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<div class="scrollable">
	<div class="items">
        <?php include("secciones/muestratitulares.php"); ?>		
	</div>
</div>
<a class="prev"></a>
<a class="next"></a>
<br clear="all" />
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- AQUÍ TERMINA LA CARTELERA DESLIZABLE -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php include("secciones/muestratitulares2.php"); ?>

<div id="cont-webs-amigas">
	<span>
        <a class="websAmigas" href="http://www.presidencia.gob.ve/" title="Ministerio del Poder Popular del Despacho de la Presidencia" target="_blank"></a>
        <a class="websAmigas" href="http://www.asambleanacional.gob.ve/" title="Asamblea Nacional" target="_blank"></a>
        <a class="websAmigas" href="http://www.yaracuy.gob.ve/" title="Gobierno Bolivariano del Estado Yaracuy" target="_blank"></a>
        <a class="websAmigas" href="http://www.cgr.gob.ve/" title="Contralor&iacute;a General de la Rep&uacute;blica" target="_blank"></a>
        <a class="websAmigas" href="http://www.tsj.gov.ve/" title="Tribunal Supremo de Justicia" target="_blank"></a>
        <a class="websAmigas" href="http://www.fiscalia.gov.ve/" title="Ministerio P&uacute;blico" target="_blank"></a>
        <a class="websAmigas" href="http://www.defensoria.gob.ve/" title="Defensor&iacute;a del Pueblo" target="_blank"></a>
    </span>
	<span>
        <a class="websAmigas" href="http://www.alopresidente.gob.ve/" title="Al&oacute; Presidente" target="_blank"></a>
        <a class="websAmigas" href="http://www.venezueladeverdad.gob.ve/" title="Venezuela de Verdad" target="_blank"></a>
    </span>
	<span>
        <a class="websAmigas" href="http://www.antv.gob.ve/" title="Fundaci&oacute;n Televisora de la Asamblea Nacional" target="_blank"></a>
        <a class="websAmigas" href="http://www.vtv.gov.ve/" title="Venezolana de Televisi&oacute;n" target="_blank"></a>
        <a class="websAmigas" href="http://www.tves.org.ve/" title="Televisora Venezolana Educativa y Socialista" target="_blank"></a>
        <a class="websAmigas" href="http://www.vive.gob.ve/" title="ViVe Televisora" target="_blank"></a>
        <a class="websAmigas" href="http://www.telesurtv.net/" title="Telesur" target="_blank"></a>
    </span>
    <span>
        <a class="websAmigas" href="http://www.abn.info.ve/" title="Agencia Bolivariana de Noticias" target="_blank"></a>
        <a class="websAmigas" href="http://www.rnv.gov.ve/" title="Radio Nacional de Venezuela" target="_blank"></a>
        <a class="websAmigas" href="http://www.radiomundial.com.ve/yvke/" title="Radio YVKE Mundial" target="_blank"></a>
        <a class="websAmigas" href="http://www.laradiodelsur.com/" title="La Radio del Sur" target="_blank"></a>
    </span>
</div>