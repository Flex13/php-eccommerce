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
                <div id="" class="col-md-8">
                    <?php echo errorMessage(); ?><?php echo successMessage(); ?>
                    <!-- box Begin -->

                    <?php
                    if (isset($_GET['s_profile'])) {
                        include("shopprofile/shop_profile.php");
                    }
                    ?>
                    <?php
                    if (isset($_GET['s_details'])) {
                        include("shopprofile/shopdetails.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['m_details'])) {
                        include("shopprofile/merchantDetails.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['change_pass'])) {
                        include("shopprofile/change_pass.php");
                    }
                    ?>

                    <?php
                    if (isset($_GET['delete_acc'])) {
                        include("shopprofile/delete_acc.php");
                    }
                    ?>

<?php
                    if (isset($_GET['publish_acc'])) {
                        include("shopprofile/publish.php");
                    }
                    ?>


                </div>
                <!-- STORE END -->

                <!-- ASIDE -->
                    <div id="aside" class="col-md-4">
                        <?php include("shopprofile/sidebar.php"); ?>

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