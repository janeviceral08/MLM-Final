<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];
?>

<?php
	if(isset($_POST['delivery'])){
	$amount = mysqli_real_escape_string($con,$_POST['txtDisplay']);
	$delivery = mysqli_real_escape_string($con,$_POST['delivery']);
    $date = date("y-m-d");
    $imgData =' ';
	$imageProperties = ' ';
	if($amount > 10 ){
	$sql = "INSERT INTO pin_request(email,amount,delivery_address, imageType ,imageData, date, shipping_fee)
	VALUES('$email','$amount','$delivery','$imageProperties', '$imgData}','$date', '150')";
	$current_id = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
	if(isset($current_id)) {
       
		echo "
						<div class='alert alert-success' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Success!</strong> Pin request sent
				</div>
					";
    }
    else{
        //echo mysqli_error($con);
      
        	echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Unknown error occure.
				</div>";
    }
    
}
else{
 
    	echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Make sure the amount is more than ₱ 1
				</div>";
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

 <title>VGX 12</title>
    <link rel="icon" type="image/png" href="../images/Logo.png"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                        <h1 class="page-header">Pin Request</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="w3-half w3-section">
      <ul class="w3-ul w3-card w3-hover-shadow">
        <li class="w3-xlarge w3-padding-32" style="background-color: #3a6520; color: white">Package</li>
        <li class="w3-padding-16"><b>1</b> Pin</li>
        <li class="w3-padding-16"><b>+ 2,000</b> Worth of Products</li>
        <li class="w3-padding-16"><b>+ 20%</b> Lifetime Purchase Discount</li>
        <li class="w3-padding-16"><b>+ System and Application</b> Access</li>
        <li class="w3-padding-16">
          <h2 class="w3-opacity">For Only ₱ 2,000</h2>
        </li>
      </ul>
    </div>
                
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    <form name="frmOne" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
<div class="form-group">
                            <label for="sel1">Select number of PIN (select one):</label>
                            <select class="form-control" id="sel1" name="pin_num" onchange='OnChange(this.value)'>
                                 <option>Select number of PIN</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="sel1">Amount:</label>
                            	<input type="text" name = "txtDisplay" value ="" class="form-control" readonly>
                            </div>
                              <div class="form-group">
                        
                           <label>Shipping Fee (COD)</label>
                              <input type="text" name="order" value="150" style="font-size: 22px; border-color : #0e8239; padding: 21px" class="form-control"  readonly>
                            </div>
                             <div class="form-group">
                            <label for="sel1">Total:</label>
                            	<input type="text" name = "total_amount" value ="" class="form-control" readonly>
                            </div>
                             <div class="form-group">
                            <label for="sel1">Delivery Address:</label>
                            	<textarea  type="text" name = "delivery"  class="form-control"> </textarea >
                            </div>
        
                        
                         <?php
                    
$query2 = mysqli_query($con,"SELECT * FROM `user` WHERE email='$email'");
						$result_from_query2 = mysqli_fetch_array($query2);
                $last_name=$result_from_query2['last_name'];
                  $middle_name=$result_from_query2['middle_name'];
                    $first_name=$result_from_query2['first_name'];
						
						
							if($last_name != '*edit' && $first_name != '*edit' && $middle_name != '*edit'){
							    
					
						    echo "<input type='submit' value='Submit' class='btn' style='background-color: #3a6520; color: white'/>";
					
							}
							else{
						    echo "<input type='submit' value='Edit your user info' class='btn' style='background-color: #3a6520; color: white' disabled/>
						   ";
						}
 ?>
                        
                        
                        
                        
                        

<br>
</form>

                    </div>
                </div>
                <div class="row">
                	<div class="col-lg-6">
                    	<br><br>
                    	<table class="table table-bordered table-striped">
                        	<tr>
                            	<th>S.n.</th>
                                <th>Amount</th>
                                <th>Delivery Address</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            <?php 
							$i=1;
							$query = mysqli_query($con,"select * from pin_request where email='$email' order by id desc");
							if(mysqli_num_rows($query)>0){
								while($row=mysqli_fetch_array($query)){
									$amount = $row['amount'];
									$date = $row['date'];
									$status = $row['status'];
								?>
                                	<tr>
                                    	<td><?php echo $i; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td><?php echo $row['delivery_address']; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $status; ?></td>
                                    </tr>
                                <?php
									$i++;
								}
							}
							else{
							?>
                            	<tr>
                                	<td colspan="4">You have no pin request yet.</td>
                                </tr>
                            <?php
							}
							?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript" language="Javascript">
	var sum=0;
	pin_num = document.frmOne.pin_num.value;
	document.frmOne.txtDisplay.value = pin_num;
	document.frmOne.total_amount.value = 150;
    function OnChange(value){
		
		pin_num = document.frmOne.pin_num.value;
	
        sum = pin_num * 2000;
		
		total = sum + 150;
		document.frmOne.txtDisplay.value = sum;
		document.frmOne.total_amount.value = total;
    }
</script>
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
