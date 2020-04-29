<?php $page_title = 'Sign Up - Kasi Mall'; ?>
<?php include_once('includes/header.php'); ?>



<section class="container card-show">
    <div class="row card-row">
        <div class="card card1 card-spacing text-center">
            <div class="container logo" align="center">
                <a href="index.php" class="logo">
                    <img src="images/kasilogo.jpg" alt="">
                </a>
            </div>
            <h1 class="mb-5">Registration</h1>
            <form class="" action="" method="post">

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="Username" size="32" maxlength="60" class="form-control" placeholder="Username" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($name)) echo $name; ?>" class="form-control" placeholder="First Name" />
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Surname</label>
                            <input type="text" name="Surname" size="32" maxlength="60" value="<?php if (isset($surname)) echo $surname; ?>" class="form-control" placeholder="Surname" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" name="Email" size="32" value="<?php if (isset($email)) echo $email; ?>" maxlength="60" class="form-control" placeholder="Email" />
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Contact Details</label>
                            <input type="text" name="Contact" size="32" maxlength="60" value="<?php if (isset($contact)) echo $contact; ?>" class="form-control" placeholder="Contact Details" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="Date" max="2004-12-31">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="Gender" class="form-control">
                                <option value="">Please Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Province</label>
                            <select class="form-control" name="Province">
                                <option value="">Please Select Province</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="Free State">Free State</option>
                                <option value="Kwa Zulu-Natal">Kwa Zulu-Natal</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Limpopo">Limpopo</option>
                                <option value="Western Cape">Western Cape</option>
                                <option value="Mpumalanga">Mpumalanaga</option>
                                <option value="Northan Cape">Northan Cape</option>
                                <option value="North West">North West</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Ciy</label>
                            <input type="address" name="City" size="32" value="<?php if (isset($city)) echo $city; ?>" maxlength="100" class="form-control" placeholder="City" />
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                            <small>Please include at least 1 uppercase character, 1 lowercase character, and 1 number.</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" placeholder="Confirm Password" name="Password2" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                            <button type="button" class="button-psswd ">Show Password</button>
                        </div>
                    </div>

                    <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                </div>

                <div class="footer text-center">
                    <input type="submit" name="register" class="btn btn-primary btn-block mb-4" value="Register">
                </div>

                <div class="pull-left">
                    <h6><a href="login.php" class="link">Login</a></h6>
                </div>

                <div class="pull-right">
                    <h6><a href="index.php" class="link">Back</a></h6>
                </div>



            </form>

        </div>
    </div>
</section>



<?php include('includes/footer.php'); ?>