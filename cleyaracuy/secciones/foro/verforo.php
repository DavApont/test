<?php $idforo=$vvarible{'verforo'}; ?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Foros de Discusi\xf3n - Foro de <?php ?>";
}
cambiarTituloPagina();
</script>
<div id="cont-foro">
<?php
$sql="SELECT * FROM hilo WHERE padre = '$idforo'";
mysql_select_db($database_cleyenlinea_foro, $cleyenlinea_foro);
$vector=mysql_query($sql, $cleyenlinea_foro) or die(mysql_error());
$cantidad=mysql_num_rows($vector);
?>
<div class="bordesup-seccion-foro"></div>
<table class="tabla-seccion-foro">
<?php //---------------------------------------------------------------------------------------------------------------------- // ?>
<?php //---------- Cabecera de Secciones ------------------------------- // ?>
    <thead>
        <tr>
            <th class="cabecera-seccion-foro" scope="col" colspan="2" width="55%" style="border-left:2px #970713 solid;"><strong>Temas</strong></th>
            <th class="cabecera-seccion-foro" scope="col" width="9%">Visitas</th>
            <th class="cabecera-seccion-foro" scope="col" width="10%">Respuestas</th>
            <th class="cabecera-seccion-foro" scope="col" width="26%" style="border-right:2px #970713 solid;">&Uacute;ltimo Msj.</th>
        </tr>
    </thead>
<?php //---------------------------------------------------------------------------------------------------------------------- // ?>
<?php //---------------------------------------------------------------------------------------------------------------------- // ?>
  <?php for ($j=1;$j<=$cantidad;$j++){ ?>
  <?php $resultados=mysql_fetch_assoc($vector); ?>
  <tbody>
      <tr class="lista-tema-seccion-foro">
        <td style="border-left:2px #970713 solid;">
            <img src="secciones/foro/forum_unread.gif" alt="" width="27" height="27" />
        </td>
        <td>
            <a href="#secciones/foro/index.php&foro=tema.php&hilo=<?php echo $resultados['id']; ?>">
                <strong><?php echo " - ".$resultados['titulo']; ?></strong>
            </a>
            <br />
            <span>
			<?php
			$sql="SELECT * FROM usuario WHERE idusuario = '".$resultados['user']."'";
			mysql_select_db($database_cleyenlinea, $cleyenlinea);
			$VectorUser=mysql_query($sql, $cleyenlinea) or die(mysql_error());
			$ResultadosUser=mysql_fetch_assoc($VectorUser);
			?>
            Por <a href="#"><?php echo $ResultadosUser['nombre']; ?></a> <?php FuncionFecha($resultados['fecha']); ?></span>
        </td>
        <td>25</td>
        <td>108</td>
        <td style="border-right:2px #970713 solid;">
            Por <a href="#" class="navegacionAJAX" title="Ver el Perfil de Este Usuario">Fulanito</a>
            <br />
            <a href="#" class="navegacionAJAX" title="Leer este tema">Titulo del Tema en que se posteo de ultimo</a>
            <br />
            <span>Dia tal del Mes tal, A&ntilde;o, Hora</span>
        </td>
      </tr>
  <?php } ?>
  </tbody>
</table>
<div class="bordeinf-seccion-foro"></div>
</div>

<?php if(($_SESSION['MM_Usernivel'] == 2) OR ($_SESSION['MM_nivelforo'] == 2) OR ($_SESSION['MM_nivelforo'] == 3)){ ?>
<form class="form_regular" id="crear-tema-foro" method="" action="">
    <fieldset>
    <legend>Elige una Fecha</legend>
    	<input type="text" id="titulo" />
        <select id="status">
        	<option selected="selected">Abierto</option>
            <option>Cerrado</option>
        </select>
        <textarea id="contenido"></textarea>
        <input type="button" class="btnFormAJAX" name="ir" id="ir" value="Ir">
        <input type="hidden" name="verforo" id="verforo" value="<?php echo $vvarible{'verforo'}; ?>" />
    </fieldset>
</form>
<?php } ?>
<?php mysql_free_result($vector); ?>