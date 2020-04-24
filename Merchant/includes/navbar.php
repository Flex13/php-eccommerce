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

                        <li><a href="my_account.php?my_orders"><i class="fa fa-user"></i> Back to my Account</a></li>
                        <li><a href="../logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a></li>

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

                        <li><a href="index.php?category">Categories</a></li>
                        <li><a href="index.php?products">Products</a></li>
                        <li><a href="index.php?orders">Orders</a></li>
                        <li><a href="index.php?customers">Customers</a></li>
                        <li><a href="index.php?reviews">Reviews</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
        <!-- /NAVIGATION -->