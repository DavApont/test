
<html lang="en">
<head>
  <meta charset="utf-8">
<link href="estilo_tabla.css" rel="stylesheet"/>

</head>
<body>
 <div class="datagrid"><table>

	<thead><tr><th>Productos</th><th>Existencia</th></tr></thead>
 <?
	
	include('../../conexion.php');  
				conectar();
				
		$str_proyecto="SELECT * FROM departamento ";
		$res=mysql_query($str_proyecto);	
		$num=0;	 	 
		$num=mysql_num_rows($res);					
			if($num>0){
				for ($j = 0; $j < $num; $j++){ 
					
					$proyecto=mysql_fetch_array($res);
					
						?>

<tbody> <tr><td><h2><? echo " $proyecto[nombre_departamento] "; ?></h2></td></tr>
</tbody>
		
<?	$str_avance="SELECT * FROM producto WHERE codigo_departamento = '". $proyecto['codigo_departamento'] ."'";
					$result=mysql_query($str_avance);	
					while($avance=mysql_fetch_array($result)) {	?>


<tr><td><? echo " $avance[nombre_producto]	"; ?></td><td><? echo " $avance[cantidad_existencia]	"; ?></td></tr>
</tbody>				
 
		
	<?	}}}	?>
			 



</table></div>
 
</body>
</html>