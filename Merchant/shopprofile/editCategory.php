
    <section class="my-3 px-5">
<div class="section-title">
            <h3 class="title">Edit Category</h3>
</div>

<?php if (isset($result)) echo $result; ?>
<?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

<form class="" action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Category Name</label>
            <input type="text" name="Name" size="15" value="<?php if (isset($shop_category_name)) echo $shop_category_name; ?>"  maxlength="20" class="form-control" placeholder="Category Name" />
        </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label class="form-label">Description</label>
        <input type="text" name="Description" size="32" value="<?php if (isset($shop_category_descr)) echo $shop_category_descr; ?>" maxlength="60"  class="form-control" placeholder="Description" />
    </div>
</div>
</div>

<input type="hidden" name="hidden_shop_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
<input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

<div class="footer text-center mt-4 p-0 ">
    <input type="submit" name="AddCategory" class="btn primary-button btn-block" value="Add Category">
</div>

</form>
</section>
