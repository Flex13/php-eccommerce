<link rel="stylesheet" href="styles/style.css" />

    <center class="px-5">
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <h3> Delete Product?</h3>
    <form action="" method="post" class="mx-5">

    <input type="hidden" name="hidden_product_id" value="<?php if (isset($shop_product_id)) echo $shop_product_id; ?>">
    <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

    <div class="footer text-center">
    <input type="submit" name="deleteProduct" value="Yes, Delete Product" class="btn primary-button btn-block">
    </div>
    </form><!-- form Finish -->
        
        
    </center>



    


    


