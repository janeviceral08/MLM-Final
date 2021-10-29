<?php

ini_set( "display_errors", 0); 
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];
?>

<?php

if(isset($_GET['payout_request'])){
    $amount = mysqli_real_escape_string($con,$_GET['amount']);
    $yesno = mysqli_real_escape_string($con,$_GET['yesno']);
    $month = mysqli_real_escape_string($con,$_GET['month']);
    $year = mysqli_real_escape_string($con,$_GET['year']);
    $cvv = mysqli_real_escape_string($con,$_GET['cvv']);
     $gcash_mobile = mysqli_real_escape_string($con,$_GET['gcash_mobile']);
    $reciever_name = mysqli_real_escape_string($con,$_GET['reciever_name']);
    $mobile = mysqli_real_escape_string($con,$_GET['mobile']);
    $card_num = mysqli_real_escape_string($con,$_GET['card_num']);

    $details = 'Card Number: '.$card_num.'      CVV '.$cvv.'         Expiration Date: '.$month.' ' .$year;
        
	$date = date("Y-m-d");
	date_default_timezone_set("asia/manila");
	$time = date("h:i:sa");

		$query1 = mysqli_query($con,"select * from income where userid='$email'");
						$result = mysqli_fetch_array($query1);
	
	if($amount >= 100){
	if($amount <= $result['current_bal']){
        //Inset the value to pin request
        if($yesno == 'palawan express'){
            
            if($amount <= 100){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','2','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }  
              else if($amount <= 300){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','3','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }  
             else if($amount <= 500){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','8','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
             else if($amount <= 700){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','10','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
             else if($amount <= 900){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','12','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
             else if($amount <= 1000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','15','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
             else if($amount <= 1500){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','20','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
             else if($amount <= 2000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','30','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
            else if($amount <= 2500){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','40','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
             else if($amount <= 3000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','50','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            } 
             else if($amount <= 3500){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','60','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 4000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','70','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 5000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','90','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 7000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','115','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 9500){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','125','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 10000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','140','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 14000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','210','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 15000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','220','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 20000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','250','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 30000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','290','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 40000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','320','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
            else if($amount <= 50000){
                  $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Reciever Name: $reciever_name   Contact: $mobile','$amount','345','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
            }
             else if($amount > 50000){
                	echo '<script>alert("You can only payout a maximum amount of ₱50,000 in Palawan Express");window.location.assign("payout-request.php");</script>';

            }
            
            }
            else if ($yesno == 'gcash'){
                if($amount <= 40000){
                    $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Contact: $gcash_mobile','$amount','0','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
      
                }
                else{
                         	echo '<script>alert("You can only payout a maximum amount of ₱40,000 in Gcash Due to transaction limit per day");window.location.assign("payout-request.php");</script>';

                }
                
            }
            
                     else if ($yesno == 'paymaya'){
                if($amount <= 20000)
                    {
                $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Card Number: $card_num    CVV: $cvv    Expiration Date: $year $month','$amount','0','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
                    }
                       else{
                         	echo '<script>alert("You can only payout a maximum amount of ₱20,000 in Paymaya Due to transaction limit per day");window.location.assign("payout-request.php");</script>';

                }
            }
       
 
       
	if($query){
			echo '<script>alert("Payout request sent successfully");window.location.assign("payout-request.php");</script>';
		}
		else{
			//echo mysqli_error($con);
		echo '<script>alert("Please Complete the field");window.location.assign("payout-request.php");</script>';

		}
		

}



		     	else{
		echo '<script>alert("The Amount you want to payout is bigger than your current balance. You have ₱ '.$result['current_bal'].' in your current balance");</script>';
	}
	}
		     	else{
		echo '<script>alert("Minimum Amount to Withdraw is ₱100");</script>';
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
                        <h1 class="page-header">Payout Request</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-9">
                    <form method="get">
                            <div class="form-group">
                            <label for="sel1">Amount:</label>
                            	<input type="text" name = "amount" class="form-control">
                            </div>
                <label for="sel1">Payout Method:</label>
                 <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="gcash"  id="yesCheck"> Gcash
                            <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="paymaya"  id="noCheck">Paymaya 

                          <input type="radio"  class="md-radio" onclick="javascript:yesnoCheck();" name="yesno"  value="palawan express" id="gcashCheck"> Palawan Express  
            <br>
                          
    <div id="ifYes" style="display:none">
  <br>
  
  <?php
    	$query = mysqli_query($con,"select card_number,cvv,expiration_month,expiration_year from payment_method where userid='$email'");
						$result = mysqli_fetch_array($query);
						$card_number=$result['card_number'];
						$cvv=$result['cvv'];
						$expiration_month=$result['expiration_month'];
						$expiration_year=$result['expiration_year'];
				
						if($result['card_number'] == NULL && $result['cvv'] == NULL && $result['expiration_month'] == NULL && $result['expiration_year'] == NULL || $result['cvv'] == '%20' || $result['expiration_month'] == '%20' || $result['expiration_year'] == '%20'){
						    echo " <p style='color: red'>*Please UPDATE your Card setting under Payment Settings</p>";
						}
						elseif( $result['card_number'] == ' ' || $result['cvv'] == ' '|| $result['cvv'] == '' ) {
						 echo " <p style='color: red'>*Please UPDATE your Card setting under Payment Settings</p>";
					    
						    
						}
						else{
						    echo " 
						       <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Card Number</label>
                <input type='text' name='card_num' class='form-control' value='$card_number' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>CVV</label>
                <input type='text' name='cvv' class='form-control' value='$cvv' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Expiration month</label>
                <input type='text' name='month' class='form-control' value='$expiration_month' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Expiration Year</label>
                <input type='text' name='year' class='form-control' value='$expiration_year' readonly>
            </div>
					
						    <input type='submit' name='payout_request' class='btn btn-primary' value='Send Request'>";
						}
							
 ?>
  
    </div>
    
    
    <div id="gcash" style="display:none">
  <br>
       <?php
    	$query = mysqli_query($con,"select gcash_number from payment_method where userid='$email'");
						$result = mysqli_fetch_array($query);
						$gcash=$result['gcash_number'];
				
						if($result['gcash_number'] == NULL || $result['gcash_number'] == '%20'){
						    echo " <p style='color: red'>*Please UPDATE your gcash setting under Payment Settings</p>";
						}
						
						else{
						    echo " 
						       <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Gcash Number</label>
                <input type='text' name='gcash_mobile' class='form-control' value='$gcash' readonly>
            </div>
					
						    <input type='submit' name='payout_request' class='btn btn-primary' value='Send Request'>";
						}
							
 ?>
  
          
     
    
    </div>
    
     <div id="palawan" style="display:none">
  <br>
  
  <?php
    	$query = mysqli_query($con,"select address,mobile_number,receiver_name from payment_method where userid='$email'");
						$result = mysqli_fetch_array($query);
						$address=$result['address'];
						$mobile_number=$result['mobile_number'];
						$receiver_name=$result['receiver_name'];
					
				
						if($result['address'] == NULL && $result['mobile_number'] == NULL && $result['receiver_name'] == NULL || $result['address'] == '' || $result['mobile_number'] == '' || $result['receiver_name'] == ''|| $result['address'] == ' ' || $result['mobile_number'] == ' ' || $result['receiver_name'] == ' '){
						    echo " <p style='color: red'>*Please UPDATE your Payment Settings</p>";
						}
				  
						else{
						    echo " 
						       <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Receiver Name</label>
                <input type='text' name='reciever_name' class='form-control' value='$receiver_name' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Address</label>
                <input type='text' class='form-control' value='$address' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Mobile Number</label>
                <input type='text' name='mobile' class='form-control' value='$mobile_number' readonly>
            </div>
					
						    <input type='submit' name='payout_request' class='btn btn-primary' value='Send Request'>";
						}
							
 ?>
  
  
  
  
       
          
          
         
    </div>
        


</form>
                    </div>
                </div>
                <br>
                    <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-bordered table-striped">
                            <tr>
                            	<th>S.n.</th>
                                <th>Amount</th>
                                <th>Transaction Fee</th>
                                <th>Mode</th>
                                <th>Details</th>
                                <th>Expected Amount to be Recieved</th>
                                <th>Date Processed</th>
                                <th>Date Approved</th>
                                <th>Note</th>
                            </tr>
                            <?php 
							$i=1;
							$query = mysqli_query($con,"select * from payout_request where userid='$email' order by id desc");
							if(mysqli_num_rows($query)>0){
								while($row=mysqli_fetch_array($query)){
								?>
                                	<tr>
                                    	<td><?php echo $i; ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td><?php echo $row['fee']; ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $row['mode']; ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $row['details']; ?></td>
                                        <td><?php echo $row['amount'] - $row['fee']; ?></td>
                                        <td><?php echo $row['date_processed']; ?></td>
                                        <td><?php echo $row['date_approved']; ?></td>
                                        <td><?php echo $row['note']; ?></td>
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
                </div>
               
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<script>
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'none';
        document.getElementById('gcash').style.display = 'contents';
              document.getElementById('palawan').style.display = 'none';
    }
    else if (document.getElementById('gcashCheck').checked) {
        document.getElementById('gcash').style.display = 'none';
         document.getElementById('ifYes').style.display = 'none';
                   document.getElementById('palawan').style.display = 'contents';
    }
     else if (document.getElementById('noCheck').checked) {
        document.getElementById('gcash').style.display = 'none';
                  document.getElementById('palawan').style.display = 'none';
         document.getElementById('ifYes').style.display = 'contents';
    }

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
