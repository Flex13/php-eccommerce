<?php

//process the form if the reset password button is clicked
if (isset($_POST['Reset-link'], $_POST['token'])) {

    //validate token 
    if (validate_token($_POST['token'])) {
        //process the form
        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation
        $required_fields = array('email');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));


        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));

        //check if error array is empty, if yes process form data and insert record
        if (empty($form_errors)) {
            //collect form data and store in variables
            $email          = $_POST['email'];

            try {
                //create SQL select statement to verify if email address input exist in the database
                $sqlQuery = "SELECT * FROM customers WHERE c_email = :c_email";

                //use PDO prepared to sanitize data
                $statement = $db->prepare($sqlQuery);

                //execute the query
                $statement->execute(array(':c_email' => $email));


                //Check if Record exists
                if ($rs = $statement->fetch()) {
                    $username  = $rs['c_username'];
                    $firstname  = $rs['c_firstname'];
                    $surname    = $rs['c_surname'];
                    $email      = $rs['c_email'];
                    $user_id    = $rs['id'];
                    $encode_id = base64_encode("encodeuserid{$user_id}");


                    //prepare email body
                    $mail_body = '<html>
                <body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
                                    line-height:1.8em;">
                <h2>Password Reset - Kasi Mall Online</h2>
                <p>Dear ' . $firstname . '<br><br>To reset your password please click on the link below</p>
                <p><a href="https://bts-app.co.za/forgot_password.php?uid=' . $encode_id . '"> Reset Password</a></p>
                <p><strong>&copy;2020 Kasi Mall online</strong></p>
                </body>
                </html>';

                    $mail->addAddress($email, $firstname);
                    $mail->Subject = " Account Actvation ";
                    $mail->Body = $mail_body;

                    //Error Handling for PHPMailer
                    if (!$mail->Send()) {
                        $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                    } else {
                        $result = flashMessage("Email Sent. Please Check your email to activate account", "Pass");
                    }
                } else {
                    $result = flashMessage("The email address provided does not exist, please try again");
                }
            } catch (PDOException $ex) {
                $result = flashMessage("An error occurred: " . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There is an error in the form<br>");
            } else {
                $result = flashMessage("There were " . count($form_errors) . " error in the form<br>");
            }
        }
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}
