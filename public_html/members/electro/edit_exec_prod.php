<?php
include('../php-includes/connect.php');

$prod = $_POST['prod'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$cat = $_POST['cat'];
$des = $_POST['des'];
$id = $_POST['id'];
      $query = mysqli_query($con,"UPDATE `store_product` SET `product` = '$prod',`price` = '$price',`quantity` = '$qty',`description` = '$des',`cat` = '$cat' WHERE `sp_id` = '$id'");
      	echo '<script>alert("Edited successfully.");window.location.assign("store.php");</script>';	



?>