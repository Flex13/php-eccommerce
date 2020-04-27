<?php session_start();

?>
<?php if (isset($_SESSION['m_email']) && $_SESSION['user_type'] == 'merchant') : ?>

    <?php $page_title = 'Shop Categories - Kasi Mall Online'; ?>
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
                    if (isset($_GET['categories'])) {
                        include_once('functions/classes/categories.class.php');
                        include("categories/categories.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['addcategories'])) {
                        include_once('functions/classes/addCategory.class.php');
                        include("categories/add_category.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['edit_category'])) {
                        include_once('functions/classes/editCategory.class.php');
                        include("categories/edit_category.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['delete_category'])) {
                        include_once('functions/classes/deleteCategory.class.php');
                        include("categories/delete_category.php");
                    }
                    ?>


                </div>
                <!-- STORE END -->

                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <?php include("categories/sidebar.php"); ?>

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