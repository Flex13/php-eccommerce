<link rel="stylesheet" href="styles/style.css" />

<h3 class="title">Edit Shop Owner Details</h3>

<form class="" action="" method="post" enctype="multipart/form-data">

    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

 
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Shop Admin Name</label>
                <input type="text" name="Name" size="32" value="<?php if (isset($shop_owner_name)) echo $shop_owner_name; ?>" maxlength="60" class="form-control" placeholder="Shop Owner Name" />
            </div>
        </div>

        <div class="col-md-12">
            <label class="form-label">Shop Admin Surname</label>
            <input type="text" name="Surname" size="32" maxlength="60" value="<?php if (isset($shop_owner_surname)) echo $shop_owner_surname; ?>" class="form-control" placeholder="Shop Owner Surname" />
        </div>
    </div>




    <input type="hidden" name="hidden_shop_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
    <input type="hidden" name="hidden_shop_username" value="<?php if (isset($shop_owner_username)) echo $shop_owner_username; ?>">
    <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

    <div class="footer text-center mt-4 p-0 ">
        <input type="submit" name="updateOwner" class="btn primary-button btn-block mb-4" value="Update">
    </div>





</form>