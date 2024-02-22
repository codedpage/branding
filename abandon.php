<?php
include("dbc.php");

$year = 2023; 
for ($month = 1; $month <= 12; $month++) {
     
    $from = date('Y-m-01', strtotime("$year-$month-01")); 
    $to = date('Y-m-t', strtotime("$year-$month-01"));
    
echo date('F - Y ', strtotime($from));
echo "<br>";


#Logedin Users
$qry_for[3] = "Total Abandoned Users (no activity in 30+ days)";  
$QRY_STRING3 = "
SELECT count(*) FROM `user` 
where date(last_login_time) < '$from' - INTERVAL 30 DAY
LIMIT 1
";



$result = $mysqli->query($QRY_STRING3);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 echo  $qry_for[3] . " : ". $row[0];  
 $result->free(); 
}


echo "<br> <br>";


}




$mysqli->close();
 