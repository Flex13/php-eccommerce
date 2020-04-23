<?php

//process the form if the reset password button is clicked
if (isset($_POST['Reset-pass'], $_POST['token'])) {

    //validate token 
    if(validate_token($_POST['token'])) {
        //proccess the form
        //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('New-Password', 'Confirm-Password');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('New-Password' => 6, 'Confirm-Password' => 6);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //check if error array is empty, if yes process form data and insert record
    if (empty($form_errors)) {
        //collect form data and store in variables
        $id          = $_POST['user_id'];
        $password1      = $_POST['New-Password'];
        $password2      = $_POST['Confirm-Password'];

        //check if new password and confirm password is same
        if($password1 !== $password2){
            $result = flashMessage("New Password and Confirm password do not match");
        } else {
            try{
            //create SQL select statement to verify if email address input exist in the database
            $sqlQuery = "SELECT id FROM customers WHERE id = :id";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlQuery);

            //execute the query
            $statement->execute(array(':id' => $id));

            //check if record exist
            if($statement->rowCount() == 1){
                //hash the password
                $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                //SQL statement to update password
                $sqlUpdate = "UPDATE customers SET c_password =:c_password WHERE id=:id";

                //use PDO prepared to sanitize SQL statement
                $statement = $db->prepare($sqlUpdate);

                //execute the statement
                $statement->execute(array(':c_password' => $hashed_password, ':id' => $id)); 

                $result = flashMessage("Password Reset Successful. Please Login", "Pass");
            } else {
                $result = flashMessage("The User Does not exist");
            }
        }catch (PDOException $ex){
            $result = flashMessage("An error occurred: ".$ex->getMessage());
        }
    }
}
else{
    if(count($form_errors) == 1){
        $result = flashMessage("There was 1 error in the form<br>");
    }else{
        $result = flashMessage("There were " . count($form_errors) . " errors in the form<br>");;
    }
}
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");

    }
    
}
?>
