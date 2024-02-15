<?php

$from = '2024-02-08';
$to = '2024-02-14';
$qry_for = array();

$from =  date("Y-m-d", strtotime('thursday last week'));
$to = date("Y-m-d", strtotime('wednesday this week'));


#Logedin Users
$qry_for[1] = "Total User Logins";
$QRY_STRING1 = "
SELECT count(*) users  FROM `intherooms`.`user` 
WHERE date(last_login_time) >= '$from'
AND DATE(last_login_time) <= '$to' 
LIMIT 1
";

#Newly Registered Users
$qry_for[2] = "New Sign Ups";
$QRY_STRING2 = "
SELECT count(*) FROM `intherooms`.`user` 
where date(ctime) >= '$from'
and DATE(ctime) <= '$to' 
LIMIT 1
";

#New Abandoned Users (30 days)
$qry_for[3] = "Total Abandoned Users (no activity in 30+ days)";
$QRY_STRING3 = "
SELECT count(*) FROM `intherooms`.`user` 
where date(last_login_time) < '$from' - INTERVAL 30 DAY
LIMIT 1
";

#past meetings
$qry_for[4] = "Number of Meetings";
$QRY_STRING4= "
SELECT COUNT(DISTINCT(meeting_id)) FROM `intherooms`.`livemeeting_attendance` 
WHERE DATE(mtime) >= '$from'
AND DATE(mtime) <= '$to' 
";

#attendance previous week meetings
$qry_for[5] = "Meeting Attendance";
$QRY_STRING5= "
SELECT count(DISTINCT(user_id)) FROM `intherooms`.`livemeeting_attendance` 
where date(mtime) >= '$from'
and DATE(mtime) <= '$to' 
LIMIT 1
";


//Generate the sql script 
for ($i = 1 ; $i <= 5 ; $i++)
{
    $QRY_STRING = ${'QRY_STRING'.$i};
    echo "<br>". $qry_for[$i] . " : " ;
    echo "<br><br>". $QRY_STRING . "<br>" ;
}

for ($i = 1 ; $i <= 5 ; $i++)
{
    
    echo "<br>". $qry_for[$i] . " : " ;
}

?>

<?php ##############################################################################################################################
/*
$user = 'xxx';
$password = 'xxx'; //To be completed if you have set a password to root
$database = 'xxx'; //To be completed to connect to a database. The database must exist.
$port = 3306; //Default must be NULL to use default port
$mysqli = new mysqli('xxx', $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

//echo '<p>Connection OK ' . $mysqli->host_info . '</p>';
//echo '<p>Server ' . $mysqli->server_info . '</p>';

// Custom Query
$query = $QRY_STRING;

$result = $mysqli->query($query);

if ($result) {
    // Process the result
    while ($row = $result->fetch_array()) {
        // Process each row as needed
        echo($row[0]);
    }

    $result->free(); // Free result set
} else {
    echo 'Error: ' . $mysqli->error;
}

$mysqli->close();
sleep(2);
die($i);
}

*/
?>