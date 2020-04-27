<section class="px-5">
    <div class="section-title">
        <h3 class="title">Add Product</h3>
    </div>

    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

    <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="Name" size="15" maxlength="20" class="form-control" placeholder="Category Name" />
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Product Category</label>
                    <select name="Category" class="form-control">
                            <option value="">Please Select Category</option>
                    <?php while ($rs = $stmt->fetch()) {
                        $shop_category_id = $rs['cat_id'];
                        $shop_category_name  = $rs['category_name'];
                    ?>

                        
                            <option value="<?php echo $shop_category_name; ?>"> <?php echo $shop_category_name; ?></option>
                            
                        <?php } ?>
                        </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Product Description</label>
                    <input type="text" name="Description" size="50" maxlength="100" class="form-control" placeholder="Product Description" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Product Price(R)</label>
                    <input type="text" name="Price" size="5" maxlength="10" class="form-control" placeholder="R" />
                </div>
            </div>
        </div>


        <input type="hidden" name="hidden_shop_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
        <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

        <div class="footer text-center mt-4 p-0 ">
            <input type="submit" name="addProduct" class="btn primary-button btn-block " value="Add Product">
        </div>

    </form>
</section>