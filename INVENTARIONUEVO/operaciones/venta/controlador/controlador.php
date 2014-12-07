<? 
   session_start();
?>
<html>
<head>
<title>SIGECE</title>
</head>

<body>

<?php
     include("../modelo/Modelo.php");
	 
	 
	    
   if(isset($_POST['btnIncluirV'])){
    
    $fecha_venta=$_REQUEST['fecha_venta'];
    incluirV($fecha_venta);
 }
 

 
  if(isset( $_POST['botIncluirP'])){
    $codigo_venta=$_REQUEST['codigo_venta'];
	$codigo_producto=$_REQUEST['codigo_producto'];
	$cantidad_venta=$_REQUEST['cantidad_venta'];

    incluirP($codigo_venta,$codigo_producto,$cantidad_venta);     
    }

	
	
	
	 
  if(isset( $_POST['botC'])){
    $fecha1=$_REQUEST['fecha1'];
	$fecha2=$_REQUEST['fecha2'];
    consulta($fecha1,$fecha2);     
    }
	
	

if (isset($_POST['botEliminar'])) {
    $total = $_POST['id_check'];
    for ($i = 0; $i < count($total); $i++) {
        eliminadoLogico($total[$i]);
    }
}
 
 
 
 
 
 
 


?>

</body>
</html>
