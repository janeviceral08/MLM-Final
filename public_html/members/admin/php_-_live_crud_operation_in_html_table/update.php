<?php
	require 'connect.php';
	
	$id = $_POST['id'];
	$text = $_POST['text'];
	$column = $_POST['column'];
	
	
	if($column == "firstname"){
		$query = $conn->query("UPDATE `compensation` SET `level` = '$text' WHERE `level` = '$id'");
	}
	
	if($column == "lastname"){
		$query = $conn->query("UPDATE `compensation` SET `amount` = '$text' WHERE `level` = '$id'");
	}


	echo "Data Updated";
?>