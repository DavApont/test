<style>
<!--
.aviso {
	font-family: Arial;
	color:#F00;
	font-style: inherit;
	font-size: 30px;
	position:absolute;
	top:50%;
	left:60%;
	width: 456px;
	height: 45px;
}
</style>
<?Php
$fact = $_GET[factura];
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT CI,NOMBRE,TELEFONO,MARCA,MODELO,ESN,SERIAL,CONDICION,ANT,A,B,C,D,E,VARIO,STATUS1,
PROBLEMA,OTRO,DESCRIPCIO,TRABAJO,SUB,IVA,TOTAL1,FECHA,HORA,FACTURA FROM cliente Where FACTURA='$fact'", $conexion);

while($scc=mysql_fetch_row($result)){

?>
<div class="aviso" >
  <?php
$trabajo = $scc[15];

		if ($trabajo == 'N') { 
echo "Por Revisar";
				}else{
		if ($trabajo == 'P') { 
echo "No se Pudo Reparar";
				}else{
		if ($trabajo == 'T') { 
echo "Retirado";
				}else{
		if ($trabajo =='S'){
echo "Presupuestado";
				}else {
		if ($trabajo =='R'){
echo "Reparado";
				}else {

							echo "";
					
				} 
			} 
		} 
	} 
}
?>
</div>
<form action="<?php echo $enviar; ?>" method="POST" name="form1" id="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="12%" class="titulocajitas" scope="row">Cedula</th>
    <td width="57%" class="titulocajitas">
      <label>
      <input name="cedula" type="text" class="negrita" id="cedula" dir="rtl" value="<?Php echo "$scc[0]"; ?>"  maxlength="10" readonly="readonly"/>
    </label>    </td>
    <td width="31%" class="titulocajitas">N&deg; Factura : <b><input name="factura" type="text" class="negrita" id="factura" dir="rtl" value="<?Php echo "$scc[25]"; ?>"  maxlength="10" readonly="readonly"/></b></td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Nombre</th>
    <td colspan="2" class="titulocajitas">
      <input name="nombre" type="text" class="negrita" id="nombre" value="<?Php echo "$scc[1]"; ?>" readonly="readonly" />    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Telefono</th>
    <td colspan="2" class="titulocajitas">
      <input name="telefono" type="text" class="negrita" id="telefono" value="<?Php echo "$scc[2]"; ?>" readonly="readonly" />    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Marca</th>
    <td colspan="2" class="titulocajitas">
<input name="marca" type="text" class="negrita" id="marca" value="<?Php echo "$scc[3]"; ?>" readonly="readonly" />
   </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Modelo</th>
    <td colspan="2" class="titulocajitas">
      <input name="modelo" type="text" class="negrita" id="modelo" value="<?Php echo "$scc[4]"; ?>" readonly="readonly"/>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">ESN</th>
    <td colspan="2" class="titulocajitas">
      <input name="esn" type="text" class="negrita" id="esn" value="<?Php echo "$scc[5]"; ?>" readonly="readonly"/>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Serial</th>
    <td colspan="2" class="titulocajitas">
      <input name="serial" type="text" class="negrita" id="serial" value="<?Php echo "$scc[6]"; ?>" readonly="readonly"/>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Condicion</th>
    <td colspan="2" class="titulocajitas">
      <input name="condicion" type="text" class="negrita" id="condicion" value="<?Php echo "$scc[7]"; ?>" readonly="readonly" />    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Incluye</th>
    <td colspan="2" class="titulocajitas">
    <?php 
	$antena = $scc[8];
		if ($antena <> ''){
		?>
      <label >Antena<input type="checkbox" name="antena" value="*" id="antena" checked="checked"/></label>
 <?php }else{ ?>
      <label >Antena<input type="checkbox" name="antena" value="*" id="antena" /></label> 
 <?php }?>
 
     <?php 
	$cargador = $scc[9];
		if ($cargador <> ''){
		?>
      <label>Cargador<input type="checkbox" name="cargador" value="*" id="cargador" checked="checked"/></label>
 <?php }else{ ?>
      <label>Cargador
      <input type="checkbox" name="cargador" value="*" id="cargador" /></label> 
 <?php }?>
 
     <?php 
	$bateria = $scc[10];
		if ($bateria <> ''){
		?>
      <label>Bateria<input type="checkbox" name="bateria" value="*" id="bateria" checked="checked"/></label>
 <?php }else{ ?>
      <label>Bateria<input type="checkbox" name="bateria" value="*" id="bateria" /></label> 
 <?php }?>
 
     <?php 
	$chip = $scc[11];
		if ($chip <> ''){
		?>
      <label>Chip<input type="checkbox" name="chip" value="*" id="chip" checked="checked"/></label><br>
 <?php }else{ ?>
      <label>Chip<input type="checkbox" name="chip" value="*" id="chip" /></label><br> 
 <?php }?>
 
     <?php 
	$cable = $scc[12];
		if ($cable <> ''){
		?>
      <label>Cable<input type="checkbox" name="cable" value="*" id="cable" checked="checked"/></label>
 <?php }else{ ?>
      <label>Cable<input type="checkbox" name="cable" value="*" id="cable" /></label> 
 <?php }?>
 
     <?php 
	$carcaza = $scc[13];
		if ($carcaza <> ''){
		?>
      <label>Carcaza<input type="checkbox" name="carcaza" value="*" id="carcaza" checked="checked"/></label>
 <?php }else{ ?>
      <label>Carcaza<input type="checkbox" name="carcaza" value="*" id="carcaza" /></label> 
 <?php }?>

      <label>Otros<input name="otros" type="text" class="negrita" id="otros" value="<?Php echo "$scc[14]"; ?>" readonly="readonly"/></label></td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Trabajo</th>
    <td colspan="2" class="titulocajitas">

<?php
$estado = $scc[19];

		if ($estado == 'RE') { 
										?>
<label><input type="radio"  name="estado" value="RE" id="estado_0" checked/>Reparacion</label>
	<label><input  type="radio" name="estado" value="RG" id="estado_1" />Reparacion por Garantia</label>
    <label><input type="radio" name="estado" value="CH" id="estado_2" />Chequeo</label>
	<label><input type="radio" name="estado" value="CA" id="estado_3" />Cambio de carcaza</label>
      
     

							<?php
				}else{
		if ($estado == 'RG') { 
																?>
	<label><input type="radio"  name="estado" value="RE" id="estado_0" />Reparacion</label>
	<label><input  type="radio" name="estado" value="RG" id="estado_1" checked/>Reparacion por Garantia</label>
    <label><input type="radio" name="estado" value="CH" id="estado_2" />Chequeo</label>
	<label><input type="radio" name="estado" value="CA" id="estado_3" />Cambio de carcaza</label>
       
   
   
							<?php
				}else{
		if ($estado == 'CH') { 
																?>
	<label><input type="radio"  name="estado" value="RE" id="estado_0" />Reparacion</label>
	<label><input  type="radio" name="estado" value="RG" id="estado_1" />Reparacion por Garantia<br /></label>
    <label><input type="radio" name="estado" value="CH" id="estado_2" checked/>Chequeo<br></label>
	<label><input type="radio" name="estado" value="CA" id="estado_3" />Cambio de carcaza<br /></label>
     

							<?php
				}else{
		if ($estado =='CA'){
														?>							
	<label><input type="radio"  name="estado" value="RE" id="estado_0" />Reparacion</label>
	<label><input  type="radio" name="estado" value="RG" id="estado_1" />Reparacion por Garantia<br /></label>
    <label><input type="radio" name="estado" value="CH" id="estado_2" />Chequeo<br></label>
	<label><input type="radio" name="estado" value="CA" id="estado_3" checked/>Cambio de carcaza<br /></label>


							<?php
				}else{
							echo "No tiene ninguno";
					} 
				} 
			} 
		} 
	 
?>         
    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Problema</th>
    <td colspan="2" class="titulocajitas">
      <label>
      <textarea name="problema" cols="70" rows="3" readonly="readonly"  class="negrita" id="problema"><?Php echo "$scc[16]"; ?></textarea>
      </label>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Otro</th>
    <td colspan="2" class="titulocajitas">
    <textarea name="otro" cols="70" rows="3" readonly="readonly" class="negrita" id="otro"><?Php echo "$scc[17]"; ?></textarea>    </td>
  </tr>
  <tr>
    <th class="titulocajitas" scope="row">Descripcion</th>
    <td colspan="2" class="titulocajitas">
    <textarea name="descripcion" cols="70" rows="3" readonly="readonly" class="negrita" id="descripcion"><?Php echo "$scc[18]"; ?></textarea>    </td>
  </tr>
  <tr>
    <th height="137" class="titulocajitas" scope="row">Estado</th>
    <td colspan="2">    
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="38%" rowspan="3" scope="row" class="titulocajitas">
<?php
$trabajo = $scc[15];

		if ($trabajo == 'N') { 
										?>
                            				<div align="left"><label><input type="radio"  name="trabajo" value="N" id="estado_0" checked/>Por Revisar</label></div>
							<div align="left"><label><input  type="radio" name="trabajo" value="P" id="estado_1" />No se Pudo Reparar</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="T" id="estado_2" />Retirado<br></label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="S" id="estado_3" />Presupuestado</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="R" id="estado_4" />Reparado</label>  </div>
							<?php
				}else{
		if ($trabajo == 'P') { 
																?>
                            				<div align="left"><label><input type="radio"  name="trabajo" value="N" id="estado_0" />Por Revisar</label></div>
							<div align="left"><label><input  type="radio" name="trabajo" value="P" id="estado_1" checked/>No se Pudo Reparar</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="T" id="estado_2" />Retirado<br></label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="S" id="estado_3" />Presupuestado</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="R" id="estado_4" />Reparado</label>     </div>
							<?php
				}else{
		if ($trabajo == 'T') { 
																			?>
                            				<div align="left"><label><input type="radio"  name="trabajo" value="N" id="estado_0" />Por Revisar</label></div>
							<div align="left"><label><input  type="radio" name="trabajo" value="P" id="estado_1" />No se Pudo Reparar</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="T" id="estado_2" checked/>Retirado<br></label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="S" id="estado_3" />Presupuestado</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="R" id="estado_4" />Reparado</label>  </div>
							<?php
				}else{
		if ($trabajo =='S'){
																							?>
                            				<div align="left"><label><input type="radio"  name="trabajo" value="N" id="estado_0" />Por Revisar</label></div>
							<div align="left"><label><input  type="radio" name="trabajo" value="P" id="estado_1" />No se Pudo Reparar</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="T" id="estado_2" />Retirado<br></label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="S" id="estado_3" checked/>Presupuestado</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="R" id="estado_4" />Reparado</label>      </div>
							<?php
				}else {
		if ($trabajo =='R'){
																										?>
                            				<div align="left"><label><input type="radio"  name="trabajo" value="N" id="estado_0" />Por Revisar</label></div>
							<div align="left"><label><input  type="radio" name="trabajo" value="P" id="estado_1" />No se Pudo Reparar</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="T" id="estado_2" />Retirado<br></label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="S" id="estado_3" />Presupuestado</label></div>
							<div align="left"><label><input type="radio" name="trabajo" value="R" id="estado_4" checked/>Reparado</label>    </div>
							<?php
				}else{
							echo "Error Critico...";
					} 
				} 
			} 
		} 
	} 
?> </th>
          <td width="8%" class="titulocajitas">Sub-Total </td>
          <td width="29%" class="titulocajitas">
            <label>
            <input name="stotal" type="text" class="negrita" id="stotal" onBlur="caliva()" value="<?Php echo "$scc[22]"; ?>" readonly="readonly"/>
          </label>          </td>
          <td width="25%" class="titulocajitas">Fecha 
            <input name="fecha" type="text" class="negrita" id="fecha" value="<?Php echo "$scc[23]"; ?>" readonly="readonly"/></td>
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
  <input name="iva" type="text"  class="negrita" id="iva" value="<?Php echo "$iva[0]"; ?>" readonly="readonly" />
<?Php
}
?>           </label>          </td>
          <td class="titulocajitas">Hora 
            <input name="hora" type="text" class="negrita" id="hora" value="<?Php echo "$scc[24]"; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
          <td class="titulocajitas">Total</td>
          <td height="34" class="titulocajitas"><label>
            <input name="total" type="text" class="negrita" id="total" value="<?Php echo "$scc[22]"; ?>" readonly="readonly" />
          </label></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><center>
<input type="button" value="IMPRIMIR" class="titulocajitas" onclick="javascript:window.open('secciones/printf.php?fact=<?Php echo "$scc[25]"; ?>', 'noimporta', 'width=780, heigt=465, scrollbars=NO')"></center>
<?Php
}
mysql_close($conexion);
?>   