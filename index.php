<?php $page_title = 'Home - Kasi Mall Online';?>
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
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

<div id="location" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<?php echo errorMessage(); ?>
<?php echo successMessage(); ?>

				
                    
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
						<div class="shop-body">
								<h3>Alex</h3>
								<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
							<div class="shop-img">
								<img src="images/kasi2.jpg" class="img-fluid" alt="">
                            </div>
                            
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
						<div class="shop-body">
								<h3>Soweto</h3>
								<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
							<div class="shop-img">
								<img src="images/kasi3.jpg" class="img-fluid" alt="">
                            </div>
                            
                            
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
						<div class="shop-body">
								<h3>Sharpeville</h3>
								<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
							<div class="shop-img">
								<img src="images/shap.jpg" class="img-fluid" alt="">
                            </div>
                            
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>


    <?php include('includes/shopfooter.php'); ?>