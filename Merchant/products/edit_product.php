<section class="px-5">
<div class="section-title">
            <h3 class="title">Edit Product</h3>
</div>

<?php if (isset($result)) echo $result; ?>
<?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

<form class="" action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Product Name</label>
            <input type="text" name="Name" size="15" value="<?php if (isset($shop_product_name)) echo $shop_product_name; ?>"  maxlength="20" class="form-control" placeholder="Category Name" />
        </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label class="form-label">Product Category</label>
        <select name="Category" class="form-control">
        <option value="<?php if (isset($shop_product_category)) echo $shop_product_category; ?>"> <?php if (isset($shop_product_category)) echo $shop_product_category; ?></option>
            <?php while ($rs = $stmt->fetch()) {
                        $shop_category_id = $rs['cat_id'];
                        $shop_category_name  = $rs['category_name'];
                    ?>

                            <option value="<?php if (isset($shop_category_name)) echo $shop_category_name; ?>"> <?php if (isset($shop_category_name)) echo $shop_category_name; ?></option>
                            <?php } ?>
        </select>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="form-label">Product Description</label>
            <input type="text" name="Description" size="50" value="<?php if (isset($shop_product_description)) echo $shop_product_description; ?>"  maxlength="100" class="form-control" placeholder="Product Description" />
        </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
        <label class="form-label">Product Price(R)</label>
        <input type="text" name="Price" size="5" value="<?php if (isset($shop_product_price)) echo $shop_product_price; ?>" maxlength="10"  class="form-control" placeholder="R" />
    </div>
</div>
</div>

<input type="hidden" name="hidden_shop_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
<input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

<div class="footer text-center mt-4 p-0 ">
    <input type="submit" name="editProduct" class="btn primary-button btn-block " value="Edit Product">
</div>

</form>
</section>