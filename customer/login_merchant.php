<link rel="stylesheet" href="styles/style.css" />
<section class="container card-show">
<div class="row card-row">
<div class="card card1 card-spacing text-center">
<h3 class="title text-center text-uppercase m-4">Login to Shop Admin</h3>

            <form class="" action="" method="post">

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>


                <div class="form-group">
                    <label class="form-label">Email</label>
                        <input type="email" name="Email" size="30" maxlength="60" class="form-control" placeholder="Enter your email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="on" />
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>

                    <input type="password" placeholder="Enter Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                </div>

                <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
                <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>">
                <div class="footer text-center">
                    <input type="submit" name="loginShop" class="btn btn-primary btn-block mb-4" value="Login Shop">
                </div>

                
            </form>

        </div>

        </div>
</section>