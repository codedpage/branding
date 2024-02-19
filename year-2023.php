<?php
include("dbc.php");

$year = 2024; 
for ($month = 1; $month <= 1; $month++) {
     
    $from = date('Y-m-01', strtotime("$year-$month-01")); 
    $to = date('Y-m-t', strtotime("$year-$month-01"));
    
echo date('F', strtotime($from));
echo "<br>";


$QRY_STRING2 = "
SELECT count(*) FROM `user` 
where date(ctime) >= '$from'
and DATE(ctime) <= '$to' 
LIMIT 1
";
$result = $mysqli->query($QRY_STRING2);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 echo  "New Sign Ups : ". $row[0];  
 $result->free(); 
}

echo "<br>";
$QRY_STRING4 = "
SELECT count(DISTINCT(user_id)) FROM `livemeeting_attendance` 
where date(mtime) >= '$from'
and DATE(mtime) <= '$to' 
LIMIT 1
";
$result = $mysqli->query($QRY_STRING4);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 echo  "Meeting Attendance : ". $row[0];  
 $result->free();
}

echo "<br> <br>";


}




$mysqli->close();
 