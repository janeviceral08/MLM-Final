<?php  
//check.php  
include('../php-includes/connect.php');
if(isset($_POST["user_name"]))
{
 $username = mysqli_real_escape_string($con, $_POST["user_name"]);
 $query = "SELECT store_product.*,join_request.* FROM store_product JOIN join_request ON store_product.user_email=join_request.store_email WHERE store_product.user_store_name = '".$username."' OR join_request.username  = '".$username."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);
}
?>