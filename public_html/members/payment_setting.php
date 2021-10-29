<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];


$get_userid = mysqli_query($con,"select * from user where account='".$_SESSION['userid']."'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$get_user = $result_get_userid['email'];


$query1 = mysqli_query($con,"SELECT COUNT(user_id) as items FROM `cart` WHERE user_id='$email'");
						$result = mysqli_fetch_array($query1);
                $items=$result['items'];
                
  if(isset($_SESSION['userid'])) {
    // $sx = 'Male';
    // if ($rows["user_sex"] == 0) { $sx = 'Female'; }
    $SELECT = mysqli_query($con,"SELECT * FROM payment_method where userid = '$get_user'"); 
    if($SELECT != false) {
        while($rows = mysqli_fetch_array($SELECT)) {
            $gcash_number = $rows["gcash_number"];
            $receiver_name = $rows["receiver_name"];
            $mobile_number = $rows["mobile_number"];
            $address = $rows["address"];
            $card_number = $rows["card_number"];
            $cvv = $rows["cvv"];
            $expiration_month = $rows["expiration_month"];
            $expiration_year = $rows["expiration_year"];
       
        }
    }
  } else {
    header('location: profile.php');
  }


  //for expiration!!!!!!!

  $SELECTed = mysqli_query($con,"SELECT * FROM user u, office o, position p where u.pos_id = p.pos_id and o.office_id = u.office_id and p.pos_hierarchy != 2"); 
  $cntrr = 0;
  if($SELECTed != false) {
    while($rows = mysqli_fetch_array($SELECTed)) {
      $cntrr++;
      if(time() > $rows["user_expiration"]) {
        $cntrexp++;
      }
    }
  } else {
  }
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

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">PAYMENT SETTINGS</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                	<div class="col-lg-4">
                    <form action="update_exec_payment.php" method="post" >
                    <?php
    if(isset($_SESSION['notif'])) {
        if($_SESSION['notif'] == 'success') {
            echo '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Your user payment information has been updated successfully.
            </div>
            ';
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Something broke. We cannot update your payment information at this moment. Please try again later.
            </div>
            ';
        }
        unset($_SESSION['notif']);
    } else {
    }
  ?>
                    	   
                            <br>
                             <div class="form-group">
      <label for="firstname" style="color: blue">Palawan Express</label>
    
      </div>
                             <div class="form-group">
                                <label>Reciever Name</label>
                                <input type="text" name="receiver_name"value="<?php echo $receiver_name; ?>" placeholder="Reciever Name" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" >
                            </div>
                      <div class="form-group">
                                <label>Address</label>
                                <input type="text"name="address" id="address" value="<?php echo $address; ?>" placeholder="Address"  style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile_number" value="<?php echo $mobile_number; ?>" placeholder="Mobile Number" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" >
                            </div>
                            <br>
                             <div class="form-group">
      <label for="firstname"  style="color: blue">Gcash</label>
    
      </div>
                            <div class="form-group">
                                <label>Gcash Number</label>
                                <input type="text"name="gcash_number" value="<?php echo $gcash_number; ?>" placeholder="Gcash Number" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control">
                            </div>
                            
                      
                            
                          
                           
                           
                            
                            <div class="form-group">
                         <button type="submit" class="btn btn-success pull-right" style="width: 150px; height:50px; font-size: 20px">Update</button>
                        </div>
                        <br>
                        <br>
                        <br>
                        </form>
                    </div>
                </div><!--/.row-->
         
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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
