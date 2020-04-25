<?php include_once('functions/send-email.php'); ?>
<?php



if (isset($_POST['registerShop'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array( 'Name', 'Email', 'Contact', 'Province', 'City','Password');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));


        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3, 'Contact' => 10, 'Password' => 6);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));




        // Get all records from inputs
        $user_hidden_id         = $_POST['hidden_id'];
        $shop_name               = $_POST['Name'];
        $shop_email              = $_POST['Email'];
        $shop_contact            = $_POST['Contact'];
        $shop_province           = $_POST['Province'];
        $shop_city               = $_POST['City'];
        $shop_password           = $_POST['Password'];
        $shop_cpassword          = $_POST['Password2'];
        $shop_date               = current_date();

        //CHeck Email exists 
         if (checkDuplicateShopEmail($shop_email, $db)) {
            $result = flashMessage("Email Already Taken, please try another one");
        } else if ($shop_password != $shop_cpassword) {
            $result = flashMessage("Passwords to do not match, Please try again"); 
        } else if (empty($form_errors)) {

             //hash the password input
             $shop_password_hash = password_hash($shop_password, PASSWORD_DEFAULT);

            $sqlQuery = "SELECT * FROM customers WHERE id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array('id' => $user_hidden_id));
        
            while ($rs = $statement->fetch()) {
                $shop_owner_user_id = $rs['id'];
                $shop_owner_username = $rs['c_username'];
                $shop_owner_name = $rs['c_firstname'];
                $shop_owner_surname = $rs['c_surname'];
                $shop_owner_gender = $rs['c_gender'];
            }
            


            try {

                // create sql to insert into database
                $insert_merchant = "INSERT INTO merchant (user_id,m_shop_name,m_username,m_email,m_password,m_reg_date,m_name,m_surname,m_contact,m_gender,m_province,m_city)
            VALUES (:id,:shopname,:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city)";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($insert_merchant);

                // Add the data into the database 
                $statement->execute(array(':id' => $shop_owner_user_id, ':shopname' => $shop_name,':username' => $shop_owner_username, ':email' => $shop_email, ':password' => $shop_password_hash, ':date' => $shop_date, ':name' => $shop_owner_name, ':surname' => $shop_owner_surname, ':contact' => $shop_contact, ':gender' => $shop_owner_gender, ':province' => $shop_province, ':city' => $shop_city));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {

                    $shop_id = $db->lastInsertId();
                    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");

                    //prepare email body
                    $mail_body = '<html>
                <body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
                                    line-height:1.8em;">
                <h2>Kasi Mall Online - Shop Login Details</h2>
                <p>Hi '.$shop_owner_name.' '.$shop_owner_surname.'<br><br>
                Welcome to Kasi Mall Online. Thank you for registering as a Merchant. Please Login and update your shop profile while we process your application. <br>
                Once done with shop profile update. Your account will be activated.</p><br><br>


                <p><a href="http://127.0.0.1:8080/customer/activate.php?id=' . $shop_encode_id . '">Activate Shop Admin Account</a></p>
                <p><strong>&copy;2020 Kasi Mall online</strong></p>
                </body>
                </html>';

                    $mail->addAddress($shop_email, $shop_owner_name);
                    $mail->Subject = " Shop Actvation";
                    $mail->Body = $mail_body;

                    //Error Handling for PHPMailer
                    if (!$mail->Send()) {
                        $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                    } else {
                        $result = flashMessage("Registration Successful. Please check your email to activate your Shop Admin Account", "Pass");
                    }
                }
            } catch (PDOException $ex) {
                $result = flashMessage("An Error Occorrd" . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There was one error in the form<br>");
            } else {
            }
        }
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }


}


?>
