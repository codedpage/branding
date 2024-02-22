<?php
include("dbc.php");
//error_reporting(0);
 
// Set the year and month
$year = 2024;
$month = 1; // January

// Get the total number of days in January 2024
$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Initialize an array to store week numbers and their corresponding first and last dates
$weeks = array();

// Loop through each day of January 2024
for ($day = 1; $day <= $total_days_in_month; $day++) {
    // Get the timestamp for the current day
    $current_day_timestamp = strtotime("$year-$month-$day");

    // Get the week number for the current day
    $week_number = date('W', $current_day_timestamp);

    // Get the day of the week (0 for Sunday, 1 for Monday, ..., 6 for Saturday)
    $day_of_week = date('w', $current_day_timestamp);

    // If it's the first day of the week, set it as the first date of the week
    if ($day_of_week == 1) {
        $weeks[$week_number]['first_date'] = date('Y-m-d', $current_day_timestamp);
    }

    // If it's the last day of the week, set it as the last date of the week
    if ($day_of_week == 0 || $day == $total_days_in_month) {
        $weeks[$week_number]['last_date'] = date('Y-m-d', $current_day_timestamp);
    }
}




// Count the total number of weeks in January 2024
$total_weeks = count($weeks);

// Output the total number of weeks and their corresponding first and last dates
echo "Total number of weeks in January 2024: $total_weeks<br><br>";
foreach ($weeks as $week_number => $dates) {
    echo "Week $week_number: <br>";
    echo "First date: {$dates['first_date']}<br>";
    echo "Last date: {$dates['last_date']}<br>";

 
$from = $dates['first_date'];
$to = $dates['last_date'];
    

 
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
$from1 = date('Y-m-01', strtotime("$year-$month-01")); 
$to1 = date('Y-m-t', strtotime("$year-$month-01"));

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
 