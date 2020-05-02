
<?php
if (isset($_POST['deleteProduct'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        $shop_product_id = $_GET['delete_product'];

        try {
            $sqlQuery = "SELECT product_id FROM products WHERE product_id = :product_id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array('product_id' => $shop_product_id));


            while ($rs = $statement->fetch()) {
                $cat_product_id = $rs['product_id'];
            }

            $db->exec("DELETE FROM products WHERE product_id = $cat_product_id LIMIT 1");
            $result = flashMEssage("Delete Successfull", "Pass");
            $_SESSION['successMessage'] = "Product Deleted";
            echo "<script>window.open('/Merchant/products.php?products=ZW5jb2RldXNlcmlkMQ==','_self')</script>";

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
    } else {
       //Throw and error
       $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}



?>