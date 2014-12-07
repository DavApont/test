<?php require_once('connections/cleyEnLinea.php'); ?>
<?php
$sql="SELECT * FROM diputados,comisiones WHERE id_dip=idpredte_com_dip ORDER BY id_dip";
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$vector=mysql_query($sql, $cleyenlinea) or die(mysql_error());
$cantidad=mysql_num_rows($vector);
?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Informaci\xf3n - Autoridades Directivas, Legislativas y Administrativas del Parlamento";
}
cambiarTituloPagina();
</script>

<script type="text/javascript" language="javascript">navPest();acordionInformativo();</script>
<h1>Autoridades del Consejo Legislativo del Estado Yaracuy</h1>

<p>El Consejo Legislativo del Estado Yaracuy goza de una completa autonom&iacute;a funcional y administrativa que le ha permitido como a toda organizaci&oacute;n eficiente distribuir sus actividades y delegar funciones, as&iacute; podemos visualizar la estructura funcional y organizativa del <acronym title="Consejo Legislativo del Estado Yaracuy">CLEY</acronym> desde tres puntos de vista:</p>

<?php //-- Sistema de Navegaci&oacute;n por Pestañas ----------------------------------------------------------- ?>
<ul class="tabs"> 
    <li><a href="#" id="t1">La Direcci&oacute;n</a></li> 
    <li><a href="#" id="t2">La Legislaci&oacute;n</a></li> 
    <li><a href="#" id="t3">La Administraci&oacute;n</a></li> 
</ul> 
 
<div class="panes"> 
<?php //-- Primer Contenido ----------------------------------------------------------------------------- ?>    
    <div>
		<h2>La Junta Directiva</h2>
        <p>De conformidad con lo establecido en el art&iacute;culo 20 de la <a href="secciones/legislacion/li/locle.pdf" title="Descargar esta Ley en formato PDF" target="_blank">Ley Org&aacute;nica de los Consejos Legislativos de los Estados</a>:</p>
        <blockquote cite="http://cleyaracuy.gob.ve/secciones/legislacion/li/locle.pdf">&#8220;Los Consejos Legislativos Estadales tendr&aacute;n una Junta Directiva integrada por un Presidente o Presidenta y un Vicepresidente o Vicepresidenta, la cual ser&aacute; elegida entre los legisladores o legisladoras presentes al inicio del per&iacute;odo constitucional en la sesi&oacute;n de instalaci&oacute;n y al inicio de cada per&iacute;odo anual de sesiones ordinarias, por votaci&oacute;n p&uacute;blica e individual. Asimismo, nombrar&aacute;n, fuera de su seno, un Secretario o Secretaria.&#8221;.</blockquote>
        <p>Para el per&iacute;odo actual <em>- 2009/2010 -</em>, la Junta Directiva del Consejo Legislativo del Estado Yaracuy se conform&oacute; de la siguiente manera:</p>
        
        <div class="cont-jd" style="margin-left:15px;">
        	<img src="img/legisladores/hlm1.png" height="180" width="155" />
            <a href="#secciones/informacion/atrib_p.php" title="Conoce aqu&iacute; las Atribuciones del Presidente" class="navegacionAJAX">Presidente</a>
            <span>Leg. Henrys Lor Mogoll&oacute;n</span>
        </div>
        <div class="cont-jd">
        	<img src="img/legisladores/am.png" height="150" width="124" />
            <a href="#secciones/informacion/atrib_vp.php" title="Conoce aqu&iacute; las Atribuciones del Vice-Presidente" class="navegacionAJAX">Vice-Presidente</a>
            <span>Leg. &Aacute;ngel Gamarra</span>
        </div>
        <div class="cont-jd">
        	<img src="img/legisladores/cc.png" height="150" width="124" />
            <a href="#secciones/informacion/atrib_s.php" title="Conoce aqu&iacute; las Atribuciones del Secretario" class="navegacionAJAX">Secretario</a>
            <span>Creliz Coronel</span>
        </div>
        <p style="clear:both;">La forma en que la Junta Directiva del <acronym title="Consejo Legislativo del Estado Yaracuy">CLEY</acronym> es electa est&aacute; detallada en el art&iacute;culo 6 del <a href="secciones/legislacion/lr/ridcley.pdf" target="_blank" title="Descargar esta Ley en formato PDF">Reglamento de Interior y de Debates del Consejo Legislativo del Estado Yaracuy (2005)</a>, donde se textualiza que:</p>
        <blockquote cite="http://cleyaracuy.gob.ve/secciones/legislacion/lr/ridcley.pdf">&#8220;...comprobada la existencia del qu&oacute;rum reglamentario para la instalaci&oacute;n del Consejo Legislativo, se proceder&aacute; a la elecci&oacute;n de la Mesa Directiva, cuyos miembros ser&aacute;n postulados y elegidos por los Legisladores presentes...&#8221;</blockquote>
        <hr style="margin:20px 20px;color:#CCC;border-style:dashed;" />
        <a href="#" style="display:block;margin: 0px 20px 0px 30px;">Conoce aqu&iacute; qui&eacute;nes y c&oacute;mo estaban conformadas las Juntas Directivas del CLEY para per&iacute;odos anteriores.</a>
    </div>
