<?php

if ((isset($_SESSION['m_id']) || isset($_GET['addcategories'])) && !isset($_POST['addCategory'])) {
    if (isset($_GET['addcategories'])) {
        $url_encoded_id = $_GET['addcategories'];
        $decode_id = base64_decode($url_encoded_id);
        $shop_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $shop_id_array[1];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_user_id  = $rs['user_id'];
        
    }
    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} else if (isset($_POST['addCategory'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        // Get all records from inputs
        $shop_category_name         = $_POST['Name'];
        $shop_category_description         = $_POST['Description'];
        $shop_hidden_id         = $_POST['hidden_shop_id'];
        


        if (empty($form_errors)) {
            try {

                $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
                $statement = $db->prepare($sqlQuery);
                $statement->execute(array('id' => $shop_hidden_id));
            
                while ($rs = $statement->fetch()) {
                    $shop_id = $rs['m_id'];
                    $shop_user_id  = $rs['user_id'];
                    
                }

                // create sql to insert into database
                $insert_category = "INSERT INTO category (m_id,m_user_id,category_name,category_description) VALUES (:shop_id,:shop_user_id,:category_name,:category_description)";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($insert_category);

                // Add the data into the database 
                $statement->execute(array(':shop_id' => $shop_id, ':shop_user_id' => $shop_user_id, ':category_name' => $shop_category_name, ':category_description' => $shop_category_description));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $result = flashMEssage("Category Added", "Pass");
                    $_SESSION['successMessage'] = "Category Added";
                    echo "<script>window.open('/Merchant/category.php?categories=ZW5jb2RldXNlcmlkMQ==','_self')</script>";
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
