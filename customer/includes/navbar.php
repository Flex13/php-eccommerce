<body>
	<!-- HEADER -->
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="header-logo">
						<a href="index.php" class="logo">
							<img src="images/kasilogo.jpg" alt="kasi-logo">
						</a>
					</div>
				</div>
				<div class="col-md-5 justify-content-center">
					<div class="header-search">
						<form>
							<input class="input" placeholder="Search here">
							<button class="search-btn">Search</button>
						</form>
					</div>
					<ul class="header-links text-center"><i class="hide"><?php echo guard(); ?></i>
						<li><a href="#"><i class="fa fa-user-circle"></i>
								<?php if (!isset($_SESSION['c_email'])) : ?>
									Welcome: Guest
								<?php else : ?>
									Welcome: <?php echo $_SESSION['c_username']; ?>
								<?php endif ?>
							</a></li>
					</ul>

				</div>
				<div class="clearfix"></div>
				<div class="col-md-5 pt-5 ">
					<ul class="header-links text-center">
						<?php if (!isset($_SESSION['c_email'])) : ?>

						<?php else : ?>

							<li><a href="my_account.php?my_orders"><button type="button" class="btn header-button" data-toggle="tooltip" data-placement="top" title="Account">
										<i class="fa fa-user"></i>
									</button></a></li>
							<li><a href="../logout.php"><button type="button" class="btn header-button" data-toggle="tooltip" data-placement="top" title="Logout">
										<i class="fas fa-sign-in-alt"></i>
									</button></a></li>

						<?php endif ?>

					</ul>

					<nav class="navbar navbar-expand-lg ">
						<div class="container-fluid m-0 p-0">

							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
							</button>

							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="main-nav nav navbar-nav">
									<?php if (!isset($_SESSION['c_email'])) : ?>

									<?php else : ?>

										<li><i class="header-icons fas fa-home"></i><a class="<?php if ($page_title == 'Home - Kasi Mall Online') {
																									echo "active";
																								} ?>" href="../index.php">eKhaya</a></li>
										<li><i class="header-icons fas fa-store"></i><a class="<?php if ($page_title == 'Shops - Kasi Mall Online') {
																									echo "active";
																								} ?>" href="../shop.php">diShopo</a></li>

										<li><i class="header-icons fa fa-shopping-cart"></i><a class="<?php if ($page_title ==  'Cart - Kasi Mall Online') {
																											echo "active";
																										} ?>" href="../cart.php">iTrolley</a></li>
										<li><i class="header-icons fas fa-search-location"></i><a class="<?php if ($page_title ==  'Cart - Kasi Mall Online') {
																												echo "active";
																											} ?>" href="">amaKasi</a></li>


									<?php endif ?>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>