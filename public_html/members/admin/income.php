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
              <button class="btn" onclick="printDiv('historyTables')" ><i class="fa fa-print"></i> Print</button>
               <br>
              <br>
				<div class="row" id="historyTables">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
					<thead>
                                	<tr>
                                    	<th>S.N.</th>
                                        <th>Userid</th>
                                        <th>Amount</th>
                                
                                    </tr>
                                </thead>
                                <tbody>
								<?php	
								$i=1;
                                	$query = mysqli_query($con,"select * from income order by total_bal DESC");
									if(mysqli_num_rows($query)>0){
									
										while($row=mysqli_fetch_array($query)){
											$userid = $row['userid'];
											$amount = $row['current_bal'];
											
											$query_user = mysqli_query($con,"select * from user where email='$userid'");
											$result = mysqli_fetch_array($query_user);
											$account = $result['account'];
										?>
                                        	<tr>
                                            	<td><?php echo $i; ?></td>
                                                <td><?php echo $userid; ?></td>
                                                <td><?php echo $amount; ?></td>
                                            
                                            </tr>
                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="5">No user exist</td>
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