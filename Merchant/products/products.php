<link rel="stylesheet" href="styles/style.css" />

<div class="box product-box">
        <div class="section-title">
            <h3 class="title">My Products</h3><br>
        </div>

    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <p class="text-muted">You currently have <?php if(isset($count)) echo $count; ?> Product(s)</p>
    <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
            <!-- table-responsive Begin -->
            <table class="table ">
                <!-- table Begin -->
                <thead class="thead-dark text-center">
                    <!-- thead Begin -->
                    <tr>
                        <!-- tr Begin -->
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr><!-- tr Finish -->
                </thead><!-- thead Finish -->


                <tbody class="text-center">
                    <!-- tbody Begin -->

                    <?php 
                     while ($rs = $statement->fetch()) {
                        $product_id = $rs['product_id'];
                        $shop_id = $rs['m_id'];
                        $shop_category_name = $rs['cat_name'];
                        $shop_user_id  = $rs['m_user_id'];
                        $product_name  = $rs['product_name'];
                        $product_description  = $rs['product_description'];
                        $product_price  = $rs['product_price'];
                        ?>
                    
                    <tr>
                        <!-- tr Begin -->
                        <td><?php if(isset($product_name)) echo $product_name; ?></td>
                        <td><?php if(isset($shop_category_name)) echo $shop_category_name; ?></td>
                        <td>R <?php if(isset($product_price)) echo $product_price; ?></td>
                        <td><a href="products.php?view_product==<?php if (isset($product_id)) echo $product_id; ?>" class="btn table-link-info btn-block">View</a></td>
                        <td><a href="products.php?edit_product=<?php if (isset($product_id)) echo $product_id; ?>" class="btn table-link-info btn-block">Edit</a></td>
                        <td><a href="products.php?delete_product=<?php if (isset($product_id)) echo $product_id; ?>" class="btn table-link-danger btn-block"><i class="fa fa-trash"></i> Delete</a></td>
                        <?php }?>
                        </tr><!-- tr Finish -->
                </tbody><!-- tbody Finish -->
            </table>
        </div>
    </form>
</div>