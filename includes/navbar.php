<body>





	<!-- HEADER -->
	<header>
		<?php if ($page_title === 'Kasi Mall Online') : ?>
			<!-- TOP HEADER -->
			<div id="test">
				<div class="container text-center">

					<p class="notify"><b>Stay Informed</b> Visit the SA Department of Healths's Website for COVIUD-19 Updates: <br> <a href="https://www.sacoronavirus.co.za" target="_blank">www.sacoronavirus.co.za</a></p>
					<button class="notify-button">Close</button>
				</div>
			</div>
			<!-- /TOP HEADER -->
		<?php else :  ?>

		<?php endif ?>

		<section class="Mobile">
			<div class="container-fluid">
				<div class="row">
					<div id="mobile-width" class="col-sm-6 col-md-6">
						<div class="header-logo" style="text-align: -webkit-center;">
							<a href="index.php" class="logo">
								<img src="images/kasilogo.jpg" class="img-fluid" alt="kasi-logo">
							</a>
						</div>
					</div>

					<div id="mobile-width2" class="col-sm-6 col-md-6">
						<div class="col-sm-12 col-md-12">
							<button type="button" class="search-btn2" data-toggle="modal" data-target="#exampleModal">
								<i class="fas fa-search"></i> Search
							</button>

							<!-- Modal -->
							<div class="col-sm-12 col-md-12">
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<div class="header-search">
													<form>
														<input class="input" placeholder="Search here">
														<button class="search-btn">Search</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12">
							<a href="">
								<div class="shop-notice2">
									<div class="shop-notice-header2">
										<i class="fas fa-truck"></i>
									</div>
									<div class="shop-notice-body2">
										<p>Delivery Order Status</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>





				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-2">

					</div>
					<div class="col-sm-12 col-md-8  col-lg-5 justify-content-center">

						<ul class="header-links text-center"><i class="hide"><?php echo guard(); ?></i>
							<li>
									<?php if (!isset($_SESSION['c_email'])) : ?>
										<i class="fa fa-user-circle"></i> Welcome: Guest
									<?php else : ?>
										<i class="fa fa-user-circle"></i> Welcome: <?php echo $_SESSION['c_username']; ?>

									<?php endif ?>
								</li>

							<li>
								<?php if (!isset($_SESSION['c_email'])) : ?>
									<a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
								<?php else : ?>
									<a href="logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a>

								<?php endif ?>
							</li>

							<li>
								<?php if (!isset($_SESSION['c_email'])) : ?>
									<a href="customer_register.php"><i class="fas fa-user-plus"></i> Register</a>
								<?php else : ?>

								<?php endif ?>
							</li>
						</ul>

					</div>
					<div class="col-sm-12 col-md-12 col-lg-5 p-0">
						<nav class="navbar navbar-expand-lg">
							<ul class="main-nav nav navbar-nav">
								<?php if (!isset($_SESSION['c_email'])) : ?>

									<li class="nav-item"><i class="header-icons fas fa-home"></i><a class="<?php if ($page_title == 'Kasi Mall Online') {
																												echo "active";
																											} ?> nav-link" href="index.php">eKhaya</a></li>
									<li class="nav-item"><i class="header-icons fas fa-store"></i><a class="<?php if ($page_title == 'Dishopo - Kasi Mall Online') {
																												echo "active";
																											} ?> nav-link" href="shop.php">Dishopo</a></li>

									<li class="nav-item"><i class="header-icons fa fa-shopping-cart"></i><a class="<?php if ($page_title ==  'iTrolley - Kasi Mall Online') {
																														echo "active";
																													} ?> nav-link" href="cart.php">iTrolley</a></li>
									<li class="nav-item"><i class="header-icons fas fa-search-location"></i><a class="<?php if ($page_title ==  'AmaKasi - Kasi Mall Online') {
																															echo "active";
																														} ?> nav-link" href="">Amakasi</a></li>
									<li class="nav-item"><i class="header-icons fa fa-user"></i><a class="<?php if ($page_title ==  'iAccount - Kasi Mall Online') {
																												echo "active";
																											} ?> nav-link" href="customer/my_account.php?my_orders">iAccount</a></li>


								<?php else : ?>

									<li class="nav-item"><i class="header-icons fas fa-home"></i><a class="<?php if ($page_title == 'Kasi Mall Online') {
																												echo "active";
																											} ?> nav-link" href="index.php">eKhaya</a></li>
									<li class="nav-item"><i class="header-icons fas fa-store"></i><a class="<?php if ($page_title == 'Dishopo - Kasi Mall Online') {
																												echo "active";
																											} ?> nav-link" href="shop.php">Dishopo</a></li>

									<li class="nav-item"><i class="header-icons fa fa-shopping-cart"></i><a class="<?php if ($page_title ==  'iTrolley - Kasi Mall Online') {
																														echo "active";
																													} ?> nav-link" href="cart.php">iTrolley</a></li>
									<li class="nav-item"><i class="header-icons fas fa-search-location"></i><a class="<?php if ($page_title ==  'Amakasi - Kasi Mall Online') {
																															echo "active";
																														} ?>" href="">Amakasi</a></li>
									<li class="nav-item"><i class="header-icons fa fa-user"></i><a class="<?php if ($page_title ==  'iAccount - Kasi Mall Online') {
																												echo "active";
																											} ?> nav-link" href="customer/my_account.php?my_orders">iAccount</a></li>

								<?php endif ?>
							</ul>


						</nav>
					</div>
				</div>
			</div>
		</section>
		<section class="laptop">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-6">
						<div class="header-logo" style="text-align: -webkit-center;">
							<a href="index.php" class="logo">
								<img src="images/kasilogo.jpg" alt="kasi-logo">
							</a>
						</div>
					</div>
					<div class="col-sm-12 col-md-8  col-lg-6 justify-content-center">
						<div class="header-search">
							<form>
								<input class="input" placeholder="Search here">
								<button class="search-btn">Search</button>
							</form>
						</div>
						<ul class="header-links text-center"><i class="hide"><?php echo guard(); ?></i>
							<li>
								<?php if (!isset($_SESSION['c_email'])) : ?>
									<i class="fa fa-user-circle"></i> Welcome: Guest
								<?php else : ?>
									<i class="fa fa-user-circle"></i> Welcome: <?php echo $_SESSION['c_username']; ?>
								<?php endif ?>
							</li>

							<li>
								<?php if (!isset($_SESSION['c_email'])) : ?>
									<a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
								<?php else : ?>
									<a href="logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a>

								<?php endif ?>
							</li>

							<li>
								<?php if (!isset($_SESSION['c_email'])) : ?>
									<a href="customer_register.php"><i class="fas fa-user-plus"></i> Register</a>
								<?php else : ?>

								<?php endif ?>
							</li>
						</ul>

					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 justify-content-center" style="text-align: -webkit-center;">
						<nav class="navbar navbar-expand-lg mx-auto" style="text-align: -webkit-center;">
							<div class="d-md-flex d-block flex-row mx-md-auto mx-0">
								<ul class="main-nav nav navbar-nav" style="text-align: -webkit-center;">
									<?php if (!isset($_SESSION['c_email'])) : ?>

										<li class="nav-item"><i class="header-icons fas fa-home"></i><a class="<?php if ($page_title == 'Kasi Mall Online') {
																													echo "active";
																												} ?> nav-link" href="index.php">eKhaya</a></li>
										<li><i class="header-icons fas fa-store"></i><a class="<?php if ($page_title == 'Dishopo - Kasi Mall Online') {
																									echo "active";
																								} ?>" href="shop.php">Dishopo</a></li>

										<li><i class="header-icons fa fa-shopping-cart"></i><a class="<?php if ($page_title ==  'iTrolley - Kasi Mall Online') {
																											echo "active";
																										} ?>" href="cart.php">iTrolley</a></li>
										<li><i class="header-icons fas fa-search-location"></i><a class="<?php if ($page_title ==  'AmaKasi - Kasi Mall Online') {
																												echo "active";
																											} ?>" href="">Amakasi</a></li>
										<li><i class="header-icons fa fa-user"></i><a class="<?php if ($page_title ==  'iAccount - Kasi Mall Online') {
																									echo "active";
																								} ?>" href="customer/my_account.php?my_orders">iAccount</a></li>


									<?php else : ?>

										<li><i class="header-icons fas fa-home"></i><a class="<?php if ($page_title == 'Kasi Mall Online') {
																									echo "active";
																								} ?>" href="index.php">eKhaya</a></li>
										<li><i class="header-icons fas fa-store"></i><a class="<?php if ($page_title == 'Dishopo - Kasi Mall Online') {
																									echo "active";
																								} ?>" href="shop.php">Dishopo</a></li>

										<li><i class="header-icons fa fa-shopping-cart"></i><a class="<?php if ($page_title ==  'iTrolley - Kasi Mall Online') {
																											echo "active";
																										} ?>" href="cart.php">iTrolley</a></li>
										<li><i class="header-icons fas fa-search-location"></i><a class="<?php if ($page_title ==  'Amakasi - Kasi Mall Online') {
																												echo "active";
																											} ?>" href="">Amakasi</a></li>
										<li><i class="header-icons fa fa-user"></i><a class="<?php if ($page_title ==  'iAccount - Kasi Mall Online') {
																									echo "active";
																								} ?>" href="customer/my_account.php?my_orders">iAccount</a></li>

									<?php endif ?>
								</ul>

							</div>
						</nav>
					</div>
				</div>

			</div>
			</div>
		</section>

	</header>