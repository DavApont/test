<? 
   session_start();
?>
<html>
<head>
<title>SIGECE</title>
</head>

<body>

<?php
     include("../../modelo/docentes/Modelo.php");
	 
	 
	    
   if(isset($_POST['btnIncluir'])){
    $codigo_pedido=$_REQUEST['codigo_pedido'];
	  $rif=$_REQUEST['rif'];
	  $fecha_pedido=$_REQUEST['fecha_pedido'];
	 
	 incluir($codigo_pedido,$rif,$fecha_pedido);
 }
if(isset($_POST['btnCompra'])){
    	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../../../../consultas/consultas2/view2list.php'>";

 }

?>

</body>
</html>
