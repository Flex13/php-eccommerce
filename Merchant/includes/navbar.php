<body>




	<!-- HEADER -->
	<header>
		<div id="navigation" class="container justify-content-center text-center">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="header-logo">
					<a href="index.php" class="logo">
						<img src="uploads/kasilogo.jpg" alt="kasi-logo">
					</a>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12">
				<ul class="header-links text-center"><i class="hide"><?php echo guard(); ?></i>
					<li><a href="#"><i class="fa fa-user-circle"></i>
							<?php if (!isset($_SESSION['m_email'])) : ?>
							<?php else : ?>
								Welcome: <?php echo $_SESSION['m_username']; ?> (Shop Admin)
							<?php endif ?>
						</a></li>
				</ul>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 justify-content-center text-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center text-center" id="navbarNav">
					<nav class="navbar navbar-expand-lg nav justify-content-center text-center sticky-top">
						<!-- NAV -->
						<ul class="main-nav nav navbar-nav">

							<li><a class="<?php if ($page_title == 'Shop Categories - Kasi Mall Online') {
												echo "active";
											} ?>" href="category.php?categories=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>">Categories</a></li>
							<li><a class="<?php if ($page_title == 'Shop Products - Kasi Mall Online') {
												echo "active";
											} ?>" href="products.php?products=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>">Products</a></li>
							<li><a class="<?php if ($page_title == 'Shop Orders - Kasi Mall Online') {
												echo "active";
											} ?>" href="orders.php?my_orders=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>">Orders</a></li>
							<li><a class="<?php if (isset($_GET['customers'])) {
												echo "active";
											} ?>" href="index.php?customers">My Customers</a></li>

							<li class="dropdown"><a data-toggle="dropdown" id="navbardrop" class="nav-link dropdown-toggle <?php if ($page_title == 'Shop Profile - Kasi Mall Online') {
																echo "active";
															} ?>">My Account</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="my_account.php?s_details=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>">Shop Profile</a>
									<a class="dropdown-item" href="index.php?reviews">Reviews</a>
									<a class="dropdown-item" href="../customer/my_account.php?my_orders">Back Customer Admin</a>
									<a class="dropdown-item" href="../logout.php">Logout</a>
								</div>
							</>

						</ul>


					</nav>
				</div>
			</div>
		</div>
	</header>