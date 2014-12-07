<? 
   session_start();
include '../../../modelo/conexion.php';
conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Formalize CSS</title>
<link rel="stylesheet" href="../../css/assets/demo.css" />
<script type="text/javascript" src="../../js/jquery1.6.4.js"></script>
<script type="text/javascript" src="../../js/jqueryui.js"></script>
<link href="../../css/estilo_tabla.css" rel="stylesheet"/>
<link href="../../css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet"/>


<script type="text/javascript" src="jquery.min.js"></script>
<script language="javascript">

$(document).ready(function(){
	
	// Parametros para el combo1
   
   $("#codespecialidad").change(function () {
   		$("#codespecialidad option:selected").each(function () {
				elegido=$(this).val();
				$.post("combo1.1.php", { elegido: elegido }, function(data){  //llamada al archivo combo1.php que realiza las operaciones solicitadas y se las pasa a otro combo o lista desplegable
					$("#codasignatura").html(data);  //envia los datos obtenidos arriba al combo con el id="combo2"
					//$("#combo3").html("");
			});			
        });
   })
   
 	
});

</script>
</head>
<body>
<div id="wrapper">

<form id="my-form" action="../../../controlador/docentes/controlador.php" class="formular" method="post">
    
	<fieldset>
    <legend>
    <h2>
    
    &nbsp;
		Docente
    &nbsp;
    
    </h2>
    </legend>
    
    <table class="horiz">
	
     <tr>
	          <td>
          <label>
            Codigo Docente:
          </label>
          <br />
	 <?php echo '<input name="coddocente" type="text" id="coddocente" disabled="disabled" value="'.$_SESSION['coddocente'].'" />'; ?></td>
	 <td>
          <label>
            cedula:
          </label>
          <br />
	 <?php echo '<input name="cedula" type="text" id="cedula" disabled="disabled" value="'.$_SESSION['cedula'].'" />'; ?></td>
	 <td>
          <label>
            Nombres/Apellidos:
          </label>
          <br />
	 <?php echo '<input name="nombrecomp" type="text" id="nombrecomp" value="'.$_SESSION['nombrecomp'].'" />'; ?></td>
	 <td>
          <label>
            Telefono:
          </label>
          <br />
	 <?php echo '<input name="telefono" type="text" id="telefono" value="'.$_SESSION['telefono'].'" />'; ?></td>
	 <td>
          <label>
            Correo:
          </label>
          <br />
	 <?php echo '<input name="correo" type="text" id="correo" value="'.$_SESSION['correo'].'" />'; ?></td>
	   <td>
          <label>
            Sexo:
          </label>
          <br />
	  <?php echo '<input name="sexo" type="text" id="sexo" value="'.$_SESSION['sexo'].'" />'; ?></td>

       <td>
          <label>
            Profesion:
          </label>
          <br />
      <?php echo '<input name="profesiondocente" type="text" id="profesiondocente" value="'.$_SESSION['profesiondocente'].'" /> ';?></td>
      
	  </tr>
	  
	   </table>
	 
	<p><button class="submit" input name="botModificar" type="submit" id="botModificar">Modificar</button>
	   <button class="submit" input name="botEliminar" type="submit" id="botEliminar">Eliminar</button></p>
	   <!--<button class="submit" input name="botCancelar" type="submit" id="botCancelar">Cancelar</button>-->
  
  </form>
  <br><br>
<form method="post" action="../../../controlador/cargaAcademica/controladorMOD.php" class="formular" id="form">
<input name="coddocente" id="coddocente" type="hidden" value="<?php echo $_SESSION['coddocente']; ?>">

 <legend><h2>Asignacion de Carga Academica</h2></legend>
		
	<table class="horiz">
	
		<tr>
	<td><label>Lapso Academico:</label><br/>
            <select name="codlapsoacademico" id="codlapsoacademico" required>
                <option value="0">Lapsos Academicos</option>
                <?php include 'php/selectLapsoAcademico.php'; ?>
                <?php foreach (mostrarLapsoAcademico() as $lapsoacademico): ?>
                <option value="<?php echo $lapsoacademico['codlapsoacademico'];?>"><?php echo $lapsoacademico['nombrelapsoacademico']; ?></option>
                <?php endforeach;?>
            </select>
        </td>
	
	<td><label>Especialidad:</label><br/>
            <select name="codespecialidad" id="codespecialidad" required>
                <option value="0">Especialidades</option>
                <?php include 'php/selectTipoEvaluacion.php'; ?>
                <?php foreach (mostrarTipoEvaluacion() as $especialidad): ?>
                <option value="<?php echo $especialidad['codespecialidad'];?>"><?php echo $especialidad['nombreespecialidad']; ?></option>
                <?php endforeach;?>
            </select>
        </td>
	
	<td><label>Asignatura:</label><br/>
            <select name="codasignatura" id="codasignatura" required>
                <option value="0">Asignaturas</option>
                <?php include 'php/selectAsignatura.php'; ?>
                <?php foreach (mostrarAsignatura() as $asignatura): ?>
                <option value="<?php echo $asignatura['codasignatura'];?>"><?php echo $asignatura['nombreasignatura']; ?></option>
                <?php endforeach;?>
            </select>
        </td>
 

	<td><label>Fecha Inicio:</label> <br/>
	<input name="fechai" type="text" id="fechai" required />
	</td>

	<td><label>Fecha Fin:</label> <br/>
	<input name="fechaf" type="text" id="fechaf" required />
	</td>

	<td><label>Coordinador:</label> <br/>
	 <select id="coordinador" name="coordinador" required>
     <option value="Por Asignar">Por Asignar</option>
	 <option value="si">SI</option>
	 <option value="no">NO</option>
     </select>
	
        </td>
		
    <td><label></label><br/>
	<button class="submit" name="botIncluir" id="botIncluir" type="submit">
	<img style="width: 30px; height: 30px;" name="botIncluir" id="botIncluir" alt="botIncluir" title="botIncluir" src="nuevo.png">
	</td></button>
	</tr>
	
  </table>            
  </form>
  
   <form name="form2" method="post" action="../../../controlador/cargaAcademica/controladorMOD.php" class="formular" id="form">
        
		<div class="datagrid">
		<table>
		<thead>
            <tr>
			    <th>&nbsp;&nbsp;</th>
				<th>Lapso Academico</th>
                <th>Asignatura</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Coordinador</th>
                <th>Modificar</th>
            </tr>
            <?php include 'listadoPlan.php'; ?>
        </thead>  
		</table>
		
      <table> 
  <tr>
  <td><button class="submit" name="botEliminar" id="botEliminar" type="submit">Eliminar</button>
  </tr>
      </table>

	</div>
    </form>
	  </fieldset>
</div>
</body>
</html>