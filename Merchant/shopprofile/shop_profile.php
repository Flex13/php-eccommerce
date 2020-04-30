<link rel="stylesheet" href="styles/style.css" />

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php if (isset($shop_image)) echo $shop_image; ?>" class="img-fluid" alt="Shop Image">
        </div>
        <div class="col-md-6">
            <h3 class="title">Shop Profile</h3>

            <div class="form-group">
                <label class="form-label">Shop Name</label>
                <p><?php if (isset($shop_name)) echo $shop_name; ?></p>
            </div>

            <div class="form-group">
                <label class="form-label">Shop Email</label>
                <p><?php if (isset($shop_email)) echo $shop_email; ?></p>
            </div>

            <div class="form-group">
                <label class="form-label">Shop Contact</label>
                <p><?php if (isset($shop_contact)) echo $shop_contact; ?></p>
            </div>

            <div class="form-group">
                <label class="form-label">Shop Province</label>
                <p><?php if (isset($shop_province)) echo $shop_province; ?></p>
            </div>

            <div class="form-group">
                <label class="form-label">Shop City</label>
                <p><?php if (isset($shop_city)) echo $shop_city; ?></p>
            </div>

            <div class="form-group">
                <label class="form-label">Admin Full Name</label>
                <p><?php if (isset($shop_owner_name)) echo $shop_owner_name; ?> <?php if (isset($shop_owner_surname)) echo $shop_owner_surname; ?></p>
            </div>
        </div>
    </div>
</div>