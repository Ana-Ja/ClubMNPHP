function PonerFoco() {
  if(document.forms.length > 0) {
	for(var i=0; i < document.forms[0].elements.length; i++) {
	  var campo = document.forms[0].elements[i];
	  if(campo.type != "hidden") {
		campo.focus();
		break;
	  }
	}
  }
}
function validarRegistro(miformu) {
	
	   //compruebo campos obligatorios
	    if( vacio(document.getElementById("username").value) == false ) {
			alert("Rellene el usuario.")
			return false
			} 
		if( vacio(document.getElementById("contrasena1").value) == false  ||  vacio(document.getElementById("contrasena2").value) == false ) {
			alert("Rellene la contrasena.")
			return false
			} 
		if( vacio(document.getElementById("email").value) == false ) {
			alert("Rellene el mail.")
			return false
			} 	
			if( vacio(document.getElementById("nombre").value) == false ) {
			alert("Rellene el nombre.")
			return false
			} 
		if( vacio(document.getElementById("apellidos").value) == false ) {
			alert("Rellene los apellidos.")
			return false
			} 
			
	   
	    
		
	 
  }
function vacio(q) {   
	 
        for ( i = 0; i < q.length; i++ ) {   
                if ( q.charAt(i) != " " ) {   
                        return true   
                }   
        }   
        return false   
     }  

function validarUsuario(miform) {
       	if( vacio(document.getElementById("username").value) == false ) {
			alert("Rellene el usuario.")
			return false
			} 
		 if( vacio(document.getElementById("contrasena").value)== false ) {
			alert("Rellene el contrasena.")
			return false
			} 
			if( vacio(document.getElementById("nombre").value) == false ) {
			alert("Rellene el nombre.")
			return false
			} 
		if( vacio(document.getElementById("apellidos").value) == false ) {
			alert("Rellene los apellidos.")
			return false
			} 
	    if( vacio(document.getElementById("falta").value) == false ) {
			alert("Rellene la fecha.")
			return false
			} 
		//	 $mail=document.getElementById("email").value;
	   
	  //validamos el mail
   //     var b=/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})*$/
        // var b=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
       
        //comentar la siguiente linea si no se desea que aparezca el alert()   
      //  alert("Email " + mail + (b.test(miform.email.value)?"":" no ") + "válido.")   
           
        //devuelve verdadero si validacion OK, y falso en caso contrario   
      //  return b.test(miform.email.value)  
	
}
function validarLogin(miform) {
       	if( vacio(miform.username.value) == false ) {
			alert("Rellene el usuario.")
			return false
			} 
		 if( vacio(miform.contrasena.value)== false ) {
			alert("Rellene el contrasena.")
			return false
			} 
}

function validamail(mail) {
// if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail.value)){ 
    //  (/^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/
	//   /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
	   // $reg = "#^(((( [a-z\d]  [\.\-\+_] ?)*) [a-z0-9] )+)\@(((( [a-z\d]  [\.\-_] ?){0,62}) [a-z\d] )+)\.( [a-z\d] {2,6})$#i";     return preg_match($reg, $email); 
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail.value)){   
		   return true;
		} else {  
		   alert("La direccion de email '" + mail.value + "' es incorrecta."); 
		   return false;
		}	
}
		
function esFechaValida(fecha){
	
    if (fecha != undefined && fecha.value != "" ){
       // if (!/^\d{4}[-]\d{2}[-]\d{2}$/.test(fecha.value)){
//
//            alert("formato de fecha no valido (aaaa-mm-dd)" + fecha.value);
//            return false;
//        }
		
        var anio  =  parseInt(fecha.value.substring(0,4),10);
        var mes  =  parseInt(fecha.value.substring(5,7),10);
       var dia =  parseInt(fecha.value.substring(8),10);
	   
 
    switch(mes){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8: 
       case 10:
        case 12:
            numDias=31;
            break;
        case 4: case 6: case 9: case 11:
            numDias=30;
            break;
       case 2:
            if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
            break;
       default:
            alert("Fecha introducida erronea");
			fecha.select();
            return false;
    }
 
      if (dia>numDias || dia==0){
           alert("Fecha introducida erronea");
		   fecha.select();
            return false;
        }
        return true;
   }
}
 
function comprobarSiBisisesto(anio){
if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
    return true;
    }
else {
    return false;
    }
}
function muestraReloj() {
	
  var fechaHora = new Date();
  var horas = fechaHora.getHours();
  var minutos = fechaHora.getMinutes();
  var segundos = fechaHora.getSeconds();
  var dia= fechaHora.getDate();
  var mes = fechaHora.getMonth()+1;
   var anio = fechaHora.getFullYear();
 
  if(horas < 10) { horas = '0' + horas; }
  if(minutos < 10) { minutos = '0' + minutos; }
  if(segundos < 10) { segundos = '0' + segundos; }
 
  document.getElementById("reloj").innerHTML = dia + "/" + mes + "/" + anio + "  " + horas+':'+minutos+':'+segundos;
}
