<script>

function validar()
{
patron=/^[0-9]*$/;
if (document.form1.cedula.value == "") {
alert ("El Campo Cedula No Puede ir en Blanco.");
}
if (document.form1.nombre.value == "") {
alert ("El Campo Nombre No Puede ir en Blanco.");
}
if (document.form1.telefono.value == "") {
alert ("El Campo Telefono No Puede ir en Blanco.");
}
if (document.form1.marca.value == "") {
alert ("Debe Seleccionar una Marca.");
}
if (document.form1.modelo.value == "") {
alert ("El Campo Modelo No Puede ir en Blanco.");
}
if (document.form1.fecha.value == "") {
alert ("Debe Seleccionar un dia de entrega.");
}
if (document.form1.hora.value == "") {
alert ("Debe Seleccionar una Hora de entrega.");
}

else{ 

        document.form1.submit();   
    }
}  

<!---- parseInt ----->
function caliva(){
document.form1.total.value=parseFloat(document.form1.stotal.value)*parseFloat(document.form1.iva.value);
document.form1.total.value=parseFloat(document.form1.stotal.value)+parseFloat(document.form1.total.value);
}
</script>
<?php 
$fecha1 = date ( "Y-m-j " , strtotime( "$hoy + 1 day"));
$fecha2 = date ( "Y-m-j " , strtotime( "$hoy + 2 day"));
$fecha3 = date ( "Y-m-j " , strtotime( "$hoy + 3 day"));
$fecha4 = date ( "Y-m-j " , strtotime( "$hoy + 4 day"));
$fecha5 = date ( "Y-m-j " , strtotime( "$hoy + 5 day"));
$hora = time () - 3600; 

mysql_select_db($database, $conexion);
$enviar = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $enviar .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

$nfact=mysql_query("SELECT MAX(FACTURA) FROM cliente ORDER BY FACTURA DESC LIMIT 1 ",
  $conexion);

while($row=mysql_fetch_row($nfact)){

$ulnum = $row[0];
$str = ($ulnum + 1);
$serie = str_pad($str,10,"0",STR_PAD_LEFT);
 $nunfact = $serie;
}
	
	$Result1 = mysql_query("INSERT INTO cliente (CI,NOMBRE,TELEFONO,MARCA,MODELO,ESN,SERIAL,CONDICION,ANT,A,B,C,D,E,VARIO,STATUS1,PROBLEMA,OTRO,DESCRIPCIO,TRABAJO,FACTURA,FECHA,HORA,SUB,IVA,TOTAL1) 
VALUES 
('$_POST[cedula]','$_POST[nombre]','$_POST[telefono]','$_POST[marca]','$_POST[modelo]','$_POST[esn]','$_POST[serial]',
'$_POST[condicion]','$_POST[antena]','$_POST[cargador]','$_POST[bateria]','$_POST[chip]','$_POST[cable]','$_POST[carcaza]',
'$_POST[otros]','$_POST[trabajo]','$_POST[problema]','$_POST[otro]','$_POST[descripcion]','$_POST[estado]','$nunfact',
'$_POST[fecha]','$_POST[hora]','$_POST[stotal]','$_POST[iva]','$_POST[total]')", $conexion) or die(mysql_error());

include('connections/sccelular.php');
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT MAX(FACTURA) FROM cliente ORDER BY FACTURA DESC LIMIT 1 ",
  $conexion);

while($row=mysql_fetch_row($result)){
?>
<p class="titulocajitas">Los Datos han sido guardados con exito.</p>
<input type="button" class="titulocajitas" value="IMPRIMIR" onclick="javascript:window.open('secciones/printf.php?fact=<?php echo $row[0]; ?>', 'noimporta', 'width=780, height=465, scrollbars=NO')">
<?php
}
mysql_close($conexion);
 
  }else{
?>
<form action="<?php echo $enviar; ?>" method="POST" name="form1" id="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="12%" class="titulocajitas" scope="row">Cedula</th>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="cedula" type="text" class="negrita" id="cedula" value=""  maxlength="10"/><!-- onKeyPress="FormatoCedula(this);" --->
      </label>    </td>
    <td width="31%" class="titulocajitas"> <b>
    
    </b></td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Nombre</th>
    <td colspan="2" class="titulocajitas">
      <input name="nombre" type="text" class="negrita" id="nombre" />    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Telefono</th>
    <td colspan="2" class="titulocajitas">
      <input type="text" name="telefono" id="telefono"  class="negrita" />    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Marca</th>
    <td colspan="2" class="titulocajitas">
      		        <select name="marca" class="negrita" id="categoria" >
		          <option  value="">- Selecciona una marca -</option>
<?Php
include('connections/sccelular.php');
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT marca FROM modelo ORDER BY marca",
  $conexion);

while($mold=mysql_fetch_row($result)){
?>
  <option value="<?Php echo "$mold[0]"; ?>"><?Php echo "$mold[0]"; ?></option>
<?Php
}
mysql_close($conexion);
?>       
		          </optgroup>
