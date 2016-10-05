addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  cargarPagina('Ver_Noticias-ajaxII.php'); 
}

function presionEnlace(e)
{
  if (window.event)
  {
    window.event.returnValue=false;
    var url=window.event.srcElement.getAttribute('href');
    cargarPagina(url);     
  }
  else
    if (e)
    {
      e.preventDefault();
      var url=e.target.getAttribute('href');
      cargarPagina(url);     
    }
}


var conexion1;
function cargarPagina(url) 
{

  if(url=='')
  {
    return;
  }
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open("GET", url, true);
  conexion1.send(null);
}

function procesarEventos()
{
  var detalles = document.getElementById("detalles");
  if(conexion1.readyState == 4)
  {
    detalles.innerHTML = conexion1.responseText;
    var ob1=document.getElementById('sig');
    if (ob1!=null)
      addEvent(ob1,'click',presionEnlace,false);
    var ob2=document.getElementById('ant');
    if (ob2!=null)
      addEvent(ob2,'click',presionEnlace,false);
    var ob3=document.getElementById('sig2');
    if (ob3!=null)
      addEvent(ob3,'click',presionEnlace,false);
    var ob4=document.getElementById('ant2');
    if (ob4!=null)
      addEvent(ob4,'click',presionEnlace,false);
	var ob5=document.getElementById('ciu');
    if (ob5!=null)
      addEvent(ob5,'click',presionEnlace,false);
    var ob6=document.getElementById('fec');
    if (ob6!=null)
      addEvent(ob6,'click',presionEnlace,false);
  } 
  else 
  {
    detalles.innerHTML = '';
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
