<?php
	$menu=mysql_query($query_menu, $cleyenlinea) or die(mysql_error());
	for ($i=0;$i<=$totalRows_menu;$i++)
	{
		$fila = mysql_fetch_object($menu);
		$coditemsup= $fila->coditem;
		$nombre = $fila->nombre;
		$posicion = $fila->posicion;
		$nivel = $fila->nivel;
		$vinculo = $fila-> vinculo;
			if ($nivel == 0)
				if ($posicion == $posicionreal)
					echo "<div class='itemSubMenu1'><a href='#$vinculo' class='navegacionAJAX'>$nombre</a></div>";	
			if ($nivel == 1)
				if ($posicion == $posicionreal){
					echo "<div class='itemSubMenu1'><a href='#$vinculo' class='navegacionAJAX'>$nombre</a>";
					echo "<div class='2doGrupoItems'>";
					$submenu=mysql_query($query_menu, $cleyenlinea) or die(mysql_error());
					for ($j=0;$j<=$totalRows_menu;$j++)
					{
					$fila2 = mysql_fetch_object($submenu);
					$coditem= $fila2->coditem;
					$nombre2 = $fila2->nombre;
					$posicion = $fila2->posicion;
					$nivel = $fila2->nivel;
					$coditemr = $fila2->coditemr;
					$vinculo = $fila2-> vinculo;
						if ($coditemr == $coditemsup)
							if ($nivel == 2)
								echo "<div class='itemSubMenu2'><a href='#$vinculo' class='navegacionAJAX'>$nombre2</a></div>";
					}
					echo '</div></div>';
				}
	}
?>