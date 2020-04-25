
 

<?php session_start(); 
include("functions/db.php");
include("functions/functions.php");
?>
<?php if (isset($_SESSION['c_email'])) : ?>

    <?php $page_title = 'My Account - Kasi Mall'; ?>
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
                <div id="store" class="col-md-9">

                <?php echo errorMessage(); ?>
<?php echo successMessage(); ?>

                    <!-- box Begin -->
                    <?php
                    if (isset($_GET['login_merchant'])) {
                        include("login_merchant.php");
                    }
                    ?>
                    <?php
                    if (isset($_GET['reg_merchant'])) {
                        include("reg_merchant.php");
                    }
                    ?>
                    <?php
                    if (isset($_GET['my_orders'])) {
                        include("my_orders.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['pay_offline'])) {
                        include("pay_offline.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['edit_account'])) {
                        include("edit_account.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['change_pass'])) {
                        include("change_pass.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['delete_account'])) {
                        include("delete_account.php");
                    }
                    ?>

                </div>
                <!-- STORE END -->

                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <?php include("includes/sidebar.php"); ?>

                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <?php include('includes/shopfooter.php'); ?>


    

<?php else : ?>
    <?php
    $_SESSION["errorMessage"] =  "Please login first to view account page";
    echo "<script>window.open('../login.php','_self')</script>";
?>
<?php endif ?>