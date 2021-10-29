<?php
require('../php-includes/connect.php');

?>
<?php

	
	session_start();
	
	if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
		header('../php-includes/connect.php');
		exit();
	}

	$query = mysqli_query($con,"select * from user where email='".$_SESSION['userid']."'");
    $row = mysqli_fetch_array($query);
	 $email=	$row['email']; 
	 $mobile=	$row['mobile']; 
	 $bithdate=	$row['bithdate']; 
	 $last_name=	$row['last_name']; 
	 $middle_name=	$row['middle_name']; 
	 $first_name=	$row['first_name']; 
	 $gender=	$row['gender']; 
   

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

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
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
		[data-tip] {
	position:relative;

}
[data-tip]:before {
	content:'';
	/* hides the tooltip when not hovered */
	display:none;
	content:'';
	border-left: 5px solid transparent;
	border-right: 5px solid transparent;
	border-bottom: 5px solid #1a1a1a;	
	position:absolute;
	top:30px;
	left:35px;
	z-index:8;
	font-size:0;
	line-height:0;
	width:0;
	height:0;
}
[data-tip]:after {
	display:none;
	content:attr(data-tip);
	position:absolute;
	top:35px;
	left:0px;
	padding:5px 8px;
	background:#1a1a1a;
	color:#fff;
	z-index:9;
	font-size: 0.75em;
	height:18px;
	line-height:18px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	white-space:nowrap;
	word-wrap:normal;
}
[data-tip]:hover:before,
[data-tip]:hover:after {
	display:block;
}
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -25px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -25px;
  content: "✖";
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 0px 20px;
  margin-top: 5px;
}

#message p {
  padding: 0px 15px;
  font-size: 12px;
}

		</style>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right ml-auto">
					    	<li class="nav-item">
				<a  href="store.php" style="color: white"><i class="fas fa-store" style="color: red"></i> &nbsp;Store</a>
			
			</li>
			
			<li class="nav-item">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#" style="color: white"><i class="fa fa-user-o" style="color: red"></i> &nbsp;<?php echo $row['email']; ?></a>
				<ul class="dropdown-menu form-wrapper">					
					<li style="padding: 0px 20px; width: 200px">
					
							<a href="logout.php" class="primary-btn order-submit" style="background-color: red; border-color: red; width: 170px; color: white"> Logout</a>
						
					
					</li>
				</ul>
			</li>
		
		</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
									<form action="login_result_product.php" action="get">
							<select class="input-select"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
										<option value="login_search_prod.php">Products</option>
										<option value="login_search_store.php">Store</option>
									</select>
									<input class="input" name="search" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
							
	<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Orders</span>
									
									</a>
									<div class="cart-dropdown">
									
										<div class="cart-list">
		
											
											 	<?php 
										$h=mysqli_query($con,"select * from join_request where refered = '".$row['account']."' order by date_requested ASC");
								while($hrow=mysqli_fetch_array($h)){
								    
								         
								         echo '		<div class="product-widget">
												<div class="product-img">
												<p class="product-name"><a href="login_ordered_products.php?id='.$hrow['jr_id'].'">'.$hrow['product'].'</a></p>
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="login_ordered_products.php?id='.$hrow['jr_id'].'">'.$hrow['order_id'].'</a></h3>
													<h4 class="product-price"><span class="qty">'.$hrow['qty'].'x</span>₱'.$hrow['price'].'</h4>
												</div>
											
											</div>
										
										
								         
								         ';
								    
								    
								
								}
							?>
										       
											



                                            


										</div>
										
										
										
										
									
									
									</div>
								</div>
								<!-- /Cart -->
								
								
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
				
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Order Details</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Order Details</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
					<?php
