<?php

	
	session_start();
	
	if (!isset($_SESSION['user_id']) ||(trim ($_SESSION['user_id']) == '')) {
		header('index.php');
		exit();
	}
	include('../../../db.php');
	$sq = mysqli_query($con,"select * from user where user_id='".$_SESSION['user_id']."' and hotel_id = 1");
    $srow = mysqli_fetch_array($sq);
    

?>