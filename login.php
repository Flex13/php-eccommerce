<?php $page_title = 'Login - Kasi Mall'; ?>
<?php include_once('includes/header.php'); ?>



<section class="container card-show">
    <div class="row card-row">
        <div class="card card1 card-spacing text-center">

            <div class="container logo" align="center">
                <a href="index.php" class="logo">
                    <img src="images/kasilogo.jpg" alt="Kasi logo">
                </a>

            </div>

            <h3 class="mb-5">Login</h3>

            <form class="" action="" method="post">

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                <?php echo errorMessage(); ?><?php echo successMessage(); ?>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" name="Email" size="30" maxlength="60" class="form-control" placeholder="Enter your email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="on" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>

                    <input type="password" placeholder="Enter Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                </div>

                <div class="form-group pull-left">
                    <div class="checkbox">
                        <input id="checkbox1" value="yes" name="remember" type="checkbox">
                        <label for="checkbox1">
                            Remember Me
                        </label>
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">

                <div class="footer text-center">
                    <input type="submit" name="login" class="btn btn-primary btn-block mb-4" value="Login">
                </div>

                <div>
                    <h6>
                        <a href="customer_register.php" class="link">Create Account</a>
                    </h6>
                </div>
                <div>
                    <h6>
                        <a href="forgot_password_link.php" class="link">Forgot Password?</a>
                    </h6>
                </div>

                <h6>
                    <a href="index.php" class="link">Back to Home Page</a>
                </h6>
            </form>

        </div>
    </div>
</section>



<?php include('includes/footer.php'); ?>