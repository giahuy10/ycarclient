
<?php 
$start = $_GET['start'];
$end = $_GET['end'];

function getDistance($addressFrom, $addressTo, $unit){
    //Change address format
    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
    $formattedAddrTo = str_replace(' ','+',$addressTo);
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
    $outputTo = json_decode($geocodeTo);
    
    //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
   $get_dist = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$latitudeFrom.','.$longitudeFrom.'&destinations='.$latitudeTo.','.$longitudeTo.'&key=AIzaSyAcrOcaHxKGtFfZh8gbuk3DMJ3XVh6ATVY');
   //$get_dist = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$formattedAddrFrom.'&destinations='.$formattedAddrTo.'&mode=bicycling&language=vi-VN&key=AIzaSyAcrOcaHxKGtFfZh8gbuk3DMJ3XVh6ATVY');
   $get_dist = json_decode($get_dist);
  $dist_km = $get_dist->rows[0]->elements[0]->distance->value;
  $dist_km = round($dist_km/1000);
 // echo "<br/><pre>";
	// var_dump($get_dist);
	// echo "</pre>";
    //Calculate distance from latitude and longitude
    /*$theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515 * 1.609344;*/
    return $dist_km;
   
}
$addressFrom =  $start;
$addressTo =  $end;
$distance = getDistance($addressFrom, $addressTo, "K");
echo $distance;
?>