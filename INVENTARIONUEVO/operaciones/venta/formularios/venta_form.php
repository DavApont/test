<!DOCTYPE html>
<html>
<head>

<title></title>

<link href="../css/form-contact.css" rel="stylesheet" type="text/css" /> <!-- AJAX Contact Form Stylesheet -->

<script src="../js/jquery/jquery-latest.js"></script>
<script src="../js/jquery/jquery-ui.min.js"></script>
<script src="../js/jquery/jquery.jigowatt.js"></script> <!-- AJAX Form Submit -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>

	<section id="contact">

		

		<mark id="message"></mark>

		<form method="post" action="classes/contact.php" name="contactform" id="contactform" autocomplete="on">
<fieldset>

				<legend>Compra de Productos</legend>
				<table >
					<tr>
						<td>
										
							<tr id="rif">
		<td><span id="rif">Proveedor<span class="ewRequired">&nbsp;*</span></span>
		     <br />
<span id="rif" class="control-group"><SELECT NAME="proveedor" id="proveedor">
<?
	
		include('../../../conexion.php');  //Conexion con la base de datos
			conectar();
	
		$consulta = "select * from proveedor";
		$resultado = mysql_query($consulta);
		
		
		if(mysql_num_rows($resultado)) {

			while($detalles = mysql_fetch_array($resultado)) {

				echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[0].'-'.$detalles[1].'</OPTION>';
			
			}

		}
		?>	</SELECT></span>
</td>

		<td><span id="fecharecepcion">Fecha de Compra<span class="ewRequired">&nbsp;*</span></span>    <br />
<span id="fecharecepcion" class="control-group">
<input type="date" data-field="fecharecepcion" name="fecharecepcion" id="fecharecepcion" size="30" maxlength="30" placeholder="fecharecepcion" value="">
</span>
</td>

		

		<td><span id="observacion">Observacion<span class="ewRequired">&nbsp;*</span></span><br />
<span id="observacion" class="control-group">
								<textarea rows="2" style="width: 220px;" cols="1"></textarea>
</span>
</td>
	</tr>
								
				
						</td>
					</tr>
				</table>
				
			</fieldset>

			<fieldset>

				
				<table id="customFields">
					<tr>
						
							<div class="news">					
							<td>	<label for="name" accesskey="U">Producto</label>
								<input name="name" type="text" id="name" placeholder="" required="required" />	<td>
														<td>	<label for="name" accesskey="U">Departamento</label>
<SELECT NAME="cedulae" id="cedulae">
<?

		$consulta = "select * from departamento";
		$resultado = mysql_query($consulta);
		
		
		if(mysql_num_rows($resultado)) {

			while($detalles = mysql_fetch_array($resultado)) {

				echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[1].'</OPTION>';
			
			}

		}
		?>	</SELECT>						<td>		<label for="name" accesskey="U">Cantidad</label>
								<input name="name" type="text" id="name" placeholder="" required="required" /><td>
						<td>		<label for="name" accesskey="U">Precio Unitario</label>
								<input name="name" type="text" id="name" placeholder="" required="required" /><td>
						
									<br>
							
								<a href="javascript:void(0);" style="text-decoration: none; color: #444; font-size: 14px;" class="addCF"><img src="../img/16/add_16.png" alt="A&ntilde;adir Otra">A&ntilde;adir Otro</a>
								
							</div>
				
					</tr>
				</table>
				
			</fieldset>

			

			<input type="submit" class="submit" id="submit" value="Guardar" />
			<input type="reset" class="submit" id="submit" value="Limpiar" />
			<input type="submit" class="submit" id="submit" value="Vert Almacen" />

		</form>

	</section>
		<!-- Add - Remove Rows Plugin -->
		<script type="text/javascript">
			var i = 0;
				$(document).ready(function(){
					$(".addCF").click(function(){
						i++;
						$("#customFields").append('<tr><div class="news"><td>	<label for="name" accesskey="U">Producto</label>								<input name="name" type="text" id="name" placeholder="" required="required" />	<td>														<td>	<label for="name" accesskey="U">Departamento</label><SELECT NAME="cedulae" id="cedulae"><?

		$consulta = "select * from departamento";
		$resultado = mysql_query($consulta);
		
		
		if(mysql_num_rows($resultado)) {

			while($detalles = mysql_fetch_array($resultado)) {

				echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[1].'</OPTION>';
			
			}

		}
		?>	</SELECT>						<td>		<label for="name" accesskey="U">Cantidad</label>								<input name="name" type="text" id="name" placeholder="" required="required" /><td>						<td>		<label for="name" accesskey="U">Precio Unitario</label>								<input name="name" type="text" id="name" placeholder="" required="required" /><td>							 <br><hr> <a href="javascript:void(0);" style="text-decoration: none; color: #444; font-size: 14px;" class="remCF"><img src="../img/16/close_16.png" alt="Eliminar">Eliminar</a></div></tr>');
					});
					$("#customFields").on('click','.remCF',function(){
						$(this).parent().parent().remove();
					});
				});
		</script>
</body>
</html>
