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
                          <form method="POST" action="distributor_trend_report2.php" class="form-inline">
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
<div class="table-responsive">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Distributor</th>

								<th>Person Joined</th>
								<th>Date of Last Movement</th>
								<th>View Details</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
		
    $startDate = date("Y-m-d" , strtotime('-3 months')); // select date in Y-m-d format
$nMonths = 1; // choose how many months you want to move ahead

  $todate = date("Y-m-d" , strtotime('-9 hours')); // select date in Y-m-d format
							$date=date("Y-m-d");
								$h=mysqli_query($con,"SELECT * FROM user where UNIX_TIMESTAMP(last_movement) <= UNIX_TIMESTAMP('$startDate')");
								while($hrow=mysqli_fetch_array($h)){
								    $email_user= $hrow['email'];
								    $h0=mysqli_query($con,"SELECT COUNT(email) as counters FROM user where under_userid='$email_user'");
													$result_h = mysqli_fetch_array($h0);
													$count= $result_h['counters'];
								    if($count >= 12){
								        
								    }else{
									?>
										<tr>
											<td class="hidden"></td>
											
													<td><?php echo $hrow['email']; ?></td>
													<td><?php echo $count?></td>
												
														<td><?php echo date("M d, Y", strtotime($hrow['last_movement']));?></td>
											<td><a href="distributor_trend_report_view.php?rowid=<?php echo $hrow['under_userid']; ?>&to_date=<?php echo $todate ?>&from_date=<?php echo $startDate ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a></td>
											
									
										</tr>
									<?php
								    }
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
	"pageLength": 10
	});
});
</script>
</body>

</html>
