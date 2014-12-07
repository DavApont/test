<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_menu = "SELECT * FROM menusup ORDER BY orden, coditem";
$totalmenu=mysql_query($query_menu, $cleyenlinea) or die(mysql_error());
$totalRows_menu = mysql_num_rows($totalmenu);
?>