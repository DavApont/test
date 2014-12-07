<?php


if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "nivel_acceso";
  $MM_redirectLoginSuccess = "index.php?go=cpanel2";
  $MM_redirectLoginFailed = "index.php?go=cpanel";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_tesis, $tesis);
  	
  $LoginRS__query=sprintf("SELECT usuario, pass, nivel_acceso, nombre, apellido FROM usuarios WHERE usuario=%s AND pass=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $tesis) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel_acceso');
    $rows = mysql_fetch_object($LoginRS);
	$nombreusuario = $rows->nombre;
    //Aqui designo y declaro las dos variables
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
    $_SESSION['MM_Nomusuario'] = $nombreusuario;
    $_SESSION['MM_Apeusuario'] = $apellidousuario;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
	}
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>