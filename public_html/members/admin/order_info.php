<?php
  include('php-includes/check-login.php');
require('php-includes/connect.php');
   
   
    $id=$_GET['id'];
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
     <div class="row" style="margin: auto">
              
                	    
                	    
                	    
                	    
                	    	<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
							
							        <th>S.n.</th>
                                    <th>Distributors Email</th>
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
                                
							</tr>
						</thead>
						<tbody>
					 <?php
									$query = mysqli_query($con,"select * from user where id='$id'");
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
                                                <td><?php echo $under_userid; ?></td>
                                                <td><?php echo $full_name; ?></td>
                                                 <td><?php echo $row['address']; ?></td>
                                                  <td><?php echo $row['work_address']; ?></td>
                                                   <td><?php echo $row['delivery_address']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                 <td><?php echo $fb; ?></td>
                                                 <td><?php echo $email; ?></td>
                                                <td><?php echo $account; ?></td>
                                             <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $date; ?></td>
                                             
                                               
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
                	    
                  	<div class="col-lg-7">	    
                	    
   <br>
   <br>
  	<?php 
							
							$query = mysqli_query($con,"select * from user where id='$id'");
							if(mysqli_num_rows($query)>0){
								while($row=mysqli_fetch_array($query)){
							
								
	
								?>
			<form method="POST" action="send_for_delivery.php" enctype="multipart/form-data">
			    	<div class="form-group" style="display: none">
					<label>id:</label>
					<input type="text" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly>
				</div>
			    	<div class="form-group">
					<label>Tracking Number:</label>
					<input type="text" class="form-control" name="tracking" value="<?php echo $row['tracking_num'] ?>" >
				</div>
				<div class="form-group">
					<label>Expected Date To arrive:</label>
					<input type="date" class="form-control" name="date_to_arrive">
				</div>
					<div class="form-group">
					<label>Receipt Details:</label>
					<textarea type="text" class="form-control" name="receipt" value="<?php echo $row['receipt_details'] ?>" ></textarea>
				</div>
					
				<input type="submit" name="send" class="btn btn-primary" id='myBtn' onclick='myFunction()' value="Send For Delivery">
			</form>
			<?php
									
								}
							}
							else{
							?>
			<?php
							}
							?>
</div>
</div>
<script>


function myFunction(){
    document.getElementById("myBtn").value="Sending...";
}

</script>
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
