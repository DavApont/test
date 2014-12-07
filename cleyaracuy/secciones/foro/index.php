<?php include("connections/foro.php"); ?>
<?php include("connections/cleyEnLinea.php"); ?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Foros de Discusi\xf3n - \xcdndice General de Secciones";
}
cambiarTituloPagina();
</script>

<h1>Foros de Discusi&oacute;n</h1>
<p>&Iacute;ndice General de Secciones</p>

<?php
if($_POST['verforo']){
	include("secciones/foro/index.php&foro=verforo.php&verforo=".$_POST['verforo']);
}else{
$foro=$vvarible{'foro'};
if($foro <> NULL){
	$fin32='si';
}
switch($fin32)  {
	case 'si' : include("secciones/foro/$foro"); break;
	default : include("secciones/foro/principal.php"); 
}
}
?>
<p>¿Quién está conectado?</p>
<hr style="border-style: dashed; margin: 20px; color: rgb(204, 204, 204);"/>

  <?php
  /*
//online
$server = "YOUR HOST"; // usually localhost
$db_user = "USERNAME"; 
$db_pass = "PASSWORD"; 
$database = "DATABASE"; 
$timeoutseconds = 300; // length of gaps in the count
//get the time
$timestamp = time(); 
$timeout = $timestamp-$timeoutseconds; 
//connect to database
mysql_connect($server, $db_user, $db_pass); 
//insert the values
$insert = mysql_db_query($database, "INSERT INTO useronline VALUES
('$timestamp','$REMOTE_ADDR','$PHP_SELF')"); 
if(!($insert)) { 
     print ""; 
} 
//delete values when they leave
$delete = mysql_db_query($database, "DELETE FROM useronline WHERE timestamp<$timeout"); 
if(!($delete)) { 
    print ""; 
} 
//grab the results
$result = mysql_db_query($database, "SELECT DISTINCT ip FROM useronline WHERE file='$PHP_SELF'"); 
if(!($result)) { 
    print ""; 
} 
//number of rows = the number of people online
$user = mysql_num_rows($result); 
if(!($user)) {
print("ERROR: " . mysql_error() . "\n");
}
//spit out the results
mysql_close(); 
print("$user"); 
?>

CREATE TABLE `useronline` (

  `timestamp` int(15) NOT NULL default '0',

  `ip` varchar(40) NOT NULL default '',

  `file` varchar(100) NOT NULL default '',

  PRIMARY KEY  (`timestamp`),

  KEY `ip` (`ip`),

  KEY `file` (`file`)

)
*/
?>