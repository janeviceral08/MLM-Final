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

    <title>Mlml Website  - View Bonus Request</title>

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
                        <h1 class="page-header">Admin - View Bonus Request</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                	      <div class="modal-body">
				<?php
					$saless=mysqli_query($con,"select * from bunos where userid='$rowid'");
					$srows=mysqli_fetch_array($saless);
					   $userid= $srows['userid'];
					     $bunos_count= $srows['bunos_count'];
					      $active1= $srows['active1'];
					      $active2= $srows['active2'];
					      $active3= $srows['active3'];
					      $active4= $srows['active4'];
					      $active5= $srows['active5'];
					      $active6= $srows['active6'];
					  $salesss=mysqli_query($con,"select * from user where email='$userid'");
					$srowss=mysqli_fetch_array($salesss); 
					$last_name = $srowss['last_name'];
					$first_name = $srowss['first_name'];
					$middle_name = $srowss['middle_name'];
					$mobile = $srowss['mobile'];
					$full_name = $first_name.' '.$middle_name.'. '.$last_name ;
					$sales=mysqli_query($con,"select * from customer_order where tr_id='$rowid'");
					$srow=mysqli_fetch_array($sales);
				
					
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
						
							<p style="text-transform: capitalize;"><b>User Name:</b> <?php echo $full_name ?> </p>
								<p style="text-transform: capitalize;"><b>User Mobile Number:</b> <?php echo $mobile ?> </p>
						
							
							<p style="text-transform: capitalize;"><b>User Bonus Count:</b> <?php echo $bunos_count; ?></p>
							<p style="text-transform: capitalize;"><b>User Bonus Level:</b> <?php 
										 if($bunos_count == 1){
										        echo 'Reach Level 1';
										}
										else if($bunos_count > 6 && $bunos_count < 14){
										        echo 'Reach Level 2';
										} 
										else if($bunos_count > 13 && $bunos_count < 158){
										        echo 'Reach Level 3';
										} 
										else if($bunos_count > 157 && $bunos_count < 1886){
										        echo 'Reach Level 4';
										} 
										else if($bunos_count > 1885 && $bunos_count < 22622){
										        echo 'Reach Level 5';
										} 
										else if($bunos_count > 22621 && $bunos_count < 271454){
										        echo 'Reach Level 6';
										} 
										else if($bunos_count > 271453){
										        echo 'Reach Level 6';
										} 
									
										?> </p>
						
						</div>
					</div> <br>
                          <form method="POST" action="update_bonus_action.php">
                                <div class="form-group" id="card-number-field" style="display: none">
                            
               
                <input type="text" name="userid" value="<?php echo $userid ?>" class="form-control" readonly>
            </div>
                           <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">Level 1 Activation</label>
                <input type="text" name="active1" value="<?php echo $active1 ?>" class="form-control">
            </div>
                <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">Level 2 Activation</label>
                <input type="text" name="active2" value="<?php echo $active2 ?>" class="form-control">
            </div>
                <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">Level 3 Activation</label>
                <input type="text" name="active3" value="<?php echo $active3 ?>" class="form-control">
            </div>
                <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">Level 4 Activation</label>
                <input type="text" name="active4" value="<?php echo $active4 ?>" class="form-control">
            </div>
                <div class="form-group" id="card-number-field">
                            
                <label for="cardNumber">Level 5 Activation</label>
                <input type="text" name="active5" value="<?php echo $active5 ?>" class="form-control">
            </div>
             
            
           
         
          
            
          <br>
 
      	<input type="submit" name="proceed" class="btn btn-primary" value="Send for Notification">
        
  
 
   

</form>

<br>
<br>
<br>

            <form method="POST" action="update_bonus_action_value.php">
                                <div class="form-group" id="card-number-field" style="display: none">
                            
               
                <input type="text" name="userid" value="<?php echo $userid ?>" class="form-control" readonly>
            </div>
                          
                            <?php
if($active1 == '1' && $srows['bonus1'] == null){
    echo' <div class="form-group" id="card-number-field">
                <label for="cardNumber">Level 1 Send Bonus</label>
                <input type="text" name="bonus1" value="1100" class="form-control">
            </div>
            	<input type="submit" name="proceed1" class="btn btn-primary" value="Send">';
}

if($active2 == '1' && $srows['bonus2'] == null){
    echo' <div class="form-group" id="card-number-field">
                <label for="cardNumber">Level 2 Send Bonus</label>
                <input type="text" name="bonus2" value="7500" class="form-control">
            </div>
            	<input type="submit" name="proceed2" class="btn btn-primary" value="Send">';
}
if($active3 == '1' && $srows['bonus3'] == null){
    echo' <div class="form-group" id="card-number-field">
                <label for="cardNumber">Level 3 Send Bonus</label>
                <input type="text" name="bonus3" value="15500" class="form-control">
            </div>
            	<input type="submit" name="proceed3" class="btn btn-primary" value="Send">';
}
if($active4 == '1' && $srows['bonus4'] == null){
    echo' <div class="form-group" id="card-number-field">
                <label for="cardNumber">Level 4 Send Bonus</label>
                <input type="text" name="bonus4" value="100000" class="form-control" >
            </div>
            	<input type="submit" name="proceed4" class="btn btn-primary" value="Send">';
}
if($active5 == '1' && $srows['bonus5'] == null){
    echo' <div class="form-group" id="card-number-field">
                <label for="cardNumber">Level 5 Send Bonus</label>
                <input type="text" name="bonus5" value="300000" class="form-control">
            </div>
            	<input type="submit" name="proceed5" class="btn btn-primary" value="Send">';
}
?>

             
            
           
         
          
            
          <br>
 
      
        
  
 
   

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

</body>

</html>

