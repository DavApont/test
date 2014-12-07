<html>
<head><title>SIGECE</title>

<!-- aqui se llaman a los estilos que estan dentro de las carpeta css -->
<link rel="stylesheet" type="text/css" href="../../css/estilos-buscador.css">
<link rel="stylesheet" href="../../css/assets/demo.css">
<link rel="stylesheet" type="text/css" href="../../css/font-awesome/css/font-awesome.css">

<!-- aqui se llama al script ajax que estan dentro de las carpeta js ubicada en el controlador -->
<script src="../../../controlador/js/ajax.js"></script>

<!-- este script es quien direcciona dependiendo de lo socilitado -->

<script>
function myFunction(){
var n=document.getElementById('bus').value;
if(n==''){
document.getElementById("myDiv").innerHTML="";
document.getElementById("myDiv").style.border="0px";
document.getElementById("pers").innerHTML="";
return;
}
loadDoc("q="+n,"../../../controlador/docentes/docenteCphp.php",function(){
if (xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
document.getElementById("myDiv").style.border="1px solid #A5ACB2";
}else{ document.getElementById("myDiv").innerHTML='<img src="../../img/load.gif" width="50" height="50" />'; }
});
}
//-------------------------------

    function conMayusculas(field) {
            field.value = field.value.toUpperCase()
}
</script>
</script>
</head>
<body>
<div id="wrapper">
<div class="formular">
<fieldset>
<legend>
<h2>
&nbsp;
Buscar Docentes
&nbsp;
</h2>
</legend>

<input type="text" id="bus" onkeyup="myFunction()" size="50" required="required" placeholder="Buscar"  onkeydown="conMayusculas(this)"/>

<div id="myDiv"></div>
<br>
<div id="pers"></div>
</fieldset>
</div>
</div>
</body>
</html>
