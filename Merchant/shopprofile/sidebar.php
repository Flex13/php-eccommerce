<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title">Update Details</h3>

    <div class="checkbox-filter">
        <div class="input-checkbox">

            <ul class="nav nav-pills flex-column category-menu">
            <li>
                    <a class="profile-menu <?php if (isset($_GET['s_profile'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?s_profile=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>"><i class="fas fa-store-alt"></i> Shop Profile</a>
                </li>


                <li>
                    <a class="profile-menu <?php if (isset($_GET['s_details'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?s_details=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>"><i class="fas fa-store-alt"></i> Shop Details</a>
                </li>

                <li>
                    <a class="profile-menu <?php if (isset($_GET['m_details'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?m_details=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>"><i class="fa fa-user-edit"></i> Owner Details</a>
                </li>

                <li>
                    <a class="profile-menu <?php if (isset($_GET['change_pass'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?change_pass"><i class="fas fa-key"></i> Change Password</a>
                </li>
                <li>
                    <a class="profile-menu" href="my_account.php?publish_acc"><i class="fas fa-upload"></i> Publish Shop</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['delete_acc'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?delete_acc"><i class="fa fa-trash"></i> Deactivate Account</a>
                </li>
                
            </ul>

        </div>

    </div>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->