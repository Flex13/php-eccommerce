<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title">Shop Profile</h3>
        <div class="profile">
            <div class="profile-img">
                <img src="<?php if (isset($profile_picture)) echo $profile_picture; ?>" class="img img-thumbnail" alt="Customer Profile Picture">
            </div>
        </div>

    <div class="checkbox-filter">
        <div class="input-checkbox">
            <div class="profile-header">
                <h3 class="profile-title">Shop Name: <?php if (isset($name)) echo $name; ?></h3>
                <p class=""> Shop Email: <?php if (isset($email)) echo $email; ?></p>
                <p class=""> Shop Location: <?php if (isset($email)) echo $email; ?></p>
                <p class="">Shop Contact: <?php if (isset($contact)) echo $contact; ?></h6>
            </div>
        </div>

    </div>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->