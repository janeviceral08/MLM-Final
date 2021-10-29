<?php
	
	
//Define your host here.
$HostName = "localhost";
 
//Define your database name here.
$DatabaseName = "u763897084_sbpmlm";
 
//Define your database username here.
$HostUser = "u763897084_sbpmlm";
 
//Define your database password here.
$HostPass = "sbpmlm";

$mysqli = new mysqli("localhost","u763897084_sbpmlm","sbpmlm","u763897084_sbpmlm");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
 
?>