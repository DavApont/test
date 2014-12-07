<? 
$destinatario = "coplasllaneras.net@hotmail.com"; 
$asunto = $_POST[asunto]; 
$cuerpo = $_POST[mensaje]; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: $_POST[nombre] <$_POST[correo]>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: coplasllaneras.net@hotmail.com\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: coplasllaneras@gmail.com\r\n"; 

//direcciones que recibirán copia oculta 
$headers .= "Bcc: alexdavidve@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 
?> 
<script type="text/javascript">
<!--
window.location = "http://www.coplasllaneras.net"
//-->
</script>
