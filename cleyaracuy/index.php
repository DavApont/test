<?php require_once('connections/cleyEnLinea.php'); ?>
<?php include("connections/limit.php"); ?>
<?php include("connections/estandares.php"); ?>
<?php include("secciones/menu/consulta.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="kFQC5EHGjJpMIRFePwdJpBd9Nd0xGjYVmDp8rOT_c9M" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Sitio Web Oficial del Consejo Legislativo del Estado Yaracuy ::.</title>

<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
<link href="css/reglas-css.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.tools.min.js"type="text/javascript"></script>
<script src="js/jquery.history.js"type="text/javascript"></script>
<script src="js/jquery.listen-min.js"type="text/javascript"></script>
<script src="js/scripts-cley.js" type="text/javascript"></script>
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
		cintilloInformativo();
	    menuNav();
		carteleraDeslizable();
		websAmigas();
		animacionCabecera();
		textoEnCaja();
		ventanaEmergente();
		animBtnsIzq();
		easingPiePag();
		detectarNavegador();
		
		$.history.init(cargaPag);	
		$('#contenedor-pag').listen('click', 'a.navegacionAJAX', function(){
			var hash = this.href;
			hash = hash.replace(/^.*#/, '');
			$.history.load(hash);
			pedirPag();
			return false;
		});
		
		<?php include('js/script-form-ajax.php'); ?>
		
	});
	
	function cargaPag(hash) {
		if (hash) pedirPag();    
	}
		
	function pedirPag() {
		$('#cuerpo-cont-ppal').hide();
		$('#area-cuerpo #barra-prog').show();
		var parametro1 = encodeURIComponent(document.location.hash);
		$.ajax({
			url: "includeAJAX.php",	
			type: "GET",		
			data: parametro1,		
			cache: false,
			success: function (html) {	
				$('#area-cuerpo #barra-prog').hide();				
				$('#cuerpo-cont-ppal').html(html).fadeIn('slow');
			}		
		});
	}
/*]]>*/
</script>
</head>

<body>
<div id="contenedor-pag">
  <div id="area-cabecera">
    <div class="cintillo-gob"></div>
    <div class="banner-cabecera">
    	<div id="img-anim-cabecera">
        	<span></span>
        	<span></span>
        </div>
    </div>
  </div>
  
  <div id="area-cuerpo">
  
    <div id="borde-sup-area-cuerpo"></div>
    
    <div id="cuerpo-cont-izq">
        <a href="#portada.php" class='navegacionAJAX' title="Ir a la P&aacute;gina de Inicio"><img src="img/iconoInicio.png" width="24" height="38" /></a>
        <a href="#ventanaBusq" class="disparador" rel="#ventanaBusq" title="Abrir Buscador Inteligente"><img src="img/iconoBusq.png" width="24" height="38" /></a>
        <a href="#ventanaCorreo" class="disparador" rel="#ventanaCorreo" title="Enviar Mensajes Directos al CLEY"><img src="img/iconoCorreo.png" width="24" height="38" /></a>
        <a href="#ventanaRss" class="disparador" rel="#ventanaRss" title="Revisa o Suscr&iacute;bete a nuestro Canal RSS"><img src="img/iconoRss.png" width="24" height="38" /></a>
        <?php if($_SESSION['MM_Username']==""){ ?>
        <a href="#ventanaLogin" class="disparador" rel="#ventanaLogin" title="Iniciar Sesi&oacute;n en Sistema CLEY en L&iacute;nea"><img src="img/iconoLogin.png" width="24" height="38" /></a>
        <?php }else{ ?>
        <a href="<?php echo $logoutAction ?>" class="disparador" title="Cerrar Sesi&oacute;n en Sistema CLEY en L&iacute;nea"><img src="img/iconoLogout.png" width="24" height="38" />
        </a>
        <?php } ?>
