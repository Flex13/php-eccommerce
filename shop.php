<?php $page_title = 'Dishopo - Kasi Mall Online'; ?>
<?php include('includes/shopheader.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include_once('functions/classes/shops.class.php');?>



<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Kasi Mall Shops</h3>
				</div>
				<div class="row">

					<?php
					for ($i = 0; $rs = $result->fetch(); $i++) {
						$id = $rs['m_id'];
						$shopname = $rs['m_shop_name'];
						$province = $rs['m_province'];
						$city = $rs['m_city'];
						$image = $rs['m_image'];

					?>
						<!-- merchant -->
						<div class="col-md-6 col-sm-12 col-lg-6" align="center">
							<div class='product'>
								<a href="products.php?id=<?php if (isset($id)) echo $id; ?>">
									<img class="img-fluid product-image" src="Merchant/<?php if (isset($image)) echo $image; ?>">
								</a>
								<div class='text'>
									<h3><?php if (isset($shopname)) echo $shopname; ?></h3>
									<p class='price'><a href="#"><?php if (isset($province)) echo $province; ?>, <?php if (isset($city)) echo $city; ?></a></p>
									<p class="merchant-description">Shop Description</p>
									<a class="btn primary-btn" href="products.php?id=<?php if (isset($id)) echo $id; ?>"><i class="fas fa-store-alt"></i> Enter Shop</a>
								</div>
							</div>
						</div>
					<?php } ?>




				</div>
				<!-- /store merchants -->
			</div>
			<!-- STORE END -->

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->


<?php include('includes/shopfooter.php'); ?>