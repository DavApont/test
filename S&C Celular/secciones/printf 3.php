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
	left:86px;
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
	left:447px;
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
	left:83px;
	font-size: 14px;
	width: 127px;
}

.cnombre {
	font-family: "Courier New";
	position:absolute;
	top:118px;
	left:267px;
	font-size: 14px;
	width: 214px;
}

.ctelefono {
	font-family: "Courier New";
	position:absolute;
	top:118px;
	left:501px;
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
	width: 654px;
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
	left:121px;
	font-size: 14px;
	width: 628px;
	height: 32px;
}

.feache {
	font-family: "Courier New";
	position:absolute;
	top:423px;
	left:169px;
	font-size: 14px;
	width: 174px;
}

.horae {
	font-family: "Courier New";
	position:absolute;
	top:439px;
	left:170px;
	font-size: 14px;
	width: 173px;
}

.tincluye {
	font-family: "Courier New";
	font-size: 14px;
	position:absolute;
	top:210px;
	left:14px;
	width: 66px;
}

.ttelefono {
	font-family: "Courier New";
	position:absolute;
	top:41px;
	left:10px;
	font-size: 14px;
	width: 73px;
}

.trif {
	font-family: "Courier New";
	position:absolute;
	top:59px;
	left:14px;
	font-size: 14px;
	width: 33px;
}

.tnit {
	font-family: "Courier New";
	position:absolute;
	top:42px;
	left:462px;
	font-size: 14px;
	width: 33px;
}

.tfechayhorai {
	font-family: "Courier New";
	position:absolute;
	top:60px;
	left:242px;
	font-size: 14px;
	width: 227px;
}

.tnfactura {
	font-family: "Courier New";
	position:absolute;
	top:78px;
	left:10px;
	font-size: 18px;
	width: 87px;
}

.tccedula {
	font-family: "Courier New";
	position:absolute;
	top:117px;
	left:24px;
	font-size: 14px;
	width: 59px;
}

.tcnombre {
	font-family: "Courier New";
	position:absolute;
	top:117px;
	left:208px;
	font-size: 14px;
	width: 59px;
}

.tctelefono {
	font-family: "Courier New";
	position:absolute;
	top:117px;
	left:417px;
	font-size: 14px;
	width: 80px;
}

.tmarca {
	font-family: "Courier New";
	position:absolute;
	top:155px;
	left:13px;
	font-size: 14px;
	width: 67px;
}

.tesn {
	font-family: "Courier New";
	position:absolute;
	top:173px;
	left:13px;
	font-size: 14px;
	width: 68px;
}

.tmodelo {
	font-family: "Courier New";
	position:absolute;
	top:191px;
	left:13px;
	font-size: 14px;
	width: 65px;
}

.tcondicion {
	font-family: "Courier New";
	position:absolute;
	top:153px;
	left:226px;
	font-size: 14px;
	width: 84px;
	height: 18px;
}

.tantena {
	font-family: "Courier New";
	position:absolute;
	top:208px;
	left:101px;
	font-size: 14px;
}

.tcargador {
	font-family: "Courier New";
	position:absolute;
	top:209px;
	left:168px;
	font-size: 14px;
	width: 67px;
}

.tbateria {
	font-family: "Courier New";
	position:absolute;
	top:210px;
	left:245px;
	font-size: 14px;
}

.tchip {
	font-family: "Courier New";
	position:absolute;
	top:209px;
	left:325px;
	font-size: 14px;
}

.tcable {
	font-family: "Courier New";
	position:absolute;
	top:209px;
	left:390px;
	font-size: 14px;
}

.tcarcaza {
	font-family: "Courier New";
	position:absolute;
	top:209px;
	left:454px;
	font-size: 14px;
	width: 25px;
}

.totros {
	font-family: "Courier New";
	position:absolute;
	top:209px;
	left:521px;
	font-size: 14px;
	width: 51px;
}

.ttrabajo {
	font-family: "Courier New";
	position:absolute;
	top:269px;
	left:22px;
	font-size: 14px;
	width: 67px;
}

.tproblema {
	font-family: "Courier New";
	position:absolute;
	top:286px;
	left:14px;
	font-size: 14px;
	width: 75px;
}

.totro2 {
	font-family: "Courier New";
	position:absolute;
	top:301px;
	left:46px;
	font-size: 14px;
	width: 41px;
	height: 17px;
}

.tdescripcion {
	font-family: "Courier New";
	position:absolute;
	top:370px;
	left:18px;
	font-size: 14px;
	width: 103px;
	height: 19px;
}

.tfeache {
	font-family: "Courier New";
	position:absolute;
	top:422px;
	left:20px;
	font-size: 14px;
	width: 151px;
}

.thorae {
	font-family: "Courier New";
	position:absolute;
	top:438px;
	left:28px;
	font-size: 14px;
	width: 155px;
}

