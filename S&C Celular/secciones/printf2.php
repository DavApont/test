<?php require_once('../connections/sccelular.php'); ?>
<?php include("../connections/estandares.php"); ?>
<style type="text/css">
<!--
.empresa {
	font-family: "Courier New";
	font-size: 14px;
	position:absolute;
	top:25px;
	left:10px;
	width: 741px;
}

.telefono {
	font-family: "Courier New";
	position:absolute;
	top:43px;
	left:83px;
	font-size: 14px;
	width: 141px;
}

.rif {
	font-family: "Courier New";
	position:absolute;
	top:60px;
	left:50px;
	font-size: 14px;
	width: 174px;
}

.nit {
	font-family: "Courier New";
	position:absolute;
	top:43px;
	left:496px;
	font-size: 14px;
	width: 255px;
}

.fechayhorai {
	font-family: "Courier New";
	position:absolute;
	top:61px;
	left:496px;
	font-size: 14px;
	width: 256px;
}

.nfactura {
	font-family: "Courier New";
	position:absolute;
	top:79px;
	left:92px;
	font-size: 18px;
	width: 132px;
}

.ccedula {
	font-family: "Courier New";
	position:absolute;
	top:118px;
	left:80px;
	font-size: 14px;
	width: 127px;
}

.cnombre {
	font-family: "Courier New";
	position:absolute;
	top:118px;
	left:265px;
	font-size: 14px;
	width: 214px;
}

.ctelefono {
	font-family: "Courier New";
	position:absolute;
	top:118px;
	left:567px;
	font-size: 14px;
	width: 189px;
}

.marca {
	font-family: "Courier New";
	position:absolute;
	top:156px;
	left:81px;
	font-size: 14px;
	width: 138px;
}

.esn {
	font-family: "Courier New";
	position:absolute;
	top:174px;
	left:81px;
	font-size: 14px;
	width: 138px;
}

.modelo {
	font-family: "Courier New";
	position:absolute;
	top:192px;
	left:81px;
	font-size: 14px;
	width: 138px;
}

.condicion {
	font-family: "Courier New";
	position:absolute;
	top:154px;
	left:309px;
	font-size: 14px;
	width: 438px;
	height: 54px;
}

.antena {
	font-family: "Courier New";
	position:absolute;
	top:228px;
	left:112px;
	font-size: 14px;
}

.cargador {
	font-family: "Courier New";
	position:absolute;
	top:228px;
	left:189px;
	font-size: 14px;
}

.bateria {
	font-family: "Courier New";
	position:absolute;
	top:228px;
	left:260px;
	font-size: 14px;
}

.chip {
	font-family: "Courier New";
	position:absolute;
	top:228px;
	left:328px;
	font-size: 14px;
}

.cable {
	font-family: "Courier New";
	position:absolute;
	top:228px;
	left:407px;
	font-size: 14px;
}

.carcaza {
	font-family: "Courier New";
	position:absolute;
	top:228px;
	left:469px;
	font-size: 14px;
	width: 25px;
}

.otros {
	font-family: "Courier New";
	position:absolute;
	top:228px;
	left:519px;
	font-size: 14px;
	width: 229px;
}

.trabajo {
	font-family: "Courier New";
	position:absolute;
	top:271px;
	left:92px;
	font-size: 14px;
	width: 653px;
}

.problema {
	font-family: "Courier New";
	position:absolute;
	top:287px;
	left:92px;
	font-size: 14px;
	width: 653px;
}

.otro2 {
	font-family: "Courier New";
	position:absolute;
	top:303px;
	left:92px;
	font-size: 14px;
	width: 653px;
	height: 42px;
}

.descripcion {
	font-family: "Courier New";
	position:absolute;
	top:372px;
	left:117px;
	font-size: 14px;
	width: 628px;
	height: 32px;
}

.feache {
	font-family: "Courier New";
	position:absolute;
	top:423px;
	left:155px;
	font-size: 14px;
	width: 174px;
}

.horae {
	font-family: "Courier New";
	position:absolute;
	top:439px;
	left:157px;
	font-size: 14px;
	width: 173px;
}

