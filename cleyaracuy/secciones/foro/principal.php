<?php
$sql="SELECT * FROM foro";
$sqlsecciones=$sql." WHERE tipo = 1 ORDER BY id ASC";
mysql_select_db($database_cleyenlinea_foro, $cleyenlinea_foro);
$vector=mysql_query("$sql ORDER BY id ASC", $cleyenlinea_foro) or die(mysql_error());
$vector2=mysql_query($sqlsecciones, $cleyenlinea_foro) or die(mysql_error());
$cantidad=mysql_num_rows($vector);
?>
<?php for ($j=1;$j<=$cantidad;$j++){ ?>
<?php $resultados2=mysql_fetch_assoc($vector2); ?>
<?php if($resultados2['tipo']==1){ ?>
<div class="bordesup-seccion-foro"></div>
<table class="tabla-seccion-foro">
<?php //---------------------------------------------------------------------------------------------------------------------- // ?>
<?php //---------- Cabecera de Secciones ------------------------------- // ?>
    <thead>
        <tr>
            <th class="cabecera-seccion-foro" scope="col" colspan="2" width="60%" style="border-left:2px #970713 solid;">
                <strong><?php echo $resultados2['nombre']; ?></strong>
            </th>
            <th class="cabecera-seccion-foro" scope="col" width="7%">Temas</th>
            <th class="cabecera-seccion-foro" scope="col" width="7%">Msjs.</th>
            <th class="cabecera-seccion-foro" scope="col" width="26%" style="border-right:2px #970713 solid;">&Uacute;ltimo Msj.</th>
        </tr>
    </thead>
<?php //---------------------------------------------------------------------------------------------------------------------- // ?>
<?php //---------------------------------------------------------------------------------------------------------------------- // ?>
    <?php $vector=mysql_query($sql, $cleyenlinea_foro) or die(mysql_error()); ?>
    <?php for ($i=1;$i<=$cantidad;$i++){ ?>
    <?php $resultados=mysql_fetch_assoc($vector); ?>
    <?php if($resultados['padre']==$resultados2['id']){ ?>
    <tbody>
        <tr class="lista-tema-seccion-foro">
            <td style="border-left:2px #970713 solid;">
                <img src="secciones/foro/forum_unread.gif" width="27" height="27" />
            </td>
            <td>
                <a href="#secciones/foro/index.php&foro=verforo.php&verforo=<?php echo $resultados['id']; ?>" class="navegacionAJAX" title="Ver Temas en este Foro">
                    <strong><?php echo "- ".$resultados['nombre']; ?></strong>
                </a>
                <br />
                <span><?php echo $resultados['descripcion']; ?></span>
            </td>
            <td style="text-align:center;font-weight:bold;">05</td>
            <td style="text-align:center;font-weight:bold;">43</td>
            <td style="border-right:2px #970713 solid;">
                Por <a href="#" class="navegacionAJAX" title="Ver el Perfil de Este Usuario">Fulanito</a>
                <br />
                <a href="#" class="navegacionAJAX" title="Leer este tema">Titulo del Tema en que se posteo de ultimo</a>
                <br />
                <span>Dia tal del Mes tal, A&ntilde;o, Hora</span>
            </td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<div class="bordeinf-seccion-foro"></div>
    <?php mysql_free_result($vector); ?>
    <?php } ?>
    <?php } ?>
<?php mysql_free_result($vector2); ?>