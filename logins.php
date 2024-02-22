<?php
include("dbc.php");

$year = 2023; 
for ($month = 1; $month <= 12; $month++) {
     
    $from = date('Y-m-01', strtotime("$year-$month-01")); 
    $to = date('Y-m-t', strtotime("$year-$month-01"));
    
echo date('F - Y ', strtotime($from));
echo "<br>";


#Logedin Users
$qry_for[1] = "Total User Logins";
$QRY_STRING1 = "
SELECT count(*) users  FROM `user` 
WHERE date(last_login_time) >= '$from'
AND DATE(last_login_time) <= '$to' 
LIMIT 1
";


$result = $mysqli->query($QRY_STRING1);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 echo  $qry_for[1] . " : ". $row[0];  
 $result->free(); 
}


echo "<br> <br>";


}




$mysqli->close();
 