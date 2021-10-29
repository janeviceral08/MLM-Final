<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
error_reporting(0);
$email = $_SESSION['userid'];

$query1 = mysqli_query($con,"SELECT COUNT(user_id) as items FROM `cart` WHERE user_id='$email'");
						$result = mysqli_fetch_array($query1);
                $items=$result['items'];
                
                
                
$query2 = mysqli_query($con,"SELECT * FROM `user` WHERE account='$email'");
						$result_from_query2 = mysqli_fetch_array($query2);
                $last_name=$result_from_query2['last_name'];
                  $middle_name=$result_from_query2['middle_name'];
                    $first_name=$result_from_query2['first_name'];
                      $user_email=$result_from_query2['email'];
 ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <title>VGX 12</title>
    <link rel="icon" type="image/png" href="../images/Logo.png"/>
	<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>
<body>

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>
    <div id="page-wrapper">
                    
		
	<div class="container-fluid">
		<div class="row">
		
			<div class="col-md-12">
			<div class="row">
				<div class="col-md-12" id="cart_msg"></div>
			</div>
				<div class="panel panel-primary text-center" style="border-color: #3a6520; color: white;" >
					<div class="panel-heading" style="background: #3a6520; color: white;" >Cart Checkout</div>
					<div class="panel-body">
					     <form method="get" class="col-md-10" style="background: #3a6520; color: white;">
    				
                <label for="sel1">Payout Method:</label>
                 <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="gcash" style="width:25px; height:25px;"  id="yesCheck" > Gcash 
                     

                          <input type="radio"  class="md-radio" onclick="javascript:yesnoCheck();" name="yesno" style="width:25px; height:25px;"  value="palawan express" id="gcashCheck"> Remmitance Center
            <br>
                          

    
    <div id="gcash" style="display:none">
  <br>
    
        
           <p style=" text-align: left">Pay with G-cash or Coins.ph to this number: 0915-9834-435	<br>

Note: Please contact us immediately through email or text after you sent the payment together with your reference number.</p>
       
    
    </div>
    
     <div id="palawan" style="display:none">
  <br>

    
           <p style="text-align: left">Remittances : Western Union / Mlhuillier / Cebuana / Palawan Express / LBC Remit	<br>
Receivers Name: Cyril A. Quismundo	<br>
Receivers Location: Butuan City, Agusan del Norte	<br>
Receivers Contact Number: 0915-9834-435	<br>

NOTE: Please inform us if you send the payment through email or SMS. We won’t process your order unless you sent the payment.</p>

    </div>
        


</form>
				 <?php
    	$query = mysqli_query($con,"select * from cart where user_id='$user_email'");
						$result = mysqli_fetch_array($query);
						
						
							if($last_name != '*edit' && $first_name != '*edit' && $middle_name != '*edit'){
							    
						if($result['user_id'] == $user_email){
						    echo "<button class='btn btn-success btn-lg pull-right' style='margin-right: 5px' id='checkout_btn' data-toggle='modal' data-target='#myModal'>Proceed to Checkout</button> ";
						}
						
						else{
						    echo " 	<button class='btn btn-success btn-lg pull-right' style='margin-right: 5px' id='checkout_btn' data-toggle='modal' data-target='#myModal' disabled>Proceed to Checkout</button> ";
						}
							}
							else{
						    echo "<button class='btn btn-success btn-lg pull-right' style='margin-right: 5px' id='checkout_btn' data-toggle='modal' data-target='#myModal' disabled>Edit your user info</button> ";
						}
 ?>
  
 	    
					</div>
		
					<br><br>
					<div id='cartdetail'>
		
		
   
    
					
						
								
									<br>
									<br>
					<div class="panel-footer">

					</div>
				</div>

			</div>

			<div class="col-md-2"></div>
		</div>
	</div>
		</div>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

	<script src="main.js"></script>

  

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>
<div class="foot"><footer>

</footer></div>
<style> .foot{text-align: center;}
</style>
</html>
