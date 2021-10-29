<?php
	require 'connect.php';
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address =  $_POST['address'];
	
	$query = $conn->query("INSERT INTO `member` (firstname, lastname, address) VALUES('$firstname', '$lastname', '$address')");
	
	echo 'Data Inserted';
?>