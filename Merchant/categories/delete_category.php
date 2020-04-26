<link rel="stylesheet" href="styles/style.css" />

    <center class="px-5">
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <h3> Delete Category?</h3>
    <form action="" method="post" class="mx-5">

    <input type="hidden" name="hidden_cat_id" value="<?php if (isset($shop_cat_id)) echo $shop_cat_id; ?>">
    <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

    <div class="footer text-center">
    <input type="submit" name="deleteCategory" value="Yes, Delete Category" class="btn primary-button btn-block">
    </div>
    </form><!-- form Finish -->
        
        
    </center>



    


    


