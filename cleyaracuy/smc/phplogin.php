<?php
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
$id=$_GET['id'];
$vinculo=$_GET['vinculo'];
if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "nivel";
  $MM_redirectLoginSuccess = "index.php?id=$id&vinculo=$vinculo";
  $MM_redirectLoginFailed = "index.php?id=$id&vinculo=$vinculo";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_cleyenlinea, $cleyenlinea);
  	
  $LoginRS__query=sprintf("SELECT * FROM usuario WHERE nombreusuario=%s AND contrasena=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $cleyenlinea) or die(mysql_error());
  $row_Login = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');
    
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
	$_SESSION['MM_Userdepartamento'] = $row_Login['departamento'];
	$_SESSION['MM_Usernombre'] = $row_Login['nombre'];
	$_SESSION['MM_Usernivel'] = $row_Login['nivel'];
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    $_POST['cabecera']=1;
  }
  else {
    $_POST['cabecera']=1;
  }
}
?>