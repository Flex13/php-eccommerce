<?php $page_title = 'iTrolley - Kasi Mall Online'; ?>
<?php include('includes/shopheader.php'); ?>
<?php include('includes/navbar.php'); ?>


<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <li><a class="active">Shopping Cart</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<div id="cart" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-9 ">
                <!-- box Begin -->
                <div class="box product-box">
                    <form action="cart.php" method="post" enctype="multipart/form-data">
                        <div class="section-title">
                            <h3 class="title">Shopping Cart</h3>
                        </div>
                        <p class="text-muted">You currently have 0 item(s) in your cart</p>

                        <div class="table-responsive">
                            <!-- table-responsive Begin -->
                            <table class="table">
                                <!-- table Begin -->
                                <thead>
                                    <!-- thead Begin -->
                                    <tr>
                                        <!-- tr Begin -->
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>
                                    </tr><!-- tr Finish -->
                                </thead><!-- thead Finish -->


                                <tbody>
                                    <!-- tbody Begin -->
                                    <tr>
                                        <!-- tr Begin -->
                                        <td><img class="img-fluid" src="" alt=""> </td>
                                        <td><a href=""> </a></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="checkbox" name="remove[]"></td>
                                        <td>R</td>
                                    </tr><!-- tr Finish -->
                                </tbody><!-- tbody Finish -->
                            </table>
                        </div>

                        <div class="box-footer">

                            
                                <!-- box-footer Begin -->
                                <div class="pull-left btn-secondary-left">
                                    <!-- pull-left Begin -->
                                    <a href="shops.php" class="btn secondary-btn">
                                        <!-- btn btn-default Begin -->
                                        <i class="fa fa-chevron-left"></i> Continue Shopping
                                    </a><!-- btn btn-default Finish -->
                                </div><!-- pull-left Finish -->
                            

                            
                                <div class="pull-right">
                                    <!-- pull-right Begin -->
                                    <button type="submit" name="update" value="Update Cart" class="btn info-btn">
                                        <!-- btn btn-default Begin -->
                                        <i class="fas fa-sync"></i> Update Cart
                                    </button><!-- btn btn-default Finish -->
                                    
                                </div><!-- pull-right Finish -->
                            

                        </div><!-- box-footer Finish -->
                    </form>
                </div>

            </div>

            <div class="col-md-12 col-lg-12 col-xl-3">
                <!-- col-md-3 Begin -->

                <div id="order-summary" class="box product-box mt-5">
                    <!-- box Begin -->

                    <div class="box-header">
                        <!-- box-header Begin -->
                        <div class="section-title">
                            <h3 class="title">Order Summary</h3>
                        </div>
                    </div><!-- box-header Finish -->
                    <p class="text-muted">
                        <!-- text-muted Begin -->
                        Shipping and additional costs are calculated based on value you have entered
                    </p><!-- text-muted Finish -->
                    <div class="table-responsive">
                        <!-- table-responsive Begin -->
                        <table class="table">
                            <!-- table Begin -->
                            <tbody>
                                <!-- tbody Begin -->
                                <tr>
                                    <!-- tr Begin -->
                                    <td> Order All Sub-Total </td>
                                    <th> R </th>
                                </tr><!-- tr Finish -->
                                <tr>
                                    <!-- tr Begin -->
                                    <td> Shipping and Handling </td>
                                    <td> R0 </td>
                                </tr><!-- tr Finish -->
                                <tr>
                                    <!-- tr Begin -->
                                    <td> Tax </td>
                                    <th> R0 </th>
                                </tr><!-- tr Finish -->
                                <tr class="total">
                                    <!-- tr Begin -->
                                    <td> Total </td>
                                    <th> R </th>
                                </tr><!-- tr Finish -->
                            </tbody><!-- tbody Finish -->
                        </table><!-- table Finish -->
                    </div><!-- table-responsive Finish -->
                    <div class="pull-right">
                            <a href="checkout.php" class="btn primary-btn">
                                        Proceed Checkout <i class="fa fa-chevron-right"></i>
                                    </a>
</div>
                </div><!-- box Finish -->
            </div><!-- col-md-3 Finish -->
        </div>
        <!-- /row -->
        </div?>
        <!-- /container -->
    </div>


    <?php include('includes/shopfooter.php'); ?>