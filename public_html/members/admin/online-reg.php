<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$product_amount = 2000;

?>
<?php
//Clicked on send buton
if(isset($_POST['send'])){
    						
$capping = 5000000;
	$userid = mysqli_real_escape_string($con,$_POST['userid']);
$get_userid = mysqli_query($con,"select * from user where account='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
	

								//update income
								mysqli_query($con,"update user set is_active='For Delivery' where account='$userid' limit 1");	

					
		
	
	echo '<script>alert("Transaction is being Process.");window.location.assign("pending_application.php");</script>';	
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

    <title>Mlml Website  - Pending Application</title>

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
              <br>
              <br>
          
              <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
							
							        <th>S.n.</th>
                                   
                                    <th>Name</th>
                                    <th>Home Address</th>
                                    <th>Work Address</th>
                                    <th>Deliver To</th>
                                    <th>Mobile</th>
                                    <th>Facebook</th>
                                    <th>Email</th>
                                    <th>Account #</th>
                                    <th>E-Pin</th>
                                    <th>Date</th>
                                    <th>Send</th>
                                    <th>Cancel</th>
							</tr>
						</thead>
						<tbody>
					 <?php
									$query = mysqli_query($con,"select * from online_reg where is_active='no'");
									if(mysqli_num_rows($query)>0){
										$i=1;
										while($row=mysqli_fetch_array($query)){
											$id = $row['id'];
											$account = $row['account'];
											$full_name = $row['first_name'] .' '.$row['middle_name'].' ' .$row['last_name'];
											$amount = $row['is_active'];
                                            
                                            $fb= $row['facebook'];
                                            $image = $row['mobile'].' '.$row['mobile2'];
                                          	$under_userid= $row['under_userid'];
                                            $email = $row['email'];
                                            	$account = $row['account'];
                                            	$date = $row['date_entered'];
										?>
                                        	<tr>
                                            	<td><?php echo $i; ?></td>
                                              
                                                <td><?php echo $full_name; ?></td>
                                                 <td><?php echo $row['address']; ?></td>
                                                  <td><?php echo $row['work_address']; ?></td>
                                                   <td><?php echo $row['delivery_address']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                 <td><?php echo $fb; ?></td>
                                                 <td><?php echo $email; ?></td>
                                                <td><?php echo $account; ?></td>
                                             <td><?php echo $row['password']; ?></td>
                                                <td> <?php echo date("M d, Y", strtotime($row['date_entered']));?></td>
                                             
                                                	<td> <a href="on-reg_info.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary"> Process </a></td>
                                                	
                                                	
                                                
                                                    </td>
                                               
                                                <td>Cancel</td>
                                            </tr>
                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="12" align="center">You have no pin request.</td>
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

<?php include('script.php'); ?>
<?php include('modal.php'); ?>
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
	"pageLength": 7
	});
});
</script>
</body>

</html>
