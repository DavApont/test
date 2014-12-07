<?php
If($_POST['addruta']){ ?>

<p class="negrita"> <?php echo $log; ?></p>
   
<?php	}else{ ?>
<center>
<form id="addruta" name="addruta" method="post" action="">
<table width="306" class="negrita" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" style="font-size:14px">Agregar Ruta</td>
    </tr>
  <tr>
    <td width="66">Nombre ruta</td>

    <td width="174"><label>
      <input type="text" class="negrita" name="ruta" id="ruta" />
    </label></td>
  </tr>
  <tr>
    <td>Precio</td>

    <td><input type="text" class="negrita" name="costo" id="costo" /></td>
  </tr>
    <tr>
    <td>Codigo</td>

    <td><input type="text" class="negrita" name="codigo" id="codigo" /></td>
  </tr>
    <tr>
    <td colspan="2">
   
        <center><input type="submit" class="negrita"  name="addruta" id="addruta" value="Guardar" /></center>
   
    </td>
    </tr>
</table>
</form>
</center>
<?php
	}
?>