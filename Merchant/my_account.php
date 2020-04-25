<?php session_start();

?>
<?php if (isset($_SESSION['m_email']) && $_SESSION['user_type'] == 'merchant') : ?>

    <?php $page_title = 'Shop Profile - Kasi Mall Online'; ?>
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
                    if (isset($_GET['s_details'])) {
                        include("shop/shopdetails.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['m_details'])) {
                        include("shop/merchantDetails.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['change_pass'])) {
                        include("shop/change_pass.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['delete_acc'])) {
                        include("shop/delete_acc.php");
                    }
                    ?>


                </div>
                <!-- STORE END -->

                <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <?php include("shop/sidebar.php"); ?>

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