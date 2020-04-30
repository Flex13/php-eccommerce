<link rel="stylesheet" href="styles/style.css" />

<h3 class="title">Edit Shop Details</h3>

<form class="" action="" method="post" enctype="multipart/form-data">

    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Shop Name</label>
                <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($shop_name)) echo $shop_name; ?>" class="form-control" placeholder="Shop Name" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Shop Email</label>
                <input type="email" name="Email" size="32" value="<?php if (isset($shop_email)) echo $shop_email; ?>" maxlength="60" class="form-control" placeholder="Shop Email" />
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label">Contact Details</label>
            <input type="tel" name="Contact" size="32" maxlength="60" value="<?php if (isset($shop_contact)) echo $shop_contact; ?>" class="form-control" placeholder="Contact Details" />
        </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Shop Province</label>
            <select class="form-control" name="Province">
                <option value="<?php if (isset($shop_province)) echo $shop_province; ?>"><?php if (isset($shop_province)) echo $shop_province; ?></option>
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

        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group">
                    <label class="form-label">Shop City</label>
                    <input type="address" name="City" size="32" value="<?php if (isset($shop_city)) echo $shop_city; ?>" maxlength="100" class="form-control" placeholder="Shop City" />
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Your Shop Picture</label>
                <input type="file" class="form-height-custom" name="image"><br>
            </div>
        </div>
    </div>


    <input type="hidden" name="hidden_shop_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
    <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">

    <div class="footer text-center m-0 p-0 ">
        <input type="submit" name="updateShop" class="btn primary-button btn-block mb-4" value="Update">
    </div>





</form>