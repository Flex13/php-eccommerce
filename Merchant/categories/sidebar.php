<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title"></h3>

    <div class="checkbox-filter">
        <div class="input-checkbox">

            <ul class="nav nav-pills flex-column category-menu">
            


                <li>
                    <a class="profile-menu <?php if (isset($_GET['categories'])) {
                                                echo "active";
                                            } ?>" href="category.php?categories=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>"><i class="far fa-arrow-alt-circle-right"></i> My Categoires</a>
                </li>

                <li>
                    <a class="profile-menu <?php if (isset($_GET['addcategories'])) {
                                                echo "active";
                                            } ?>" href="category.php?addcategories=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>"><i class="far fa-arrow-alt-circle-right"></i> Add Category</a>
                </li>

                <li>
                    <a class="profile-menu <?php if (isset($_GET['edit_category'])) {
                                                echo "active";
                                            } ?>" ><i class="far fa-arrow-alt-circle-right"></i>  Edit Category</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['delete_category'])) {
                                                echo "active";
                                            } ?>" ><i class="far fa-arrow-alt-circle-right"></i>  Delete Category</a>
                </li>
            </ul>

        </div>

    </div>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->