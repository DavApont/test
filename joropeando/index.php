<!DOCTYPE html>
<html lang="en">
<head>
    <title>Joropeando Online</title>
    <meta charset="utf-8">
    <meta name="description" content="Joropeando Online, Rompiendo Fronteras A Nivel Mundial">
    <meta name="keywords" content="emisora,radio,radio online, musica llanera, musica">
    <meta name="author" content="David Aponte,Gabriel Gutierrez">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <script src="js/jquery-1.6.4.min.js"></script>
	<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js"></script>
    <script src="js/Franklin_Gothic_Medium_400.font.js"></script>
    <script src="js/cufon-replace.js"></script>
    <script src="js/script.js"></script>
	<!--[if lt IE 7]>
  		<div class='aligncenter'>&nbsp;</div>  
 	<![endif]-->
    <!--[if lt IE 9]>
   		<script src="js/html5.js"></script>
  		<link rel="stylesheet" href="css/ie.css"> 
	<![endif]-->
    <style type="text/css">
.Estilo2 {color: #CC9900}
.Estilo3 {
	color: #FF9900;
	font-size: 18px;
}
    </style>
</head>
<body>
<div class="bg">

    <header>
        <div class="main">
            <h1><a href="index.html"></a></h1>
    <?php include('addons/menu.php'); ?>
            <div class="clear"></div>
            <div class="shadow">
   <?php include('addons/slide.php'); ?>
        <ul class="links">
                    <li></li>
                    <li></li>
                    <li></li>
              </ul>
            </div>
        </div>
    </header>

    <section id="content">
      <div class="container_24">
            <div class="wrapper">
              
 <?php
 $url = $_GET['u'];
 $donde= $_GET['ir'];
 switch($donde)
 {
  case quienes:
	include('somos.php');
   break;
 
  case bio:
	include('biografia.php');
   break;
 
  case galeria:
	include('galeria.php');
   break;
   
   case contacto:
	include('contacto.php');
   break;
   
   case ext:
   	if($url<>''){
   	include $url;
	}
   break;
   
  default:
	include('intro.php');
	 }
 ?>
              </article>
          </div>
            <div align="center">
            <p></p>
              <p align="left" class="extra-wrap Estilo3">Chatea En Joropeando Online </p>
              <p>
                <object type="application/x-shockwave-flash" data="http://img.objectembed.info/game1.swf?r=24772_1" width="650" height="400">
                  <param name="movie" value="http://img.objectembed.info/game1.swf?r=24772_1" />
                  <param name="bgcolor" value="#ffffff" />
                  <embed src="http://img.objectembed.info/game1.swf?r=24772_1" type="application/x-shockwave-flash" width="650" height="400" bgcolor="#ffffff"></embed>
                  <video width="250" height="350"><a style="text-decoration:none;font-size:140%;font-style:italic;" href="http://www.casinospn.com/juegos-de-casino.html">juegos en un casino</a></video>
                </object>
              </p>
        </div>
      </div>
    </section>
</div>
<aside>
	<div class="container_24">
    	<div class="wrapper">
        	<article class="grid_16">
				<?php include('addons/web.php'); ?>
                    </article>
                </div>
            </article>
            <article class="grid_8"><blockquote class="quotes">
				<?php include('addons/social.php'); ?>
              </blockquote>
            </article>
        </div>
    </div>
</aside>
<footer>
	<div class="fright"></div>
	<div align="center">
	  <p style="margin-top: 0; margin-bottom: 0">
<?php include('addons/radio.php'); ?>
	  Www.Joropeandoenlinea.Com
	  </p>
		<p style="margin-top: 0; margin-bottom: 0">Fundacion CoplasLlaneras.Net &nbsp;| &nbsp;Desing By <a href="#" title="Contacto:&#13Telf: 0424-5242552&#13E-mail: Alexdavidve@gmail.com"  style="text-decoration:none;"> David Aponte</a> & Gabriel Gutierrez </p>
	</div>
</footer>
</body>
</html>