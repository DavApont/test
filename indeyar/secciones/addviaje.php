<?php
If($_POST['addviaje']){ ?>

<p class="negrita"> <?php echo $log; ?></p>
   
<?php	}else{ ?>
<center>
<form id="form1" name="form1" method="post" action="">
<table width="306" class="negrita" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" style="font-size:14px">Agregar Viaje</td>
    </tr>
  <tr>
    <td width="66">Ruta</td>

    <td width="174"><label>
      <select class="negrita" name="ruta" id="ruta">
      <?php
	$buscarrutas=mysql_query("SELECT nombre, codigo FROM rutas",$conexion);
	while($row=mysql_fetch_array($buscarrutas)){ 
	?>
		<option value="<?php echo $row[1]; ?>" selected="selected"><?php echo $row[0]; ?></option>
        <?php }?>   
      </select>
    </label></td>
  </tr>
  <tr>
    <td>Adicional</td>

    <td><input type="text" class="negrita" name="adicional" id="adicional" /></td>
  </tr>
    <tr>
    <td>Chofer</td>

    <td><input type="text" class="negrita" name="chofer" id="Chofer" /></td>
  </tr>
    <tr>
    <td>Placa</td>

    <td><input type="text" class="negrita" name="placa" id="Placa" /></td>
  </tr>
   
    <tr>
    <td colspan="2">
   
        <center><input type="submit" class="negrita" name="addviaje" id="addviaje" value="Guardar" /></center>
   
    </td>
    </tr>
</table>
</form>
<?php
	}
?>