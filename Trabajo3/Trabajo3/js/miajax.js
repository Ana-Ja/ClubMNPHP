  
/* **** Noticias con ajax *********/
addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  var ref;
  ref=document.getElementById('noticia');
  var vec=ref.getElementsByTagName('a'); 
  for(f=0;f<vec.length;f++)
  {
    addEvent(vec[f],'click',presionEnlace,false);
  }
}

function presionEnlace(e)
{
  if (window.event)
  {
    window.event.returnValue=false;
    var url=window.event.srcElement.getAttribute('href');
    verNoticia(url);     
  }
  else
    if (e)
    {
      e.preventDefault();
      var url=e.target.getAttribute('href');
      verNoticia(url);     
    }
}


var conexion1;
function verNoticia(url) 
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
	var txt;
  var detalles = document.getElementById("texto");
  if(conexion1.readyState == 4)
  {
    txt = unescape(conexion1.responseText);
	 txt2=txt.replace(/\+/gi," ");
     detalles.innerHTML=txt2;
  } 
  else 
  {
    detalles.innerHTML = 'Cargando...';
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

/**********************************************/