<?php
header('Content-type: text/xml; charset="UTF-8"', true);
echo '<?phpxml version="1.0" encoding="UTF-8"?>';
include("../../connections/cleyEnLinea.php");
include("../../connections/funciones.php");
$sql="SELECT *,DATE_FORMAT(fechapub,'%d') as dia,DATE_FORMAT(fechapub,'%m') as mes,DATE_FORMAT(fechapub,'%y') as ano FROM noticias ORDER BY fechapub DESC";
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$vector=mysql_query($sql, $cleyenlinea) or die(mysql_error());
$cantidad=mysql_num_rows($vector);
?>
<rss version="2.0">
    <channel>
        <title>RSS Noticias CLEY</title>
        <link>http://cleyaracuy.gob.ve/secciones/rss/index.php</link>
        <description>Noticias</description>
        <?php for($i=1;$i<=$cantidad;$i++){ ?>
        <?php $resultados=mysql_fetch_assoc($vector); ?>
        <item>
            <title><?php echo $resultados['dia']; ?>/<?php mes($resultados['mes']); ?>/<?php echo $resultados['ano']; ?> - <?php echo $resultados['titulo']; ?></title>
            <link>http://cleyaracuy.gob.ve/secciones/rss/vermas.php?rss=noticias.php&amp;id=<?php echo $resultados['idnoticia']; ?></link>
            <description><?php echo htmlchrset(bbparse_inv(borra_etiquetas($resultados['descripcion']))); ?></description>
        </item>
        <?php } ?>
    </channel>
</rss>