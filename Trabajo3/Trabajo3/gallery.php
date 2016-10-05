<?php
class gallery {
	
	var $files = array();
	var $path;
	
	
	//---Método de leer una carpeta con imágenes
	function loadFolder($path){
		
		$this->path = $path;
		
		//---Guardar en un arreglo todos los archivos en el directorio	
		$folder = opendir($this->path);
			
		while ($fil = readdir($folder)) {
			
			//---Si no es un directorio
			if(!is_dir($fil)){
				
				$arr = explode('.', $fil);
				
				if(count($arr) > 1){
					
					//---Ir guardando los nombres en un arreglo
					$this->files[] = $fil;
					
					
				}
				
			}
			
		}
		
		//---Cerrar el directorio
		closedir($folder);
		
		//---Ordenar alfabeticamente el arreglo
		sort($this->files);
	
	}
	
	//---Método de mostrar todas las imágenes contenidas en la carpeta
	function show($area = 500, $width = 100, $shownames = false,$start, $limite){
		
		//---Clacular la cantidad de imágenes en un tramo de ancho
		$cant = floor(($area + 5) / ($width + 5));		
		
		//---Calcular un nuevo espacio para las imágenes
		$space = floor(($area - $width * $cant) / ($cant - 1));
	
		//---Crear la galería con los nombres de todos los archivos
		$total = count($this->files);
		$cont = 0;
		
		echo '<div style="width:'.$area.'px">';
		
			//---Situar los thumbnails
			//he modificado este linea : for($i = 0; $i < $total; $i++){	
			for($i = $start; $i < $limite; $i++){		
				
				//---Determinar si se trata de la última imagen de la fila o no
				$margin = (($i + 1) % $cant == 0) ? 0 : $space;
				
				if($shownames){
				
					echo '<div style="width:'.$width.'px; float:left; margin-right:'.$margin.'px; margin-bottom:'.$space.'px;">';
					echo	'<a href="'.$this->path.'/'.$this->files[$i].'" rel="lightbox" title="'.$this->getName($this->files[$i]).'">';
					echo		'<img src="show_thumb.php?src='.urlencode($this->path).'/'.urlencode($this->files[$i]).'&amp;width='.$width.'&amp;height='.$width.'" width="'.$width.'" height="'.$width.'" border="0" alt="Fotos"></img>';

					echo	'</a>';
					echo '</div>';
				
				}else{
					
					echo '<div style="width:'.$width.'px; float:left; margin-right:'.$margin.'px; margin-bottom:'.$space.'px;">';
					echo	'<a href="'.$this->path.'/'.$this->files[$i].'" rel="lightbox">';
					echo		'<img src="show_thumb.php?src='.urlencode($this->path).'/'.urlencode($this->files[$i]).'&amp;width='.$width.'&amp;height='.$width.'" border="0" alt="Fotos"></img>';
					echo	'</a>';
					echo '</div>';
					
				}
				
			}
			
			?>
            
            <script type="text/javascript" language="javascript">

				$(document).ready(function(){
	
					$("a[rel = 'lightbox']").lightBox();					   
						   
				});

			</script>  
            
            <?php
		
		echo '</div>';
	
	}
	
	//---Función de convertir el nombre de archivo a un nombre descriptivo
	function getName($name){
		
		$reg = array('/\[\d*\]/', '/_/', '/\.+jpg|gif|png+$/', '/@A@/', '/@E@/', '/@I@/', '/@O@/', '/@U@/', '/@N@/', '/@a@/', '/@e@/', '/@i@/', '/@o@/', '/@u@/', '/@n@/');
		$out = array('', ' ', '', '&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;');
		$ret = preg_replace($reg, $out, $name);
		
		return $ret;
		
	}

}
?>      