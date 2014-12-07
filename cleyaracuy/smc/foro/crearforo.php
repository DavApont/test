<?php include("../connections/foro.php"); ?>
<?php
$sql="SELECT * FROM foro where tipo = 1";
mysql_select_db($database_cleyenlinea_foro, $cleyenlinea_foro);
$vector=mysql_query($sql, $cleyenlinea_foro) or die(mysql_error());
$cantidad=mysql_num_rows($vector);
?>
<form id="form1" name="form1" method="post" action="">
  <h1><p>Crear Foro</p></h1>
    <p>
      <label>Tipo de Foro: 
        <select name="tipo" id="tipo">
          <option selected="selected">Tipo</option>
          <option value="1">Secciones</option>
          <option value="2">Foro</option>
        </select>
      </label>
    </p>
  <p>
    <label>Seccion Padre:
      <select name="padre" id="padre">
      <option selected="selected">Ninguno</option>
      <?php for ($j=1;$j<=$cantidad;$j++){ ?>
      <?php $resultados=mysql_fetch_assoc($vector); ?>
        <option value="<?php echo $resultados['id']; ?>"><?php echo $resultados['nombre']; ?></option>
      <?php } ?>
      </select>
    </label>
  </p>
  <p>
    <label>
      Nombre del Foro
      <input type="text" name="nombre" id="nombre" />
    </label>
  </p>
  <p>
    <label>
      Descripcion del Foro
      <textarea name="descripcion" id="descripcion" cols="45" rows="5"></textarea>
    </label>
  </p>
  <p>
    <label>
      Hilo del 
      Reglamento
        <input type="text" name="reglamento" id="reglamento" />
    </label>
  </p>
  <p>Moderador 
    <label>
      <select name="moderador" id="moderador">
      </select>
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="btncrearforo" id="btncrearforo" value="Crear Foro" />
    </label>
  </p>
</form>
