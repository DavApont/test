<?php require_once('connections/sccelular.php'); ?>
<?php include("connections/estandares.php"); ?>
<html>
<head>
<meta http-equiv="Content-Language" content="es">
<title>Sistema S&C Celular v 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="theme/style.css" type="text/css">
<style type="text/css">
<!--
.Estilo1 {color: #666666}
-->
</style>
<script type="text/javascript" src="js/scripts.js"></script>

     <style>
	@import url(example.css);
     </style>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<div align="center">
  <table width="758" border="0" cellspacing="0" cellpadding="0">
    <tr> 
	  <td valign="top">           
        <table width="758" border="0" cellspacing="0" height="1" cellpadding="0">
          <tr> 
            <td height="1" align="right"> 
                    <tr> 
	  <td valign="top">&nbsp;<table width="748" border="0" cellspacing="0" height="50" cellpadding="0">
      <tr>
        <td colspan="2" align="right" height="5"></td>
      </tr>
      <tr> 
        <td width="29" align="right"></td>
        <td width="719" align="left">
		<p align="center">
		<a href="?go="><img border="0" src="images/Logo.jpg" width="616" height="148" border="0"></a></p><p align="right" class="texto"> <script>
   nombres_dias = new Array("San Felipe, Domingo", "San Felipe, Lunes", "San Felipe, Martes", "San Felipe, Mi&eacute;rcoles", "San Felipe, Jueves", "San Felipe, Viernes", "San Felipe, S&aacute;bado")
   nombres_meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre")
   fecha_actual = new Date()
   dia_mes = fecha_actual.getDate()		//dia del mes
   strdia_mes = (dia_mes <= 9) ? "0" + dia_mes : dia_mes
   dia_semana = fecha_actual.getDay()		//dia de la semana
   mes = fecha_actual.getMonth() + 1
   strmes = (mes <= 9) ? "0" + mes : mes
   anio = fecha_actual.getYear()
   if (anio < 100) anio = "19" + anio			//pasa el a&ntilde;o a 4 digitos
   else if ( ( anio > 100 ) && ( anio < 999 ) ) {	//efecto 2000
      var cadena_anio = new String(anio)
      anio = "20" + cadena_anio.substring(1,3)
   }
document.write(nombres_dias[dia_semana] + "  " + dia_mes + " de " + nombres_meses[mes - 1] + " de " + anio)

//--></script>
</p></td>
      </tr>
      <tr valign="top"> 
        <td colspan="2"> 
          <table width="748" border="0" cellspacing="0" cellpadding="0" height="13">
            <tr> 
              <td height="13" align="center" valign="top" width="600"> 
				</td>
              <td valign="bottom" height="13" class="texto" width="200" align="right"> 
                       </td>
            </tr>
          </table>        </td>
      </tr>
      <tr> 
        <td width="29" align="right" height="1"></td>
        <td align="right" bgcolor="#999999" height="1"></td>
      </tr>
      <tr> 
        <td width="29" align="right"></td>
        <td align="right" height="25">&nbsp;</td>
      </tr>
    </table>
  </td>
    </tr>
	

            </td>
          </tr>
        </table>
  	  </td>
    </tr>
    <tr> 
      <td> 
        <table width="751" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="19" valign="top">&nbsp;</td>
            <td width="149" valign="top">
<link href="theme/style.css" rel="stylesheet" type="text/css" />


<table width="149" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="149" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#666666" width="1" rowspan="24"></td>
        <td width="7" bgcolor="#666666"></td>
        <td width="140" height="1" bgcolor="#666666"></td>
        <td width="1" bgcolor="#666666" rowspan="24"></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td width="7" valign="middle" bgcolor="#E9E9E9" class="titulocajitas"></td>
        <td width="140" height="20" valign="middle" bgcolor="#E9E9E9" class="titulocajitas">
		Ingresar </td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666" class="texto"></td>
        <td width="140" height="1" bgcolor="#666666" class="texto"></td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" height="15" valign="middle" class="b"><a href="?go=ingresar">Nuevo</a></td>
      </tr>


 
      <tr bgcolor="#666666">
        <td width="7"></td>
        <td width="140" height="1"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td  height="10"></td>
  </tr>
  <tr>
    <td><table width="149" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#666666" width="1" rowspan="7"></td>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
        <td width="1" bgcolor="#666666" rowspan="7"></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td width="7" valign="middle" bgcolor="#E9E9E9" class="titulocajitas"></td>
        <td class="titulocajitas" bgcolor="#E9E9E9" width="140" valign="middle" height="20">Consultar</td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666" class="texto"></td>
        <td class="texto" height="1" bgcolor="#666666" width="140"></td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" class="b" height="15" valign="middle"><a href="?go=consultaced">Cedula</a></td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" class="b" height="15" valign="middle"><a href="?go=consultafact">Factura</a></td>
      </tr>
            <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" class="b" height="15" valign="middle"><a href="?go=consultanomb">Nombre</a></td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td  height="10"></td>
  </tr>
  <tr>
    <td><table width="149" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#666666" width="1" rowspan="8"></td>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
        <td width="1" bgcolor="#666666" rowspan="8"></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td width="7" valign="middle" bgcolor="#E9E9E9" class="titulocajitas"></td>
        <td class="titulocajitas" bgcolor="#E9E9E9" width="140" valign="middle" height="20">Marca</td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666" class="texto"></td>
        <td class="texto" height="1" bgcolor="#666666" width="140"></td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" class="b" height="15" valign="middle"><p><a href="?go=savetemarca">Nuevo</a></p></td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td class="b" width="140" height="15" valign="middle"><a href="?go=reportemarca">Reporte</a></td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td  height="10"></td>
  </tr>
  <tr>
    <td><table width="149" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#666666" width="1" rowspan="21"></td>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
        <td width="1" bgcolor="#666666" rowspan="21"></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td width="7" valign="middle" bgcolor="#E9E9E9" class="titulocajitas"></td>
        <td class="titulocajitas" bgcolor="#E9E9E9" width="140" height="20" valign="middle">Configuracion</td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666" class="texto"></td>
        <td class="texto" height="1" bgcolor="#666666" width="140"></td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" height="15" valign="middle" class="b"><a href="?go=cpanel">Panel Administrador</a></td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td  height="10"></td>
  </tr>
  <tr>
    <td><!-----
    <table width="149" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#666666" width="1" rowspan="6"></td>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
        <td width="1" bgcolor="#666666" rowspan="6"></td>
      </tr>
      <tr bgcolor="#CCCCCC">

 <td width="7" valign="middle" bgcolor="#E9E9E9" class="titulocajitas"></td>
        <td class="titulocajitas" bgcolor="#E9E9E9" width="140" valign="middle" height="20">
		Categoría </td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666" class="texto"></td>
        <td class="texto" height="1" bgcolor="#666666" width="140"></td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" height="15" valign="middle" class="b">Link</td>
      </tr>
      <tr>
        <td width="7" valign="middle" class="b"></td>
        <td width="140" height="15" valign="middle" class="b">Link</td>
      </tr>
      <tr>
        <td width="7" bgcolor="#666666"></td>
        <td height="1" bgcolor="#666666" width="140"></td>
      </tr>

    </table>
     -------></td>
  </tr>


</table></td> 
            <td width="20"></td>
            <td colspan="5" valign="top">
          
<?php
$go = $_GET['go'];
switch ($go) {
    case ingresar:
        include("secciones/gdatos.php");
        break;
    case modificar:
        include("secciones/mdatos.php");
        break;
    case consultar:
        include("secciones/cdatos.php"); 
        break;
    case savetemarca:
        include("secciones/gmarca.php"); 
        break;
    case reportemarca:
        include("secciones/repmarcas.php"); 
        break;
    case consultaced:
        include("secciones/bci.php"); 
        break;
    case consultanomb:
        include("secciones/bnom.php"); 
        break;
    case consultafact:
        include("secciones/bnc.php"); 
        break;
    case consulta:
        include("secciones/cdatos.php"); 
        break;
    case cpanel:
        include("secciones/admin.php"); 
        break;
    default:
        include("secciones/sistem.php"); 
}
?>
          

          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td width="191" align="center">&nbsp;</td>
            <td width="20" align="center">&nbsp;</td>
            <td width="202" align="center">&nbsp;</td>
            <td width="20" align="center">&nbsp;</td>
            <td width="130">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td colspan="5" align="center" class="b">Todos Los Derechos Reservados 2009<br>
              Desing By David Aponte Telf: 0424-5242552</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
        </table>

	  
	  
	  </td>
    </tr>
  </table> 
</div>

</body>
</html>
