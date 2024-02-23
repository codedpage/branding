<?php
$user = 'xxx';
$password = 'xxx';
$database = 'xxx';
$port = 3306;

//$server = 'xx.xx.xx.rearmirror';   //master
$server = 'xx.xx.file.redrose';      //slave

$mysqli = new mysqli($server, $user, $password, $database, $port);
if ($mysqli->connect_error) { die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);}
echo '<p>Connection OK '. $mysqli->host_info.'</p>';