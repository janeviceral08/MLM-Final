<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>
<?php

ini_set( "display_errors", 0); 
require('php-includes/connect.php');
include('php-includes/check-login.php');


$userid = $_SESSION['userid'];


$get_userid = mysqli_query($con,"select * from user where account='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$email = $result_get_userid['email'];
	$level = $result_get_userid['user_level'];



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



  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
 
 <style>

body, html {
font-size: 22px;

tr:nth-child(even) {
  background-color: #bdc993;

}
.marquee {
  width: 260px;
  margin: 0 auto;
  overflow: hidden;
  white-space: nowrap;
  font-size: 20px;
  position: absolute;
  color: #fff;
  text-shadow: #000 1px 1px 0;
  font-family: Tahoma, Arial, sans-serif;
  -webkit-animation: marquee 5s linear infinite;
}

@-webkit-keyframes marquee {
  0% {
    text-indent: 260px;
  }
  100% {
    text-indent: -260px;
  }
}
</style>

</head>

<body>

    <div id="wrapper">
        <!-- Kaning Dashboard alisdan og users progressive report -->

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper" style="background-color: #8dcea5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" style="color: #3a6520">Shared Income</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    
                    
                     
              
                	 <?php
                	 $date = date("Y-m-d");
					
						$querylevel1 = mysqli_query($con,"select SUM(amount) as level1 from income_history where user_id='$email' AND level='1'");
						$resultlevel1 = mysqli_fetch_array($querylevel1);
						
							$querylevel2 = mysqli_query($con,"select SUM(amount) as level2 from income_history where user_id='$email' AND level='2'");
						$resultlevel2 = mysqli_fetch_array($querylevel2);
						
								$querylevel3 = mysqli_query($con,"select SUM(amount) as level3 from income_history where user_id='$email' AND level='3'");
						$resultlevel3 = mysqli_fetch_array($querylevel3);
						
								$querylevel4 = mysqli_query($con,"select SUM(amount) as level4 from income_history where user_id='$email' AND level='4'");
						$resultlevel4 = mysqli_fetch_array($querylevel4);
						
								$querylevel5 = mysqli_query($con,"select SUM(amount) as level5 from income_history where user_id='$email' AND level='5'");
						$resultlevel5 = mysqli_fetch_array($querylevel5);
						
								$querylevel6 = mysqli_query($con,"select SUM(amount) as level6 from income_history where user_id='$email' AND level='6'");
						$resultlevel6 = mysqli_fetch_array($querylevel6);
					?>
					
					
					

         
    <div class="row">
          <div class="col-lg-3 col-6">
           
            <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px"><?php 
								echo number_format($resultlevel1['level1'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars" ></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">1st Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php 
								echo number_format($resultlevel2['level2'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">2nd Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php 
								echo number_format($resultlevel3['level3'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">3rd Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
           <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">  <?php 
								echo number_format($resultlevel4['level4'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">4th Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
         <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php 
								echo number_format($resultlevel5['level5'],2); 
								?></p>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">5th Level Income</a>
            </div>
          </div>
        
          
       
            <div class="container-fluid">
                <div class="row">
                    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-9">
              
                    </div>
                </div>
                <br>
                    <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                          <!-- /insert table here if needed -->
                        </div>
               </div>
                </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->
    
          
          
          
        </div>
        
          </div>
          
            </div>
            <!-- /.container-fluid -->
            
            
            
            
        </div>
        <!-- /#page-wrapper -->
        
        <br>
         <br>
          <br>
           <br>

    </div>
    <!-- /#wrapper -->
<script>
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'none';
        document.getElementById('gcash').style.display = 'contents';
              document.getElementById('palawan').style.display = 'none';
    }
    else if (document.getElementById('gcashCheck').checked) {
        document.getElementById('gcash').style.display = 'none';
         document.getElementById('ifYes').style.display = 'none';
                   document.getElementById('palawan').style.display = 'contents';
    }
     else if (document.getElementById('noCheck').checked) {
        document.getElementById('gcash').style.display = 'none';
                  document.getElementById('palawan').style.display = 'none';
         document.getElementById('ifYes').style.display = 'contents';
    }

}


</script>
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
