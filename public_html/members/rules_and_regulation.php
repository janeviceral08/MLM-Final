
<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
include('ChromePhp.php');
error_reporting(0);
$get_user = $_SESSION['userid'];



$get_userid = mysqli_query($con,"select * from user where account='$get_user'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$userid = $result_get_userid['email'];
$get_userid_pin = mysqli_query($con,"select * from pin_list where userid='$get_user' and status='open' limit 1");
						$result_get_userid_pin  = mysqli_fetch_array($get_userid_pin );
						$userid_pin = $result_get_userid_pin['pin'];
										
						
$capping = 5000000;
?>

<!DOCTYPE html>
<html lang="en">

<head>

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

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <h1>Rules</h1>
                        <h3 class="page-header">3-4 Months without sales or Movement, the distributor will be subject for replacement or termination.</h3>
                     
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                	    <h1>Directory</h1>
                	    <i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="Mobile No., Account no. , Last Movement Date ">
<span style="font-size: 20px;">Green Icon means the Registered Distributors Account is Being Confirmed</span></i>
    
    <br>
    <i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="Mobile No, Account no. , Last Movement Date ">
 <span style="font-size: 20px;">Blue Icon means the Registered Distributors Account is on Request</span></i>
         <br>
        
    <i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="Mobile No, Account no. , Last Movement Date ">
   <span style="font-size: 20px;">Orange Icon means the Registered Distributors Product is being shipped and account is Pending for Approval</span></i>
     <br>
        
    <i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="Mobile No, Account no. , Last Movement Date ">
 <span style="font-size: 20px;">Yellow Icon means the Registered Distributors Product is being shipped and account is Pending</span></i>
   <br>
    
     <i class="fa fa-user fa-4x" id="tooltip" style="color:black" title="Mobile No, Account no. , Last Movement Date ">
  <span style="font-size: 20px; ">Black Icon means it is empty and you can register new distributor</span></i>
    
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
