<link rel="stylesheet" href="styles/style.css" />
<?php include_once('functions/classes/activateShop.class.php'); ?>


    

    <center>
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <h3> Do you want to publish the shop to the public?</h3>
    <form action="" method="post" class="my-3">

    <input type="hidden" name="hidden_shop_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
    <input type="hidden" name="hidden_shop_username" value="<?php if (isset($shop_owner_username)) echo $shop_owner_username; ?>">
    <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

    <div class="footer text-center">
    <input type="submit" name="Yes" value="Yes, I want Publish" class="btn primary-button mx-2 my-3">
    <input type="submit" name="No" value="No, Take it off Public Page" class="btn danger-button mx-2 my-3">
    </div>
    </form><!-- form Finish -->
        
        
    </center>



    


    
