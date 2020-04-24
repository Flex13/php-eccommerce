<link rel="stylesheet" href="styles/style.css" />

<section class="container card-show">
    <div class="row card-row">
        <div class="card card1 card-spacing text-center">
            <h3 class="title text-center text-uppercase m-4">Register Shop</h3>

            <form class="" action="" method="post">

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>


                <div class="form-group">
                    <label class="form-label">Shop Name</label>
                    <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($shopname)) echo $shopname; ?>" class="form-control" placeholder="Shop Name" />
                </div>

                <div class="form-group">
                    <label class="form-label">Shop Email</label>
                    <input type="text" name="Email" size="32" value="<?php if (isset($shopemail)) echo $shopemail; ?>" maxlength="60" class="form-control" placeholder="Shop Email" />
                </div>

                <div class="form-group">
                    <label class="form-label">Shop Contact Details</label>
                    <input type="text" name="Contact" size="32" maxlength="60" value="<?php if (isset($shopcontact)) echo $shopcontact; ?>" class="form-control" placeholder="Shop Contact Details" />
                </div>

                <div class="form-group">
                    <label class="form-label">Shop Province</label>
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

                <div class="form-group">
                    <label class="form-label">Shop City</label>
                    <input type="text" name="City" size="32" value="<?php if (isset($shopcity)) echo $shopcity; ?>" maxlength="100" class="form-control" placeholder="Shop City" />
                </div>

                <div class="form-group">
                    <label class="form-label">Shop Address</label>
                    <input type="address" name="Address" size="32" value="<?php if (isset($shopaddress)) echo $shopaddress; ?>" maxlength="100" class="form-control" placeholder="Shop City" />
                </div>

                <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>">
                <div class="footer text-center">
                    <input type="submit" name="registerShop" class="btn btn-primary btn-block mb-4" value="Register Shop">
                </div>


            </form>

        </div>

    </div>
</section>