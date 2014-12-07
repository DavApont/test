<? 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Formalize CSS</title>
<link rel="stylesheet" href="../../css/assets/demo.css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	
<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="jquery.min.js"></script>

</head>
<body>
<div id="wrapper">

  <form id="my-form" action="../../../controlador/docentes/controlador.php" class="formular" method="post" >
    <fieldset>
    <legend>
    <h2>
    
    &nbsp;
    Realizar Compra
    &nbsp;
    
    </h2>
    </legend>
    
    <table class="horiz">
      <tr>
	  
        <td>
          <label>
           Codigo de Factura:
          </label>
          <br />
          <input id="codigo_pedido" name="codigo_pedido" type="text" autofocus="autofocus" />
        </td>

	  <td>
	
          <label>
            Proveedor:
          </label>
          <br />
<SELECT NAME="rif" id="rif">
<?
	
		include('../../../../../conexion.php');  //Conexion con la base de datos
			conectar();
	
		$consulta = "select * from proveedor";
		$resultado = mysql_query($consulta);
		
		
		if(mysql_num_rows($resultado)) {

			while($detalles = mysql_fetch_array($resultado)) {

				echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[0].'-'.$detalles[3].'</OPTION>';
			
			}

		}
		?>	</SELECT>     </td>
	  
        <td>
          <label>
           Fecha de Pedido:
          </label>
          <br />
          <input id="fecha_pedido" name="fecha_pedido" type="date" autofocus="autofocus" />
        </td>
		
      </tr>
    </table>

    <p><br>
      <button name="btnIncluir" type="submit" id="btnIncluir">Agregar Productos</button>

      <button name="btnCompra" type="submit" id="btnCompra">Ver Compras Generales Realizadas</button>
    </p>  </fieldset>

  </form>

</div>
</body>
</html>
