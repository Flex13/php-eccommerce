<link rel="stylesheet" href="styles/style.css" />

<form class="" action="" method="post">
    <h3 class="title">Change Password</h3>
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

    <center>
        <div class="form-group">
            <label class="form-label">Old Password</label>
            <input type="text" name="Old-Password" size="32" maxlength="60" class="form-control" placeholder="Old Password" />
        </div>

        <div class="form-group">
            <label class="form-label">New Password</label>
            <input type="text" name="New-Password" size="32" maxlength="60" class="form-control" placeholder="New Password" />
        </div>

        <div class="form-group">
            <label class="form-label">Confirm Password</label>
            <input type="text" name="Confirm-Password" size="32" maxlength="60" class="form-control" placeholder="Confirm Password" />
        </div>
        <input type="hidden" name="hidden_shop_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
        <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">
    </center>

    <div class="footer text-center">
        <input type="submit" name="changeOwnerPassword" class="btn primary-button btn-block mb-4" value="Change Password">
    </div>

</form>