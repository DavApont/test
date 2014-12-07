<?php
//Variables usadas para llenar metas...
$og_description = '';
$og_url = '';
$og_image = '';
//datos Curso
$titulo_curso ='Firefox OS';
$lugar_curso = 'Barquisimeto';
$precio_curso = 'Estudiantes 850Bsf.  <br>Profesionales 1450Bsf. ';
$fecha_curso ='6 Dic 2014';
$hora_curso = '08:30 - 17:30 ';

?>
<!DOCTYPE html>
<html>
<head>
	<title>HablemosWeb - <?php echo $titulo_curso; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="description" content="HablemosWeb - <?php echo $titulo_curso; ?>"/>
	<meta name="keywords" content="<?php echo $meta; ?>, hablemosweb" />
	<meta property="og:description" content="<?php echo $og_description; ?>" />
	<meta property="og:title" content="HablemosWeb - <?php echo $titulo_curso; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo $og_url; ?>"/>
	<meta property="og:image" content="<?php echo $og_image; ?>" />
	<meta property="og:site_name" content="HablemosWeb.com" />
	<meta property="og:locale" content="es_ES" />
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@HablemosWeb"/>
	<meta name="twitter:domain" content="HablemosWeb"/>
	<meta name="twitter:creator" content="@HablemosWeb"/>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans|Exo:400,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<link media="screen" type="text/css" rel="stylesheet" href="css/main.css">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div id="contenedor" class="contenedor">
		<div id="menu-flotante" class="hide">
					<div class="logo-mini">
						<a href="http://HablemosWeb.com">
							<img alt="HablemosWeb.Com" src="images/logo-hw.png" height="86px" width="247px">
						</a>
						<p class="lema-mini">Cursos de programacíon y Conferencias para Dessarrolladores y Emprendedores.</p>

					</div>
		</div>
		<div id="header">
			<div class="central">
				<div class="bloque_logo">
					<div class="logo">
						<a href="http://HablemosWeb.com">
							<img alt="HablemosWeb.Com" src="images/logo-hw.png">
						</a>
						<p class="lema">Cursos de programacíon y Conferencias para Dessarrolladores y Emprendedores.</p>

					</div>
				</div>
				<div class="contenedor_social">
					<div class="twitter-shared">
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="hablemosweb.com/conferencia" data-text="#HablemosWeb Conferencia Barquisimeto 2014 Fecha: 06-11 Hora: 2:00p.m. te esperamos" data-via="HablemosWeb" data-hashtags="HablemosWebBqto" data-dnt="true" data-count="vertical">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>
					<div class="facebook-like">
						<div class="fb-like fb_iframe_widget" data-show-faces="false" data-width="80" data-layout="box_count" data-send="false" data-href="https://www.facebook.com/hablemosweb" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&href=https%3A%2F%2Fwww.facebook.com%2Fhablemosweb&layout=button_count&locale=es_LA&sdk=joey&send=false&show_faces=false&width=80">
						</div>
					</div>
					<div class="facebook-share">
						<div class="fb-share-button fb_iframe_widget" data-show-faces="false" data-width="80" data-layout="box_count" data-send="false" data-href="davapont.com.ve/hw-cursos-standar/" data-width="80" fb-xfbml-state="rendered"></div>
					</div>
				</div>
			</div>

		</div>
		<div class="menu color_azul"></div>
		<div class="contenedor_flyer color_blanco">
			<div class="flyer">
				<div class="flyer_image"></div>
			</div>
		</div>
		<div class="datos color_azul">
			<div class="contenedor_datos">
				<div class="calendario"><p> 23/12/2014</p></div>
				<div class="reloj"><p>8:00 a.m</p></div>
				<div class="pagina"><p>Datos del <br>Cruso</p></div>
			</div>
		</div>
		<div class="conte_curso color_blanco">
				<div id="precio-contenedor">
					<div id="precio-titulo">
						<span><?php echo $titulo_curso; ?></span>
					</div>
					<div id="precio-descripcion">
						<seccion><?php echo $lugar_curso; ?><br>
						<?php echo $precio_curso; ?><br>
						<?php echo $fecha_curso; ?><br>
						<?php echo $hora_curso; ?></seccion>
						<a data-scroll-nav='1' class="btn-precio">Inscribete</a>
						
					</div>
				</div>
				<p><span>Contenido Programático</span><br><br>
				Desarrollo de Aplicaciones para Firefox OS:<p>
				<ul class="puntos">
					<li>- Introducción a Firefox OS</li>
					<li>- Introducción a las Open Web Apps y HTML5</li>
					<li>- Entorno de Desarrollo y herramientas a utilizar.</li>
					<li>- Estructura básica de una aplicacion de Firefox OS</li>
					<li>- Elaborando y ejecutando nuestra primera aplicacion !Hola mundo!</li>
					<li>- Introducción a JavaScript</li>
					<li>- Aprendiendo a utilizar las Web APIs.</li>
					<li>- Aprendiendo a utilizar las Web Activities.</li>
					<li>- Aprendiendo a usar Building Firefox OS.</li>
					<li>- Conectarse al servidor desde tu aplicacion</li>
					<li>- Enviando tu aplicacion al Marketplace de Firefox OS
					</ul>
				</div>
				<div class="datos color_azul">
					<div class="contenedor_datos">
						<div class="certificate"><p>Certificado</p></div>
						<div class="donuts"><p>Refrigerio</p></div>
						<div class="networking"><p>Espacio NetWorking</p></div>
						<div class="laptop"><p>Debes traer Laptop</p></div>
					</div>
				</div>
				<div class="instructores color_blanco">
						<p><span>Instructores</span></p>
					</div> 
					<div class="pago_curso color_azul">
					<div class="dinero"></div>
					<p><span>Formas de Pago</span></p>
					<p>Depósito o trasferencia Bancaria a nombre de:<br>
						Graterol & Velásquez Tech Group C.A<br>
						Banco de Venezuela<br>
						Cuenta Corriente: 0102-0690-16-0000014766</p>
				</div>
					<section data-scroll-index='1'>
					<div class="reembolso color_blanco" >
						<p><span>Política de reembolso</span></p>
						<p>En caso de que no puedas asistir a algún curso o taller de hablemosweb.com por causas de fuerza mayor, podrás transferir el crédito a otro curso o taller, para lo cual debes informar que no asistirás escribiendo al correo cursos@hablemosweb.com
Si escribes 5 días antes del comienzo del curso tendrás derecho al 50% del costo del curso.

Si nos contactas el primer día del curso no habrá devolución.

Solo habrá devoluciones en los casos en que desde hablemosweb.com decidamos cancelar un curso o taller por motivos de fuerza mayor.<br></p>
					</div>
				</section>
					<div class="footer"></div>
				</div>
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
				<!-- Include all compiled plugins (below), or include individual files as needed -->
				<script src="js/bootstrap.min.js"></script>
				<script src="js/custom.js"></script>
			</body>
			</html>