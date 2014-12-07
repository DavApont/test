<?php
			if($_POST['buscar_prod']){
				$result=mysql_query("SELECT ID_producto, nombre, categoria, existencia_min,existencia_actual,activado FROM producto 
									WHERE ID_producto='".$_POST['cod_prod']."';",$conexion);
				while($row = mysql_fetch_array($result)) {
						$id = $row[0];
						$nombre = $row[1];
						$categoria = $row[2];
						$existencia_min = $row[3];
						$existencia_actual = $row[4];
						$activado = $row[5];
		   }
		   if($nombre == ''){
			    echo "<p class='normalText' align='center'>Error el Codigo del Producto Ingresada <b>".$_POST['cod_prod']."</b> no existe<p>";
			   $log = "";
			   }else{		   
?>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="edit_prod" name="edit_prod" method="post" action="">
<input type="hidden" id="id" name="id"  value="<?php echo $id ?>" />
<table  bgcolor="#FFFFFF" cellspacing="5" cellpadding="0" border="0">
  <tr>
    <td colspan="2"><strong><img src="images/prod_add.png" width="64" height="64" /><span class="normalText">Ver Productos</span></strong></td>
  </tr>
  <tr>
    <td width="121" class="normalText">Categoria</td>
 <td width="133"> <?Php echo "$row[2]"; ?></td>
  </tr>
  <tr>
    <td class="normalText">Nombre</td>
    <td class="normalText">
      <?php echo $nombre ?>
    </td>
  </tr>
   <tr>
    <td class="normalText">Cantidad A/M</td>
    <td class="normalText">
<?php echo $existencia_actual ?>/<?php echo $existencia_min ?>
    </td>
  </tr>
     <tr>
    <td class="normalText">Producto</td>
    <td class="normalText">
    <?php if($activado <> 0){ ?>
         <input type="radio" name="activado" value="1" id="activado1" checked="checked" />
        Inactivo
      <br />
        <input type="radio" name="activado" value="0" id="activado0" />
        Activo
      <br />
      <?php }else{ ?>
               <input type="radio" name="activado" value="1" id="activado1"  />
        Inactivo
      <br />
        <input type="radio" name="activado" value="0" id="activado0" checked="checked" />
        Activo
     <?php } ?>
    </td>
  </tr>
 <tr>
    <td colspan="2" align="center"><label>
      <input type="button" name="atras" id="atras" onclick="javascript:history.back()" class="normalText" value="Buscar" />
    </label></td>
  </tr>
</table>
</form>
</center>
<?php } }else{ ?>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="edit_prod" name="edit_prod" method="post" action="">
<table width="275" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong><img src="images/prod_add.png" alt="Agregar Categoria" width="64" height="64" />Ver Productos</strong></td>
  </tr>
  <tr>
    <td width="99" class="normalText">Nombre Producto</td>
    <td width="176"> <select name="cod_prod" class="normalText" id="cod_prod">
<?php  
$result=mysql_query("SELECT ID_producto,nombre FROM producto order by nombre",$conexion);
while($row = mysql_fetch_array($result)) {
?>
				<option value="<?Php echo "$row[0]"; ?>"><?Php echo "$row[1]"; ?></option>
<?Php
   }
   mysql_free_result($result);
?>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit"  onClick="return busprod();" class="normalText" name="buscar_prod" id="buscar_prod" value="Buscar" />
    </label></td>
  </tr>
</table>

</form>
</center>
<?php 
}?>