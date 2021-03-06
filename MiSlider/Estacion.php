<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
  
    <title>Basic jQuery Slider - Demo</title>
      
    <!-- bjqs.css contains the *essential* css needed for the slider to work -->
    <link rel="stylesheet" href="bjqs.css">

    <!-- some pretty fonts for this demo page - not required for the slider -->
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 

    <!-- demo.css contains additional styles used to set up this demo page - not required for the slider --> 
    <link rel="stylesheet" href="demo.css">

    <!-- load jQuery and the plugin -->
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
      
  </head>
  
  <body>
  
    <div id="container">

      <h2>Fade Example</h2>

      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-fade">


        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
          <?php
          //el profe lo ha hecho con un array asociativo con las estaciones, y por cada una de ellas un array con la ruta de 
          //de las fotos
/*
         <?php
          $estacion = "primavera";
          $fotos = array(
                  "primavera"=>array(
                          './img/primavera/1.jpg',
                          './img/primavera/2.jpg',
                          './img/primavera/3.jpg',
                          './img/primavera/4.jpg'),
                  "verano"=>array(
                          './img/verano/1.jpg',
                          './img/verano/2.jpg',
                          './img/verano/3.jpg',
                          './img/verano/4.jpg'),
                  "otono"=>array(
                          './img/otono/1.jpg',
                          './img/otono/2.jpg',
                          './img/otono/3.jpg',
                          './img/otono/4.jpg'),
                  "invierno"=>array(
                          './img/invierno/1.jpg',
                          './img/invierno/2.jpg',
                          './img/invierno/3.jpg',
                          './img/invierno/4.jpg')
                  );
          var_dump($fotos);
          for ($i=0;$i<=sizeof($fotos[$estacion])-1;$i++){
              echo '<li><img src="'. $fotos[$estacion][$i] .'" title="Automatically generated caption"></li>';

        ?> */
            
            
            $fotos = array(
                  "primavera"=>array(
                          './img/primavera/1.jpg',
                          './img/primavera/2.jpg',
                          './img/primavera/3.jpg',
                          './img/primavera/4.jpg'),
                  "verano"=>array(
                          './img/verano/1.jpg',
                          './img/verano/2.jpg',
                          './img/verano/3.jpg',
                          './img/verano/4.jpg'),
                  "otono"=>array(
                          './img/otono/1.jpg',
                          './img/otono/2.jpg',
                          './img/otono/3.jpg',
                          './img/otono/4.jpg'),
                  "invierno"=>array(
                          './img/invierno/1.jpg',
                          './img/invierno/2.jpg',
                          './img/invierno/3.jpg',
                          './img/invierno/4.jpg')
                  );
            $estaciones = array(
                  "primavera"=>array(
                          '21-03',
                          '20-06'),
                  "verano"=>array(
                          '21-06',
                          '20-09'),
                  "otono"=>array(
                          '21-09',
                          '20-12'),
                  "invierno"=>array(
                          '21-12',
                          '20-03')
                  );
            $hoy= time(); //fecha de hoy
            $hoy=date('d-m-Y', $hoy);
            echo "Hoy ".$hoy."<br />";
            $miestacion = '';
            foreach ($estaciones as $key => $value) {
              $fecha1 = date($value[0]."-".date("Y"));
              $fecha2 = date($value[1]."-".date("Y"));
              if ((strtotime($hoy) >= strtotime($fecha1)) && (strtotime($hoy)<= strtotime($fecha2))) {
                $miestacion= $key;
              }  
            }

            if ($miestacion !='') {
              for ($i=0;$i<=sizeof($fotos[$miestacion])-1;$i++){
                  echo '<li><img src="'. $fotos[$miestacion][$i] .'" title="Automatically generated caption"></li>';
              }
            } else {
              echo "Estacion no encontrada";
            }
            

           
          ?>
          
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->

      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });

        });
      </script>

      <h2>Slide Example</h2>

      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-slide">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
          <li><a href=""><img src="img/banner01.jpg" title="Automatically generated caption"></a></li>
          <li><img src="img/banner02.jpg" title="Automatically generated caption"></li>
          <li><img src="img/banner03.jpg" title="Automatically generated caption"></li>
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->
      
      <!-- attach the plug-in to the slider parent element and adjust the settings as required -->
      <script class="secret-source">
        jQuery(document).ready(function($) {
          
          $('#banner-slide').bjqs({
            animtype      : 'slide',
            height        : 320,
            width         : 620,
            responsive    : true,
            randomstart   : true
          });
          
        });
      </script>

    </div>

    <!-- 
      The following script is not related to basic jQuery Slider 
      It's used to create the code snippets in the demo.
      https://github.com/maelstrom/SecretSource
    -->
    <script src="js/libs/jquery.secret-source.min.js"></script>

    <script>
    jQuery(function($) {

        $('.secret-source').secretSource({
            includeTag: false
        });

    });
    </script>

  </body>
</html>
