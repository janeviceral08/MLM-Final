<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];




$get_userid = mysqli_query($con,"select * from user where account='$email'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$get_user = $result_get_userid['email'];

$query1 = mysqli_query($con,"SELECT COUNT(user_id) as items FROM `cart` WHERE user_id='$email'");
						$result = mysqli_fetch_array($query1);
                $items=$result['items'];
                
  if(isset($_SESSION['userid'])) {
    // $sx = 'Male';
    // if ($rows["user_sex"] == 0) { $sx = 'Female'; }
    $SELECT = mysqli_query($con,"SELECT * FROM user where email = '$get_user'"); 
    if($SELECT != false) {
        while($rows = mysqli_fetch_array($SELECT)) {
    

            $fullname = $rows["first_name"] . ' ' . $rows["last_name"];
            $email = $rows["email"];
            $mobile = $rows["mobile"];
            $password = $rows["password"];

            $address = $rows["address"];
            $last_name = $rows["last_name"];
            $first_name = $rows["first_name"];
            $middle_name = $rows["middle_name"];
             $beneficiary = $rows["beneficiary"];
             $beneficiary_contact = $rows["beneficiary_contact"];
             $beneficiary_address = $rows["beneficiary_address"];
             $birthday = $rows["birthday"];
       
        }
    }
  } else {
    header('location: profile.php');
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
    th, td {
      text-align: center;
    }
    body, html {

  font-size: 22px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
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
                        <h1 class="page-header">User Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    <form action="update_exec.php" method="post">
                         <?php
                if(isset($_SESSION['notif'])) {
                    if($_SESSION['notif'] == 'success') {
                        echo '
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Your user account information has been updated successfully.
                        </div>
                        ';
                    } else {
                        echo '
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            Something broke. We cannot update your profile at this moment. Please try again later.
                        </div>
                        ';
                    }
                    unset($_SESSION['notif']);
                } else {
                }
              ?>
                    	      <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" placeholder="First Name" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                              <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name; ?>" placeholder="Middle Name" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"  placeholder="Last Name" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                              <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" name="birthday" id="birthday" value="<?php echo $birthday; ?>" placeholder="Last Name" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                              <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="mobile" maxlength="11" id="contact" value="<?php echo $mobile; ?>" placeholder="Contact Number" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Username" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" readonly>
                            </div>
                      <div class="form-group">
                                <label>Beneficiary</label>
                                <input type="text"name="beneficiary" id="beneficiary" value="<?php echo $beneficiary; ?>" placeholder="Beneficiary" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Beneficiary Contact</label>
                                <input type="text"name="beneficiary_contact" id="beneficiary_contact" value="<?php echo $beneficiary_contact; ?>" placeholder="Beneficiary Contact" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Beneficiary Address</label>
                                <input type="text"name="beneficiary_address" id="beneficiary_address" value="<?php echo $beneficiary_address; ?>" placeholder="Beneficiary Address" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"name="password" id="password" value="<?php echo $password; ?>" placeholder="Password" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                            
                          
                           
                           
                            
                            <div class="form-group">
                         <button type="submit" class="btn btn-success pull-right">Update</button>
                        </div>
                        </form>
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
