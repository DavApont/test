<?php require_once('../connections/cleyEnLinea.php'); ?>
<?php include("../connections/estandares.php"); ?>
<?php include("../connections/limit.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Manejo de Contenido CLEY en l&iacute;nea</title>

<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
<link href="css/reglas-css.css" rel="stylesheet" type="text/css" />
<link href="js/jquery-ui/css/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.listen-min.js" type="text/javascript"></script>
<script src="js/jquery-ui/js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
<script src="js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="js/scripts-smc.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		crearDerechoPalabra();
		crearComparecencia();
		crearRemisionComision();
		textoEnCaja();
		calendario();
		camposDinamicosSesiones();
		camposDinamicosDocs();
		camposDinamicosLeyes();
		cuentaCaracteres();
	});	
	tinyMCE.init({
			mode: "exact",
			elements: "editor1a,editor1b,editor1c,editor1d,editor1e,editor1f",
			theme: "advanced",
			plugins: "xhtmlxtras,paste",
			theme_advanced_buttons1: "cut,copy,paste,pastetext,pasteword,|,undo,redo,|,bold,italic,underline,strikethrough,|,sub,sup,charmap,|,link,unlink,anchor,|,cite,abbr,acronym,del,ins",
			theme_advanced_buttons2: "",
			theme_advanced_buttons3: "",
	})
	tinyMCE.init({
			mode: "exact",
			elements: "editor2a,editor2b",
			theme: "advanced",
			plugins: "xhtmlxtras,paste,style,fullscreen,table,searchreplace",
			theme_advanced_buttons1: "fullscreen,|,cut,copy,paste,pastetext,pasteword,|,undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,sub,sup,charmap",
			theme_advanced_buttons2: "search,replace,|,bullist,numlist,outdent,indent,blockquote,|,tablecontrols,table,row_props,cell_props,delete_col,delete_row, col_after,col_before,row_after,row_before,row_after,row_before,split_cells,merge_cells,|,image",
			theme_advanced_buttons3: "link,unlink,anchor,|,cite,abbr,acronym,del,ins",
	})
	tinyMCE.init({
			mode: "exact",
			elements: "editor3",
			theme: "advanced",
			plugins: "xhtmlxtras,paste,fullscreen,table",
			theme_advanced_buttons1: "fullscreen,|,cut,copy,paste,pastetext,pasteword,|,undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,sub,sup,charmap",
			theme_advanced_buttons2: "bullist,numlist,outdent,indent,blockquote,|,tablecontrols,table,row_props,cell_props,delete_col,delete_row, col_after,col_before,row_after,row_before,row_after,row_before,split_cells,merge_cells",
			theme_advanced_buttons3: "",
	})
</script>

</head>

<body>
<div id="contenedor-pag">
<div id="area-cabecera">
  <div id="datosUsuario"> <img src="img/fotosUsuarios/sin_avatar.png" height="75" width="75" />
    <p id="nombreUsuario"><?php echo $_SESSION['MM_Usernombre']; ?><br /><span><?php echo $_SESSION['MM_Userdepartamento']; ?></span></p>
    <p id="ultConexion">Tu &uacute;ltima conexi&oacute;n fue <?php echo $_SESSION['MM_ultimolog']; ?></p>
    <a href="<?php echo $logoutAction ?>" title="Salir del Sistema de Manejo de Contenidos">Cerrar Sesi&oacute;n</a>
  </div>
</div>
<hr class="divisionCabCuerpo" color="#FF0000" width="794px" />
    
    <div id="area-cuerpo">
    
    	<div id="cuerpo-cont-izq">
        	<?php if (($_SESSION['MM_Usernivel'] == 3) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	  	<a class="btnSmc" id="ingNot" href="index.php?id=2&vinculo=ingnot.php"></a>
            <?php } ?>
            <?php if (($_SESSION['MM_Usernivel'] == 3) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="ediNot" href="#"></a>
            <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 3) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="ingTit" href="index.php?id=2&vinculo=ingtit.php"></a>
            <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 3) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="ediTit" href="#"></a>
	        <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 4) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="carSes" href="index.php?id=2&vinculo=carses.php"></a>
            <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 4) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="carDoc" href="index.php?id=2&vinculo=cardoc.php"></a>
       	    <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 99) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
            <a class="btnSmc" id="remCom" href="index.php?id=2&vinculo=remCom.php"></a>
            <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 8) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="carHist" href="index.php?id=2&vinculo=inghiscley.php"></a>
       	    <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 8) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="carEfem" href="index.php?id=2&vinculo=ingefem.php"></a>
       	    <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 99) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="foro" href="index.php?id=2&vinculo=foro/index.php"></a>
            <?php } ?>
			<?php if (($_SESSION['MM_Usernivel'] == 99) OR ($_SESSION['MM_Usernivel'] == 2)){ ?>
       	    <a class="btnSmc" id="subLey" href="index.php?id=2&vinculo=subirley.php"></a>
            <?php } ?>
            <?php if ($_SESSION['MM_Usernivel'] <> 4){ ?>
            <a class="btnSmc" id="subArc" href="index.php?id=2&vinculo=subirarch.php"></a>
            <?php } ?>
            <?php if ($_SESSION['MM_Usernivel'] <> 4){ ?>
            <a class="btnSmc" id="modPerf" href="#"></a>
            <?php } ?>
        </div>
        
      <div id="cuerpo-cont-ppal">
        <?php
$id=$_GET['id'];
$vinculo=$_GET['vinculo'];
	switch ($id) {
		case 1:
			include("enblanco.php");
		break;
		case 2:
			include("$vinculo");
		break;
		default:
			include("enblanco.php"); 
	}
?>
      </div>
    </div>
    
    <div id="area-pie">
    
    	<p>Sistema de Manejo de Contenidos del Sitio Web del Consejo Legislativo del Estado Yaracuy</p>
    
    </div>
    
</div>

</body>
</html>