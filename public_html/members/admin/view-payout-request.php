<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');

?>
<?php
//Clicked on send buton
if(isset($_POST['send'])){
	$userid = mysqli_real_escape_string($con,$_POST['userid']);
	$amount = mysqli_real_escape_string($con,$_POST['amount']);
	$id = mysqli_real_escape_string($con,$_POST['id']);
	
	$no_of_pin = $amount/$product_amount;
	//Insert pin
	$i=1;
	while($i<=$no_of_pin){
		$new_pin = pin_generate();
		mysqli_query($con,"insert into pin_list (`userid`,`pin`) values('$userid','$new_pin')");
		$i++;	
	}
	
	//updae pin request status
	mysqli_query($con,"update pin_request set status='close' where id='$id' limit 1");
	
	echo '<script>alert("Pin send successfully.");window.location.assign("view-pin-request.php");</script>';	
}

//Pin generate
function pin_generate(){
	global $con;
	$generated_pin = rand(100000,999999);
	
	$query = mysqli_query($con,"select * from pin_list where pin = '$generated_pin'");
	if(mysqli_num_rows($query)>0){
		pin_generate();
	}
	else{
		return $generated_pin;
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

    <title>Mlml Website  - View Payout Request</title>

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
                            	<tr>
                                	<th>S.n.</th>
                                    <th>Userid</th>
                                    <th>Mode</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Fee</th>
                                    <th>Date Processed</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php
									$query = mysqli_query($con,"select * from payout_request where status='pending'");
									if(mysqli_num_rows($query)>0){
										$i=1;
										while($row=mysqli_fetch_array($query)){
			
                                         
                                          
    
										?>
                                        	<tr>
                                        	    <td><?php echo $i ?></td>
                                            	<td><?php echo $row['userid']; ?></td>
                                                <td><?php echo $row['mode']; ?></td>
                                                <td><?php echo $row['details']; ?></td>
                                                <td><?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['fee']; ?></td>
                                                <td>
                                                <?php echo date("M d, Y", strtotime($row['date_processed']));?>
                                                </td>
                                                
                                                <td><?php 
                                                if ($row['status'] == 'pending'){
                                                    echo "pending";
                                                } ?></td>
                                          
                                               <td><a href="payout-info.php?id=<?php echo $row["id"]; ?>"> Process </a></td>
                                                
                                               
                                               
                                            </tr>
                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="6" align="center">You have no pin request.</td>
                                        </tr>
                                    <?php
									}
								?>
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
