//------------------------------------------------------------------------------
// Colocar / a la fecha
//------------------------------------------------------------------------------
function FormatoFecha(fecha) {

if (fecha.value.length == 2 || fecha.value.length == 5){
    fecha.value = fecha.value + '/';
  }
}

//------------------------------------------------------------------------------
// Colocar . a la Cedula
//------------------------------------------------------------------------------
function FormatoCedula(cedula) {

  if (cedula.value.length == 2 || cedula.value.length == 6 ){
    cedula.value = cedula.value + '.';

  }
}

//------------------------------------------------------------------------------
// Validar Formato de Fechas
//------------------------------------------------------------------------------

function ValidDate(fecha){
   if (fecha.value != "" ) {
      var fec_err=h_err=dia=mes=anio=hh=minutos=segundos=0;
      var mesaux = 0;
      fec_err = (((fecha.value.substring(2,3) == "/") ||
                  (fecha.value.substring(2,3) == "/")) &&
                 ((fecha.value.substring(5,6) == "/") ||
                  (fecha.value.substring(5,6) == "/")))? "0":"1";

      if (IsUnsignedInt(fecha.value.substring(0,2))) {
         dia = fecha.value.substring(0,2);
      } else { 
        fec_err = 1;
      }
      mesaux = fecha.value.substring(3,5);
      mesaux = mesaux.toUpperCase();
      if (mesaux == '01') { mesaux = '01';};
      if (mesaux == '04') { mesaux = '04' };
      if (mesaux == '08') { mesaux = '08' };
      if (mesaux == '12') { mesaux = '12' };
      if (mesaux == '01' || mesaux == '02' || mesaux == '03' || mesaux == '04' ||
         mesaux == '05' || mesaux == '06' || mesaux == '07' || mesaux == '08' ||
         mesaux == '09' || mesaux == '10' || mesaux == '11' || mesaux == '12') {
         mes = mesaux;
      } else {
        fec_err = 1;
      }

      if ( IsUnsignedInt(fecha.value.substring(6,10))) {
         anio = fecha.value.substring(6,10);
      } else {
        fec_err = 1;
      }

      if (anio < 1000 || anio > new Date().getFullYear()) { fec_err=1 }

      if ((dia > 31 || mes > 12 || dia <= 0 || mes <= 0 ) ||
         ((!LeapYear(anio)) && mes == '02' && dia > 28) || ((LeapYear(anio)) && mes == '02' && dia > 29)
         ||(fec_err == 1)||((mes == 04 || mes == 06 || mes == 09 || mes == 11) && dia > 30)) {
        
         alert("La Fecha no es Valida. El formato es DD/MM/AAAA");
         fecha.value = "";
         fecha.focus();
         return false;
      } else {
        fecha.value = dia + '/' + mes + '/' + anio;
      }
   }
   return true;
}
//------------------------------------------------------------------------------
// Calculadora
//------------------------------------------------------------------------------
//function Calcula()
//{
//v=document.form1.select.options[document.form1.select.selectedIndex].value;
//if (isNaN(document.form1.subtotal.value) || (isNaN(document.form1.iva.value))){return false;}
//if (v==”^”){t=Math.pow(document.subtotal.txtn1.value , document.form1.iva.value);}
//else {t=eval(document.form1.subtotal.value +v+ document.form1.iva.value);}
//document.form1.txtr.value=t; return t;
//}
//------------------------------------------------------------------------------
// Validar campo solo entero
//------------------------------------------------------------------------------
// value="" onblur="compruebaValidoEntero()

function validarEntero(valor){
    //intento convertir a entero.
    //si era un entero no le afecta, si no lo era lo intenta convertir
    valor = parseInt(valor)

    //Compruebo si es un valor numérico
    if (isNaN(valor)) {
       //entonces (no es numero) devuelvo el valor cadena vacia
       return ""
    }else{
       //En caso contrario (Si era un número) devuelvo el valor
       return valor
    }
}
//------------------------------------------------------------------------------
// Comprobar campo de numero entero
//------------------------------------------------------------------------------
function compruebaValidoEntero(){
    enteroValidado = validarEntero(document.f1.numero.value)
    if (enteroValidado == ""){
       //si era la cadena vacía es que no era válido. Lo aviso
       alert ("Debe escribir un entero!")
       //selecciono el texto
       document.f1.numero.select()
       //coloco otra vez el foco
       document.f1.numero.focus()
    }else
       document.f1.numero.value = enteroValidado
} 
//------------------------------------------------------------------------------
// Colocar / a la fecha
//------------------------------------------------------------------------------
function total() {
	
    document.f1.iva.value = (stotal.value * (0.12))
	document.f1.total.value = (stotal.valu + iva.value)
 
}
//------------------------------------------------------------------------------
// 
//------------------------------------------------------------------------------