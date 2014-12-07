<?php 
    include('acceso_DB.php'); // Este archivo contendrá nuestros datos de conexión a MySQL 
    if(isset($_POST['votar'])) { 
        if($_POST['opciones'] == '') { 
            echo "No se ha seleccionado ninguna opción. <a href='javascript:history.back()'>Regresar</a>"; 
        }else { 
            $opciones = $_POST['opciones']; 
            $sql = mysql_query("SELECT * FROM encuestas_opt WHERE id_opt='".$opciones."'"); 
            $row = mysql_fetch_array($sql); 
            $suma = $row['num_votos']+1; 
            $ip_votar = $_SERVER['REMOTE_ADDR']; 
	    $fecha = date('Y-m-d');
            mysql_query("UPDATE encuestas_opt SET num_votos='".$suma."' WHERE id_opt='".$opciones."'"); 
            mysql_query("INSERT INTO encuestas_ip (ip_voto) VALUES('".$ip_votar."')"); 
            $redir = $_SERVER['HTTP_REFERER']; 
            header("Location: $redir"); 
        } 
    }else { 
        echo "Operación incorrecta. <a href='javascript:history.back()'>Regresar</a>"; 
    } 
?> 