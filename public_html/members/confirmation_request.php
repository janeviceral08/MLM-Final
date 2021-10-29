  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
error_reporting(0);
require('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];

$get_userid = mysqli_query($con,"select * from user where account='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$account = $result_get_userid['account'];
							$password_user = $result_get_userid['password'];

if(isset($_POST['login_user'])){
    $rfa = mysqli_real_escape_string($con,$_POST['rfa']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$tracking = mysqli_real_escape_string($con,$_POST['tracking']);
$rgc = mysqli_real_escape_string($con,$_POST['rgc']);

if($email == $account && $password_user == $password){
     // echo"<script>windows.alert()</script>";
   // echo "<script>alert('$email'+ '$rfa'+ '$password'+ '$tracking' + '$rgc')</script>"; 
   
   	$query = mysqli_query($con,"update user set user_tracking='$tracking',prod_condition='$rgc', is_active='request' where account='$email'");
		
		
		echo mysqli_error($con);

 	echo ' <style>
    
 .mt-100 {
     margin-top: 100px
 }

 .container {
     margin-top: 200px
 }

 .card {
     position: relative;
     display: flex;
     width: 450px;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid #d2d2dc;
     border-radius: 4px;
     -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
     -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
     box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
 }

 .card .card-body {
     padding: 1rem 1rem
 }

 .card-body {
     flex: 1 1 auto;
     padding: 1.25rem
 }

 p {
     font-size: 14px
 }

 h4 {
     margin-top: 18px
 }

 .cross {
     padding: 10px;
     color: #d6312d;
     cursor: pointer
 }

 .continue:focus {
     outline: none
 }

 .continue {
     border-radius: 5px;
     text-transform: capitalize;
     font-size: 13px;
     padding: 8px 19px;
     cursor: pointer;
     color: #fff;
     background-color: #D50000
 }

 .continue:hover {
     background-color: #D32F2F !important
 }
    </style>
    

     <div class="modal-dialog">
         <div class="card">
             <div class="text-right cross"> <i class="fa fa-times"></i> </div>
             <div class="card-body text-center"> <img src="https://img.icons8.com/bubbles/200/000000/trophy.png">
                 <h4>CONGRATULATIONS!</h4>
                 <p>Activation will be within a day or two</p> <a  class="btn btn-out btn-square continue">PLEASE WAIT IT WILL AUTOMATICALLY REDIRECT TO HOME PAGE</a>
             </div>
         </div>
    
 </div>
 
 
 <script>setTimeout(function () {
  window.location.assign("tree.php")
    }, 9200)</script>';
    
}
		else{
		    echo "<div class='alert alert-danger' role='alert' style='font-size: 22px;'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Email or Password Does'nt Match the Account You Login. Try Again
				</div>
				<script>setTimeout(function () {
  window.location.assign('confirmation_request.php')
    }, 9200)</script>
				";
		}				
						

  
    
 
    /*
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$query = mysqli_query($con,"select * from user where account='$email' and password='$password' and is_active != 'block'");
if(mysqli_num_rows($query)>0){
    $resultinfo = mysqli_fetch_array($query);
            
    if($resultinfo['is_active'] == 'block'){
        echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> There is a Problem with your account, Please Contact the Admin.
				</div>";
    }
    elseif($resultinfo['is_active'] == 'For Delivery'){
                    
	$_SESSION['userid'] = $email;
	$_SESSION['id'] = session_id();
	$_SESSION['login_type'] = "user";
	
	echo '<div style=" position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        animation-duration: 3s;
        transform: translate(-50%, -50%)" ><div class="spinner-grow text-muted"></div>
  <div class="spinner-grow text-primary"></div>
  <div class="spinner-grow text-success"></div>
  <div class="spinner-grow text-info"></div>
  <div class="spinner-grow text-warning"></div>
  <div class="spinner-grow text-danger"></div>
  <div class="spinner-grow text-secondary"></div>
  <div class="spinner-grow text-dark"></div>
  <div class="spinner-grow text-light"></div></div><script>window.location.assign("confirmation_request.php");</script>';
    }
    elseif($resultinfo['is_active'] == 'confirmed'){
        
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
  <div class="spinner-grow text-light"></div></div><script>window.location.assign("tree.php");</script>';
	
    }else{
            
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
  <div class="spinner-grow text-light"></div></div><script>window.location.assign("tree.php");</script>';
	
    }
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
.checkboxes label {
  display: block;
  padding-right: 10px;
  padding-left: 22px;
  text-indent: -22px;
}
.checkboxes input {
  vertical-align: middle;
}
.checkboxes label span {
  vertical-align: middle;
}

 .mt-100 {
     margin-top: 100px
 }

 .container {
     margin-top: 200px
 }

 .card {
     position: relative;
     display: flex;
     width: 450px;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid #d2d2dc;
     border-radius: 4px;
     -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
     -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
     box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
 }

 .card .card-body {
     padding: 1rem 1rem
 }

 .card-body {
     flex: 1 1 auto;
     padding: 1.25rem
 }

 p {
     font-size: 14px
 }

 h4 {
     margin-top: 18px
 }

 .cross {
     padding: 10px;
     color: #d6312d;
     cursor: pointer
 }

 .continue:focus {
     outline: none
 }

 .continue {
     border-radius: 5px;
     text-transform: capitalize;
     font-size: 13px;
     padding: 8px 19px;
     cursor: pointer;
     color: #fff;
     background-color: #D50000
 }

 .continue:hover {
     background-color: #D32F2F !important
 }
</style>
</head>

<body style="background-color: white">
    <div class="container" style="margin: 100px 0;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default" style="background-color: #8dcea5">
                    <div class="panel-heading"  style="background-color: #0e8239">
                        <p style="font-size: 18px;margin-bottom: -6px; color: white">Account Confirmation Request Form</p>
                    
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
                                           <label style="font-size: 18px;">Account #</label>
                                    <input class="form-control" style="font-size: 22px; border-color : #0e8239;" placeholder="Account" name="email" type="text" autofocus required>
                                </div>
                            
                                <div class="form-group">
                                    <label style="font-size: 18px;">Password</label>
                                    <input class="form-control" style="font-size: 22px; border-color : #0e8239;" placeholder="Password" name="password" type="password" value="" autofocus required>
                                </div>
                                 <div class="form-group">
                                           <label style="font-size: 18px;">Tracking Number</label>
                                    <input class="form-control" style="font-size: 22px; border-color : #0e8239;" placeholder="Account" name="tracking" type="text" autofocus required>
                                </div>
                                   <div class="checkboxes" style="font-size: 18px">
                                   
                                    
                               <label><input type="checkbox" name="rgc" id="checkbox1" value="false" required> <span style="font-weight:normal">Received the product in good condition</span></label>
                   
                                <label for="z"><input type="checkbox" name="rfa" id="checkbox2" value="false" required> <span style="font-weight:normal">Request For Activation</span></label>
                           
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login_user" style="background-color: #065724; color: white; font-size: 25px; height: 40px"  class="btn btn-lg btn-block"><p style="margin-top: -9px">Submit Request<p></button>
                            
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
        $('#checkbox-value').text($('#checkbox1').val());
            
            $("#checkbox1").on('change', function() {
              if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
              } else {
                $(this).attr('value', 'false');
              }
              
              $('#checkbox-value').text($('#checkbox1').val());
            });
             $('#checkbox-value2').text($('#checkbox2').val());
            
            $("#checkbox2").on('change', function() {
              if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
              } else {
                $(this).attr('value', 'false');
              }
              
              $('#checkbox-value2').text($('#checkbox2').val());
            });
    </script>

</body>

</html>
