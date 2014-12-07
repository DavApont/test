
<html>
<head>
<title>SIGECE</title>
</head>

<body>
<?php
 include("../../../conexion.php");
  conectar();
  
  
  function incluirV($fecha_venta){
  
     $strsql="INSERT INTO venta (fecha_venta,status_venta)  VALUES ('$fecha_venta','Activo');";
     $result=mysql_query($strsql);	
	 
	
	 
	 // OBTENER EL ULTIMO CODIGO Y ASIGNARLO A UNA VARIABLE DE SESION
     $query = mysql_query("select MAX(codigo_venta) as ultimo,fecha_venta from venta");
     if ($ultimoID = mysql_fetch_array($query)) {
        $_SESSION['codigo_venta'] = $ultimoID['ultimo'];
        $_SESSION['fecha_venta'] = $ultimoID['fecha_venta'];

     }
 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vista/detalle_venta.php'>";
  
  }
  
  
  
  
    function incluirP($codigo_venta,$codigo_producto,$cantidad_venta){

      
      $strsql0="INSERT INTO detalle_venta (codigo_venta,codigo_producto,cantidad_venta) VALUES ('$codigo_venta','$codigo_producto','$cantidad_venta');";
     $result0=mysql_query($strsql0);


$strsql="SELECT producto.cantidad_existencia,detalle_venta.cantidad_venta, ( producto.cantidad_existencia - detalle_venta.cantidad_venta) as total FROM detalle_venta,producto
 WHERE producto.codigo_producto='$codigo_producto';";
 


     $num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);

	 
	  while($registro=mysql_fetch_array($result)){	     
	$_SESSION['total']= $registro['total'];
	 $total=$_SESSION['total'];

 
	  $strsql2="update producto set cantidad_existencia='$total' where codigo_producto='$codigo_producto';";
      $result2=mysql_query($strsql2);	
		
		

	   	    }//fin del while   	 
	 
     echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vista/detalle_venta.php'>";	
  }//fin de la funci?n Incluir
  
  
  
  
  
  
    function consulta($fecha1,$fecha2){
	
	
	
	$strsql="SELECT producto.codigo_producto, producto.nombre_producto, detalle_venta.cantidad_venta, venta.codigo_venta, venta.fecha_venta
FROM producto, venta, detalle_venta
WHERE producto.codigo_producto = detalle_venta.codigo_producto
AND venta.codigo_venta = detalle_venta.codigo_venta
AND venta.fecha_venta NOT BETWEEN 'fecha1' AND 'fecha2'
;";
    $result=mysql_query($strsql);	
	$num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);

	 if($num==0){
	   echo "<script> alert(' No se encontraron registros ...') </script>"; 
	 }
	 else{ 
	   echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vista/detalle_venta.php'>";
	  while($registro=mysql_fetch_array($result)){	   
	     $_SESSION['codigo_producto']= $registro['codigo_producto'];
		 $_SESSION['nombre_producto']= $registro['nombre_producto'];
		 $_SESSION['fecha_venta']= $registro['fecha_venta'];
			 
		 	   	    }//fin del while   
     }//fin del else
  }
	 
	 


  
  
  
  
  
  
  
  function eliminadoLogico($codigo_detalle_venta){
      $strsql="DELETE FROM detalle_venta WHERE codigo_detalle_venta= ".$codigo_detalle_venta.";";
      $result=mysql_query($strsql);
	   echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vista/detalle_venta.php'>";	
  }
  
  
  
  
  
  
?>
</body>
</html>
