<?php
 
//MySQLi Procedural
	$db_host = "localhost";
	$db_user = "u763897084_sbpmlm";
	$db_pass = "sbpmlm";
	$db_name = "u763897084_sbpmlm";
	
		
	$conn =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
	

 
?>