include('../php-includes/connect.php');
	$id =$_GET['id'];
	$result = mysqli_query($con,"SELECT * FROM join_request where jr_id='$id'");
		while($row = mysqli_fetch_array($result))
			{
				
				$product=$row['product'];
                $price=$row['price'];
            
				$first_name=$row['first_name'];
				$last_name=$row['last_name'];
				$middle_name=$row['middle_name'];
				$email=$row['email'];
				$gender=$row['gender'];
				$birthdate=$row['birthdate'];
				$address=$row['address'];
				$notes=$row['notes'];
				$date_requested=$row['date_requested'];
				$contact=$row['contact'];
				$age=$row['age'];
				$nationality=$row['nationality'];
				$qty=$row['qty'];
				$total = $qty * $price;
			}
	
?>
						
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Shipping/Billing address</h3>
							</div>
								<div class="form-group" style="display: none">
								<input class="input" type="text" name="store_email" value="<?php echo $user_email?>" readonly>
							</div>
									<div class="form-group" style="display: none">
								<input class="input" type="text" name="store_name" value="<?php echo $user_store_name?>" readonly>
							</div>
								<div class="form-group" style="display: none">
									<input class="input" type="text" name="product" value="<?php echo $product?>" readonly>
						<input class="input" type="text" name="price" value="<?php echo $price?>" readonly>
							</div>
						
							<div class="form-group"> First Name:
								<input class="input" type="text" name="first_name" value="<?php echo $first_name?>" readonly>
							</div>
								<div class="form-group">Middle Name:
								<input class="input" type="text" name="middle_name" value="<?php echo $middle_name?>" readonly>
							</div>
							<div class="form-group">Last Name:
								<input class="input" type="text" name="last_name" value="<?php echo $last_name?>" readonly>
							</div>
							<div class="form-group">Email:
								<input class="input" type="email" name="email" value="<?php echo $email?>" readonly>
							</div>
						<div class="form-group">Mobile:
								<input class="input" type="text" name="contact" value="<?php echo $mobile?>" readonly>
							</div>
						   	<div class="form-group">
						   	    Gender: 	<input class="input" type="text" name="gender" value="<?php echo $gender?>" placeholder="Gender" style="width: 40%" readonly >
						
										
										
							</div>
							<div class="form-group">Birthday:
								<input class="input" type="text" name="birthdate" value="<?php echo $birthdate?>" readonly>
							</div>
								<div class="form-group">Nationality:
								<input class="input" type="text" name="birthdate" value="<?php echo $nationality?>" readonly>
							</div>
								
						<div class="form-group">Address:
										<input class="input" type="text" name="address" placeholder="Address" value="<?php echo $address?>" readonly>
									</div>
										<div class="form-group">Note:
										<textarea class="input" type="text" name="address" placeholder="Address" value="<?php echo $notes?>" readonly> <?php echo $notes?>	</textarea>
									</div>
						</div>
						<!-- /Billing Details -->


						</div>
						<!-- /Shipping Details -->

						<!-- Order notes -->
					
					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div><?php echo $qty?>x <?php echo $product?></div>
									<div>₱<?php echo number_format($price,2)?></div>
								</div>
								
							</div>
							<div class="order-col">
								<div>Shipping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong>₱<?php echo number_format($total,2)?></strong></div>
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

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
<script>
function myFunction() {
  document.getElementById("myText").value = "Processing Please wait a moment...";
}
</script>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function myFunctions() {
  var x = document.getElementById("repass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
$('#myInput, #repass').on('keyup', function () {
    if ($('#myInput').val() == $('#repass').val()) {
        $('#messages').html('Matching').css('color', 'green');
    } else 
        $('#messages').html('Not Matching').css('color', 'red');
});
</script>


<script>
var myInput = document.getElementById("myInput");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();

     $.ajax({
      url:'check_username.php',
      method:"POST",
      data:{user_name:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Store Name not available</span>');
        $('#submit').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Store Name Available</span>');
        $('#submit').attr("disabled", false);
       }
      }
     })

  });
 });  
</script>


	</body>
</html>
