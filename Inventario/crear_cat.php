<p class="normalText" align="center"><?php echo $log; ?></p>
<center>
<form id="creacat" name="form1" method="post" action="">
<table width="223" border="0" cellpadding="0" cellspacing="0" class="tablerouded">
  <tr>
    <td colspan="2" class="normalText"><strong><img src="images/cat_add.png" alt="Agregar Categoria" width="64" height="64" />Crear Categoria</strong></td>
  </tr>
  <tr>
    <td width="67" class="normalText">Nombre</td>
    <td width="156"><label>
      <input type="text" class="normalText" name="nom_cat" id="nom_cat" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" onClick="return creacate();" class="normalText" name="crear_cat" id="crear_cat" value="Crear" />
    </label></td>
  </tr>
</table>

</form>
</center>