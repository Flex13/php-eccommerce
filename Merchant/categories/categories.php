<link rel="stylesheet" href="styles/style.css" />

<div class="box product-box">
        <div class="section-title">
            <h3 class="title">My Product Categories</h3><br>
        </div>

    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <p class="text-muted">You currently have <?php echo $count; ?> Categories</p>
    <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
            <!-- table-responsive Begin -->
            <table class="table ">
                <!-- table Begin -->
                <thead class="thead-dark text-center">
                    <!-- thead Begin -->
                    <tr>
                        <!-- tr Begin -->
                        <th>Category</th>
                        <th>Category Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr><!-- tr Finish -->
                </thead><!-- thead Finish -->


                <tbody class="text-center">
                    <!-- tbody Begin -->
                    <?php 
                     while ($rs = $statement->fetch()) {
                        $cat_id = $rs['cat_id'];
                        $shop_id = $rs['m_id'];
                        $shop_user_id  = $rs['m_user_id'];
                        $category_name  = $rs['category_name'];
                        $category_description  = $rs['category_description'];
                        ?>
                    
                    <tr>
                        <!-- tr Begin -->
                        <td><?php echo $rs['category_name']; ?></td>
                        <td><?php echo $rs['category_description']; ?></td>
                        <td><a href="category.php?edit_category=<?php if (isset($cat_id)) echo $cat_id; ?>" class="btn table-link-info btn-block">Edit</a></td>
                        <td><a href="category.php?delete_category=<?php if (isset($cat_id)) echo $cat_id; ?>" class="btn table-link-danger btn-block"><i class="fa fa-trash"></i> Delete</a></td>
                    </tr><!-- tr Finish -->
                     <?php }?>
                </tbody><!-- tbody Finish -->
            </table>
        </div>
    </form>
</div>