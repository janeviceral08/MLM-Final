  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
session_start();
error_reporting(0);
require('php-includes/connect.php');
if(isset($_POST['login_user'])){
$email = mysqli_real_escape_string($con,$_POST['email']);
$account = mysqli_real_escape_string($con,$_POST['account']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

$new_email = str_replace(' ', '', $email);
$new_account = str_replace(' ', '', $account);
 if($password === $cpassword){
     
     		$query1 = mysqli_query($con,"select COUNT(email) as ecount from user where email = '$new_email' and account ='$new_account'");
						$resultec = mysqli_fetch_array($query1);
     if($resultec['ecount'] === '0'){
           echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Check your Email and Account. 
				</div>";
     }else{
         
     
	$sql = "update user set password = '".$password."' where email = '$new_email' and account ='$new_account'";
	
		$result = mysqli_query($con, $sql);

		if(mysqli_query($con, $sql)) {


			header("location: index.php");
		} else {
		   echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Check your Email and Account. 
				</div>";
		}
     
     }
     
     
     
 }else{
     echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Password doesn't match
				</div>";
     
 }



/*$query = mysqli_query($con,"select * from user where account='$email' and password='$password'");
if(mysqli_num_rows($query)>0){
	$_SESSION['userid'] = $email;
	$_SESSION['id'] = session_id();
	$_SESSION['login_type'] = "user";
	
	echo '<div style=" position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)" ><div class="spinner-grow text-muted"></div>
  <div class="spinner-grow text-primary"></div>
  <div class="spinner-grow text-success"></div>
  <div class="spinner-grow text-info"></div>
  <div class="spinner-grow text-warning"></div>
  <div class="spinner-grow text-danger"></div>
  <div class="spinner-grow text-secondary"></div>
  <div class="spinner-grow text-dark"></div>
  <div class="spinner-grow text-light"></div></div><script>window.location.assign("home.php");</script>';
	
}
else{
echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Invalid Email or Password. Try Again
				</div>";
}

*/
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script data-ad-client="ca-pub-8594390165135881" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <title>VGX 12</title>
    <link rel="icon" type="image/png" href="../images/Logo.png"/>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
body, html {

 zoom: 98%;
}
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -32px;
  position: relative;
  z-index: 2;
  font-size: 22px;
}

.container{
  padding-top:50px;
  margin: auto;
}
</style>
</head>

<body style="background-color: white">
    <div class="container" style="margin: 100px 0;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default" style="background-color: #8dcea5">
                    <div class="panel-heading"  style="background-color: #0e8239">
                        <p style="font-size: 24px;margin-bottom: -6px; color: white">Forgot Password Form </p>
                    
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" style="font-size: 22px; border-color : #0e8239;" placeholder="Account" name="account" type="text" autofocus>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input class="form-control" style="font-size: 22px; border-color : #0e8239;" placeholder="Email" name="email" type="text" autofocus>
                                </div>
                                  <div class="form-group">
                                    <input class="form-control" style="font-size: 22px; border-color : #0e8239;" placeholder="New Password" name="password" type="password" minlength="8" id="password-field" autofocus>
                                         <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                          <div class="form-group">
                                    <input class="form-control" style="font-size: 22px; border-color : #0e8239;" placeholder="Confirm Password" name="cpassword" type="password"id="cpassword-field" autofocus>
                               
                                    
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login_user" style="background-color: #065724; color: white; font-size: 25px; height: 40px"  class="btn btn-lg btn-block"><p style="margin-top: -9px">Submit<p></button>
                          
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
        $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

 
    </script>

</body>

</html>
