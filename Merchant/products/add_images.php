<section class="px-5">
    <div class="section-title">
        <h3 class="title">Your Product Images</h3>
    </div>

    <?php if (isset($result)) echo $result;
    include_once('functions/classes/addProductImage.class.php');
    ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <?php echo errorMessage(); ?><?php echo successMessage(); ?>

    <div class="container">
        <div class="row">
            
                    <div class="col-sm-12 col-md-4">
                        <img src="uploads/<?php if (isset($product1)) echo $product1; ?>" class="card-img-top img-fluid" alt="" style="height: 250px;">
                    </div>


        </div>
    </div>


        <div class="section-title">
            <h3 class="title">Upload Images</h3>
        </div>

        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <p>Select Image File to Upload:</p>
                <input type="file" class="file"  name="Image" accept="image/*" ><br><br>

                <input type="hidden" name="hidden_shop_id" value="<?php if (isset($product_store_id)) echo $product_store_id; ?>">
                <input type="hidden" name="hidden_shop_user_id" value="<?php if (isset($product_store_user_id)) echo $product_store_user_id; ?>">
                <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">
                <input type="submit" name="addProduct" class="btn primary-button btn-block " value="Upload">
            </form>
        </section>


</section>