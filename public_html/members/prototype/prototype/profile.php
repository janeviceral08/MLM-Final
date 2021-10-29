<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];

  if(isset($_SESSION['userid'])) {
    // $sx = 'Male';
    // if ($rows["user_sex"] == 0) { $sx = 'Female'; }
    $SELECT = mysqli_query($con,"SELECT * FROM user where email = '".$_SESSION['userid']."'"); 
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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <style>
    th, td {
      text-align: center;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div style="margin: 4%" class="col-xs-7">
            <!-- /.box-header -->
          <!-- Horizontal Form -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">User Account Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="update_exec.php" method="post" class="form-horizontal">
              <div class="box-body">

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
                  <label for="firstname" class="col-sm-2 control-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>" placeholder="First Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname" class="col-sm-2 control-label">Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="middle_name" id="middle_name" value="<?php echo $middle_name; ?>" placeholder="Middle Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>" placeholder="Last Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="contact" class="col-sm-2 control-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" maxlength="11" id="contact" value="<?php echo $mobile; ?>" placeholder="Contact Number" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2019 <a href="#" target="_blank">Multi-Level Marketing in Butuan City</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
