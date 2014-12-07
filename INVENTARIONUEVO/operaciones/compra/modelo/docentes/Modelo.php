
<html>
<head>
<title>SIGECE</title>
</head>

<body>
<?php
 include("../../../../conexion.php");
  conectar();
  
  
  function incluir($codigo_pedido,$rif,$fecha_pedido){
  
     $strsql="INSERT INTO pedido (codigo_pedido,rif,fecha_pedido,status_pedido)  VALUES ('$codigo_pedido','$rif','$fecha_pedido','Activo');";
     $result=mysql_query($strsql);	
	 
	
	 
	 //OBTENER EL ULTIMO CODIGO Y ASIGNARLO A UNA VARIABLE DE SESION
     $query = mysql_query("select id as ultimo,codigo_pedido,rif,fecha_pedido from pedido ORDER BY id DESC LIMIT 1 ");
     if ($ultimoID = mysql_fetch_array($query)) {
        $_SESSION['codigo_pedido'] = $ultimoID['codigo_pedido'];
		        $_SESSION['rif'] = $ultimoID['rif'];
        $_SESSION['fecha_pedido'] = $ultimoID['fecha_pedido'];

     } 

	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../../vista/infopreliminar/docentes/cargaAcademicaIncluir.php'>";
  
  }
  
  
?>
</body>
</html>
