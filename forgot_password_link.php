<?php $page_title = 'Forgot Password - Kasi Mall';?>
<?php include('includes/header.php'); ?>
<?php include_once('functions/classes/forgot.class.php'); ?>


<section class="container card-show">
<div class="row card-row">
        <div class="card card1 card-spacing text-center">

            <div class="container logo" align="center">
                <img src="images/kasilogo.jpg" alt="">
            </div>

            <h3 class="mb-5">Forgot Password</h3>

            <form class="" action="" method="post">

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

                <div class="clearfix"></div>

                <p><b>To reset password. Please enter email and a password link will be sent to your email</b></p>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" name="email" size="30" maxlength="60" class="form-control" placeholder="Enter your email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="on" />
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
                <div class="footer text-center">
                    <input type="submit" name="Reset-link" class="btn btn-primary btn-block mb-4" value="Reset Password">
                </div>

                <div class="pull-right">
                    <h6>
                        <a href="customer_register.php" class="link">Create Account</a>
                    </h6>
                </div>

                <div class="pull-left">
                    <h6>
                        <a href="login.php" class="link">Back</a>
                    </h6>
                </div>
            </form>

        </div>
</div>
</section>



<?php include('includes/footer.php'); ?>