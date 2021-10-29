<?php
require('../php-includes/connect.php');

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

    </head>
    <style>

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
	<body>
	<?php include('header.php') ?>
		

					<!-- Products tab & slick -->
				<?php include('get_stores.php') ?>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	<button onclick="topFunction()" id="myBtn" title="Go to top">Go to Top</button>
			<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Health Products</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php 
										$h=mysqli_query($con,"select * from store_product where cat ='Health Products' and status = 1 and quantity > 0");
								while($hrow=mysqli_fetch_array($h)){
								    
								       
								     if( $hrow['product'] == 'VGX Kit +' && $hrow['from_user'] == 'admin'){
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="./img/14ab7e7f92f191fd4a7cb005365ff9ce.jpg" alt="">
												<div class="product-label">
													<span class="sale">'.$hrow['quantity'].' Item Left</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$hrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$hrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($hrow['price'],2).' <del class="product-old-price">₱3,000.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$hrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_purchase.php?id='.$hrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								     }
								       else if($hrow['product'] != 'VGX Kit'){
								           echo '
								            	
								            	
								            	              	<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="imageView.php?image_id='.$hrow['sp_id'].'" alt="" style="height: 370px">
										<div class="product-label">
											<span class="sale">'.$hrow['quantity'].' Item Left</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">'.$hrow['user_store_name'].'</p>
										<h3 class="product-name"><a href="#">'.$hrow['product'].'</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">₱'.number_format($hrow['price'],2).'</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="product-btns">
										
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$hrow['description'].'</span></button>
										</div>
									</div>
								<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$hrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
								</div>
							</div>
							<!-- /product -->
								            	
								         
								         ';
								    }
								    
								    
								
								}
							?>
							
							
								<?php 
										$h=mysqli_query($con,"SELECT store_product.*, repurchase_qty.* FROM `store_product` JOIN repurchase_qty ON store_product.product=repurchase_qty.prod_name where store_product.cat ='Health Products' and store_product.status = 1");
								while($hrow=mysqli_fetch_array($h)){
								    
								         
								               if($hrow['product'] == 'VGX Kit'  && $hrow['rep_qty'] > 0 ){
								             echo '
								              	<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/14ab7e7f92f191fd4a7cb005365ff9ce.jpg" alt="" style="height: 270px">
										<div class="product-label">
											<span class="sale">'.$hrow['rep_qty'].' Item Left</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">'.$hrow['user_store_name'].'</p>
										<h3 class="product-name"><a href="#">'.$hrow['product'].'</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">₱'.number_format($hrow['price'],2).'</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="product-btns">
										
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$hrow['description'].'</span></button>
										</div>
									</div>
								<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$hrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
								</div>
							</div>
							<!-- /product -->
							
								         ';
								         }
								
								    
								    
								
								}
							?>
										<!-- /product -->

									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Women's Fashion</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Women=mysqli_query($con,"select * from store_product where cat ='Women Fashion' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Women)>0){
								while($Womenrow=mysqli_fetch_array($Women)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Womenrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Womenrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Womenrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Womenrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Womenrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Womenrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
										<!-- /product -->
									</div>
								
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Men's Fashion</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
											<?php 
										$Men=mysqli_query($con,"select * from store_product where cat ='Men Fashion' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Men)>0){
								while($Menrow=mysqli_fetch_array($Men)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Menrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Menrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Menrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Menrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Menrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Menrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Electronics Products</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Electronics=mysqli_query($con,"select * from store_product where cat ='Electronics Products' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Electronics)>0){
								while($Electronicsnrow=mysqli_fetch_array($Electronics)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Electronicsnrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Electronicsnrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Electronicsnrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Electronicsnrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Electronicsnrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Electronicsnrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Gadgets</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Gadgets=mysqli_query($con,"select * from store_product where cat ='Gadgets' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Gadgets)>0){
								while($Gadgetsrow=mysqli_fetch_array($Gadgets)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Gadgetsrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Gadgetsrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Gadgetsrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Gadgetsrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Gadgetsrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Gadgetsrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
			
		
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Toys & Games</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Toys=mysqli_query($con,"select * from store_product where cat ='Toys & Games' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Toys)>0){
								while($Toysrow=mysqli_fetch_array($Toys)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Toysrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Toysrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Toysrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Toysrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Toysrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Toysrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
				
		
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sports Products</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Sports=mysqli_query($con,"select * from store_product where cat ='Sports' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Sports)>0){
								while($Sportsrow=mysqli_fetch_array($Sports)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Sportsrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Sportsrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Sportsrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Sportsrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Sportsrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Sportsrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->		




		
		
		
		
	
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Beauty Products</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Beauty=mysqli_query($con,"select * from store_product where cat ='Beauty Products' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Beauty)>0){
								while($Beautyrow=mysqli_fetch_array($Beauty)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Beautyrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Beautyrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Beautyrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Beautyrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Beautyrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Beautyrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		




		
		
		
		
	
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Babies & kids</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Babies=mysqli_query($con,"select * from store_product where cat ='Babies & kids' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Babies)>0){
								while($Babiesrow=mysqli_fetch_array($Babies)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Babiesrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Babiesrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Babiesrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Babiesrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Babiesrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Babiesrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->			
		
		
		
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Home and Funrniture</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Home=mysqli_query($con,"select * from store_product where cat ='Home & Furniture' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Home)>0){
								while($Homerow=mysqli_fetch_array($Home)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
											<img src="imageView.php?image_id='.$Homerow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Homerow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Homerow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Homerow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Homerow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Homerow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Electronic Accesories</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
											<?php 
										$EAccessories=mysqli_query($con,"select * from store_product where cat ='Electronic Accessories' and status = 1 and quantity > 0");
										if(mysqli_num_rows($EAccessories)>0){
								while($EAccessoriesrow=mysqli_fetch_array($EAccessories)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$EAccessoriesrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$EAccessoriesrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$EAccessoriesrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($EAccessoriesrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$EAccessoriesrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$EAccessoriesrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
								
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Design & Craft</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Design=mysqli_query($con,"select * from store_product where cat ='Design & Craft' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Design)>0){
								while($EDesignrow=mysqli_fetch_array($Design)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$EDesignrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$EDesignrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$EDesignrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($EDesignrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$EDesignrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$EDesignrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
				
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Books</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Books=mysqli_query($con,"select * from store_product where cat ='Books' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Books)>0){
								while($Booksrow=mysqli_fetch_array($Books)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Booksrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Booksrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Booksrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Booksrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Booksrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Booksrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Motorbikes</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Motorbikes=mysqli_query($con,"select * from store_product where cat ='Motorbikes' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Motorbikes)>0){
								while($Motorbikesrow=mysqli_fetch_array($Motorbikes)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Motorbikesrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Motorbikesrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Motorbikesrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Motorbikesrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Motorbikesrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Motorbikesrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		
		
		
		
		
					<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Car</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Car=mysqli_query($con,"select * from store_product where cat ='Car' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Car)>0){
								while($Carrow=mysqli_fetch_array($Car)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Carrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Carrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Carrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Carrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Carrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Carrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
				
		
		
		
		
		
		
					<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Car Parts & Accessories</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$CarAccessories=mysqli_query($con,"select * from store_product where cat ='Car Parts & Accessories' and status = 1 and quantity > 0");
										if(mysqli_num_rows($CarAccessories)>0){
								while($CarAccessoriesrow=mysqli_fetch_array($CarAccessories)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$CarAccessoriesrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$CarAccessoriesrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$CarAccessoriesrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($CarAccessoriesrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$CarAccessoriesrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$CarAccessoriesrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
				
		
				
		
		
		
		
		
		
					<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Pet Supplies</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Pet=mysqli_query($con,"select * from store_product where cat ='Pet Supplies' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Pet)>0){
								while($Petrow=mysqli_fetch_array($Pet)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Petrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Petrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Petrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Petrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Petrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Petrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
						
		
				
		
		
		
		
		
		
					<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Antiques</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Antiques=mysqli_query($con,"select * from store_product where cat ='Antiques' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Antiques)>0){
								while($Antiquesrow=mysqli_fetch_array($Antiques)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Antiquesrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Antiquesrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Antiquesrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Antiquesrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Antiquesrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Antiquesrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
			
						
		
				
		
		
		
		
		
		
					<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Gardening</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Gardening=mysqli_query($con,"select * from store_product where cat ='Gardening' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Gardening)>0){
								while($Gardeningrow=mysqli_fetch_array($Gardening)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Gardeningrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Gardeningrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Gardeningrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Gardeningrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Gardeningrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Gardeningrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
				
			
						
		
				
		
		
		
		
		
		
					<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Property</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$Property=mysqli_query($con,"select * from store_product where cat ='Property' and status = 1 and quantity > 0");
										if(mysqli_num_rows($Property)>0){
								while($Propertyrow=mysqli_fetch_array($Property)){
								    
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="imageView.php?image_id='.$Propertyrow['sp_id'].'" alt="" style="height: 270px">
												<div class="product-label">
													<span class="sale">-16.66%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$Propertyrow['user_store_name'].'</p>
												<h3 class="product-name"><a href="#">'.$Propertyrow['product'].'</a></h3>
												<h4 class="product-price">₱'.number_format($Propertyrow['price'],2).' </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" style="display: none"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" style="display: none"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">'.$Propertyrow['description'].' </span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<a href="add_repurchase.php?id='.$Propertyrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								    
								    
								
								}
										}
								else{ 
								    echo 'SORRY, NO PRODUCT FOR THIS CATEGORY YET.';
									
                                    
                                   
									}
							?>
									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
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
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

	</body>
</html>
