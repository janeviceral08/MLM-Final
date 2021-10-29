<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
    
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imageType,imageData FROM pin_request WHERE id=" . $_GET['image_id'];
		$result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($con));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}
	mysqli_close($con);
?>