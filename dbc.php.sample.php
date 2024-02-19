<?php
$user = 'xxx';
$password = 'xxx';
$database = 'xxx';
$port = 3306;
$mysqli = new mysqli('xxxx', $user, $password, $database, $port);
if ($mysqli->connect_error) { die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);}
echo '<p>Connection OK '. $mysqli->host_info.'</p>';