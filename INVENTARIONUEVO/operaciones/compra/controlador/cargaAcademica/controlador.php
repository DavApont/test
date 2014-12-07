<?php
   session_start();
?>
<html>
<head>
<title>ejemplo</title>
</head>

<body>

<?php

     include("../../modelo/cargaAcademica/Modelo.php");
   
   if(isset( $_POST['botIncluir'])){
    $codigo_producto=$_REQUEST['codigo_producto'];
	$codigo_pedido=$_REQUEST['codigo_pedido'];
	$cantidad_pedido=$_REQUEST['cantidad_pedido'];

    incluir($codigo_producto,$codigo_pedido,$cantidad_pedido);     
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
