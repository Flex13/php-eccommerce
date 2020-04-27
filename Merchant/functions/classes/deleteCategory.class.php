
<?php
if (isset($_POST['deleteCategory'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        $shop_cat_id = $_GET['delete_category'];

        try {
            $sqlQuery = "SELECT cat_id FROM category WHERE cat_id = :cat_id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array('cat_id' => $shop_cat_id));


            while ($rs = $statement->fetch()) {
                $cat_id = $rs['cat_id'];
            }

            $db->exec("DELETE FROM category WHERE cat_id = $cat_id LIMIT 1");
            $result = flashMEssage("Delete Successfull", "Pass");
            $_SESSION['successMessage'] = "Category Deleted";
                    echo "<script>window.open('/merchant/category.php?categories=ZW5jb2RldXNlcmlkMQ==','_self')</script>";

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
    } else {
       //Throw and error
       $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}



?>