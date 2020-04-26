<!-- aside Widget -->
<div class="aside">
    <center><h3 class="aside-title">Shop Profile</h3>
        <div class="profile">
            <div class="profile-img">
                <img src="uploads/shop.jpg" class="img img-thumbnail" alt="Shop Profile Picture">
            </div>
        </div>

    <div class="checkbox-filter">
        <div class="input-checkbox">
            <div class="profile-header">
                <h3 class="profile-title"><b>Shop Name:</b><br> <?php if (isset($shop_name)) echo $shop_name; ?></h3>
                <p class=""><b>Shop Email:</b><br> <?php if (isset($shop_email)) echo $shop_email; ?></p>
                <p class=""><b>Shop Contact:</b><br> <?php if (isset($shop_contact)) echo $shop_contact; ?></h6>
                <p class=""><b>Shop Province:</b><br> <?php if (isset($shop_province)) echo $shop_province; ?></p>
                <p class=""><b>Shop City:</b><br> <?php if (isset($shop_city)) echo $shop_city; ?></p>
                
            </div>
        </div>

    </div></center>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->