<?php //-- Segundo Contenido ----------------------------------------------------------------------------- ?>    
    <div>
        <h2>El Cuerpo Legislativo</h2>
        <p>La funci&oacute;n legislativa de este parlamento reside seg&uacute;n lo establecido en el <strong>Primer Numeral del Art&iacute;culo 3</strong> del <a href="secciones/legislacion/lr/rofacley.pdf" title="Descargar este Reglamento en formato PDF" target="_blank">Reglamento de Organizaci&oacute;n y Funcionamiento Administrativo del Consejo Legislativo del Estado Yaracuy</a> sobre la C&aacute;mara Legislativa, conformada &eacute;sta por los legisladores electos por el soberano.</p>
        <p>La C&aacute;mara Legislativa del <acronym title="Consejo Legislativo del Estado Yaracuy">CLEY</acronym> para el per&iacute;odo actual <em>- 2009/2014 -</em>, se conform&oacute; de la siguiente forma:</p>
<?php for($j=1;$j<=$cantidad;$j++){ ?>
<?php $resultados=mysql_fetch_assoc($vector); ?>
        <div class="cont-leg">
            <div class="cont-foto-logo">
                <img src="<?php echo $resultados['foto_dip']; ?>" height="150" width="124" />
                <?php echo $resultados['partido_dip']; ?><img src='img/legisladores/<?php echo $resultados["logo_partido"]; ?>' height="49px" width="120px" /></a>
            </div>
            <div class="datos-leg">
            <h3>Leg. <?php echo $resultados['nomb_dip']; ?><?php if($resultados['id_cargo_dip']==2){ ?> <a href="#secciones/informacion/atrib_p.php" title="Conoce aqu&iacute; las Atribuciones del Presidente" class="navegacionAJAX">(Presidente)</a><?php } ?><?php if($resultados['id_cargo_dip']==1){ ?> <a href="#secciones/informacion/atrib_vp.php" title="Conoce aqu&iacute; las Atribuciones del Vice-Presidente" class="navegacionAJAX">(Vice-Presidente)</a><?php } ?></h3>
            <p style="margin:0px 0px 10px 0px;text-indent:0px;font-weight:bold;color:#444;">C. I. <?php echo $resultados['ci_dip']; ?> / <?php echo $resultados['electo_por']; ?></p>
            <img class="icono" src="img/iconotlf.png" height="20px" width="20px" />
            <span><?php echo $resultados['tlf_dip']; ?> / (0254) 231 9602 <?php echo $resultados['tlf_ofi_dip']; ?></span>
            <img class="icono" src="img/iconomail.png" height="20px" width="20px" />
            <span><?php echo $resultados['correo_dip']; ?></span>
            <span class="comPres">Preside la <a href='#secciones/comisiones/<?php echo $resultados["abrev_com"]; ?>.php' class="navegacionAJAX" title="Ver m&aacute;s sobre esta Comisi&oacute;n"><?php echo $resultados['nombre_com']; ?></a> los <?php echo $resultados['agenda_com']; ?></span>
            <span>Es miembro de la <a style="text-transform:uppercase" href='#secciones/comisiones/<?php echo $resultados["abrev_com"]; ?>.php' class="navegacionAJAX" title='<?php echo $resultados["nombre_com"]; ?>'><?php echo $resultados['abrev_com']; ?></a> y </span>
            </div>
            <p style="clear:both;"></p>
        </div>
<?php } ?>     
    </div>
<?php //-- Tercer Contenido ----------------------------------------------------------------------------- ?>    
    <div>
		<h2>Las Autoridades de Administrativas</h2>
        <p>Seg&uacute;n lo expuesto en el <strong>Quinto, Sexto y S&eacute;ptimo Numeral del Art&iacute;culo 3</strong> del <a href="secciones/legislacion/lr/rofacley.pdf" title="Descargar este Reglamento en formato PDF" target="_blank">Reglamento de Organizaci&oacute;n y Funcionamiento Administrativo del Consejo Legislativo del Estado Yaracuy</a>, el <acronym title="Consejo Legislativo del Estado Yaracuy">CLEY</acronym> est&aacute; estructurado y organizado en t&eacute;rminos administrativos y funcionales en tres (03) bloques de servicios constitu&iacute;dos de la siguiente forma:</p>

    <div id="accordion"> 
     
        <h2 class="current">Servicios Administrativos</h2> 
        <div class="pane" style="display:block">
        	<h3>Direcci&oacute;n de Administraci&oacute;n</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Ext. 102</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>administracion@cleyaracuy.gob.ve</span>
            
<!--        	<h3>Jefatura de Personal</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Ext. 123</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>recursoshumanos@cleyaracu
y.gob.ve</span>

        	<h3>Jefatura de Presupuesto</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Ext. 116</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>presupuesto@cleyaracuy.gob.ve</span>

        	<h3>Oficina de Contabilidad</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Ext. 103</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>contabilidad@cleyaracuy.gob.ve</span>

        	<h3>Oficina de Compras</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Ext. 103</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>compras@cleyaracuy.gob.ve</span>

        	<h3>Oficina de Inform&acute;tica</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Ext. 119</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>informatica@cleyaracuy.gob.ve</span>

        	<h3>Coordinaci&oacute;n de Bienes e Inventario</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Ext. 120</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>bienes@cleyaracuy.gob.ve</span>

        	<h3>Coordinaci&oacute;n de Servicios Generales</h3>
            <img src="img/iconotlf.png" height="20px" width="20px" /><span>Sin Extensi&oacute;n</span>
            <img src="img/iconomail.png" height="20px" width="20px" /><span>administracion@cleyaracuy.gob.ve</span>
-->        </div> 
     
        <h2>Servicios de Control Posterior</h2> 
        <div class="pane">
        
        </div> 
     
        <h2>Servicios de Apoyo</h2> 
        <div class="pane">
        
        </div> 
     
    </div>
        
    </div>
</div>