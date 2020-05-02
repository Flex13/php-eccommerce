<?php

if ((isset($_SESSION['m_id']) || isset($_GET['edit_product'])) && !isset($_POST['editProduct'])) {
    if (isset($_GET['edit_product'])) {
        $product_id = $_GET['edit_product'];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM products WHERE product_id = :product_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('product_id' => $product_id));

    while ($rs = $statement->fetch()) {
        $product_id = $rs['product_id'];
        $shop_product_name  = $rs['product_name'];
        $shop_product_description  = $rs['product_description'];
        $shop_product_category  = $rs['cat_name'];
        $shop_product_price = $rs['product_price'];
    }

    $sqlQuery1 = "SELECT * FROM category WHERE m_id = :id";
    $stmt = $db->prepare($sqlQuery1);
    $stmt->execute(array('id' => $shop_id));

} else if (isset($_POST['editProduct'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name', 'Category', 'Description', 'Price');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3, 'Description' => 10, 'Price' => 2);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        // Get all records from inputs
        $shop_Product_name         = $_POST['Name'];
        $shop_Product_description         = $_POST['Description'];
        $shop_Product_category         = $_POST['Category'];
        $shop_Product_price         = $_POST['Price'];
        $shop_product_id         = $_GET['edit_product'];



        if (empty($form_errors)) {
            try {

                // create sql to insert into database
                $update_product = "UPDATE products SET product_name=:product_name,product_description=:product_description,cat_name=:product_category,product_price=:product_price WHERE product_id=:product_id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_product);

                // Add the data into the database 
                $statement->execute(array(':product_name' => $shop_Product_name, ':product_description' =>  $shop_Product_description,':product_category' => $shop_Product_category,':product_price' => $shop_Product_price , ':product_id' => $shop_product_id ));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $result = flashMEssage("Update Successfull", "Pass");
                    $_SESSION['successMessage'] = "Product Updated";
                    echo "<script>window.open('/Merchant/products.php?products=ZW5jb2RldXNlcmlkMQ==','_self')</script>";
                }
            } catch (PDOException $ex) {
                $result = flashMessage("An Error Occerred" . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There was one error in the form<br>");
            } else {
                $result = flashMessage("There were " . count($form_errors) . " error in the form<br>");;
            }
        }
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}
