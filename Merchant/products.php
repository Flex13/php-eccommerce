<?php session_start();

?>
<?php if (isset($_SESSION['m_email']) && $_SESSION['user_type'] == 'merchant') : ?>

    <?php $page_title = 'Shop Products - Kasi Mall Online'; ?>
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
                    if (isset($_GET['products'])) {
                        include_once('functions/classes/products.class.php');
                        include("products/products.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['addproducts'])) {
                        include_once('functions/classes/addProduct.class.php');
                        include("products/add_product.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['edit_product'])) {
                        include_once('functions/classes/editProduct.class.php');
                        include("products/edit_product.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['delete_product'])) {
                        include_once('functions/classes/deleteProduct.class.php');
                        include("products/delete_product.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['view_product_images'])) {
                        
                        include("products/add_images.php");
                    }
                    ?>


                </div>
                <!-- STORE END -->

                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <?php include("products/sidebar.php"); ?>

                </div>
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