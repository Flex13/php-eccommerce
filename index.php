<?php $page_title = 'Kasi Mall Online'; ?>
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


<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
			<!-- TOP HEADER -->
			<div class="shop-notice">
				<div class="shop-notice-body">
					<h3>Check Your Delivery Order Status</h3>
				</div>
				<div class="shop-notice-img">
					<img src="images/a2b.jpg" class="img-fluid" alt="">
				</div>
			</div>

			<div class="shop-notice1">
				<div class="shop-notice-header1">
					<a href="www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public/videos"><img src="images/covid.jpg" class="img-fluid" alt=""></a>
				</div>


				<div class="shop-notice-body1">
					<p>Lets work together and fight this as a nation, hlala eKhaya, Dula Hae, Stay at home</p>
					<a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public/videos" target="_blank" class="btn primary-btn">Read More</a>
				</div>
			</div>

			<div style="width: 100%; background-color: white; padding: 10px 0px 10px 0px; text-align: center; box-sizing: border-box;">
				<a style="display: flex; justify-content: center; flex-wrap: wrap; width:100%; text-decoration:none; text-align:center;" href="https://sacoronavirus.co.za/">
					<div class="main-corona-banner" style="display: inline-block; background-color: white; flex-grow: 2;">
						<img style="width: 294px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/main.png" alt="South African Government COVID-19 Portal" />
					</div>
					<div style="display: flex; flex-grow: 4; justify-content: center; flex-wrap: wrap;">
						<div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
							<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
								<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/tested.png" alt="South Africa COVID-19 Tested Numbers" />
							</div>
							<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
								<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/positive.png" alt="South Africa COVID-19 Positive Cases" />
							</div>
						</div>
						<div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
							<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
								<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/cured.png" alt="South Africa COVID-19 Recovered Numbers" />
							</div>
							<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
								<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/deaths.png" alt="South Africa COVID-19 Death Numbers" />
							</div>
						</div>
					</div>
				</a>
				<div style="text-align: center; background-color: white;">
					<a style="font-family: arial; text-decoration: none; font-size: 11px; color: #878787;" href="https://embrace.co.za/sacoronavirus-link">Linking to sacoronavirus.co.za is now required. Find out more and get the banner.</a>
				</div>
			</div>


			<!-- /TOP HEADER -->
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 p-0">
			<div id="location" class="section">
				<!-- container -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<!-- row -->
							<div class="row px-5 mb-5">
								<?php echo errorMessage(); ?>
								<?php echo successMessage(); ?>
								<div class="container text-center">
									<h1 class="main-title">AMAKASI</h1>
								</div>


								<!-- shop -->
								<div class="col-md-4 col-xs-6">
									<div class="shop">
										<div class="shop-body">
											<h3>Alex</h3>
											<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
										</div>

										<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div class="shop-img">
														<img src="images/alex1.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>
												<div class="carousel-item">
													<div class="shop-img">
														<img src="images/alex2.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>
												<div class="carousel-item">
													<div class="shop-img">
														<img src="images/alex3.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>

											</div>
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

										<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div class="shop-img">
														<img src="images/soweto1.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>
												<div class="carousel-item">
													<div class="shop-img">
														<img src="images/soweto2.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>
												<div class="carousel-item">
													<div class="shop-img">
														<img src="images/soweto3.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>

												<div class="carousel-item">
													<div class="shop-img">
														<img src="images/soweto4.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>

											</div>
										</div>


									</div>
								</div>
								<!-- /shop -->

								<!-- shop -->
								<div class="col-md-4 col-xs-6">
									<div class="shop">
										<div class="shop-body">
											<h3>Vaal</h3>
											<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
										</div>

										<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div class="shop-img">
														<img src="images/vaal3.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>
												<div class="carousel-item">
													<div class="shop-img">
														<img src="images/vaal4.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>
												<div class="carousel-item">
													<div class="shop-img">
														<img src="images/shap.jpg" class="img-fluid carousel-img" alt="">
													</div>
												</div>

											</div>
										</div>


									</div>
								</div>
								<!-- /shop -->
							</div>
							<!-- /row -->
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row px-5 mb-5">

								<div class="container text-center">
									<h1 class="main-title">Categories</h1>
								</div>


								<!-- shop -->
								<div class="col-md-4 col-xs-6">
									<div class="shop">
										<div class="shop-body">
											<h3>Amapapa</h3>
											<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
										</div>
										<div class="shop-img">
											<img src="images/food.jpg" class="img-fluid" alt="">
										</div>

									</div>
								</div>
								<!-- /shop -->

								<!-- shop -->
								<div class="col-md-4 col-xs-6">
									<div class="shop">
										<div class="shop-body">
											<h3>Fashion</h3>
											<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
										</div>
										<div class="shop-img">
											<img src="images/fashion.jpg" class="img-fluid" alt="">
										</div>

									</div>
								</div>
								<!-- /shop -->

								<!-- shop -->
								<div class="col-md-4 col-xs-6">
									<div class="shop">
										<div class="shop-body">
											<h3>Spinza</h3>
											<a href="shop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
										</div>
										<div class="shop-img">
											<img src="images/spinza2.jpg" class="img-fluid" alt="">
										</div>

									</div>
								</div>
								<!-- /shop -->
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>



<!-- /container -->



<?php include('includes/shopfooter.php'); ?>