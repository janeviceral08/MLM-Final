<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>
<?php

ini_set( "display_errors", 0); 
require('php-includes/connect.php');
include('php-includes/check-login.php');




$get_userid = mysqli_query($con,"select * from user where account='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$email = $result_get_userid['email'];
                        $level = $result_get_userid['user_level'];



?>

<?php

if(isset($_POST['payout_request'])){
    $amount = mysqli_real_escape_string($con,$_POST['amount']);
    $yesno = mysqli_real_escape_string($con,$_POST['yesno']);
    $month = mysqli_real_escape_string($con,$_POST['month']);
    $year = mysqli_real_escape_string($con,$_POST['year']);
    $cvv = mysqli_real_escape_string($con,$_POST['cvv']);
     $gcash_mobile = mysqli_real_escape_string($con,$_POST['gcash_mobile']);
    $reciever_name = mysqli_real_escape_string($con,$_POST['reciever_name']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $card_num = mysqli_real_escape_string($con,$_POST['card_num']);

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
                
                	echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> You can only payout a maximum amount of ₱50,000 in Palawan Express
				</div>";

            }
            
            }
            else if ($yesno == 'gcash'){
                if($amount <= 40000){
                    $sum= $result['current_bal'] - $amount;
                $query = mysqli_query($con,"insert into payout_request(`userid`,`mode`,`details`,`amount`, `fee`, `date_processed`,`status`,`date_approved`,`note`) values('$email','$yesno','Contact: $gcash_mobile','$amount','0','$date','pending','0000-00-00','')");
                mysqli_query($con,"UPDATE income SET current_bal = '$sum' WHERE userid='$email'");
      
                }
                else{
                         
	echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> You can only payout a maximum amount of ₱40,000 in Gcash Due to transaction limit per day
				</div>";
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
                         	
	echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> You can only payout a maximum amount of ₱20,000 in Paymaya Due to transaction limit per day
				</div>";
                }
            }
       
 
       
	if($query){
		
				echo "
						<div class='alert alert-success' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Success!</strong> Payout request sent!
				</div>";
			
		}
		else{
			//echo mysqli_error($con);
	
			echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Please Complete the field
				</div>";

		}
		

}



		     	else{
	
		
			echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong>The Amount you want to payout is bigger than your current balance.
				</div>";
	}
	}
		     	else{
	
			echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong>Minimum Amount to Withdraw is ₱100
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
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
 
 <style>

body, html {
font-size: 22px;

tr:nth-child(even) {
  background-color: #bdc993;

}
.marquee {
  width: 260px;
  margin: 0 auto;
  overflow: hidden;
  white-space: nowrap;
  font-size: 20px;
  position: absolute;
  color: #fff;
  text-shadow: #000 1px 1px 0;
  font-family: Tahoma, Arial, sans-serif;
  -webkit-animation: marquee 5s linear infinite;
}

@-webkit-keyframes marquee {
  0% {
    text-indent: 260px;
  }
  100% {
    text-indent: -260px;
  }
}
</style>

</head>

<body>

    <div>
        <!-- Kaning Dashboard alisdan og users progressive report -->

    
        <!-- Page Content -->
        <div>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <?php
                        if($result_get_userid['reminders']==null ){
                            echo ' ';
                        }else{
                            echo'<div class="alert alert-danger" role="alert" style="margin-top: 20px">
 '.$result_get_userid['reminders'].'
</div>';
                        }
                        ?>
                        
                        <h2 class="page-header" style="color: #3a6520">Earnings</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    
                    
                     
              
                	 <?php
                	 $date = date("Y-m-d");
						$query = mysqli_query($con,"select * from income where userid='$email'");
						$result = mysqli_fetch_array($query);
						
						$querys = mysqli_query($con,"select SUM(amount) as payout from payout_request where userid='$email' AND status='Approved'");
						$results = mysqli_fetch_array($querys);
							$querys_today = mysqli_query($con,"select SUM(amount) as today from income_history where user_id='$email' AND date = '$date'");
						$results_today = mysqli_fetch_array($querys_today);
					?>
					
					
					

         
    <div class="row">
          <div class="col-lg-3 col-6">
           
            <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px"><?php 
								echo number_format($result['total_bal'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars" ></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">Total Commision Share</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php 
                            	if($results_today['today'] == ''){
                            	    echo "0";
                            	}
                            	else{
								echo number_format( $results_today['today'],2);
                            	}
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">Today's Commision</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php  
								echo number_format($result['current_bal'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">Current Commision Share</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
           <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">   <?php
                                if($results['payout'] == ''){
                                    echo "0";
                                }
                                else {
                                    	echo  number_format($results['payout'],2);
                                }
                                ?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">Total Payout Received</a>
            </div>
          </div>
        
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
           <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">   <?php 
                                $query=mysqli_query($con,"SELECT * FROM bunos WHERE userid = '$email'");
                                while($row=mysqli_fetch_array($query)){
                                    $bonus=$row['bunos_count'];
								?>
                         <?php 
                                                if($bonus == 1 && $bonus < 6)
                                                {
                                                    if( $row['active1'] == 1){
                                                  echo '<marquee scrollamount="6" behavior="alternate" direction="right" width="340"> Bonus for level 1 </marquee>';
                                                    }
                                                }
                                                else if($bonus > 6 && $bonus < 14)
                                                {
                                                    if( $row['active2'] == 1){
                                                  echo '<marquee scrollamount="6" behavior="alternate" direction="right" width="310"> Bonus for level 2 </marquee>';
                                                    }
                                                }
                                                  else if($bonus > 14 && $bonus < 158)
                                                {
                                                    if( $row['active3'] == 1){
                                                  echo '<marquee scrollamount="6" behavior="alternate" direction="right" width="250"> Bonus for level 3 </marquee>';
                                                    }
                                                }
                                                 else if($bonus > 157 && $bonus < 1886)
                                                {
                                                    if( $row['active4'] == 1){
                                                  echo '<marquee scrollamount="6" behavior="alternate" direction="right" width="250"> Bonus for level 4 </marquee>';
                                                    }
                                                }
                                                 else if($bonus > 1885 && $bonus < 22622)
                                                {
                                                    if( $row['active5'] == 1){
                                                  echo '<marquee scrollamount="6" behavior="alternate" direction="right" width="250"> Bonus for level 5 </marquee>';
                                                    }
                                                }
                                                else if($bonus > 22621)
                                                {
                                                    if( $row['active6'] == 1){
                                                  echo '<marquee scrollamount="6" behavior="alternate" direction="right" width="250"> Bonus for level 6 </marquee>';
                                                    }
                                                }
                                              
                                                else{
                                                     echo "$bonus";
                                                    
                                                }
                                                
                                                ?>
							<?php
                            }
                          
                                ?>
                              </p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">Bonus Achievement</a>
            </div>
          </div>
  
   <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" style="color: #3a6520">Shared Income</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    
                    
                     
              
                	 <?php
                	 $date = date("Y-m-d");
					
						$querylevel1 = mysqli_query($con,"select SUM(amount) as level1 from income_history where user_id='$email' AND level='1'");
						$resultlevel1 = mysqli_fetch_array($querylevel1);
						
							$querylevel2 = mysqli_query($con,"select SUM(amount) as level2 from income_history where user_id='$email' AND level='2'");
						$resultlevel2 = mysqli_fetch_array($querylevel2);
						
								$querylevel3 = mysqli_query($con,"select SUM(amount) as level3 from income_history where user_id='$email' AND level='3'");
						$resultlevel3 = mysqli_fetch_array($querylevel3);
						
								$querylevel4 = mysqli_query($con,"select SUM(amount) as level4 from income_history where user_id='$email' AND level='4'");
						$resultlevel4 = mysqli_fetch_array($querylevel4);
						
								$querylevel5 = mysqli_query($con,"select SUM(amount) as level5 from income_history where user_id='$email' AND level='5'");
						$resultlevel5 = mysqli_fetch_array($querylevel5);
						
								$querylevel6 = mysqli_query($con,"select SUM(amount) as level6 from income_history where user_id='$email' AND level='6'");
						$resultlevel6 = mysqli_fetch_array($querylevel6);
					?>
					
					
					

         
    <div class="row">
          <div class="col-lg-3 col-6">
           
            <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px"><?php 
								echo number_format($resultlevel1['level1'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars" ></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">1st Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php 
								echo number_format($resultlevel2['level2'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">2nd Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
            <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php 
								echo number_format($resultlevel3['level3'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">3rd Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
           <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">  <?php 
								echo number_format($resultlevel4['level4'],2); 
								?></p>

                <p> </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">4th Level Income</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
         <div class="small-box" style="background: #0e8239; color: white; text-align: center">
              <div class="inner">
                <p style="font-size: 30px">	<?php 
								echo number_format($resultlevel5['level5'],2); 
								?></p>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer" style="background: #065724">5th Level Income</a>
            </div>
          </div>
        
          
       
            <div class="container-fluid">
                <div class="row">
                    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-9">
              
                    </div>
                </div>
                <br>
                    <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                          <!-- /insert table here if needed -->
                        </div>
               </div>
                </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->
  
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
                    <form method="post">
                            <div class="form-group">
                            <label for="sel1">Amount:</label>
                            	<input type="number" step="0.01" name = "amount" style="font-size: 22px; border-color : #0e8239; width: 300px; border-radius: 25px" class="form-control">
                            </div>
                <label for="sel1">Payout Method:</label>
                 <input type="radio" onclick="javascript:yesnoCheck();" name="yesno"  style="width:25px; height:25px;"  value="gcash"  id="yesCheck"> Gcash
                      

                          <input type="radio"  class="md-radio" style="width:25px; height:25px;" onclick="javascript:yesnoCheck();" name="yesno"  value="palawan express" id="gcashCheck"> Palawan Express  
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
                <input type='text' name='card_num' style='font-size: 22px; border-color : #0e8239; border-radius: 25px' class='form-control' value='$card_number' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>CVV</label>
                <input type='text' name='cvv' style='font-size: 22px; border-color : #0e8239; border-radius: 25px'  class='form-control' value='$cvv' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Expiration month</label>
                <input type='text' name='month' style='font-size: 22px; border-color : #0e8239; border-radius: 25px'  class='form-control' value='$expiration_month' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Expiration Year</label>
                <input type='text' name='year' style='font-size: 22px; border-color : #0e8239; border-radius: 25px'  class='form-control' value='$expiration_year' readonly>
            </div>
					
						    <input type='submit' id='myBtn' onclick='myFunction()' style='font-size: 22px;' name='payout_request' class='btn btn-primary' value='Send Request'>";
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
                <input type='text' name='gcash_mobile' style='font-size: 22px; border-color : #0e8239; border-radius: 25px'  class='form-control' value='$gcash' readonly>
            </div>
					
						    <input type='submit' id='myBtn' onclick='myFunction()' style='font-size: 22px;' name='payout_request' class='btn btn-primary' value='Send Request'>";
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
                <input type='text' style='font-size: 22px; border-color : #0e8239; border-radius: 25px'  name='reciever_name' class='form-control' value='$receiver_name' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Address</label>
                <input type='text' style='font-size: 22px; border-color : #0e8239; border-radius: 25px'  class='form-control' value='$address' readonly>
            </div>
            
                   <div class='form-group' id='card-number-field'>
                <label for='cardNumber'>Mobile Number</label>
                <input type='text' style='font-size: 22px; border-color : #0e8239; border-radius: 25px'  name='mobile' class='form-control' value='$mobile_number' readonly>
            </div>
					
						    <input type='submit' id='myBtn' onclick='myFunction()' style='font-size: 22px;' name='payout_request' class='btn btn-primary' value='Send Request'>";
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
                                	<td colspan="9" style="text-align: center">You have no payout request yet.</td>
                                </tr>
                            <?php
							}
							?>
                                
                            </table>
                          
                        </div>
               </div>
                </div>
                <br>
                <?php include('payment-received-history.php') ?>
                
                
                </div>
               
            </div>
            <!-- /.container-fluid -->
    
          
          
          
        </div>
        
          </div>
          
            </div>
            <!-- /.container-fluid -->
            
            
            
            
        </div>
        <!-- /#page-wrapper -->
        
        <br>
         <br>
          <br>
           <br>

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
