    function ActivarnuevoSede(){
        document.getElementById('codigoSede').disabled = false;
		document.getElementById('nombreSede').disabled = false;
    }
	    function ActivarnuevoTipo(){
        document.getElementById('nombreTipo').disabled = false;
    }
	    function ActivarnuevoUbicacion(){
        document.getElementById('nombreUbicacion').disabled = false;
    }
	
	
	function SoloLetras() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  event.returnValue = false;
}

function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}

function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}


function validarCampoVacio(formulario) {
  if(formulario.nombre.value.length==0) { //comprueba que no esté vacío
    formulario.nombre.focus();   
    alert('No has escrito tu nombre'); 
    return false; //devolvemos el foco
  }
  if(formulario.email1.value.length==0) { //comprueba que no esté vacío
    formulario.email1.focus();
    alert('No has escrito tu e-Mail');
    return false;
  }
  if(formulario.email1.value!=formulario.email2.value) {
    formulario.email1.focus();            //comprueba que sean iguales
	alert('Los e-Mails no coinciden');
    return false;
  }
  if(formulario.consulta.value.length==0) {  //comprueba que no esté vacío
    formulario.consulta.focus();
    alert('No has escrito ninguna consulta');
    return false;
  }
  return true;
}

function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
   alert("La dirección de email " + valor + " es correcta.");
  } else {
   alert("La dirección de email es incorrecta.");
  }
}

function EsTelefonoFijo(tel) 
{ 
var test = /^[89]\d{8}$/; 
var telReg = new RegExp(test); 
return telReg.test(tel); } 



function EsTelefonoMovil(tel) 
{ 
var test = /^[6]\d{8}$/;
 var telReg = new RegExp(test); 
 return telReg.test(tel); 
 } 
