<?php $page_title = 'Password Reset - Kasi Mall';?>
<?php include('includes/header.php'); ?>
<?php include_once('functions/classes/password_reset.class.php'); ?>


<?php 

if(isset($_GET['uid'])) {
    $encoded_id = $_GET['uid'];
    $decode_id = base64_decode($encoded_id);
    $id_array = explode("encodeuserid", $decode_id);
    $id = $id_array['1'];
}

?>


<section class="container card-show">
<div class="row card-row">
        <div class="card card1 card-spacing text-center">

            <div class="container logo" align="center">
            <a href="index.php" class="logo">
                    <img src="images/kasilogo.jpg" alt="Kasi logo">
                </a>
            </div>

            <h3 class="mb-5">Reset Password</h3>

            <form class="" action="" method="post">

            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>


                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="form-label">New Password</label>

                    <input type="password" placeholder="Enter Password" name="New-Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                </div>

                <div class="form-group">
                    <label class="form-label">Confirm Password</label>

                    <input type="password" placeholder="Enter Password" name="Confirm-Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                </div>
    
                <input type="hidden" name="user_id"  value="<?php if (isset($id)) echo $id; ?> ">
                <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
                <div class="footer text-center">
                    <input type="submit" name="Reset-pass" class="btn btn-primary btn-block mb-4" value="Reset Password">
                </div>

                <div class="pull-left">
                    <h6>
                        <a href="login.php" class="link">Login</a>
                    </h6>
                </div>
            </form>

        </div>
</div>
</section>



<?php include('includes/footer.php'); ?>