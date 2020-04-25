<link rel="stylesheet" href="styles/style.css" />

<h3 class="title">Edit Account Details</h3>

<form class="" action="" method="post" enctype="multipart/form-data">

    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">First Name</label>
                <input type="text" name="Name" size="32" maxlength="60" value="<?php if(isset($name)) echo $name; ?>" class="form-control" placeholder="First Name" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Surname</label>
                <input type="text" name="Surname" size="32" maxlength="60" value="<?php if(isset($surname)) echo $surname; ?>" class="form-control" placeholder="Surname" />
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="Email" size="32" value="<?php if(isset($email)) echo $email; ?>" maxlength="60" class="form-control" placeholder="Email" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Contact Details</label>
                <input type="tel" name="Contact" size="32" maxlength="60" value="<?php if(isset($contact)) echo $contact; ?>" class="form-control" placeholder="Contact Details" />
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Country</label>
                <select class="form-control" name="Country" >
                    <option value="<?php if(isset($country)) echo $country; ?>"><?php if(isset($country)) echo $country; ?></option>
                    <option value="South Africa">South Africa</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Province</label>
                <select class="form-control" name="Province">
                    <option value="<?php if(isset($province)) echo $province; ?>"><?php if(isset($province)) echo $province; ?></option>
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

    </div>

    <div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <label class="form-label">Ciy</label>
                <input type="address" name="City" size="32" value="<?php if(isset($city)) echo $city; ?>" maxlength="100" class="form-control" placeholder="City" />
            </div>
</div>
    </div>
        

<div class="row">
<div class="col-md-12">
        <div class="form-group">
        <label>Your Profile Picture</label>
                                <input type="file" class="form-height-custom" name="Image"><br>
            </div>
        </div>
</div>
        

<input type="hidden" name="hidden_id" value="<?php if(isset($id)) echo $id; ?>">
<input type="hidden" name="hidden_username" value="<?php if(isset($username)) echo $username; ?>">
<input type="hidden" name="token" value="<?php if(function_exists('_token'))  echo _token(); ?>">

<div class="footer text-center m-0 p-0 ">
        <input type="submit" name="update" class="btn primary-button btn-block mb-4" value="Update">
    </div>

    

    

</form>