<link rel="stylesheet" href="styles/style.css" />
<?php echo errorMessage(); ?>
<?php echo successMessage(); ?>

<div class="box product-box">
    <form action="cart.php" method="post" enctype="multipart/form-data">
        <div class="section-title">
            <h3 class="title">My Orders</h3>
        </div>
        <p class="text-muted">You currently have 0 Orders</p>

        <div class="table-responsive">
            <!-- table-responsive Begin -->
            <table class="table ">
                <!-- table Begin -->
                <thead class="thead-dark text-center">
                    <!-- thead Begin -->
                    <tr>
                        <!-- tr Begin -->
                        <th>#</th>
						<th>Shop Name</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Payment Mode</th>
						<th>Order Placed On</th>
						<th>Operations</th>
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
                        <td></td>
                        <td></td>
                    </tr><!-- tr Finish -->
                </tbody><!-- tbody Finish -->
            </table>
        </div>
    </form>
</div>