</select>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Modelo</th>
    <td colspan="2" class="titulocajitas">
      <input type="text" name="modelo" id="modelo"  class="negrita"/>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">ESN</th>
    <td colspan="2" class="titulocajitas">
      <input type="text" name="esn" id="esn"  class="negrita"/>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Serial</th>
    <td colspan="2" class="titulocajitas">
      <input type="text" name="serial" id="serial"  class="negrita"/>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Condicion</th>
    <td colspan="2" class="titulocajitas">
      <input type="text" name="condicion" id="condicion"  class="negrita" />    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Incluye</th>
    <td colspan="2" class="titulocajitas">
      <label >Antena
        <input type="checkbox" name="antena" value="*" id="antena" />
      </label>
      <label>Cargador
      <input type="checkbox" name="cargador" value="*" id="cargador" />
      </label>
      <label>Bateria
      <input type="checkbox" name="bateria" value="*" id="bateria" />
      </label>
      <label>Chip
      <input type="checkbox" name="chip" value="*" id="chip" />
      </label>
      <label><br>
        Cable
      <input type="checkbox" name="cable" value="*" id="cable" />
      </label>
      <label>Carcaza
      <input type="checkbox" name="carcaza" value="*" id="carcaza" />
      </label>
      <label>Otros
      <input type="text" name="otros" id="otros" class="negrita"/>
      </label>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Trabajo</th>
    <td colspan="2" class="titulocajitas">
      <label>
<label><input type="radio"  name="estado" value="RE" id="estado_0" checked/>Reparacion</label>
	<label><input  type="radio" name="estado" value="RG" id="estado_1" />Reparacion por Garantia</label>
    <label><input type="radio" name="estado" value="CH" id="estado_2" />Chequeo</label>
	<label><input type="radio" name="estado" value="CA" id="estado_3" />Cambio de carcaza</label>
</td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Problema</th>
    <td colspan="2" class="titulocajitas">
      <label>
      <textarea name="problema" id="problema" cols="70" rows="3"  class="negrita"></textarea>
      </label>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Otro</th>
    <td colspan="2" class="titulocajitas">
      <textarea name="otro" id="otro" cols="70" rows="3"  class="negrita"></textarea>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Descripcion</th>
    <td colspan="2" class="titulocajitas">
      <textarea name="descripcion" id="descripcion" cols="70" rows="3"  class="negrita"></textarea>    </td>
  </tr>
  <tr>
    <th height="137" class="titulocajitas" scope="row">Estado</th>
    <td colspan="2">    
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="39%" rowspan="3" scope="row" class="titulocajitas">
          <div align="left">
<div align="left"><label><input type="radio"  name="trabajo" value="N" id="estado_0" checked/>Por Revisar</label></div>
							<div align="left"><label><input  type="radio" name="trabajo" value="P" id="estado_1" />No se Pudo Reparar</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="T" id="estado_2" />Retirado<br></label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="S" id="estado_3" />Presupuestado</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="R" id="estado_4" />Reparado</label>  </div>
            <div align="left"></div>            </th>
          <td width="7%" class="titulocajitas">Sub-Total </td>
          <td width="29%" class="titulocajitas">
            <label>
            <input name="stotal" type="text" class="negrita" id="stotal" onBlur="caliva()" value="0" size="20"/>
            </label></td>
          <td width="25%" class="titulocajitas">Fecha de Entrega
            <select name="fecha" class="negrita" id="fecha" >
		          <option  value="">- Selecciona una Fecha -</option>
  <option value="<?php echo $fecha1; ?>"><?php echo $fecha1; ?></option>
  <option value="<?php echo $fecha2; ?>"><?php echo $fecha2; ?></option>
  <option value="<?php echo $fecha3; ?>"><?php echo $fecha3; ?></option>
  <option value="<?php echo $fecha4; ?>"><?php echo $fecha4; ?></option>
  <option value="<?php echo $fecha5; ?>"><?php echo $fecha5; ?></option>
		          </optgroup>
</select>
</td>
        </tr>
        <tr>
          <td height="44" class="titulocajitas">I.V.A </td>
          <td class="titulocajitas">
            <label>
<?Php
include('connections/sccelular.php');
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT iva FROM config",
  $conexion);

while($iva=mysql_fetch_row($result)){
?>
  <input name="iva" type="text"  class="negrita" id="iva" value="<?Php echo "$iva[0]"; ?>" size="20" readonly="readonly" />
<?Php
}
mysql_close($conexion);
?> 
            
            </label>          </td>
          <td class="titulocajitas">Hora de Entrega
            <select name="hora" class="negrita" id="hora" >
		          <option  value="">- Selecciona una Hora -</option>
  <option value="10:00 am.">10:00 am.</option>
  <option value="04:00 pm.">04:00 pm.</option>

		          </optgroup>
</select>
</td>
        </tr>
        <tr>
          <td class="titulocajitas">Total</td>
          <td height="34" class="titulocajitas">
            <label>
            <input name="total" type="text"  class="negrita" id="total" size="20" readonly="readonly" />
</label>          </td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
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