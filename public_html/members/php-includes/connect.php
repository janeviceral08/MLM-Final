<?php
	$db_host = "localhost";
	$db_user = "u375994584_vgx12com";
	$db_pass = "Vgx12*12";
	$db_name = "u375994584_mlmvgx";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
?>