.tfirma {
	font-family: "Courier New";
	position:absolute;
	top:470px;
	left:463px;
	font-size: 14px;
	width: 158px;
}
.tsolicitud {
	font-family: "Courier New";
	position:absolute;
	top:79px;
	left:243px;
	font-size: 16px;
	width: 298px;
}
.tcliente {
	font-family: "Courier New";
	position:absolute;
	top:99px;
	left:13px;
	font-size: 16px;
	width: 192px;
}
.tequipo {
	font-family: "Courier New";
	position:absolute;
	top:135px;
	left:16px;
	font-size: 16px;
	width: 199px;
}
.tefectuado {
	font-family: "Courier New";
	position:absolute;
	top:253px;
	left:16px;
	font-size: 16px;
	width: 242px;
}
.tsequipo {
	font-family: "Courier New";
	position:absolute;
	top:348px;
	left:16px;
	font-size: 16px;
	width: 200px;
}

.tabla1 {
	font-family: "Courier New";
	position:absolute;
	top:99px;
	left:13px;
	width: 751px;
	height: 10px;
}

.tabla2 {
	position:absolute;
	top:251px;
	left:15px;
	width: 751px;
	height: 10px;
}
.tabla3 {
	position:absolute;
	top:348px;
	left:15px;
	width: 751px;
	height: 10px;
}
.tabla4 {
	position:absolute;
	top:136px;
	left:15px;
	width: 751px;
	height: 10px;
}
.tabla5 {
	position:absolute;
	top:396px;
	left:15px;
	width: 751px;
	height: 10px;
}
.tabla6 {
	position:absolute;
	top:459px;
	left:15px;
	width: 751px;
	height: 10px;
}
.tabla {
	position:absolute;
	top:207px;
	left:91px;
	width: 679px;
	height: 48px;
}
-->
</style>
<?
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT direccion,telefonos,rif,nit FROM config Where id=1", $conexion);

while($config=mysql_fetch_row($result)){
?>
<BODY onLoad="window.print()">
<div class="empresa" ><?Php echo "$config[0]"; ?></div>
<div class="telefono" > <?Php echo "$config[1]"; ?> </div>
<div class="rif" > <?Php echo "$config[2]"; ?></div>
<div class="nit" > <?Php echo "$config[3]"; ?></div>


<?Php
}
mysql_close($conexion);

?>

<?php
include('../connections/sccelular.php');
$fecha = date ( "j-m-Y " , strtotime( "$hoy + 0 day"));
$hora = time () - 3600; 
$factura = $_GET['fact'];
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT CI,NOMBRE,TELEFONO,MARCA,MODELO,ESN,SERIAL,CONDICION,ANT,A,B,C,D,E,VARIO,STATUS1,PROBLEMA,OTRO,DESCRIPCIO,TRABAJO,SUB,IVA,TOTAL1,FECHA,HORA,FACTURA
FROM cliente Where FACTURA='$factura'", $conexion);

while($scc=mysql_fetch_row($result)){
?>
<div class="tincluye" >Incluye:</div>
<div class="ttelefono" >Telefono: </div>
<div class="trif" > Rif:</div>
<div class="tnit" > Nit:</div>
<div class="tfechayhorai" >Fecha y Hora de ingreso:    </div>
<div class="tnfactura" ><font size="2"><strong>Orden No.</strong></font>:</div>
<div class="tccedula" >C&oacute;digo:</div>
<div class="tcnombre" > Nombre:</div>
<div class="tctelefono" >Telefonos:</div>
<div class="tmarca" >Marca..:</div>
<div class="tesn" > ESN....:</div>
<div class="tmodelo" >Modelo.:</div>
<div class="tcondicion" >Condici&oacute;n:</div>
<div class="tantena" >     
	Antena </div>
<div class="tcargador" > 
    Cargador </div>
<div class="tbateria" >      
	Bateria </div>
<div class="tchip" > 
     Chip </div>
<div class="tcable" > 
     Cable </div>
<div class="tcarcaza" > 
     Carcaza
</div>
<div class="totros" > Otros </div>
<div class="tproblema" > Problema: </div>
<div class="totro2" > Otro:  </div>
<div class="tdescripcion" >Descripcion:</div>
<div class="ttrabajo" > Trabajo: </div>
<div class="tfeache" > Fecha de Entrega: </div>
<div class="thorae" > Hora de Entrega: </div>
<div class="tfirma" >Firma del Cliente:</div>
<div class="tsolicitud" ><strong>SOLICITUD DE SERVICIO TECNICO</strong></div>
<div class="tcliente" ><strong>DATOS DEL CLIENTE:</strong></div>
<div class="tequipo" ><strong>DATOS DEL EQUIPO:</strong></div>
<div class="tefectuado" ><strong>TRABAJO A EFECTUAR:</strong></div>
<div class="tsequipo" > <strong>ESTADO DEL EQUIPO:</strong></div>
<div class="tabla1" >___________________________________________________________________________</div>
<div class="tabla2" >_____________________________________________________________________________________________</div>
<div class="tabla3" >_____________________________________________________________________________________________</div>
<div class="tabla4" >_____________________________________________________________________________________________</div>
<div class="tabla5" > ===================================================================================</div>
<div class="tabla6" > ===================================================================================</div>
<div class="tabla" >
  <table width="670" height="20" border="1" bordercolordark="#000000" bordercolorlight="#000000" cellpadding="0" cellspacing="0">
    <tr>
      <td width="69" height="10">&nbsp;</td>
      <td width="76">&nbsp;</td>
      <td width="71">&nbsp;</td>
      <td width="63">&nbsp;</td>
      <td width="69">&nbsp;</td>
      <td width="68">&nbsp;</td>
      <td width="244">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
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