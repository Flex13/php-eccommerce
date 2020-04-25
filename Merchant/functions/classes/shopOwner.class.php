<?php

if ((isset($_SESSION['m_id']) || isset($_GET['m_details'])) && !isset($_POST['updateOwner'])) {
    if (isset($_GET['m_details'])) {
        $url_encoded_id = $_GET['m_details'];
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
        $shop_owner_name = $rs['m_name'];
        $shop_owner_surname = $rs['m_surname'];
        
    }

    
    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} else if (isset($_POST['updateOwner'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name','Surname');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3, 'Surname' => 3);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));




        // Get all records from inputs
        $shop_owner_username         = $_POST['hidden_shop_username'];
        $shop_owner_name         = $_POST['Name'];
        $shop_owner_surname         = $_POST['Surname'];
        $shop_hidden_id         = $_POST['hidden_shop_id'];
        


        if (empty($form_errors)) {
            try {

                



                // create sql to insert into database
                $update_customer = "UPDATE merchant SET m_name=:firstname,m_surname=:surname WHERE m_id=:id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_customer);

                // Add the data into the database 
                $statement->execute(array(':firstname' => $shop_owner_name, ':surname' => $shop_owner_surname, ':id' => $shop_hidden_id));

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
