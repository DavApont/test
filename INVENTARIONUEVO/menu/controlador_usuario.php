<?php 
session_start();

 include("../conexion.php");
   conectar();
   
 $usuario = $_REQUEST["usuario"]; 
 $contrasena = $_REQUEST["contrasena"];
 
$conexion = mysql_connect("localhost", "root","");
mysql_select_db("bdproyectos", $conexion); 

   $strsql="SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";

     $num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);

	 if($num==0){
echo "<script language='JavaScript' type='text/javascript'>
alert('Usuario o Contraseña no validos');
</script>"; 
	echo "<script> location.href=\"../index.html\"; </script>"; 
	 }
	 else{	 
	   echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=menu.php'>";		
	  while($registro=mysql_fetch_array($result)){	   
		 $_SESSION['usuario']= $registro['usuario'];

	     $_SESSION['contrasena']= $registro['contrasena'];
		

	   	    }//fin del while   
     }
 ?>