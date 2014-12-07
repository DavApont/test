<?php 
session_start();
	include('../../../conexion.php');  //Conexion con la base de datos
			conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>carga academica</title>
<script type="text/javascript" src="/js/jquery1.6.4.js"></script>
<script type="text/javascript" src="/js/jqueryui.js"></script>
<link rel="stylesheet" href="css/assets/demo.css" />
<link href="css/estilo_tabla.css" rel="stylesheet"/>
<link href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet"/>


<script type="text/javascript" src="jquery.min.js"></script>



<script language="javascript">

$(document).ready(function(){
	
	// Parametros para el combo1
   
   $("#codigo_departamento").change(function () {
   		$("#codigo_departamento option:selected").each(function () {
				elegido=$(this).val();
				$.post("filtro_categoria.php", { elegido: elegido }, function(data){  //llamada al archivo combo1.php que realiza las operaciones solicitadas y se las pasa a otro combo o lista desplegable
					$("#codigo_producto").html(data);  //envia los datos obtenidos arriba al combo con el id="combo2"
					//$("#combo3").html("");
			});			
        });
   })
   
 	
});

</script>


</head>
<body>

<div id="wrapper">
							
<form method="post" action="../controlador/controlador.php" class="formular" id="form">
<input name="codigo_venta" id="codigo_venta" type="hidden" value="<?php echo $_SESSION['codigo_venta']; ?>">
<fieldset class="step">

 <legend><h2>Ejecutar Venta </h2></legend>
	    <table class="horiz">
      <tr>
	  

	  
        <td>
          <label>
           Fecha de Venta:
          </label>
          <br />
<input name="fecha_venta" id="fecha_venta" type="text" value="<?php echo $_SESSION['fecha_venta']; ?>">
        </td>
		
      </tr>
    </table>

	
	<table class="horiz">
	
		<tr>







<td><label>Departamento:</label><br/>
            <select name="codigo_departamento" id="codigo_departamento" required>
               <?
	
	
	
		$consulta = "select  *from departamento";
		$resultado = mysql_query($consulta);
		
		
		if(mysql_num_rows($resultado)) {

			while($detalles = mysql_fetch_array($resultado)) {

				echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[1].'</OPTION>';
			
			}

		}
		?>
            </select>
        </td>










	<td><label>Producto:</label><br/>
            <select name="codigo_producto" id="codigo_producto" required>
               <?
	
	
	
		$consulta = "select * from producto";
		$resultado = mysql_query($consulta);
		
		
		if(mysql_num_rows($resultado)) {

			while($detalles = mysql_fetch_array($resultado)) {

				//echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[2].' - <'.$detalles[5].'></OPTION>';
			
			}

		}
		?>
            </select>
        </td>
	
	
	<td><label>Cantidad:</label><br/>
                    <input id="cantidad_venta" name="cantidad_venta" type="text" autofocus="autofocus" />

        </td>
 

	
	</tr>
	
	</table>
	
  <table width="140" height="54">
  
  <tr>
    <td><button class="submit" name="botIncluirP" id="botIncluirP" type="submit">Agregar</button></td>
  </tr>
  </table>            
  </form>
  
    <form name="form2" method="post" action="../controlador/controlador.php" class="formular" id="form">
        
		<div class="datagrid">
		<table>
		<thead>
            <tr>
			    <th>&nbsp;&nbsp;</th>
				<th>Producto</th>
				<th>Cantidad</th>
                <th>Disponible Almacen</th>
            </tr>
            <?php include 'listadoVenta.php'; ?>
        </thead>  
		</table>
		
      <table> 
  <tr>
  <td><button class="submit" name="botEliminar" id="botEliminar" type="submit">Eliminar</button>
  </tr>
      </table>

	</div>
    </form>
				
</body>
</html>
