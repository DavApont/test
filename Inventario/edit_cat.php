<?php
			if($_POST['buscar_cat']){
				$result=mysql_query("SELECT * FROM categoria WHERE ID_Categoria='".$_POST['nom_cat']."';",$conexion);
				while($row = mysql_fetch_array($result)) {
						$id = $row[0];
						$categoria = $row[1];
		   }
		   if($id == ''){
			   echo "<p class='normalText' align='center'>Error el Codigo de la Categoria Ingresada <b>".$_POST['id']."</b> no existe<p>";
			   }else{	
?>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="edit_cat" name="edit_cat" method="post" action="">
<table width="223" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong><img src="images/cat_add.png" alt="Agregar Categoria" width="64" height="64" />Editar Categoria</strong></td>
  </tr>
  <tr>
    <td width="67" class="normalText">Nombre</td>
    <td width="156"><label>
    	<input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="text" class="normalText" name="nom_cat" id="nom_cat" value="<?php echo $categoria; ?>" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" class="normalText" name="editar_cat" id="editar_cat" value="Editar" />
    </label></td>
  </tr>
</table>

</form>
</center><?php } }else{ ?>
<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="editcat" name="editcat" method="post" action="">
<table width="237" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong><img src="images/cat_add.png" alt="Agregar Categoria" width="64" height="64" />Buscar Categoria</strong></td>
  </tr>
  <tr>
    <td width="81" class="normalText">ID Categoria</td>
    <td width="156">
      <select name="nom_cat" id="nom_cat" class="normalText">
<?php  
$result=mysql_query("SELECT ID_Categoria,nombre FROM categoria order by nombre",$conexion);
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
      <input type="submit" onClick="return buscat();" class="normalText" name="buscar_cat" id="buscar_cat" value="Buscar" />
    </label></td>
  </tr>
</table>

</form>
</center>
<?php 
}?>