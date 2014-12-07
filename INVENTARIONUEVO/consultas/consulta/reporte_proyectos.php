
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<title>S&S</title>

		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-10143667-20']);
		  _gaq.push(['_trackPageview']);
		  _gaq.push(['_trackPageLoadTime']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>

	
		<script src="jquery.min2.js" type="text/javascript"></script>
		<script src="jquery.uitablefilter.js" type="text/javascript"></script>
		<link href="estilo_tabla.css" rel="stylesheet"/>

		<script language="javascript">
		$(function() {
		  theTable = $("#latabla");
		  $("#q").keyup(function() {
			$.uiTableFilter(theTable, this.value);
		  });
		});
		</script>
	</head>
	<body>
	<center>
	<div>
		  	<img style="position: relative;
		background-repeat: no-repeat;
		z-index: 1;
		top: 0px;
		left:0px;
		width: 100%;
		height:150px;" src="menbrete.png"><br>

	</div>
		       
	    <legend style="font-size: 12px;
	color: #000;
	font-weight: 900;">
    <h2>
    
    &nbsp;
    Listado de Compras Generales
    &nbsp;
    
    </h2>
    </legend>
	
		<div id="busqueda">
			<input type="text" id="q" name="q" value="" size="60"/>
		</div>
	
	<br />	<br />

	
<form id="my-form" action="form" class="formular" method="post" >		
<div class="datagrid">	  
	  <table id="latabla" border="1">
			<?php

    include("../../conexion.php");
	conectar();

	
	$consulta = "SELECT DISTINCT pedido.fecha_pedido AS fecha_pedido,
  producto.nombre_producto AS nombre_producto,
  producto.cantidad_existencia AS cantidad_existencia,
  proveedor.razon_social AS razon_social,
  proveedor.rif AS rif,
  departamento.nombre_departamento AS nombre_departamento
FROM pedido,
  detalle_pedido,
  producto,
  proveedor,
  departamento
WHERE (departamento.codigo_departamento = producto.codigo_departamento) AND
  (pedido.rif = proveedor.rif) AND (producto.codigo_producto =
    detalle_pedido.codigo_producto) AND (detalle_pedido.codigo_pedido =
    pedido.codigo_pedido)
GROUP BY producto.nombre_producto   ";
	
	$campos= mysql_query($consulta);
 	if(mysql_num_rows($campos)) {
	?>
		


<thead>
            	<tr>
				    <th>Fecha Pedido</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Proveedor</th>
					<th>Rif</th>
					<th>Departamento</th>
				
                </tr>
</thead>

	<?php
	while($detalles = mysql_fetch_array($campos)) {
	
?>	


		
		<tr>
		
		<td style="font:bold 14px Tahoma, Helvetica, sans-serif;
	color:#000;">
<?php 

echo "
<input name='fecha_pedido' type='hidden' id='fecha_pedido'  value='".$detalles['fecha_pedido']."'>

$detalles[fecha_pedido]

</input>
";
?>
		</td>
		
		<td style="font:bold 10px Tahoma, Helvetica, sans-serif;
	color:#000;">
<?php 

echo "
<input name='nombre_producto' type='hidden' id='nombre_producto'  value='".$detalles['nombre_producto']."'>

$detalles[nombre_producto]

</input>
";
?>
		</td>
		
				<td style="font:bold 10px Tahoma, Helvetica, sans-serif;
	color:#000;">
<?php 

echo "
<input name='cantidad_existencia' type='hidden' id='cantidad_existencia'  value='".$detalles['cantidad_existencia']."'>

$detalles[cantidad_existencia]

</input>
";
?>
		</td>
		
		<td style="font:bold 10px Tahoma, Helvetica, sans-serif;
	color:#000;">
<?php 
echo "		
<input name='razon_social' type='hidden' id='razon_social'  value='".$detalles['razon_social']."'>

$detalles[razon_social]

</input>
";
?>
		</td>
				<td style="font:bold 10px Tahoma, Helvetica, sans-serif;
	color:#000;">
<?php 

echo "
<input name='rif' type='hidden' id='rif'  value='".$detalles['rif']."'>

$detalles[rif]

</input>
";
?>
		</td>
		
		<td style="font:bold 10px Tahoma, Helvetica, sans-serif;
	color:#000;">
<?php 
echo "		
<input name='nombre_departamento' type='hidden' id='nombre_departamento'  value='".$detalles['nombre_departamento']."'>

$detalles[nombre_departamento]

</input>
";
?>
		</td>
		
				
		
 </tr>

           
 <?php   
		
		}

	}


?>
</table> </form>


 
	</div><div style="position: absolute;">		
<a href="../../menu/menu.php"><img style="width: 30px; height: 30px;" name="atras" id="atras" alt="atras" title="atras" src="atras.png">
</a>
	<a href="javascript:print()">
	  	<img style="width: 30px; height: 30px;" name="imprimir" id="imprimir" alt="imprimir" title="imprimir" src="imprimir.png">
</a>	
	</div>	<!-- Creado por Nax para Skamasle.com -->
	</body>
	
</html>