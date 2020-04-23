<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title">My Profile</h3>

    <div class="profile">
        <div class="profile-img">
            <img src="<?php if(isset($profile_picture)) echo $profile_picture; ?>" class="img img-thumbnail" alt="Customer Profile Picture">
        </div>
    </div>

    <div class="checkbox-filter">
        <div class="input-checkbox">
            <div class="profile-header">
            <h3 class="profile-title">Name: <?php if(isset($name)) echo $name; ?> <?php if(isset($surname)) echo $surname; ?></h3>
            <p class="">Email: <?php if(isset($email)) echo $email; ?></p>
            <p class="">Username: <?php if(isset($username)) echo $username; ?> </p>
            <p class="">Contact: <?php if(isset($contact)) echo $contact; ?></h6>
            </div>
            
            <ul class="nav nav-pills flex-column category-menu">
                <li>
                    <a class="profile-menu <?php if (isset($_GET['my_orders'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?my_orders"><i class="fa fa-list"></i> My Orders</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['pay_offline'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['edit_account'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?edit_account=<?php if(isset($encode_id)) echo $encode_id; ?>"> <i class="fa fa-user-edit"></i> Edit Account</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['change_pass'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?change_pass=<?php if(isset($encode_id)) echo $encode_id; ?>"><i class="fa fa-user"></i> Change Password</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['delete_account'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?delete_account=<?php if(isset($encode_id)) echo $encode_id; ?>"><i class="fa fa-trash"></i> Delete Account</a>
                </li>
                <li>
                    <a class="profile-menu" href="../logout.php"><i class="fa fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>

        </div>

    </div>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->