<?php  
//check.php  
include('php-includes/connect.php');
if(isset($_POST["email"]))
{
 $email = mysqli_real_escape_string($con, $_POST["email"]);
 $query = "SELECT email FROM online_reg WHERE email = '$email' UNION ALL SELECT email FROM user WHERE email = '$email'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);
}
?>