
<?php

if (isset($_POST['loginShop'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form


        //array to hold errors
        $form_errors = array();

        //Validate the form
        $required_fields = array('Email', 'Password');
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Password' => 6);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));



        if (empty($form_errors)) {
            //collect form data
            $shop_email = $_POST['Email'];
            $shop_password = $_POST['Password'];


            //check if user exist in the database
            $sqlQuery = "SELECT * FROM merchant WHERE m_email = :email";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':email' => $shop_email));



            if ($row = $statement->fetch()) {
                $shop_id = $row['m_id'];
                $shop_hashed_password = $row['m_password'];
                $shop_email = $row['m_email'];
                $shop_owner_username = $row['m_username'];
                $shop_activated = $row['activated'];
                $shop_user_type = $row['user_type'];
                $shop_owner_name = $row['m_name'];
                $shop_owner_surname = $row['m_surname'];

                if ($shop_activated == "0" ) {
                    //Check User in trash
                    $sqlQueryUser = "SELECT * FROM trash WHERE m_id = :id";
                    $statement = $db->prepare($sqlQueryUser);
                    $statement->execute(array(':id' => $shop_id));

                    if ($row = $statement->fetch()) {
                        //Activate Account
                        $sqlActivateUser = "UPDATE merchant SET activated = '1' WHERE m_id = :id LIMIT 1";
                        $statement = $db->prepare($sqlActivateUser);
                        $statement->execute(array(':id' => $shop_id));

                        //Remove User From Trash
                        $sqlRemoveUser =  "DELETE FROM trash WHERE m_id = :id LIMIT 1";
                        $statement = $db->prepare($sqlRemoveUser);
                        $statement->execute(array(':id' => $shop_id));

                        //Login User
                        prepLogin($shop_id, $shop_email, $shop_owner_username,$shop_user_type,$shop_owner_name,$shop_owner_surname);
                    } else {
                        $result = flashMessage("Please activate your account to login. Contact Admin. ");
                    }
                } else {
                    if (password_verify($shop_password, $shop_hashed_password)) {
                        if ($shop_user_type = 'merchant') {
                            prepLogin($shop_id, $shop_email, $shop_owner_username,$shop_user_type,$shop_owner_name,$shop_owner_surname);
                        } else {
                            $result = flashMessage("You are not registered as a Merchant");
                        }
                        
                        
                    } else {
                        $result = flashMessage("You have entered an invalid password");
                    }
                
                }
            } else {
                $result = flashMessage("You have entered and invalid email");
            }
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There is an error in the form<br>");
            } else {
                $result = flashMessage("There were " . count($form_errors) . " errors in the form<br>");
            }
        }
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}

?>