<?php include("encuesta/acceso_DB.php"); ?>
<?php include("config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $titulo ?></title>
<META NAME="author" CONTENT="David Aponte">
<META NAME="subject" CONTENT="Llano , Folklore , musica , descarga , leyendas , discografica , chat , radio , galeria ">
<META NAME="Description" CONTENT="Es un portal 100% Llanero que apoya al talento regional, nacional e internacional. Somos pioneros en ofrecer al público llanero Colombo-Venezolano la más completa información de todo el acontecer llanero.">
<META NAME="Keywords" CONTENT="musica , mp3, llano, venezuela , yaracuy, discografia, artistas, leyendas, radio, chat">
<META NAME="Geography" CONTENT="Venezuela">
<META NAME="Language" CONTENT="Spanish">
<META HTTP-EQUIV="Expires" CONTENT="never">
<META NAME="Copyright" CONTENT="Funda Coplas">
<META NAME="Designer" CONTENT="David Aponte">
<META NAME="Publisher" CONTENT="David Aponte">
<META NAME="Revisit-After" CONTENT="7 days">
<META NAME="distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="INDEX,FOLLOW">
<META NAME="city" CONTENT="San Felipe">
<META NAME="country" CONTENT="Yaracuy">
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link href="css/light.css" rel="stylesheet" type="text/css" />
<link href="css/menustyle3-light.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.wibiya.com/Toolbars/dir_0599/Toolbar_599995/Loader_599995.js" type="text/javascript"></script>
<style type="text/css">
	div.wrapper { margin: 0 auto; width: 962px;padding:0;}
	    #maincol {float: left; margin-right: -250px; width: 100%;}
    #maincol-container {margin-right:230px;}
    #sidecol {float: right; width: 250px;}
    </style>	

</head>

	<body id="ff-optima" class="f-default light">
		
	

		<div class="wrapper">

			<div id="top">
			  <div id="mod-search">
			  <div class="moduletable">

					<form action="?link=url&go=google.php" method="post">
	<div class="search">
		<input name="searchword" id="mod_search_searchword" maxlength="20" alt="Buscar" class="inputbox" type="text" size="20" value="Buscar..."  onblur="if(this.value=='') this.value='Buscar...';" onfocus="if(this.value=='Buscar...') this.value='';" />	</div>
	<input type="hidden" name="task"   value="search" />
	<input type="hidden" name="option" value="com_search" />
</form>		</div>
	
			  </div>
												<div id="accessibility">


				</div>
					
		  </div>


			<div id="mainbody-top">
				<div id="mainbody-top2">
					<div id="mainbody-top3">
					</div>
				</div>
			</div>
			<div id="mainbody">

				<div id="header"><a href="?" class="nounder"><img src="images/blank.gif" alt="" width="1" height="1" border="0" id="logo" /></a></div>

			<div id="pathway" align="center">
			  <?php include("menu.php"); ?>
			</div>			  
			<div id="mainbody-padding">


					<div id="maincol">
					    <div id="maincol-container">
					      <div id="body-padding">
						      <table class="blog" cellpadding="0" cellspacing="0">
<tr>
	<td valign="top">
					
<div>  <table class="contentpaneopen">    <tr>      <td valign="top" colspan="2">
		<p class="MsoNormal" style="text-align: center">
		<?php
$pag = $_GET['go'];
$link = $_GET['link'];
 switch ($link) {
    case joropo:
        	include 'joropo.php';
        break;
    case instrumentos:
        	include 'instrumento.htm';
        break;
    case biografia:
		include 'biografia.htm';
        break;
    case descargas:
		include 'descarga.htm';
        break;
    case leyendas:
		include 'leyendas.htm';
        break;
    case chatradio:
		include 'radio.htm';
        break;
    case galeria:
		include 'galeria.htm';
        break;
    case contacto:
		include 'contacto.htm';
        break;	
	case estados:
		include 'estados.htm';
        break;	
    case url:
		include $pag;
        break;		
	default:
       	include 'intro.php';

}
?> </p>
		</td>    </tr>  </table>  <span class="article_separator">&nbsp;</span> </div>


		</td>
</tr>


</table>

						  </div>
   						  <div id="mainmodules" class="spacer w49"></div>
					    </div>

					</div>

											<div id="sidecol">
							<div id="sidecol-padding">
							  <div class="module-style1-color1">
		  <div>
				<div>
				  <div>
			      <h3><?php echo $titulo_caj_dere ?> </h3>
<?php include 'caja_dere.php'; ?>
				  </div>

				</div>
			</div>
		</div>
		  <div>
				<div>
				  <div>
			      <h3><?php echo $titulo_caj_med; ?> </h3>
<?php include 'caja_dere_med.php'; ?>
				  </div>

				</div>
			
		</div>
								<div class="module">
									<div>
										<div>
											<div>

													
			  </div></td>
														</tr>
	</table>
													

												</div></div></div></div> 
								<div class="module-style2">
									<div>
										<div>
											<div>
												<h3><?php echo $titulo_caj_dere_abj; ?></h3>
                                                <?php include 'caja_dere_abj.php'; ?>
											</div></div></div></div>
								</div>
						</div>

										
				<div class="clr">
				  <div align="center"></div>
				</div>
				    <div align="center"></div>
				</div>
</div>

							<div id="bottom">
					<div id="bottommodules" class="spacer w99">
																							<div class="block">

									<div class="module-color2">
			<div>
				<div>
					<div></div>
				</div>

			</div>
		</div>
			<div class="module-color2">
			<div>
				<div>
					<div><span class="moduletable"> 
					<center>
					   <p>CoplasLlaneras.Com.Ve Copyright &copy;2005	- Design by <a href="#" title="Contacto:&#13Telf: 0424-5242552&#13E-mail: Alexdavidve@gmail.com"> David Aponte</a></p>
					   <p>Fundacion CoplasLlaneras.Net</p>
					</center>
					</span></div>

				</div>
			</div>
		</div>
			<div class="module">
			<div>
				<div>
					<div></div>

				</div>
			</div>
		</div>
	
						</div>
							  </div>
				</div>
						<div id="mainbody-bottom">
				<div id="mainbody-bottom2">
					<div id="mainbody-bottom3">

					</div>
				</div>
			</div>
			
							<div align="center">
				<div id="footer">
							<div class="moduletable"></div>

	
				</div>
				</div>
	</div>
		
</body>
</html>