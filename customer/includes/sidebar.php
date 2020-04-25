<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title">My Profile</h3>

    <div class="checkbox-filter">
        <div class="input-checkbox">

            <ul class="nav nav-pills flex-column category-menu">

                <?php if (isset($_SESSION['m_email']) && $_SESSION['user_type'] == 'merchant') : ?>

                    <li>
                        <a class="profile-menu <?php if (isset($_GET['login_merchant'])) {
                                                    echo "active";
                                                } ?>" href="../merchant/index.php?orders"><i class="fas fa-store-alt"></i> Shop Admin</a>
                    </li>

                <?php else : ?>

                    <li>
                        <a class="profile-menu <?php if (isset($_GET['login_merchant'])) {
                                                    echo "active";
                                                } ?>" href="my_account.php?login_merchant"><i class="fas fa-store-alt"></i> Shop Admin Login</a>
                    </li>
                    <li>
                        <a class="profile-menu <?php if (isset($_GET['reg_merchant'])) {
                                                    echo "active";
                                                } ?>" href="my_account.php?reg_merchant"><i class="fas fa-store-alt"></i> Register Shop</a>
                    </li>

                <?php endif ?>

                <li>
                    <a class="profile-menu <?php if (isset($_GET['my_orders'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?my_orders" ><i class="fa fa-list"></i> My Orders</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['edit_account'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?edit_account=<?php if (isset($encode_id)) echo $encode_id; ?>"> <i class="fa fa-user-edit"></i> Edit Account</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['change_pass'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?change_pass=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fas fa-key"></i> Change Password</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['delete_account'])) {
                                                echo "active";
                                            } ?>" href="my_account.php?delete_account=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fa fa-trash"></i> Delete Account</a>
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