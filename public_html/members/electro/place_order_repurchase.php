<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../php-includes/connect.php');
if(isset($_POST['Submit'])){
            $store_email=mysqli_real_escape_string($con,$_POST['store_email']);
          
			$first_name=mysqli_real_escape_string($con,$_POST['first_name']);
			$last_name=mysqli_real_escape_string($con,$_POST['last_name']);
			$email=mysqli_real_escape_string($con,$_POST['email']);
            $gender=mysqli_real_escape_string($con,$_POST['gender']);
			$birthdate=mysqli_real_escape_string($con,$_POST['birthdate']);
			$address=mysqli_real_escape_string($con,$_POST['address']);
		
			$product=mysqli_real_escape_string($con,$_POST['product']);
			$price=mysqli_real_escape_string($con,$_POST['price']);
				$note=mysqli_real_escape_string($con,$_POST['note']);
			$generated_pin = rand(100000,999999);
			$t=time();
			$contact=mysqli_real_escape_string($con,$_POST['contact']);
					$middle_name=mysqli_real_escape_string($con,$_POST['middle_name']);
		
			$store_name=mysqli_real_escape_string($con,$_POST['store_name']);
				$qty=mysqli_real_escape_string($con,$_POST['qty']);
				$total= $qty * $price;
					$note=mysqli_real_escape_string($con,$_POST['note']);
			$order_id = $generated_pin.'-'.$t;
			
		 $message = ' 
               THANK YOU FOR PURCHASING!
			             
			             Order Id : '.$order_id.'
			             Store Name: '.$store_name.' 
			             First Name: '.$first_name.'
			             Middle Name: '.$middle_name.'
			             Last Name: '.$last_name.'
			             Email: '.$email.'
			             Contact: '.$contact.'
			             Gender:'.$gender.'
			             Birthdate: '.$birthdate.'
			             Address: '.$address.'
			             
			             Product: '.$product.'
			             Price: '.$price.'
			             Quantity: '.$qty.'
			             Note: '.$note.'
			             Total: '.$total.'
			             NOTE: Please wait for the Confirmation. Our staff will get intouch of your purchased product. Thank You! You can reach the seller by logging in into chatroom(name of the store as chatroomname and order id as password) 
			             
               ';
               $oursubject ='Order Receipt';
	
			
			    	$query = mysqli_query($con,"insert into join_request(`first_name`,`last_name`,`username`,`email`,`gender`,`birthdate`,`address`,`notes`,`product`,`price`,`date_requested`,`store_email`,`order_id`,`contact`,`age`,`middle_name`,`nationality`,`password`,`refered`,`classification`,`status`) values('$first_name','$last_name','repurchased','$email','$gender','$birthdate','$address','','$product','$price',NOW(),'$store_email','$generated_pin-$t','$contact','0000','$middle_name','repurchased','repurchased','repurchased','3','pending')");
			    	$query1 = mysqli_query($con,"insert into chatroom(`chat_name`,`date_created`,`chat_password`,`userid`) values('$order_id',NOW(),'$order_id','$store_name')");
			    		mysqli_query($con,"update repurchase_qty set rep_qty=rep_qty-$qty , rep_sale = rep_sale+$qty where prod_name='$product'");
			    	
			    	
			    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "mymlminfos@sbpzedcorp.com";
  
   
    $headers = "From:" . $from;
    mail($email,$oursubject,$message, $headers);
    	echo '<script>alert("Sent successfully. We also sent a copy of the receipt in the email address you provided");</script>';	




        echo'
                <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Herbal Planet</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						
						
				

						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Shipping/Billing address</h3>
							
									<h6 class="title">	NOTE: Please wait for the Confirmation. Our staff will get intouch of your purchased product. Thank You! You can reach the seller by logging in into chatroom(name of the store as chatroomname and order id as password) </h6>
									<p>order id: '.$order_id.' </p>
							</div>
					
							<div class="form-group">
							Store Name:
								<input class="input" type="text" name="username" value="'.$store_name.'" readonly>
							</div>
							<div class="form-group">
							First Name:
								<input class="input" type="text" name="first_name" value="'.$first_name.'" readonly>
							</div>
								<div class="form-group">
								Middle Name:
								<input class="input" type="text" value="'.$middle_name.'" readonly>
							</div>
							<div class="form-group">
							Last Name
								<input class="input" type="text" name="last_name" value="'.$last_name.'" readonly>
							</div>
							<div class="form-group">
							Email:
								<input class="input" type="email" name="email" value="'.$email.'" readonly>
							</div>
							<div class="form-group">
							Contact:
								<input class="input" type="text" name="contact" value="'.$contact.'" readonly>
							</div>
						   	<div class="form-group">
						   	Gender:
										<select class="input" type="text" name="gender" value="'.$gender.'" style="width: 40%" readonly>
										    <option value="Male"> Male </option>
										    <option value="Female"> Female </option>
										</select>
										
							</div>
							
							<div class="form-group">
							Birthdate:
								<input class="input" type="date" name="birthdate" value="'.$birthdate.'" readonly>
							</div>

						
							<div class="form-group">
							Address:
										<input class="input" type="text" name="address" value="'.$address.'" readonly>
									</div>
						</div>
							<div class="form-group"> Notes:
										<textarea class="input" type="text" name="note"> 	'.$note.'</textarea>
									</div>
						<!-- /Billing Details -->

				
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div>'.$qty.'x '.$product.'</div>
									<div>₱'.number_format($total,2).'</div>
								</div>
								
							</div>
							<div class="order-col">
								<div>Shipping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong>₱'.number_format($total,2).'</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1" required>
								<label for="payment-1">
									<span></span>
									COD(Cash On Delivery)
								</label>
								<div class="caption">
									<p>LBC Express</p>
								</div>
							</div>
						
						
						</div>
						
		</div>
			
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>

 <script type="text/javascript">
    $(document).ready(function () {
        window.print();
        setTimeout("closePrintView()", 3000);
    });
    function closePrintView() {
        document.location.href = "home_index.php";
    }
</script>
    ';
		
		
			}
        
   
?>