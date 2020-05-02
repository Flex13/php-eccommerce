<?php include_once('functions/send-email.php'); ?>
<?php



if (isset($_POST['register'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Username', 'Name', 'Surname', 'Email', 'Contact', 'Gender', 'Province', 'City', 'Password');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Form validation to be passed to function of check_empty_date();
        $required_date = array('Date');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_date($required_date));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Username' => 3, 'Name' => 3, 'Surname' => 3, 'Contact' => 10, 'Password' => 6);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));




        // Get all records from inputs
        $username           = $_POST['Username'];
        $name               = $_POST['Name'];
        $surname            = $_POST['Surname'];
        $email              = $_POST['Email'];
        $contact            = $_POST['Contact'];
        $gender            = $_POST['Gender'];
        $province           = $_POST['Province'];
        $city               = $_POST['City'];
        $password           = $_POST['Password'];
        $cpassword          = $_POST['Password2'];
        $ip               = getRealIpUser();
        $dob                = $_POST['Date'];
        $date               = current_date();

        //CHeck Username exists 
        if (checkDuplicateUsername($username, $db)) {
            $result = flashMessage("Username Already Taken, please try another one");

            //CHeck Email exists 
        } else if (checkDuplicateEmail($email, $db)) {
            $result = flashMessage("Email Already Taken, please try another one");
        } else if ($password != $cpassword) {
            $result = flashMessage("Passwords to do not match, Please try again");
            //check if error array is empty, if yes process form data and insert record
        } else if (empty($form_errors)) {

            //hash the password input
            $password_hash = password_hash($password, PASSWORD_DEFAULT);


            try {

                // create sql to insert into database
                $insert_customer = "INSERT INTO customers (c_username,c_email,c_password,c_reg_date,c_firstname,c_surname,c_contact,c_gender,c_country,c_province,c_city,ip_address)
            VALUES (:username,:email,:password,:date,:name,:surname,:contact,:gender,:country,:province,:city,:ipAddress)";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($insert_customer);



                // Add the data into the database 
                $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $password_hash, ':date' => $date, ':name' => $name, ':surname' => $surname, ':contact' => $contact, ':gender' => $gender, ':province' => $province, ':country' => 'South Africa', ':city' => $city, ':ipAddress' => $ip));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {

                    $user_id = $db->lastInsertId();
                    $encode_id = base64_encode("encodeuserid{$user_id}");

                    //prepare email body
                    $mail_body = '<html>
                    <style type="text/css">
                        .link__btn:hover {
                            background-color: #00c551 !important
                        }
                    </style>
                    <div style="background-color: #FF8800; padding: 20px 0; margin:0">
                    <div style="max-width:600px; margin:0 auto; padding: 40px; background:#ffffff; font-size: 14px; border:1px solid #cccccc; border-radius: 4px; font-family: arial,sans-serif; line-height: 1.7em; color: #555555">
                    

                <h2 style="font-weight:600; color: #FF8800;">Kasi Mall Online - Account Activation</h2>
                <div>
                <p>Hi <b> ' . $name . '</b><br><br>Thank you for registering, please click on the link below to
                    confirm your email address</p>
                </div>

                <div style="padding: 20px;">
                <p><a class="link__btn" style="padding: 14px; font-size: 18px; background-color:#848484; border-radius: 8px; display: block; color: #ffffff; text-align: center; text-decoration: none; cursor: pointer" href="https://bts-app.co.za/activate.php?id=' . $encode_id . '"> Confirm Email</a></p>
                </div>

                <div style="padding: 40px 0; font-size: 12px; color: #999999; border-top:1px solid #e2e2e2">
                <h2 style="font-size: 14px; padding: 0; line-height: 1em; margin: 0; font-weight: 500">&copy;2020 Kasi Mall online</h2>
                <p style="padding: 20px 0 0; font-size: 11px; font-weight: 200">
                <a href="#" style="padding: 0 8px; color: #0000ff">Tearms & Condtions</a>
                </p>
                </div>
                </div>
                </div>
                
                </body>
                </html>';

                    $mail->addAddress($email, $name);
                    $mail->Subject = " Account Actvation ";
                    $mail->Body = $mail_body;

                    //Error Handling for PHPMailer
                    if (!$mail->Send()) {
                        $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                    } else {
                        $result = flashMessage("Registration Successful. Please Check your email to activate account", "Pass");
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


    //activation
} else if (isset($_GET['id'])) {
    $encoded_id = $_GET['id'];
    $decode_id = base64_decode($encoded_id);
    $user_id_array = explode("encodeuserid", $decode_id);
    $id = $user_id_array[1];




    $sql = "UPDATE customers SET activated=:activated WHERE id=:id AND activated='0'";

    $statement = $db->prepare($sql);
    $statement->execute(array(':activated' => "1", ':id' => $id));

    if ($statement->rowCount() == 1) {
        $result = '<h2>Email Confirmed </h2>
    <p>Your email address has been verified, you can now <a href="login.php">login</a> with your email and password.</p>';
    } else {
        $result = "<p class='lead'>No changes made please contact site admin,
        if you have not confirmed your email before</p>";
    }
}


?>
