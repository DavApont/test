<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cleyenlinea = "localhost";
$database_cleyenlinea = "cleyarac";
$username_cleyenlinea = "root";
$password_cleyenlinea = "";
$cleyenlinea = mysql_pconnect($hostname_cleyenlinea, $username_cleyenlinea, $password_cleyenlinea) or trigger_error(mysql_error(),E_USER_ERROR); 
?>