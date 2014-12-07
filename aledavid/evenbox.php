<?
//Base de datos

$dbhost = "localhost";    // el host donde se encuentra tu base de datos (normalmente localhost)
$dbuser = "comuue";    // el usuario de la base de datos
$dbpass = "ijuzk5ua";    // el password de la base de datos
$db = "comuue_pbb";     // el nombre de la base de datos
$pretabla = "phpbb";     // el prefijo de las tablas del foro

//otras configs
$numnoticias = "5";     // numero de noticias a mostrar
$idelforo = "23";     // la id del foro donde entraras tus noticias
$urlforo = "http://union-eterna.com/foros";    // SIN / AL FINAL!! por ejemplo: asi si >> "http://hola.com/foro" , asi no!! >> "http://hola.com/foro/"
$max_car = "25";     // max de caracteres en el titulo
$url_style = "evenbox.htm";     // url del archivo que contiene la tabla
$separar = "Si";     // separar cada tabla por un <br>?(espacio), opciones: Si, No


/////////////////////////////////////////////////////////////////////////////////////////
////////Fin configuracion, no tocar nada de aqui debajo si no sabes lo que haces!////////
/////////////////////////////////////////////////////////////////////////////////////////

$conectar = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error()); 
mysql_select_db($db,$conectar) or die(mysql_error());

$topics = mysql_query("select * from ".$pretabla."_topics where forum_id='$idelforo' ORDER BY topic_time DESC LIMIT 0, $numnoticias") or die(mysql_error());
while($dat_topics = mysql_fetch_array($topics)){

$posts = mysql_query("select * from ".$pretabla."_posts where topic_id='$dat_topics[topic_id]' AND post_id='$dat_topics[topic_first_post_id]'");
$dat_posts = mysql_fetch_array($posts);

$posts_text = mysql_query("select * from ".$pretabla."_posts_text where post_id='$dat_posts[post_id]'");
$dat_text = mysql_fetch_array($posts_text);

$de_quien = mysql_query("select * from ".$pretabla."_users where user_id='$dat_topics[topic_poster]'");
$quien_datos = mysql_fetch_array($de_quien);

$texto_news = nl2br($dat_text[post_text]);

$emotic = mysql_query("select * from ".$pretabla."_smilies");
while($emot_datos = mysql_fetch_array($emotic)){
$texto_news = str_replace($emot_datos[code],"<img src=$urlforo/images/smiles/$emot_datos[smile_url]>", $texto_news);}

$texto_news = str_replace("[b:".$dat_text[bbcode_uid]."]","<b>", $texto_news);
$texto_news = str_replace("[/b:".$dat_text[bbcode_uid]."]","</b>", $texto_news);
$texto_news = str_replace("[i:".$dat_text[bbcode_uid]."]","<i>", $texto_news);
$texto_news = str_replace("[/i:".$dat_text[bbcode_uid]."]","</i>", $texto_news);
$texto_news = str_replace("[u:".$dat_text[bbcode_uid]."]","<u>", $texto_news);
$texto_news = str_replace("[/u:".$dat_text[bbcode_uid]."]","</u>", $texto_news);
$texto_news = str_replace("[img:".$dat_text[bbcode_uid]."]","<img src=", $texto_news);
$texto_news = str_replace("[/img:".$dat_text[bbcode_uid]."]",">", $texto_news);
$texto_news = str_replace("[url]","<b><a href=", $texto_news);
$texto_news = str_replace("[/url]",">:LINK:</a></b>", $texto_news);

//colores...

$texto_news = str_replace("[color=darkred:".$dat_text[bbcode_uid]."]","<font color='#990000'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=red:".$dat_text[bbcode_uid]."]","<font color='#ff0000'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=orange:".$dat_text[bbcode_uid]."]","<font color='#FF9900'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=brown:".$dat_text[bbcode_uid]."]","<font color='#990000'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=yellow:".$dat_text[bbcode_uid]."]","<font color='#FFFF00'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=green:".$dat_text[bbcode_uid]."]","<font color='#009900'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=olive:".$dat_text[bbcode_uid]."]","<font color='#00CC66'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=cyan:".$dat_text[bbcode_uid]."]","<font color='#00FFFF'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=blue:".$dat_text[bbcode_uid]."]","<font color='#0000FF'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=darkblue:".$dat_text[bbcode_uid]."]","<font color='#006699'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=indigo:".$dat_text[bbcode_uid]."]","<font color='#9900FF'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=violet:".$dat_text[bbcode_uid]."]","<font color='#FF00FF'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=white:".$dat_text[bbcode_uid]."]","<font color='#FFFFFF'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[color=black:".$dat_text[bbcode_uid]."]","<font color='#000000'>", $texto_news);
$texto_news = str_replace("[/color:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

//Tamaño letras..

$texto_news = str_replace("[size=7:".$dat_text[bbcode_uid]."]","<font size='-7'>", $texto_news);
$texto_news = str_replace("[/size:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[size=9:".$dat_text[bbcode_uid]."]","<font size='1'>", $texto_news);
$texto_news = str_replace("[/size:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[size=12:".$dat_text[bbcode_uid]."]","<font size='2'>", $texto_news);
$texto_news = str_replace("[/size:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[size=18:".$dat_text[bbcode_uid]."]","<font size='3'>", $texto_news);
$texto_news = str_replace("[/size:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[size=24:".$dat_text[bbcode_uid]."]","<font size='4'>", $texto_news);
$texto_news = str_replace("[/size:".$dat_text[bbcode_uid]."]","</font>", $texto_news);

$texto_news = str_replace("[quote:".$dat_text[bbcode_uid]."]","<font size='1' face='Verdana, Arial, Helvetica, sans-serif'>&nbsp;&nbsp;Cita:</font><br> 
<table width='90%' border='0' cellpadding='2' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td bgcolor='#F8F8F8'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>", $texto_news);

$texto_news = str_replace("[/quote:".$dat_text[bbcode_uid]."]","</font></td>
  </tr>
</table>", $texto_news);

$texto_news = preg_replace("/\[quote:".$dat_text[bbcode_uid]."=(?:\"?([^\"]*)\"?)\]/si", "<font size='1' face='Verdana, Arial, Helvetica, sans-serif'>&nbsp;&nbsp;Cita:</font><br> 
<table width='90%' border='0' cellpadding='2' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td bgcolor='#F8F8F8'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>", $texto_news);

if (strlen($dat_text[post_subject]) > $max_car) { 
$dat_text[post_subject] = substr($dat_text[post_subject],0,$max_car)."...";}

//$style = require("theme.htm");
$style = fread(fopen($url_style, 'r'), filesize($url_style));

$style = eregi_replace("{titulo}", "<a href='$urlforo/viewtopic.php?t=$dat_topics[topic_id]'>$dat_text[post_subject]</a>", $style);
$style = eregi_replace("{textnews}", substr($texto_news,0,100).' ...', $style);
$style = eregi_replace("{autor}", "<a href='$urlforo/profile.php?mode=viewprofile&u=$dat_topics[topic_poster]' target='_blank'>$quien_datos[username]</a>", $style);
$style = eregi_replace("{comentarios}", "<a href='$urlforo/viewtopic.php?t=$dat_topics[topic_id]' target='_blank'>Comentarios ($dattopics[topic_replies])</a>", $style);

if($separar == "Si"){
$style .= "<br>";}


mysql_free_result($emotic);
mysql_free_result($de_quien);
mysql_free_result($posts_text);
mysql_free_result($posts);

echo"$style";

}

mysql_free_result($topics);

echo"";

?>