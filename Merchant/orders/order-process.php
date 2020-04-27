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

                <div class="box product-box">
                    <form action="cart.php" method="post" enctype="multipart/form-data">
                        <div class="section-title">
                            <h3 class="title">Admin - Order Processing</h3>
                        </div>
                        <p class="uppercase">Order Processing</p>

                        <div class="table-responsive">
                            <!-- table-responsive Begin -->
                            <table class="table">
                                <!-- table Begin -->
                                <thead>
                                    <!-- thead Begin -->
                                    <tr>
                                        <!-- tr Begin -->
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Payment Mode</th>
                                        <th>Total</th>
                                    </tr><!-- tr Finish -->
                                </thead><!-- thead Finish -->


                                <tbody>
                                    <!-- tbody Begin -->
                                    <tr>
                                        <!-- tr Begin -->
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr><!-- tr Finish -->
                                </tbody><!-- tbody Finish -->
                            </table>
                        </div>
                    </form>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <label class="">Order Status </label>
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Dispatched">Dispatched</option>
                                <option value="Delivered">Delivered</option>
                            </select>

                            <label>Message :</label>
                            <textarea class="form-control" name="message" cols="10"> </textarea>

                            <input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">
                            <input type="submit" class="btn primary-btn" value="Update Order Status">
                        </div>
                    </div>
                </div>


               



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