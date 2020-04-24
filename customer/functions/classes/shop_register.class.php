<?php include_once('functions/send-email.php'); ?>
<?php



if (isset($_POST['registerShop'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array( 'Name', 'Email', 'Contact', 'Province', 'City','Address','Password');

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
        $shopname               = $_POST['Name'];
        $shopemail              = $_POST['Email'];
        $shopcontact            = $_POST['Contact'];
        $shopprovince           = $_POST['Province'];
        $shopcity               = $_POST['City'];
        $shopaddress               = $_POST['Address'];
        $password           = $_POST['Password'];
        $cpassword          = $_POST['Password2'];
        $date               = current_date();

        //CHeck Email exists 
         if (checkDuplicateEmail($email, $db)) {
            $result = flashMessage("Email Already Taken, please try another one");
        } else if ($password != $cpassword) {
            $result = flashMessage("Passwords to do not match, Please try again"); 
        } else if (empty($form_errors)) {

             //hash the password input
             $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sqlQuery = "SELECT * FROM customers WHERE id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array('id' => $user_hidden_id));
        
            while ($rs = $statement->fetch()) {
                $id = $rs['id'];
                $username = $rs['c_username'];
                $name = $rs['c_firstname'];
                $surname = $rs['c_surname'];
                $gender = $rs['c_gender'];
            }
            


            try {

                // create sql to insert into database
                $insert_merchant = "INSERT INTO merchant (user_id,m_shop_name,m_username,m_email,m_password,m_reg_date,m_name,m_surname,m_contact,m_gender,m_province,m_city,m_address)
            VALUES (:id,:shopname,:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city,:address)";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($insert_merchant);

                // Add the data into the database 
                $statement->execute(array(':id' => $id, ':shopname' => $shopname,':username' => $username, ':email' => $shopemail, ':password' => $password_hash, ':date' => $date, ':name' => $name, ':surname' => $surname, ':contact' => $shopcontact, ':gender' => $gender, ':province' => $shopprovince, ':city' => $shopcity, ':address' => $shopaddress));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {

                    $user_id = $db->lastInsertId();
                    $encode_id = base64_encode("encodeuserid{$user_id}");

                    //prepare email body
                    $mail_body = '<html>
                <body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
                                    line-height:1.8em;">
                <h2>Kasi Mall Online - Shop Login Details</h2>
                <p>Hi '.$name.' '.$surname.'<br><br>
                Welcome to Kasi Mall Online. Thank you for registering as a Merchant. Please Login and update your shop profile while we process your application. <br>
                Once done with shop profile update. Your account will be activated.</p><br><br>


                <p><a href="http://127.0.0.1:8080/customer/activate.php?id=' . $encode_id . '">Activate Shop Admin Account</a></p>
                <p><strong>&copy;2020 Kasi Mall online</strong></p>
                </body>
                </html>';

                    $mail->addAddress($email, $name);
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
