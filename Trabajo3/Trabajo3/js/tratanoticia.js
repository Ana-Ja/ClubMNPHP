function Modi() {
	document.getElementById("accion").value="modi";
}
function Borra() {
	document.getElementById("accion").value="borra";
}


addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
	
  var alta=document.getElementById('noticiasajax');
  addEvent(alta,'submit',enviarDatos,false);
  
}

function enviarDatos(e)
{
  if (window.event)
    window.event.returnValue=false;
  else
    if (e)
      e.preventDefault();
	 
	if (validarDatos()) {
		
       enviarFormulario();
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
	 
	 
function validarDatos() {
       	if( vacio(document.getElementById('titulo').value) == false ) {
			alert("Rellene el titulo.")
			return false
			} 
		 if( vacio(document.getElementById('noticia').value)== false ) {
			alert("Rellene la noticia.")
			return false
			} 
		 if( vacio(document.getElementById('fbaja').value)== false ) {
			alert("Rellene Fecha Caducidad.")
			return false
			} 
		
			return true;
}

function retornarDatos()
{
  var cad='';
  var idn=document.getElementById('id_noticia').value;
  var tit=document.getElementById('titulo').value;
  var not=document.getElementById('noticia').value;
   var ciu=document.getElementById('id_ciudad').value;
   var fec=document.getElementById('fbaja').value;
   var acc=document.getElementById('accion').value;
   
  cad='titulo='+encodeURIComponent(tit)+'&noticia='+encodeURIComponent(not)+'&ciudad='+encodeURIComponent(ciu)+'&accion='+encodeURIComponent(acc)+'&id_noticia='+encodeURIComponent(idn)+'&fbaja='+encodeURIComponent(fec);
 
  return cad;
}

var conexion1;

function enviarFormulario() 
{
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  
  conexion1.open('POST','actu_ajax.php', true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
  
  conexion1.send(retornarDatos());  
  
}

function procesarEventos()
{
  var resultados = document.getElementById("resultados");
  if(conexion1.readyState == 4)
  {
    if (conexion1.status==200)
	  if (document.getElementById('accion').value=="alta")
        resultados.innerHTML = 'Noticia insertada.';
	  else
	    resultados.innerHTML = 'Actualizazion realizada';
    else
      alert(conexion1.statusText);
  } 
  else 
  {
    resultados.innerHTML = '<img src="../images/lightbox-ico-loading.gif">';

  }
}



//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else  
    if (elemento.addEventListener)
    {
      elemento.addEventListener(nomevento,funcion,captura);
      return true;
    }
    else
      return false;
}

function crearXMLHttpRequest() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else 
    if (window.XMLHttpRequest) 
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}

