<?php

include('../php-includes/connect.php');
    
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imageType,images_img FROM store_product WHERE sp_id=" . $_GET['image_id'];
		$result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($con));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["images_img"];
	}
	mysqli_close($con);
?>