<?php

$from = '2024-02-08';
$to = '2024-02-14';

$qry_for = array();
$from =  date("Y-m-d", strtotime('thursday last week'));
$to = date("Y-m-d", strtotime('wednesday this week'));


#Logedin Users
$qry_for[1] = "Total User Logins";
$QRY_STRING1 = "
SELECT count(*) users  FROM `user` 
WHERE date(last_login_time) >= '$from'
AND DATE(last_login_time) <= '$to' 
LIMIT 1
";

#Newly Registered Users
$qry_for[2] = "New Sign Ups";
$QRY_STRING2 = "
SELECT count(*) FROM `user` 
where date(ctime) >= '$from'
and DATE(ctime) <= '$to' 
LIMIT 1
";

#New Abandoned Users (30 days)
$qry_for[3] = "Total Abandoned Users (no activity in 30+ days)";
$QRY_STRING3 = "
SELECT count(*) FROM `user` 
where date(last_login_time) < '$from' - INTERVAL 30 DAY
LIMIT 1
";

#past meetings
$qry_for[4] = "Number of Meetings";
$QRY_STRING4= "
SELECT COUNT(DISTINCT(meeting_id)) FROM `livemeeting_attendance` 
WHERE DATE(mtime) >= '$from'
AND DATE(mtime) <= '$to' 
";

#attendance previous week meetings
$qry_for[5] = "Meeting Attendance";
$QRY_STRING5= "
SELECT count(DISTINCT(user_id)) FROM `livemeeting_attendance` 
where date(mtime) >= '$from'
and DATE(mtime) <= '$to' 
LIMIT 1
";



//Generate the sql script 
for ($i = 1; $i <= 5; $i++)
{
    $QRY_STRING = ${'QRY_STRING'.$i};
    echo "<br>". $qry_for[$i] . " : " ;
    echo "<br>". $QRY_STRING . "<br><br>" ;
}

exit;

echo "Duration : $from - $to <br><br>";
include("dbc.php");
for ($i = 1; $i <= 5; $i++)
{
    $QRY_STRING = ${'QRY_STRING'.$i};
    $result = $mysqli->query($QRY_STRING);
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        echo $qry_for[$i] ." : ". $row[0];  
        $result->free();
    }
    echo "<br>";
}
?>