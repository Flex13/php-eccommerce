<?php $page_title = 'Kasi Mall Online';?>
<?php include('includes/shopheader.php'); ?>
<?php include('includes/navbar.php'); ?>


<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php">Shop</a></li>
                            <li><a href="index.php">Products</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

<div id="product">	<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

				<div id="store" class="col-md-12">
				<div class="section-title text-center">
                            <h3 class="title">Our Products</h3>
						</div>
						
						<div class="row">
							<!-- Product -->
							<div class="col-md-4 col-xs-12">
								<div class="product">
									<div class="product-img">
										<img src="images/shop.jpg" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Product Category</p>
										<h3 class="product-name"><a href="#">Product Name</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart"></i><span class="tooltipp">add to wishlist</span></button>
											
										</div>
									</div>
									<div class="add-to-cart">
									<a href="products-single.php"><button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button></a>
									</div>
								</div>
                            </div>

							<!-- /merchant -->

							<div class="clearfix visible-sm visible-xs"></>

						</div>

				</section>

						 
                    
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>


    <?php include('includes/shopfooter.php'); ?>