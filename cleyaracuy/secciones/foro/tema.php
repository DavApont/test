<?php $hilo=$vvarible{'hilo'}; ?>
<div id="cont-foro">
<?php
$sql="SELECT * FROM hilo WHERE id = '$hilo'";
mysql_select_db($database_cleyenlinea_foro, $cleyenlinea_foro);
$vector=mysql_query($sql, $cleyenlinea_foro) or die(mysql_error());
$resultados=mysql_fetch_assoc($vector);
$sql="SELECT * FROM usuario WHERE idusuario = '".$resultados['user']."'";
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$VectorUser=mysql_query($sql, $cleyenlinea) or die(mysql_error());
$ResultadosUser=mysql_fetch_assoc($VectorUser);
$sql="SELECT * FROM post WHERE padre = '".$resultados['id']."'";
mysql_select_db($database_cleyenlinea_foro, $cleyenlinea_foro);
$VectorPost=mysql_query($sql, $cleyenlinea_foro) or die(mysql_error());
$CantidadPost=mysql_num_rows($VectorPost);
?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Foros de Discusi\xf3n - Foro de <?php echo $resultados['titulo']; ?>";
}
cambiarTituloPagina();
</script>

<div class="bordesup-seccion-foro"></div>
<table class="tabla-seccion-foro">
    <thead>
        <tr>
            <th class="cabecera-seccion-foro" scope="col" width="80%" style="border-left:2px #970713 solid;">
				<?php echo $resultados['titulo']; ?>
            </th>
            <th class="cabecera-seccion-foro" scope="col" width="20%" style="border-right:2px #970713 solid;">
            	Usuario
            </th>
        </tr>
    </thead>
    
<tbody>
    <tr class="lista-tema-seccion-foro2">
        <td style="border-left:2px #970713 solid;vertical-align:top;">
            <span class="datos-post">Por <a href="#"><?php echo $ResultadosUser['nombre']; ?></a>
			<?php FuncionFecha($resultados['fecha']); ?></span>
			<div class="cont-btn-post-foro">
			<?php if(($_SESSION['MM_Usernivel'] == 2) OR ($_SESSION['MM_nivelforo'] == 2) OR ($_SESSION['MM_iduser'] == $resultados['user'])){ ?>
                <a href="#" class="btn-post-foro" title="Editar"></a>
                <a href="#" class="btn-post-foro" title="Eliminar"></a>
                <?php } ?>
                <a href="#" class="btn-post-foro" title="Reportar"></a>
                <a href="#" class="btn-post-foro" title="Citar"></a>
            </div>
			<p><?php echo $resultados['contenido']; ?></p>
        </td>
        <td rowspan="2" style="border-right:2px #970713 solid;">
            <p><img src="img/user/<?php if($ResultadosUser['imagen'] <> ""){ echo $ResultadosUser['imagen']; }else{ echo "sin_avatar.png"; } ?>" /><br />
            <a href="#"><?php echo $ResultadosUser['nombre']; ?></a></p>
            Rango:<br />
            Mensajes:<br />
            Registrado:<br />
        </td>
    </tr>
    
    <tr class="lista-tema-seccion-foro">
        <td style="border-left:2px #970713 solid;border-right:2px #970713 solid;">
			<?php echo $ResultadosUser['firma']; ?>
        </td>
    </tr>
</tbody>
</table>
<div class="bordeinf-seccion-foro"></div>

<?php mysql_free_result($VectorUser); ?>
<?php //Inicio Post ?>
<?php for($i=1;$i<=$CantidadPost;$i++){ ?>
<?php $ResultadosPost=mysql_fetch_assoc($VectorPost); ?>
<?php
$sql="SELECT * FROM usuario WHERE idusuario = '".$ResultadosPost['user']."'";
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$VectorUser=mysql_query($sql, $cleyenlinea) or die(mysql_error());
$ResultadosUser=mysql_fetch_assoc($VectorUser);
?>

<table class="tabla-seccion-foro">
  <tr>
    <td><?php echo $ResultadosPost['titulo']; ?></td>
    <td><?php if(($_SESSION['MM_Usernivel'] == 2) OR ($_SESSION['MM_nivelforo'] == 2) OR ($_SESSION['MM_iduser'] == $ResultadosPost['user'])){ ?>Editar Eliminar <?php } ?> Reportar Citar</td>
    <td rowspan="4"><p><img src="img/user/<?php echo $ResultadosUser['imagen']; ?>" /><br />
    <a href="#"><?php echo $ResultadosUser['nombre']; ?></a></p>
    Rango:<br />
    Mensajes:<br />
    Registrado:<br /></td>
  </tr>
  <tr>
    <td colspan="2">Por <a href="#"><?php echo $ResultadosUser['nombre']; ?></a> <?php FuncionFecha($resultados['fecha']); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $ResultadosPost['contenido']; ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $ResultadosUser['firma']; ?></td>
  </tr>
</table>
<?php mysql_free_result($VectorUser); ?>
<?php } ?>
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
<?php mysql_free_result($vector); ?>
