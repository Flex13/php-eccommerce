<?php


if (isset($_POST['changeOwnerPassword'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Old-Password', 'New-Password', 'Confirm-Password');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Old-Password' => 6, 'New-Password' => 6, 'Confirm-Password' => 6);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));






        if (empty($form_errors)) {
            // Get all records from inputs
            $shop_oldpassword        = $_POST['Old-Password'];
            $shop_newpassword         = $_POST['New-Password'];
            $shop_confirmpassword            = $_POST['Confirm-Password'];
            $shop_id =                 $_POST['hidden_shop_id'];

            if ($shop_newpassword != $shop_confirmpassword) {
                $result = flashMEssage("New Password does not match confirm Confirm Password");
            } else {
                try {

                    //check current password matches in database
                    $sqlQuery = "SELECT m_password FROM merchant WHERE m_id = :id";

                    // use PDO to prepare and sanitize the data
                    $statement = $db->prepare($sqlQuery);

                    // Add the data into the database 
                    $statement->execute(array(':id' => $shop_id));


                    //check if row exists in database
                    if ($row = $statement->fetch()) {
                        $shop_password_from_db = $row['m_password'];

                        //check password with the one in database
                        if (password_verify($shop_oldpassword, $shop_password_from_db)) {
                            //if true process the form
                            //hash the new password

                            $shop_hashed_password = password_hash($shop_newpassword, PASSWORD_DEFAULT);
                            //check current password matches in database
                            $sqlQuery = "UPDATE merchant SET m_password = :password WHERE m_id = :id";

                            // use PDO to prepare and sanitize the data
                            $statement = $db->prepare($sqlQuery);

                            // Add the data into the database 
                            $statement->execute(array(':password' => $shop_hashed_password, ':id' => $shop_id));

                            if ($statement->rowcount() === 1){
                                $result = flashMessage("Password Updated Successfully", "Pass");
                            } else {
                                $result = flashMessage("No changes saved");
                            }

                        } else {
                            $result = flashMEssage("Old Password in not correct. Please try again");
                        }
                    } else {
                        signout();
                    }

                } catch (PDOException $ex) {
                    $result = flashMessage("An Error Occerred" . $ex->getMessage());
                }
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

?>