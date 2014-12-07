<script>
function validar()
{
patron=/^[0-9]*$/;
if (document.form1.marca.value == "") {
alert ("Debe Introducir una Marca para Agregar a la Lista.");
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
	
	$Result1 = mysql_query("INSERT INTO modelo (marca) 
VALUES 
('$_POST[marca]')", $conexion) or die(mysql_error());

?>
<p class="titulocajitas">Su Marca ha sido guardada con exito.</p>

<?php
  }else{
?>
<form action="<?php echo $enviar; ?>" method="POST" name="form1" id="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="12%" class="titulocajitas" scope="row">Marca</th>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="marca" type="text" class="negrita" id="marca" value="" size="45" maxlength="45"/>
      </label>    </td>
  </tr>
  <tr>
    
  </tr>
</table>
<center>
  <label>
    <input type="hidden" name="MM_insert" value="form1" />
    <input type="button" name="Submit" onClick="validar()" class="negrita" value="::    Guardar    ::">

  </label>
</center>
</form>
<?php
}
?>