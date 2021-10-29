

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
<?php
//User cliced on join
if(isset($_GET['join_user'])){

	$user = mysqli_real_escape_string($con,$_GET['user']);
	$reasons = mysqli_real_escape_string($con,$_GET['reasons']);
	$email = mysqli_real_escape_string($con,$_GET['email']);
	$beneficiary = mysqli_real_escape_string($con,$_GET['beneficiary']);
	$beneficiary_contact = mysqli_real_escape_string($con,$_GET['beneficiary_contact']);
	$beneficiary_address = mysqli_real_escape_string($con,$_GET['beneficiary_address']);
	$name = mysqli_real_escape_string($con,$_GET['name']);

	$under_userid = $userid;
	$date=date("Y-m-d");
		//Insert into User profile
		$query = mysqli_query($con,"insert into replacement_request(`user_id`,`for_under`,`reasons`,`date_requested`,`email`,`beneficiary`,`beneficiary_contact`,`beneficiary_address`,`name`) values('$under_userid','$user','$reasons','$date', '$email','$beneficiary','$beneficiary_contact','$beneficiary_address','$name')");
	if($query){
	    	echo "
						<div class='alert alert-success' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Success!</strong>  Request sent
				</div>
					";
	}
	else{
	    	echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Unknown error occure.
				</div>";
	}

	
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
                        <h1 class="page-header">Distributor Replacement/ Deactivation Request</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    	<form method="get">
                    	      <div class="form-group">
                                <label>Distributor ID to Replace </label>
                                <input type="text" name="user" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                              <div class="form-group">
                                <label>Reason/s of Replacement</label>
                               
                                	<textarea type="text"  name="reasons" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required></textarea>
                            </div>
                           
                                <div class="form-group">
                                <label>PERSONAL INFORMATION OF THE PERSON TO BE REPLACE</label>
                               <label>Full Name</label>
                                
                                	 <input type="text" name="name" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                            </div>
                           
                            <div class="form-group">
                           
                               <label>Email</label>
                               <input type="text" name="email" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                            
                               <label>Beneficiary</label>
                               <input type="text" name="beneficiary" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                                
                            </div>
                             <div class="form-group">
                            <label>Beneficiary Contact</label>
                            <input type="text" name="beneficiary_contact" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                                
                            </div>
                             <div class="form-group">
                            <label>Beneficiary Address</label>
                             <input type="text" name="beneficiary_address" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control" required>
                                
                            </div>
                             <div class="form-group">
                            
                                
                            </div>
                            
                            <div class="form-group">
                        	<input type="submit" name="join_user" class="btn btn-primary" value="Send">
                        </div>
                          <div class="form-group">
                            
                                
                            </div>
                              <div class="form-group">
                            
                                
                            </div>
                        </form>
                        
                        
                          <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="table-responsive">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Distributor to Replace</th>
								<th>Reason</th>
								<th>Distributor to replace information</th>
								<th>Status</th>
								<th>Date Sent</th>
							
							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($con,"select * from replacement_request where user_id='".$result_get_userid['email']."' order by date_requested asc ");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
												<td><?php echo $hrow['for_under']; ?></td>
											<td><?php echo $hrow['reasons']; ?></td>
											<td><?php echo $hrow['name']; ?>, <?php echo $hrow['email']; ?>, <?php echo $hrow['beneficiary']; ?>, <?php echo $hrow['beneficiary_contact']; ?>, <?php echo $hrow['beneficiary_address']; ?></td>
												<td><?php echo $hrow['request_status']; ?></td>
											<td><?php echo date("M d, Y", strtotime($hrow['date_requested']));?></td>
										
											
									
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                         </div>
                        <!-- /.panel-body -->
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
    <script src="custom.js"></script>
<script>
$(document).ready(function(){
	$('#history').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 10
	});
});
</script>

</body>

</html>
