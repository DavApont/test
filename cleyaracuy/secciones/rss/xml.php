<?php
header('Content-Type: text/xml'); //Indicamos al navegador que es un documento en XML
echo <?phpxml version="1.0" encoding="iso-88859-1"?>; //Versión y juego
de carácteres de nuestro documento
//Aquí la conexión o archvio de conexión a la base de datos
//Hacemos la consulta y la ordenamos por post para mostrar siempre el último
$resultado=mysql_query("select * from noticias order by id_post Desc",$link);
$row=mysql_fetch_array($resultado);
//"Cortaremos" el artículo en 300 caracteres para nuestra descripción
$descripcion=substr($row[articulo],0,300)."...";
// Y generamos nuestro documento
echo '<rss version="2.0">
<channel>
<title>Nombre de nuestro blog o web</title>
<link>http://www.miurl.com/</link>
<language>es-CL</language>
<description>Descripción de nuestro blog o web</description>
<generator>Autor del RSS</generator>
<item>
<title>'.$row[titulo].'</title>
<link>http://www.miurl.com/noticias.php?id='.$row[id_post].'</link>
<comments>http://www.miurl.com/comentarios.php?id='.$row[id_post].'
</comments>
<pubDate>'.$row[fecha].'</pubDate>
<category>'.$row[categoria].'</category>
<guid>http://www.miurl.com/comentarios.php?id='.$row[id_post].'</guid>
<description><![CDATA['.$descripcion.']]></description>
<content:encoded><![CDATA['.$row[articulo].']]></content:encoded>
</item></channel></rss>';
?> 



header('Content-type: text/xml; charset="iso-8859-1"', true);

echo '<?phpxml version="1.0" encoding="iso-8859-1"?>';
