<?php session_start(); ?>
<?php if (isset($_SESSION['m_email']) && $_SESSION['user_type'] == 'merchant') : ?>

<?php $page_title = 'Merchant - Kasi Mall Online'; ?>
<?php include('includes/shopheader.php'); ?>
<?php include('includes/navbar.php'); ?>
<link rel="stylesheet" href="styles/style.css" />

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


            <!-- STORE -->
            <div id="" class="col-md-9">
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>
             <!-- box Begin -->
             <?php
                    if (isset($_GET['category'])) {
                        include("category.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['products'])) {
                        include("products.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['orders'])) {
                        include("orders.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['customers'])) {
                        include("customers.php");
                    }
                    ?>

<?php
                    if (isset($_GET['reviews'])) {
                        include("reviews.php");
                    }
                    ?>

                
            </div>
            <!-- STORE END -->

            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <?php include("includes/sidebar.php"); ?>

            </div>

        </>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php include('includes/shopfooter.php'); ?>

<?php else : ?>
    <?php $_SESSION["errorMessage"] =  "Please Login as Merchent to view admin"; ?>
    <?php echo "<script>window.open('../customer/my_account.php?login_merchant','_self')</script>"; ?>

<?php endif ?>