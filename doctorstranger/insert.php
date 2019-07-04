<?php
    define("SERVER","localhost");
    define("USER","animesh");
    define("PASSWORD","@lset31198");
    define("DB","doctorstranger");
    $connection = mysqli_connect(SERVER, USER, PASSWORD, DB);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

/*************************************
1) ID
2) City
3) State
4) Lat
5) Long

**************************************/
//
//$json = file_get_contents('cities.json');
//
////Decode JSON
//$json_data = json_decode($json,true);
//
////Print data
////print_r($json_data);
//
//foreach($json_data as $city){
//    $formatted_city = str_replace(' ', '', $city['name']);
//    $url = "http://www.mapquestapi.com/geocoding/v1/address?key=FOKXNDWWs9onmEMOSgdGhCHZ9Xl57vbx&outFormat=json&location=".$formatted_city;
//    $curl = curl_init();
//    curl_setopt($curl, CURLOPT_URL, $url);
//
//    curl_setopt_array($curl, array(
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => "",
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "GET",
//        CURLOPT_POSTFIELDS => "{}",
//    ));         
//    $geo_data = curl_exec($curl);
//    $err = curl_error($curl);
//    curl_close($curl);
//    $geocode_array = json_decode($geo_data,true);
//    $lat = $geocode_array['results'][0]['locations'][0]['latLng']['lat'];
//    $lng = $geocode_array['results'][0]['locations'][0]['latLng']['lng'];
//    $state = $city['state'];
//    
//    $sql = "SELECT `state_id` FROM `state` WHERE state_name='$state'";
//    $result = $connection->query($sql);
//    $id=0;
//    while($row = $result->fetch_assoc()) {
//        $id = $row["state_id"];
//        echo "<br> $id";
//    }
//    
//    //echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$formatted_city." Lat: ".$lat." Lng: ".$lng." ".$state."<br>";
//    $query = "INSERT into cities(city_name, state_id, latitude, longitude) VALUES ('$formatted_city',$id,$lat,$lng)";
//
//    $create_post_query = mysqli_query($connection, $query);    
//}



//SELECT * FROM `cities` WHERE latitude < 8.4 OR latitude > 37.6 OR longitude < 68.7 OR longitude > 97.25

require_once("classes/Doctor.php");
for($i=0; $i<7; $i++){
    $dow_text = date('l', strtotime("Sunday + $i days"));
    $slot_len = 4;
    $doc_id = 2;
    $obj = new Doctor();
    $open_time = "10:00:00";
    $close_time = "12:00:00";
    $max_patients = 10;    
    for($j=0; $j<$slot_len; $j++){
        $obj->addTimeSlots($doc_id, $dow_text, $j+1, $open_time, $close_time, $max_patients);
        $time_val_open = strtotime("+120 minutes", strtotime($open_time));
        $open_time = date('H:i:s', $time_val_open);
        $time_val_open = strtotime("+120 minutes", strtotime($close_time));
        $close_time = date('H:i:s', $time_val_open);        
    }
}












?>