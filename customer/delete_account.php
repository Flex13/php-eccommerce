<link rel="stylesheet" href="styles/style.css" />
<?php include_once('functions/classes/deactivate.class.php'); ?>

<form class="" action="" method="post">

    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

    <center>
    <h3> Do You Really Want to Delete Your Account</h3>
    <form action="" method="post" class="my-3">

    <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>">
        <input type="hidden" name="hidden_username" value="<?php if (isset($username)) echo $username; ?>">
        <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

    <div class="footer text-center">
    <input type="submit" name="Yes" value="Yes, I want to Delete" class="btn primary-button mx-2 my-3">
    <input type="submit" name="No" value="No, I don't want to Delete" class="btn danger-button mx-2 my-3">
    </div>
    </form><!-- form Finish -->
        
        
    </center>



    


    
