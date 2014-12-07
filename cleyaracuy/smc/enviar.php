<?php
mysql_connect("localhost","root","vertrigo");
mysql_select_db("noticias");
$imagen = addslashes(fread(fopen($imagen, "r"), filesize($imagen)));
$fechapub = $_POST["fechapub"];
$tiempodepub = $_POST["tiempodepub"];
$prioridad = $_POST["prioridad"];
$emisor = $_POST["emisor"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$contenido = $_POST["contenido"];
$tipo = $_POST["tipo"];
$titular = $_POST["titular"];
$periodista = $_POST["periodista"];
$titulo2 = $_POST["titulo2"];
mysql_query("INSERT INTO noticias (fechapub, tiempodepub, prioridad, emisor, imagen, titulo, descripcion, contenido, tipo, titular, periodista, titulo2) VALUES ($fechapub, $tiempodepub, $prioridad, $emisor, $imagen, $titulo, $descripcion, $contenido, $tipo, $titular, $periodista, $titulo2)");
?>Se ha subido la imagen a la base de datos, puedes verla pulsando <a href="ver.php?nombre=<?php echo $nombre ?>">aquí</a>