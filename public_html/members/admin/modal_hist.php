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

    <title>Mlml Website  - View Pin Request</title>

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
                        <h1 class="page-header">Admin - View Orders</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                	      <div class="modal-body">
				<?php
					$saless=mysqli_query($con,"select * from order_history_details where tr_id='$rowid'");
					$srows=mysqli_fetch_array($saless);
					   $userid= $srows['user_id'];
					  $salesss=mysqli_query($con,"select * from user where email='$userid'");
					$srowss=mysqli_fetch_array($salesss); 
					$last_name = $srowss['last_name'];
					$first_name = $srowss['first_name'];
					$middle_name = $srowss['middle_name'];
					$mobile = $srowss['mobile'];
					$full_name = $first_name.' '.$middle_name.'. '.$last_name ;
					$sales=mysqli_query($con,"select * from customer_order where tr_id='$rowid'");
					$srow=mysqli_fetch_array($sales);
					$number_of_downline=mysqli_query($con,"select count(email) as downline_count from user where under_userid='$userid'");
					$downline_number=mysqli_fetch_array($number_of_downline); 
					$downline_count = $downline_number['downline_count'];
					
					$upline_value=mysqli_query($con,"select * from commision_settings where label_for='upline'");
					$upline_val=mysqli_fetch_array($upline_value); 
						$uplines_val = $upline_val['equivalent_value'];
						
						$downline_value=mysqli_query($con,"select * from commision_settings where label_for='downline'");
					$downline_val=mysqli_fetch_array($downline_value); 
						$downlines_val = $downline_val['equivalent_value'];
					
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p><b>Date:</b> <?php echo date("F d, Y", strtotime($srows['date_transac'])); ?></p>
							<p><b>Transaction Code:</b> <?php echo $srows['tr_id']; ?></p>
							<p style="text-transform: capitalize;"><b>Customer Name:</b> <?php echo $full_name ?> </p>
								<p style="text-transform: capitalize;"><b>Customer Mobile Number:</b> <?php echo $mobile ?> </p>
						
							
							<p style="text-transform: capitalize;"><b>Mode of Payment:</b> <?php echo $srows['mode']; ?></p>
							<p style="text-transform: capitalize;"><b>Delivery Address:</b> <?php echo $srows['address']; ?></p>
							<p style="text-transform: capitalize;"><b>Customer Details:</b> <?php echo $srows['details']; ?></p>
						</div>
					</div>
                    	<div class="table-responsive">
                        	<table class="table table-striped table-bordered">
                            	<tr>
                                <th>Product Name</th>
										<th>Price</th>
										<th>Purchase Qty</th>
										<th>SubTotal</th>
                                </tr>
                             	<?php
										$total=0;
										$pd=mysqli_query($con,"select * from customer_order left join order_history_details on customer_order.tr_id=order_history_details.tr_id where customer_order.tr_id='$rowid'");
										while($pdrow=mysqli_fetch_array($pd)){
										    $user_id = $pdrow['user_id'];
											?>
											<tr>
												<td><?php echo ucwords($pdrow['p_name']); ?></td>
												<td align="right"><?php echo number_format($pdrow['p_price'],2); ?></td>
												<td><?php echo $pdrow['p_qty']; ?></td>
												<td align="right">
													<?php 
														$subtotal=$pdrow['p_total'];
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>
											</tr>
											<?php
										}
									?>
									<tr>
										<td align="right" colspan="3"><strong>Total</strong></td>
										<td align="right"><strong><?php echo number_format($total,2); ?></strong></td>
									</tr>
                            </table>
                        </div><!--/.table-responsive-->
                          <form method="POST" action="order_action.php">
                           <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">Tracking Number</label>
                <input type="text" name="tracking_number" class="form-control" placeholder="Tracking Number" id="cardNumber" required>
            </div>
             <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">User id</label>
                <input type="text" name="userid" value="<?php echo $user_id ?>" class="form-control" id="cardNumber" readonly>
            </div>
             <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">Transaction Id</label>
                <input type="text" name="tr_id" value="<?php echo $rowid ?>" class="form-control" id="cardNumber" readonly>
            </div>
            
            <div class="form-group" id="card-number-field">
                <label for="cardNumber">Downline Recieved</label>
                <input type="text" name="downline" class="form-control" value="<?php echo ($total*$downlines_val)/$downline_count; ?>" id="cardNumber"readonly>
            </div>
            <div class="form-group" id="card-number-field">
                <label for="cardNumber">Upline Recieved</label>
                <input type="text" name="upline" class="form-control" value="<?php echo $total*$uplines_val; ?>" id="cardNumber"readonly>
            </div>
            
          <br>
 
      	<input type="submit" name="proceed" class="btn btn-primary" value="Send for Delivery">
        
  
 
   

</form>
                        <div class="modal-footer">
                   
                </div>
                        
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
    
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>

</body>

</html>

