<?php include("config.php"); ?>
<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sistema de Inventario. V.1.0.</title>
<meta http-equiv="Cache-Control" content="no-store">
<link rel="shortcut icon" href="icon.ico" />

<script language="JavaScript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/ui/jquery.ui.datepicker.js"></script>
<link type="text/css" rel="stylesheet" href="css/stylesheet.css">
<link type="text/css" href="../css/custom-theme/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body class="windowParameters">
<?php /*                    
<table id="test1" class="bbHeader" cellspacing="0" cellpadding="0" border="0" background="imags/es/bannerBack.gif" width="100%">
 <tr>
<td>&nbsp;</td><td width="100%">&nbsp;</td><td>&nbsp;</td>
</tr>
</table>
*/?>
<table background="imgs/breadCrumb_25.jpg" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td><img alt="" height="25" src="imgs/breadCrumb_L.jpg" width="4"></td><td valign="bottom" width="100%">&nbsp;</td><td><img alt="" height="25" src="imgs/breadCrumb_R.jpg"></td>
</tr>
</table>
<table cellpadding="4" cellspacing="0" border="0" align="center" width="400">
<tr valign="top">
<td width="100%">
<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td>
<table class="sectionTitle" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td><img alt="" src="imgs/frame_Menu_TL1.jpg"></td>
<td width="100%"><?php echo $titulo_caj ?></td>
<td><img alt="" src="imgs/frame_Menu_TR1.jpg"></td>
</tr>
</table>

</td>
</tr>
<tr>
<td>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td background="imgs/frame_content_TL2.jpg" valign="top"><img alt="" src="imgs/frame_content_TL2.jpg"></td><td background="imgs/frame_content_TM2.jpg" width="100%"><img src="imgs/frame_content_TM2.jpg" alt=""></td><td background="imgs/frame_content_TR2.jpg" valign="top"><img alt="" src="imgs/frame_content_TR2.jpg"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
    <td background="imgs/frame_Menu_MLWhite.jpg"><img alt="" src="imgs/frame_Menu_MLWhite.jpg"></td>
    <td width="100%" align="center"><p>
    <?php
/* Sistema de Inventario Para S&C Celular V 1.0*/
 
$i = $_GET["ir"];
$ancla = $_GET['url'];
if(file_exists($ancla)){
	switch ($i) {
		case link:
		   include "$ancla";
			break;
		default:
			include 'login.php';
		break;
	}
}else{
	include 'error.php';
}

/* Fin Include*/
?>

</p>
      <p><?php if($_SESSION['permiso']=='10'){
		  ?> 
		   <a href="?ir=link&url=panel_admin.php" class="textLinks_noUnderline">Panel Administrador</a>
		   <?php } ?></p>
           <p><?php if($_SESSION['nombre']<>''){
		  ?> 
		   <a href="?log=off" class="textLinks_noUnderline">Cerrar Cuenta</a>
		   <?php } ?></p></td>
    <td background="imgs/frame_Menu_MRWhite.jpg"><img alt="" src="imgs/frame_Menu_MRWhite.jpg"></td>
  </tr>
</table>

</td>
</tr>
<tr>

<td>
<table bgcolor="#FFFFFF" background="imgs/frame_BM.jpg" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td><img alt="" src="imgs/frame_BL.jpg"></td><td width="100%"><img src="imgs/frame_BM.jpg" alt=""></td><td><img alt="" src="imgs/frame_BR.jpg"></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>

<p class="normalText" align="center">Copyright 2006-2010 DIMAT Sistema De Invetario.<br>
Todos los derechos reservados.</p>
</body>
</html>
