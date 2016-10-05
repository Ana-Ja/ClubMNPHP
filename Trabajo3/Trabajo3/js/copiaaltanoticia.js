addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  var ref=document.getElementById('altanoticia');
  addEvent(ref,'submit',enviarDatos,false);
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
		 if( vacio(document.getElementById('noticia')).value== false ) {
			alert("Rellene la noticia.")
			return false
			} 
		 
			
			return true;
}

function retornarDatos()
{
  var cad='';
  var tit=document.getElementById('titulo').value;
  var not=document.getElementById('noticia').value;
   var ciu=document.getElementById('id_ciudad').value;
   var acc=document.getElementById('accion').value;
  cad='titulo='+encodeURIComponent(tit)+'&noticia='+encodeURIComponent(not)+'&ciudad='+encodeURIComponent(ciu);
  return cad;
}

var conexion1;

function enviarFormulario() 
{
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open('POST','alta_noticia_ajaxII.php', true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
  conexion1.send(retornarDatos());  
}

function procesarEventos()
{
  var resultados = document.getElementById("resultados");
  if(conexion1.readyState == 4)
  {
    if (conexion1.status==200)
      resultados.innerHTML = 'Noticia insertada.';
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

