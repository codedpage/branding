<?php 
include("dbc.php");

function nb($date) {
   
    $datetime = new DateTime($date);
    $datetime->modify('+1 days');
    return $datetime->format('Y-m-d');
}

 
function we($date) {
   
    $datetime = new DateTime($date);
    $datetime->modify('+6 days');
    return $datetime->format('Y-m-d');
}


$base = '2024-01-25';

for ($i = 1; $i <= 1; $i++) {
    
  $from = $base;
  $to = we($base);
  $base = nb($to);


echo "First date: $from<br>";
echo "Last date: $to<br>";


$QRY_STRING2 = "
SELECT COUNT(*) AS total_count
FROM (
    SELECT user_id
    FROM user_log
    WHERE ctime >= '$from 00:00:00' AND ctime <= '$to 23:59:59'
    GROUP BY user_id
    HAVING COUNT(*) >= 3
) AS subquery;
"; 

$result = $mysqli->query($QRY_STRING2);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 echo  " > 3 Users : ". $row[0];  
 $result->free(); 
}
sleep(1);

echo "<br>"; 


$QRY_STRING4 = "
SELECT COUNT(*) AS total_count
FROM (
    SELECT user_id
    FROM user_log
    WHERE ctime >= '$from 00:00:00' AND ctime <= '$to 23:59:59'
    GROUP BY user_id
    HAVING COUNT(*) >= 1 AND COUNT(*) < 3
) AS subquery;
"; 

$result = $mysqli->query($QRY_STRING4);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 echo  " > 1 Users : ". $row[0];  
 $result->free();
}
sleep(1);

echo "<br> <br>";


}

//monthly qry
$from1 = '2024-01-25';
$to1 = '2024-02-21';

echo $from1 . " - " . $to1 . "<br>";

$QRY_STRING5 = "
SELECT COUNT(*) AS total_count
FROM (
    SELECT user_id
    FROM user_log
    WHERE ctime >= '$from1 00:00:00' AND ctime <= '$to1 23:59:59'
    GROUP BY user_id
    HAVING COUNT(*) >= 1 AND COUNT(*) < 3
) AS subquery;
"; 

$result = $mysqli->query($QRY_STRING5);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 echo  " > 1 Users : ". $row[0];  
 $result->free();
}



$mysqli->close();