.image {
	position:absolute;
	top:42px;
}
-->
</style>
<?php
$fecha = date ( "j-m-Y " , strtotime( "$hoy + 0 day"));
$hora = time () - 3600; 
$factura = $_GET['fact'];
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT CI,NOMBRE,TELEFONO,MARCA,MODELO,ESN,SERIAL,CONDICION,ANT,A,B,C,D,E,VARIO,STATUS1,PROBLEMA,OTRO,DESCRIPCIO,TRABAJO,SUB,IVA,TOTAL1,FECHA,HORA,FACTURA
FROM cliente Where FACTURA='$factura'", $conexion);

while($scc=mysql_fetch_row($result)){

?>
<BODY onLoad="window.print()"> 
<br />
<div class="image" ><img src="../images/factura.jpg" alt="" width="754" height="445" /><br></div>
<?php 
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT direccion,telefonos,rif,nit FROM config Where id=1", $conexion);

while($config=mysql_fetch_row($result)){
?>
<div class="empresa" ><?Php echo "$config[0]"; ?></div>
<div class="telefono" > <?Php echo "$config[1]"; ?> </div>
<div class="rif" > <?Php echo "$config[2]"; ?></div>
<div class="nit" > <?Php echo "$config[3]"; ?></div>
<?Php
}
mysql_close($conexion);

?>
<div class="fechayhorai" ><?php echo $fecha; ?> <?php echo date ( "h:i:s a.", $hora ); ?>  </div>
<div class="nfactura" ><?Php echo "$scc[25]"; ?></div>
<div class="ccedula" > <?Php echo "$scc[0]"; ?> </div>
<div class="cnombre" > <?Php echo "$scc[1]"; ?> </div>
<div class="ctelefono" > <?Php echo "$scc[2]"; ?> </div>
<div class="marca" > <?Php echo "$scc[3]"; ?> </div>
<div class="esn" > <?Php echo "$scc[5]"; ?> </div>
<div class="modelo" > <?Php echo "$scc[4]"; ?> </div>
<div class="condicion" > <?Php echo "$scc[7]"; ?> </div>
<div class="antena" >     
	<?php 
	$antena = $scc[8];
		if ($antena <> ''){
echo SI;
		}else{ 
echo NO;
		}?> </div>
<div class="cargador" > 
    <?php 
	$cargador = $scc[9];
		if ($cargador <> ''){
echo SI;
		}else{ 
echo NO;
		}?> </div>
<div class="bateria" >      
	<?php 
	$bateria = $scc[10];
		if ($bateria <> ''){
echo SI;
		}else{ 
echo NO;
		}?> </div>
<div class="chip" > 
     <?php 
	$chip = $scc[11];
		if ($chip <> ''){
echo SI;
		}else{
echo NO;
		}?> </div>
<div class="cable" > 
     <?php 
	$cable = $scc[12];
		if ($cable <> ''){
echo SI;
		}else{ 
echo NO;
		}?> </div>
<div class="carcaza" > 
     <?php 
	$carcaza = $scc[13];
		if ($carcaza <> ''){
echo SI;
		}else{ 
echo NO;
		}?>
 </div>
<div class="otros" > <?Php echo "$scc[14]"; ?> </div>

<div class="problema" > <?Php echo "$scc[16]"; ?></div>
<div class="otro2" > <?Php echo "$scc[17]"; ?> </div>
<div class="descripcion" > <?Php echo "$scc[18]"; ?></div>
<div class="trabajo" > 
<?php
$trabajo = $scc[15];

		if ($trabajo == 'N') { 
echo Reparacion;
				}else{
		if ($trabajo == 'P') { 
echo "Reparacion por Garantia";
				}else{
		if ($trabajo == 'T') { 
echo Retirado;
				}else{
		if ($trabajo =='S'){
echo Presupuestado;
				}else {
		if ($trabajo =='R'){
echo Reparado;
				}else{
							echo "";
					} 
				} 
			} 
		} 
	} 
?> </div>
<div class="feache" > <?Php echo "$scc[23]"; ?> </div>
<div class="horae" > <?Php echo "$scc[24]"; ?> </div>
<?Php
}
mysql_close($conexion);
?>    