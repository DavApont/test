<? 
$destinatario = "coplasllaneras.net@hotmail.com"; 
$asunto = $_POST[asunto]; 
$cuerpo = $_POST[mensaje]; 

//para el env�o en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//direcci�n del remitente 
$headers .= "From: $_POST[nombre] <$_POST[correo]>\r\n"; 

//direcci�n de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: coplasllaneras.net@hotmail.com\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibi�n copia 
$headers .= "Cc: coplasllaneras@gmail.com\r\n"; 

//direcciones que recibir�n copia oculta 
$headers .= "Bcc: alexdavidve@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 
?> 
<script type="text/javascript">
<!--
window.location = "http://www.coplasllaneras.net"
//-->
</script>
