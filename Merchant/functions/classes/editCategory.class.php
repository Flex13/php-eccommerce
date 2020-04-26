<?php

if ((isset($_SESSION['m_id']) || isset($_GET['edit_category'])) && !isset($_POST['editCategory'])) {
    if (isset($_GET['edit_category'])) {
        $cat_id = $_GET['edit_category'];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM category WHERE cat_id = :cat_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('cat_id' => $cat_id));

    while ($rs = $statement->fetch()) {
        $cat_id = $rs['cat_id'];
        $shop_category_name  = $rs['category_name'];
        $shop_category_description  = $rs['category_description'];
    }
} else if (isset($_POST['editCategory'], $_POST['token'])) {

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
        $shop_cat_id         = $_POST['hidden_cat_id'];
        


        if (empty($form_errors)) {
            try {

                // create sql to insert into database
                $update_category = "UPDATE category SET category_name=:cat_name,category_description=:cat_description WHERE cat_id=:cat_id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_category);

                // Add the data into the database 
                $statement->execute(array(':cat_name' => $shop_category_name, ':cat_description' =>  $shop_category_description, ':cat_id' => $shop_cat_id));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $result = flashMEssage("Update Successfull", "Pass");
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