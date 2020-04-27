<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title"></h3>

    <div class="checkbox-filter">
        <div class="input-checkbox">

            <ul class="nav nav-pills flex-column category-menu">
            


                <li>
                    <a class="profile-menu <?php if (isset($_GET['products'])) {
                                                echo "active";
                                            } ?>" href="products.php?products=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>"><i class="far fa-arrow-alt-circle-right"></i> My Products</a>
                </li>

                <li>
                    <a class="profile-menu <?php if (isset($_GET['addproducts'])) {
                                                echo "active";
                                            } ?>" href="products.php?addproducts=<?php if (isset($shop_encode_id)) echo $shop_encode_id; ?>"><i class="far fa-arrow-alt-circle-right"></i> Add Products</a>
                </li>

                <li>
                    <a class="profile-menu <?php if (isset($_GET['edit_product'])) {
                                                echo "active";
                                            } ?>" ><i class="far fa-arrow-alt-circle-right"></i>  Edit Product</a>
                </li>
                <li>
                    <a class="profile-menu <?php if (isset($_GET['delete_product'])) {
                                                echo "active";
                                            } ?>" ><i class="far fa-arrow-alt-circle-right"></i>  Delete Product</a>
                </li>
            </ul>

        </div>

    </div>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->