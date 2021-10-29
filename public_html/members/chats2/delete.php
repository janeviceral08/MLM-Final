<?php
	require "connect.php";
	
	$mem_id = $_POST['mem_id'];
	$conn->query("DELETE FROM `member` WHERE `mem_id` = '$mem_id'");
	
	echo "Data Deleted!";
?>