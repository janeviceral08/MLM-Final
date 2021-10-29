<?php
require('../php-includes/connect.php');

?>
<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php 
										$h=mysqli_query($con,"select * from store_product where quantity > 0");
								while($hrow=mysqli_fetch_array($h)){
								     if( $hrow['product'] == '' && $hrow['from_user'] == 'admin'){
								         
								         echo '
								            	
										<div class="product">
											<div class="product-img">
												<img src="./img/14ab7e7f92f191fd4a7cb005365ff9ce.jpg" alt="">
												<div class="product-label">
													<span class="sale">'.$hrow['quantity'].' Item Left</span>
													<span class="new">NEW</span>
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
											<a href="add_repurchase_store.php?id='.$hrow['sp_id'].'" >
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place Order</button>
													</a>
											</div>
										</div>
								         
								         ';
								     }
								     else if( $hrow['product'] == 'VGX Kit +' && $hrow['from_user'] == 'admin'){
								         
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
											<a>
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> This is for non-member only</button>
													</a>
											</div>
										</div>
								         
								         ';
								     }
								    
									?>
										
									
											<?php
								}
							?>
										<!-- /product -->

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>