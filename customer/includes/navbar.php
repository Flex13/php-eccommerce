<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left"><i class="hide"><?php echo guard(); ?></i>
                        <li><a href="#"><i class="fa fa-user-circle"></i>
                        <?php if (!isset($_SESSION['c_email'])): ?>
                            Welcome: Guest
                        <?php else: ?>
                            Welcome: <?php echo $_SESSION['c_username']; ?>
                        <?php endif ?>
                    </a></li>
					</ul>
					<ul class="header-links pull-right">
                    <?php if (!isset($_SESSION['c_email'])): ?>

                        <li><a href="../cart.php"><i class="fa fa-shopping-cart"></i> Go to Cart</a></li>
                        <li><a href="../customer_register.php"><i class="fa fa-user-plus"></i> Register</a></li>
                        <li><a href="../login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>

                        <?php else: ?>

                        <li><a href="my_account.php?my_orders"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="../cart.php"><i class="fa fa-shopping-cart"></i> Go to Cart</a></li>
                        <li><a href="../logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a></li>

                        <?php endif ?>

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
								<a href="../index.php" class="logo">
									<img src="images/kasilogo.jpg" alt="kasi-logo">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
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
        
        <!-- NAVIGATION -->
		<nav id="navigation" class="navbar navbar-expand-lg nav justify-content-center sticky-top">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav mx-auto">
                    <?php if (!isset($_SESSION['c_email'])): ?>

                        <li><a href="../index.php">Home</a></li>
                        <li><a href="shop.php">Shops</a></li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="contact.php">Contact Us</a></li>

                        <?php else: ?>

                        <li><a href="../index.php">Home</a></li>
                        <li><a href="shop.php">Shops</a></li>
                        <li><a href="my_account.php?my_orders">My Account</a></li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="contact.php">Contact Us</a></li>

                        <?php endif ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
        <!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="../index.php">Home</a></li>
							<li class="active">My Account</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->