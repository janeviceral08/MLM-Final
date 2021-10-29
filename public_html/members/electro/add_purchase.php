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
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#" style="color: white"><i class="fa fa-user-o" style="color: red"></i> &nbsp;Login</a>
				<ul class="dropdown-menu form-wrapper">					
					<li style="padding: 0px 20px; width: 200px">
						<form action="login.php" method="post">
							
							<div class="form-group"> Email:
								<input type="text" class="form-control" name="email" placeholder="Email" required="required">
							</div>
							<div class="form-group">Password:
								<input type="password" class="form-control" name="password" placeholder="Password" required="required">
							</div>
							<input type="submit" class="primary-btn order-submit" style="background-color: red; border-color: red; width: 170px" value="Login">
							<div class="form-footer" style="width: 200px;">
								<a href="#">Forgot Your password?</a>
							</div>
						</form>
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
									<form action="result_product.php" action="get">
									<select class="input-select" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
										<option value="search_prod.php">Products</option>
										<option value="search_store.php">Store</option>
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
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Checkout</li>
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
	$result = mysqli_query($con,"SELECT * FROM store_product where sp_id='$id'");
		while($row = mysqli_fetch_array($result))
			{
			    $sp_id=$row['sp_id'];
				$store_uid=$row['store_uid'];
				$product=$row['product'];
                $price=$row['price'];
                $user_store_name=$row['user_store_name'];
				$user_email=$row['user_email'];
			}
	
?>
						
						
					<form action="place_order.php" method="post" enctype="multipart/form-data" >

						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Shipping/Billing address</h3>
							</div>
								<div class="form-group" style="display: none">
								<input class="input" type="text" name="ids" value="<?php echo $sp_id?>" readonly>
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
						
							<div class="form-group">
								<input class="input" type="text" name="first_name" placeholder="First Name" required>
							</div>
								<div class="form-group">
								<input class="input" type="text" name="middle_name" placeholder="Middle Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last_name" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
						<div class="form-group">
								<input class="input" type="text" name="contact" placeholder="Contact Number" required>
							</div>
						   	<div class="form-group">
										<select class="input" type="text" name="gender" placeholder="Gender" style="width: 40%" required>
										    <option value="Male"> Male </option>
										    <option value="Female"> Female </option>
										</select>
											<input class="input" type="number" name="age" placeholder="Age" style="width: 59%" required>
							</div>
							<div class="form-group">
								<input class="input" type="date" name="birthdate" placeholder="Birthdate" required>
							</div>
								<div class="form-group">
										<select class="input" type="text" name="nationality" placeholder="Nationality" required>
										    <?php
                
                $result = mysqli_query($con,"SELECT * FROM countries order by nationality ASC");
                while($row = mysqli_fetch_array($result))
                  {
                  
                    echo '<option value="'.$row['nationality'].'">'.$row['nationality'].'</option>';
                  
                  }
                ?> 
										    
										</select>
										
							</div>
						<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address" required>
									</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shipping Details -->
						<div class="Shipping-details">
                            <div class="section-title">
								<h3 class="title">Create Store</h3>
							</div>
								<div class="form-group" data-tip="You will have a store for you to be able to sell your own products.">
								<input class="input" type="text" name="username" id="username" placeholder="Desired Store Name" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and one uppercase or lowercase letter, and at least 8 or more characters">  <span id="availability"></span>
								<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
								</div>
					
							<div class="input-checkbox">
							
								
							
								
									
								
									
							
							</div>
								<div class="form-group">
										<input class="input" type="text" name="referral" value="<?php echo $store_uid?>"  readonly>
									</div>
					
						<!-- /Order notes -->
					</div>

						</div>
						<!-- /Shipping Details -->

						<!-- Order notes -->
					
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
									<div>1x <?php echo $product?></div>
									<div>₱<?php echo number_format($price,2)?></div>
								</div>
								
							</div>
							<div class="order-col">
								<div>Shipping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong>₱<?php echo number_format($price,2)?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1" checked>
								<label for="payment-1">
									<span></span>
									COD(Cash On Delivery)
								</label>
								<div class="caption">
									<p>LBC Express</p>
								</div>
							</div>
						
						
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms" required>
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						
    <input type="submit" name="Submit"  onclick="myFunction()" id="submit"  value="Place order" class="primary-btn order-submit" />
						
					</div>
					</form>
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
var myInput = document.getElementById("username");
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
 
 
 
 
 
 $("input#username").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
</script>


	</body>
</html>
