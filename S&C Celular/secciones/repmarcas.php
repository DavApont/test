<style>
 .trup{background-color: white;}
 .trdown{background-color: #c0c0c0;}
</style>
<script type="text/javascript">
function alternate(id){
 if(document.getElementsByTagName){  
   var table = document.getElementById(id);  
   var rows = table.getElementsByTagName("tr");  
   for(i = 0; i < rows.length; i++){          
 //manipulate rows
     if(i % 2 == 0){
       rows[i].className = "trup";
     }else{
       rows[i].className = "trdown";
     }      
   }
 }
}
</script>
<body onload="alternate('repmarca')">
<center>
<table id="repmarca" width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" class="titulocajitas"><center>
      Reporte Marcas
    </center></td>
  </tr>
<?Php
mysql_select_db($database, $conexion);
$result=mysql_query("SELECT idmodelo,marca FROM modelo ", $conexion);

while($marca=mysql_fetch_row($result)){

?>
  <tr>
    <td width="32" class="titulocajitas">N&deg;<?Php echo "$marca[0]"; ?>
      <center>
    </center></td>
    <td width="402" class="titulocajitas"><?Php echo "$marca[1]"; ?></td>

  </tr>
<?Php
}
mysql_close($conexion);
?>
  <tr>
    <td colspan="3" class="titulocajitas">&nbsp;</td>
  </tr>
</table>
</center>