<?php 
    $dbhost = "localhost"; //Host del mysql 
    $dbuser = "root"; //Usuario del mysql 
    $dbpass = ""; //Password del mysql 
    $db = "encuesta"; //db donde se crear� la tabla users 
     
    //conectamos y seleccionamos db 
    mysql_connect("$dbhost","$dbuser","$dbpass"); 
    mysql_select_db("$db"); 
    session_start(); 
?>