<div id="sec-ppal">
        	<a href="#secciones/reforma/reformaYaracuy.php" class='navegacionAJAX' title="Todo sobre este proceso hist&oacute;rico en la regi&oacute;n"></a>
            <a href="#secciones/foro/index.php" class='navegacionAJAX' title="Participa en discusiones abiertas de diversos temas con los Legisladores"></a>
            <a href="#secciones/historia/index.php" class='navegacionAJAX' title="La Historia de nuestra regi&oacute;n desde diversas perspectivas y variados matices"></a>
            <a href="#secciones/efemerides/efemerides.php" class='navegacionAJAX' title="M&aacute;ntente informado sobre las fechas y efem&eacute;rides de la semana"></a>
            <a href="http://www.mozilla-europe.org/es/firefox/" class="websAmigas" title="S&oacute;lo hay un Navegador digno de usar la Web.. Desc&uacute;brelo!!" target="_blank"></a>
        </div>
        <div id="sec-contextual"></div>
    </div>
    <div id="barra-prog">
    	<div></div>
        <p>Cargando...</p>
    </div>
    <div id="cuerpo-cont-ppal">
    
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- Inicio Cuerpo Principal -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php include("secciones/portada.php"); ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- Final Cuerpo Principal -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
       
    </div>

    <div id="borde-inf-area-cuerpo"></div>
    
    <div id="area-pie">
    	<div class="easingPie" style="height: 35px; text-align: center;">
            <a id="dispMapa" href="#" style="margin-left:10px;">Mapa del Sitio</a>
            <a href="#secciones/legal.php" class='navegacionAJAX' style="margin-left:10px;">T&eacute;rminos Legales</a>
            <a href="#secciones/condicionesUso.php" class='navegacionAJAX' style="margin-left:10px;">Condiciones de Uso</a>
            <a href="#secciones/datosTecnicos.php" class='navegacionAJAX' title="Un poco sobre c&oacute;mo y qui&eacute;nes hicieron este Sitio Web" style="margin-left:10px;">Datos T&eacute;cnicos</a>
            <a href="#secciones/infoContacto.php" class='navegacionAJAX' style="margin-left:10px;">Informaci&oacute;n de Contacto</a>
            
            <div id="contMapa" style="text-align:justify;"></div>
            
        </div>
        
        <div class="pieFinal"><p>2009. C&oacute;digo Abierto. Libertad y Colaboraci&oacute;n Creativa.</p></div>
	</div>
    
  </div>

<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- AQUÍ EMPIEZA EL MENÚ PRINCIPAL DE NAVEGACIÓN DEL SITIO WEB DEL CLEY -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<div id="contMenu">
<?php for ($incremento=1;$incremento<7;$incremento++){ ?>
<div class='item<?php echo "$incremento" ?>'>
    <div id='izqSup' class='1erGrupoItems'>
        <?php 
		$posicionreal=$incremento;
        include('secciones/menu/indexsup.php'); ?>
    </div>
</div>
<?php } ?>

    </div>
</div>
</div>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- HASTA AQUÍ TERMINA EL MENÚ PRINCIPAL DE NAVEGACIÓN DEL SITIO WEB DEL CLEY --?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>

</div>

<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- AQUÍ EMPIEZAN LAS VENTANAS EMERGENTES DEL SITIO WEB DEL CLEY -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
      <div id="ventanaBusq" class="ventanaEmergente">
        	<?php include("secciones/ventanas/busq.php");?>
        </div>
       
        
        <div id="ventanaCorreo" class="ventanaEmergente">
            <?php include("secciones/ventanas/correo.php"); ?>
    	</div>
        
        <div id="ventanaRss" class="ventanaEmergente">
            <?php include("secciones/ventanas/rss.php"); ?>
    	</div>
        
        <div id="ventanaLogin" class="ventanaEmergente">
          <?php include("smc/login.php"); ?>
		</div>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- HASTA AQUÍ TERMINAN LAS VENTANAS EMERGENTES DEL SITIO WEB DEL CLEY -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
</body>
</html>