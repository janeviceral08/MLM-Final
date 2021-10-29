<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require('php-includes/connect.php');
include('php-includes/check-login.php');

									
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
           <button class="btn" onclick="printDiv('historyTables')" ><i class="fa fa-print"></i> Print</button>
            <br>
              <br>
              <!-- /.row -->
				<div class="row" id="historyTables">
                <div class="col-lg-12">
       
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
							<th>User id</th>
								<th>Mode</th>
								<th>Details</th>
								<th>Amount</th>
								<th>Fee</th>
								<th>Date Processed</th>
								<th>Status</th>
								<th>Date Approved</th>
								<th>Note</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(isset($_POST['pin_history'])){

    $to = $_POST['to'];
$from = $_POST['from'];
    
								$h=mysqli_query($con,"select * from payout_request where date_approved between '$from' and '$to'");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
												<td><?php echo $hrow['userid']; ?></td>
											<td><?php echo $hrow['mode']; ?></td>
											<td><?php echo $hrow['details']; ?></td>
											<td><?php echo $hrow['amount']; ?></td>
											<td><?php echo $hrow['fee']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_processed']));?></td>
											<td><?php echo $hrow['status']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_approved']));?></td>
											<td><?php echo $hrow['note']; ?></td>
									
									
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
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

												
												
<?php												
										
									
    


} ?>

