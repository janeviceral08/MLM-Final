<?php
	require 'connect.php';
	
	$id = $_POST['id'];
	$text = $_POST['text'];
	$column = $_POST['column'];
	
	
	if($column == "firstname"){
		$query = $conn->query("UPDATE `member` SET `firstname` = '$text' WHERE `mem_id` = '$id'");
	}
	
	if($column == "lastname"){
		$query = $conn->query("UPDATE `member` SET `lastname` = '$text' WHERE `mem_id` = '$id'");
	}
	
	if($column == "address"){
		$query = $conn->query("UPDATE `member` SET `address` = '$text' WHERE `mem_id` = '$id'");
	}
	
	echo "Data Updated";
?>