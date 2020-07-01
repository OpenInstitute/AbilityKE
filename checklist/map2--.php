<?php include_once 'z_head.php'; 

$qry = "SELECT `id`, `entity_code`, `Photo`, `rating`, `LatLong` FROM `questionnaire` WHERE entity_code is not null";
$res = $cndb->dbQuery($qry);



$k = null;
$out = array();
while($rows = $cndb->fetchRow($res)){

}


?>







<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
   <head profile="http://gmpg.org/xfn/11">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

      <link rel="stylesheet" type="text/css" href="//cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
      
      <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
      <script type='text/javascript' src='//cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>
   </head>

   <body>
      <h1>Ability Map</h1>
      
      <p>Findings on the Ability Project
      
      <div id="map" style="height: 650px; border: 1px solid #AAA;"></div>

      <script type='text/javascript' src='maps/markers.json'></script>
      <script type='text/javascript' src='maps/leaf-demo.js'></script>

      <script>
         for ( var i=0; i < markers.length; ++i ) 
         {
            L.marker( [markers[i].lat, markers[i].lng] )
               .bindPopup( '<a href="' + markers[i].url + '" target="_blank">' + markers[i].name + '</a>' )
               .addTo( map );
         }
      </script>
   </body>
</html>
