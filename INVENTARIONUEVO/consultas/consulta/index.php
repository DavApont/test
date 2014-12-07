<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

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
<div id="art-main">
<header class="art-header">

    <div class="art-shapes">
        
            </div>

<h1 class="art-headline">
    <a href="#">S &amp; C &nbsp;&nbsp; &nbsp; <br>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; CELULAR, c.a.</a>
</h1>
<h2 class="art-slogan">SIC-Professional's</h2>





                
                    
</header>
<nav class="art-nav">
<br> <br>     </nav>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader"></h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><p>
	<div style="position: absolute;" >		
<a href="../../menu/menu.php"><img style="width: 30px; height: 30px;" name="atras" id="atras" alt="atras" title="atras" src="atras.png">
</a>
	<a href="javascript:print()">
	  	<img style="width: 30px; height: 30px;" name="imprimir" id="imprimir" alt="imprimir" title="imprimir" src="imprimir.png">
</a>	
	</div> <br>					
				 <legend style="font-size: 8px;
	color: #000;
	font-weight: 500;">
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

	
	$consulta = "SELECT  pedido.fecha_pedido AS fecha_pedido,
  producto.nombre_producto AS nombre_producto,
  detalle_pedido.cantidad AS cantidad,
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
  ";
	
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
<input name='cantidad' type='hidden' id='cantidad'  value='".$detalles['cantidad']."'>

$detalles[cantidad]

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
<br>		

 
	</div>
	
				</p></div>
                                
                

</article></div>
                    </div>
                </div>
            </div>

    </div>

</div>


</body></html>