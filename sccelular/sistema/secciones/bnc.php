<script>
function validar()
{
patron=/^[0-9]*$/;
if (document.form1.factura.value == "") {
alert ("Debe Introducir un Numero de Factura Para la Busqueda");
}

else{ 

        document.form1.submit();   
    }
}  
</script>
<?php 

mysql_select_db($database, $conexion);
$enviar = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $enviar .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
?>

<table width="500" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="32" class="titulocajitas" ><center>
    <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr></tr>
    <tr>
      <td colspan="7" class="titulocajitas" ><center>
        Consulta Por Factura
      </center></td>
    </tr>
    <tr>
      <td width="87"class="titulocajitas" ><center>
        Factura
      </center></td>
      <td width="98"class="titulocajitas" ><center>
        Cedula
      </center></td>
      <td width="140"class="titulocajitas" ><center>
        Nombre
      </center></td>
      <td width="92"class="titulocajitas" ><center>
        Fecha
      </center></td>
      <td width="49"class="titulocajitas" ><center>
      </center></td>
      <td width="49"class="titulocajitas" ><center>
      </center></td>
      <td width="49"class="titulocajitas" ><center>
      </center></td>
    </tr>
<?Php
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT FACTURA,CI,NOMBRE,FECHA FROM cliente Where Factura = '$_POST[factura]' ", $conexion);

while($consfact=mysql_fetch_row($result)){
?>
    <tr>
      <td width="87"class="titulocajitas" ><center>
        <?Php echo "$consfact[0]"; ?>
      </center></td>
      <td width="98"class="titulocajitas" ><center>
        <?Php echo "$consfact[1]"; ?>
      </center></td>
      <td width="140"class="titulocajitas" ><center>
        <?Php echo "$consfact[2]"; ?>
      </center></td>
      <td width="92"class="titulocajitas" ><center>
        <?Php echo "$consfact[3]"; ?>
      </center></td>
      <td width="20"class="titulocajitas" ><center>
        <a href="?go=modificar&amp;factura=<?Php echo "$consfact[0]"; ?>"><img class="titulocajitas" border="0" src="../sistema/images/edit.png" alt="editar" width="16" height="16" /></a>
      </center></td>
      <td width="20"class="titulocajitas" ><center>
        <a href="?go=consultar&amp;factura=<?Php echo "$consfact[0]"; ?>"><img class="titulocajitas" border="0" src="../sistema/images/seek.png" alt="editar" width="16" height="16" /></a>
      </center></td>
      <td width="20"class="titulocajitas" ><center>
        <a href="#" onclick="javascript:window.open('secciones/printf.php?fact=<?Php echo "$consfact[0]"; ?>', 'noimporta', 'width=780, height=465, scrollbars=NO')"><img class="titulocajitas" src="../sistema/images/printer.png" border="0" alt="editar" width="16" height="16" /></a>
      </center></td>
    </tr>

<?Php
}
mysql_close($conexion);
?>
    <tr>
      <td colspan="7">&nbsp;</td>
    </tr>
    </table>
  </center></td>
</tr>
</table>

<?php


  }else{
?>

   <form action="<?php echo $enviar; ?>" method="POST" name="form1" id="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="12%" class="titulocajitas" scope="row">Factura</th>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="factura" type="text" class="negrita" id="factura" value="" size="45" maxlength="45"/>
      </label>    </td>
  </tr>
  <tr>
    
  </tr>
</table>
<center>
  <label>
    <input type="hidden" name="MM_insert" value="form1" />
    <input type="button" name="Submit" onClick="validar()" class="negrita" value="::    Buscar    ::">
  </label>
</center>
</form>
<?php
}
?>