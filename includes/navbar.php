<body>




	<!-- HEADER -->
	<header>
		<?php if($page_title === 'Kasi Mall Online') : ?>
<!-- TOP HEADER -->
<div id="test">
			<div class="container text-center">
				
				<p class="notify"><b>Stay Informed</b> Visit the SA Department of Healths's Website for COVIUD-19 Updates: <br> <a href="www.sacoronavirus.co.za">www.sacoronavirus.co.za</a></p>
				<button class="notify-button">Close</button>
			</div>
		</div>
		<!-- /TOP HEADER -->
		<?php  else :  ?>

		<?php endif ?>
		

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-lg-2">
					<div class="header-logo">
						<a href="index.php" class="logo">
							<img src="images/kasilogo.jpg" alt="kasi-logo">
						</a>
					</div>
				</div>
				<div class="col-sm-12 col-md-8  col-lg-5 justify-content-center">
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
				<div class="col-sm-12 col-md-12 col-lg-5 p-0">
					<nav class="navbar navbar-expand-lg">
						<ul class="main-nav nav navbar-nav">
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
								<li><i class="header-icons fas fa-store"></i><a class="<?php if ($page_title == 'Dishopoo - Kasi Mall Online') {
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


					</nav>
				</div>
			</div>
		</div>
	</header>