<!-- History -->
<?php
ini_set( "display_errors", 0); 
	include('php-includes/connect.php');
	$rowid = $_GET['rowid'];
	
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
 <style>
.btn {
    margin: 12px 0 0 0; 
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
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
              <br>
              <br>
          
              <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
                           <form method="POST" action="report-purchased-history-user.php" class="form-inline">
                               <div class="form-group" style="display:none">
                            <label for="sel1">user id:</label>
                            	<input type="text" name = "userid" value="<?php echo $rowid ?>" class="form-control" style="width: 200px">
                            </div>
                            <label for="sel1">Base on Date Delivered</label><br>
                            <div class="form-group">
                            <label for="sel1">From:</label>
                            	<input type="date" name = "from" class="form-control" style="width: 200px">
                            </div>
                            <div class="form-group">
                            <label for="sel1">To:</label>
                            	<input type="date" name = "to" class="form-control" style="width: 200px">
                            </div>
         <input type="submit" name="pin_history" class="btn btn-primary" value="Filter">
        
        


</form>
<br>
  <form method="POST" action="report-purchased-history-user-ordered.php" class="form-inline">
                               <div class="form-group" style="display:none">
                            <label for="sel1">user id:</label>
                            	<input type="text" name = "userid" value="<?php echo $rowid ?>" class="form-control" style="width: 200px">
                            </div>
                            <label for="sel1">Base on Date Ordered</label><br>
                            <div class="form-group">
                            <label for="sel1">From:</label>
                            	<input type="date" name = "from" class="form-control" style="width: 200px">
                            </div>
                            <div class="form-group">
                            <label for="sel1">To:</label>
                            	<input type="date" name = "to" class="form-control" style="width: 200px">
                            </div>
         <input type="submit" name="pin_history" class="btn btn-primary" value="Filter">
        
        


</form>
<br>
<button class="btn" onclick="printDiv('historyTables')" ><i class="fa fa-print"></i> Print</button>
<br>
<br>
<div class="row" id="historyTables">

					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
					    
					    <thead>
							<tr>
								<th class="hidden"></th>
								<th>User id</th>
								<th>Transaction id</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Address</th>
								<th>Mode</th>
								<th>Tracking Number</th>
								<th>Date Ordered</th>
								<th>Date Delivered</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($con,"SELECT * FROM customer_order LEFT JOIN order_history_details ON customer_order.tr_id=order_history_details.tr_id WHERE user_id = '$rowid' ");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
												<td><?php echo $hrow['user_id']; ?></td>
											<td><?php echo $hrow['tr_id']; ?></td>
											<td><?php echo $hrow['p_name']; ?></td>
												<td><?php echo $hrow['p_qty']; ?></td>
												<td><?php echo $hrow['p_price']; ?></td>
												<td><?php echo $hrow['address']; ?></td>
												<td><?php echo $hrow['mode']; ?></td>
												<td><?php echo $hrow['tracking_number']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_transac']));?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_process']));?></td>
											
									
										</tr>
									<?php
								}
							?>
						</tbody>
					    
					    
					    
                    </table>
                               </div>
                            <!-- /.table-responsive -->
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
	"pageLength": 10
	});
});


function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;
			
           
         
			window.print();

			document.body.innerHTML = originalContents;

}
</script>
</body>

</html>
