<?php 
session_start();
include '../../../modelo/conexion.php';
conectar();
include 'php/verPlanPorId.php';
$c = listadoPlan(base64_decode($_GET['c']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>carga academica;</title>
<link rel="stylesheet" href="../../css/assets/demo.css" />
<link href="../../css/estilo_tabla.css" rel="stylesheet"/>
</head>
<body>
     
<div id="wrapper">
	 
    <form method="post" action="../../../controlador/cargaAcademica/controlador.php" class="formular" id="form">
         
    <input name="codimparte" id="codimparte" type="hidden" value="<?php echo $c[0]['codimparte']; ?>">
    <input name="coddocente" id="coddocente" type="hidden" value="<?php echo $c[0]['coddocente']; ?>">

<fieldset class="step">

<legend><h2>Modificar Asignacion de Carga Academica</h2></legend>
		
<table class="horiz">
	
	<tr>
		<td><label>Lapso Academico:</label><br/>
            <select name="codlapsoacademico" id="codlapsoacademico" required>
                <option value="0">Lapso Academico</option>
                <?php include 'php/selectLapsoAcademico.php'; ?>
                <?php foreach (mostrarLapsoAcademico() as $lapsoacademico): ?>
                <option value="<?php echo $lapsoacademico['codlapsoacademico'];?>" <?php if ($c[0]['codlapsoacademico'] == $lapsoacademico['codlapsoacademico']) echo 'selected="selected"' ?> ><?php echo $lapsoacademico['nombrelapsoacademico']; ?></option>
                <?php endforeach;?>
            </select>
    </td>
	
	<td><label>Asignatura:</label><br/>
            <select name="codasignatura" id="codasignatura" required>
                <option value="0">Asignaturas</option>
                <?php include 'php/selectAsignatura.php'; ?>
                <?php foreach (mostrarAsignatura() as $asignatura): ?>
                <option value="<?php echo $asignatura['codasignatura'];?>" <?php if ($c[0]['codasignatura'] == $asignatura['codasignatura']) echo 'selected="selected"' ?> ><?php echo $asignatura['nombreasignatura']; ?></option>
                <?php endforeach;?>
            </select>
    </td>
	
	<td><label>Fecha Inicio:</label><br/>
    <input name="fechai" type="text" id="fechai" required value="<?php echo $c[0]['fechai']; ?>"/>
	</td>
	
	<td><label>Fecha Fin:</label><br/>
	<input name="fechaf" type="text" id="fechaf" required value="<?php echo $c[0]['fechaf']; ?>"/>
	</td>

	<td><label>Coordinador:</label><br/>
	<input name="coordinador" type="text" id="coordinador" required value="<?php echo $c[0]['coordinador']; ?>" />
	</td>
	
	</tr>
	
	</table>
	
	<br>
	
  <table>
  
  <tr>
    <td><button class="submit" name="botModificarDos" id="botModificarDos" type="submit">Modificar</button></td>
  </tr>
  
  </table>         
  </form>  
  </body>
</html>
