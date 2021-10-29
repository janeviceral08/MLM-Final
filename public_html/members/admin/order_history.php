<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mlml Website  - Pin Request</title>

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
								<th class="hidden"></th>
								<th>Email</th>
							
								<th>Order Date</th>
								<th>Transaction Number</th>
								<th>Address</th>
								<th>Details</th>
								<th>Amount</th>
								<th>Mode of Payment</th>
								<th>Status</th>
								<th>Tracking Number</th>
								<th>Date Processed</th>
								<th>Receipt Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($con,"select * from order_history_details where status='Delivering' order by date_transac desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
										<td><?php echo $hrow['user_id']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_transac']));?></td>
											<td><?php echo $hrow['tr_id']; ?></td>
											<td style="text-transform: capitalize;"><?php echo $hrow['address']; ?></td>
											<td style="text-transform: capitalize;"><?php echo $hrow['details']; ?></td>
											<td><?php echo $hrow['amount']; ?></td>
											<td style="text-transform: capitalize;"><?php echo $hrow['mode']; ?></td>
											<td><?php echo $hrow['status']; ?></td>
											<td><?php echo $hrow['tracking_number']; ?></td>
												<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_process']));?></td>
													<td style="width:250px; height:50px; margin: 0"><a href="listImage_order.php?id=<?php echo $hrow["id"]; ?>"> <img src="imageView_order.php?image_id=<?php echo $hrow["id"]; ?>" style="max-height:100%; max-width:100%; ; margin: 0; display:block;"/> </a></td>
											
											<td>
												<a href="order_history_detail.php?rowid=<?php echo $hrow['tr_id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
										
											</td>
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
