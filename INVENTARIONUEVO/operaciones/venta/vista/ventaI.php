<? 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Formalize CSS</title>
<link rel="stylesheet" href="css/assets/demo.css" />
 <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="jquery.min.js"></script>

</head>
<body>
<div id="wrapper">

  <form id="my-form" action="../controlador/controlador.php" class="formular" method="post" >
    <fieldset>
    <legend>
    <h2>
    
    &nbsp;
   Ejecutar Venta 
    &nbsp;
    
    </h2>
    </legend>
    
    <table class="horiz">
      <tr>
	  
      

	 
	  
        <td>
          <label>
           Fecha de Venta:
          </label>
          <br />
          <input id="fecha_venta" name="fecha_venta" type="date" autofocus="autofocus" />
        </td>
		
      </tr>
    </table>

    <p>
      <button name="btnIncluirV" type="submit" id="btnIncluirV">Agregar Productos</button>
      	  </p>  </fieldset>

  </form>

</div>
</body>
</html>
