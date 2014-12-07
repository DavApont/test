<html>
<head>
<title>plan</title>
</head>

<body>
<?php
 include("../../../../conexion.php");
  conectar();
  

  function incluir($codigo_producto,$codigo_pedido,$cantidad_pedido){

      
      $strsql0="INSERT INTO detalle_pedido (codigo_producto,codigo_pedido,cantidad) VALUES ('$codigo_producto','$codigo_pedido','$cantidad_pedido');";
     $result0=mysql_query($strsql0);


$strsql="SELECT producto.cantidad_existencia FROM producto
 WHERE producto.codigo_producto='$codigo_producto';";

     $num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);

	 
	  while($registro=mysql_fetch_array($result)){	     
	$_SESSION['cantidad_existencia']= $registro['cantidad_existencia'];
	 $total=$_SESSION['cantidad_existencia'] + $cantidad_pedido;

 
	  $strsql2="update producto set cantidad_existencia='$total' where codigo_producto='$codigo_producto';";
      $result2=mysql_query($strsql2);	
		

	   	    }//fin del while   	 
	 
     echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../../vista/infopreliminar/docentes/cargaAcademicaIncluir.php'>";	
  }//fin de la funci�n Incluir
  

  
  function eliminadoLogico($codigo_detalle_pedido){
      $strsql="DELETE FROM detalle_pedido WHERE codigo_detalle_pedido= ".$codigo_detalle_pedido.";";
      $result=mysql_query($strsql);
	   echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../../vista/infopreliminar/docentes/cargaAcademicaIncluir.php'>";	
  }
  
?>
</body>
</html>
