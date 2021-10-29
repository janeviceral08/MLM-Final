<?php

include('../php-includes/connect.php');
$id = $_GET['id'];
      $query = mysqli_query($con,"UPDATE `store_product` SET `status` = '0' WHERE `sp_id` = '$id'");
      	echo '<script>alert("Deleted successfully.");window.location.assign("store.php");</script>';	