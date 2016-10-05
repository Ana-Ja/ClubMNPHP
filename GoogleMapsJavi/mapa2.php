
<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="./gmaps.js"></script>
    
  <script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
        lat: -12.043333,
        lng: -77.028333
      });
      $('#start_travel').click(function(e){
        e.preventDefault();
        map.travelRoute({
          origin: [-12.044012922866312, -77.02470665341184],
          destination: [-12.090814532191756, -77.02271108990476],
          travelMode: 'driving',
          step: function(e){
            $('#instructions').append('<li>'+e.instructions+'</li>');
            $('#instructions li:eq('+e.step_number+')').delay(450*e.step_number).fadeIn(200, function(){
              /*map.setCenter(e.end_location.lat(), e.end_location.lng());
              map.drawPolyline({
                path: e.path,
                strokeColor: '#131540',
                strokeOpacity: 0.6,
                strokeWeight: 6
              });*/
            });
          }
        });

        map.drawRoute({
          origin: [-12.044012922866312, -77.02470665341184],
          destination: [-12.090814532191756, -77.02271108990476],
          travelMode: 'driving',
          strokeColor: '#131540',
          strokeOpacity: 0.6,
          strokeWeight: 6
        });
      });
    });
  </script>
</head>
<body>
  <div id="body">
    <div class="row">
      <div class="span11">
        <div class="popin" style="width:70%;float:left">
          <div id="map" style="height:400px"></div>
        </div>
        <div class="row" style="width:30%;float:left">
          <a href="#" id="start_travel" class="btn small">start</a>
          <ul id="instructions">
          </ul>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>