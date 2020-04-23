<?php include_once('functions/send-email.php'); ?>
<?php
if (isset($_POST['Yes'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        $id = $_POST['hidden_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM customers WHERE id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $username   = $row['c_username'];
                $firstname   = $row['c_firstname'];
                $email      = $row['c_email'];
                $user_id    = $row['id'];

                $deactivateQuery = $db->prepare("UPDATE customers SET activated = :activated WHERE id = :id");
                $deactivateQuery->execute(array(':activated' => 0, ':id' => $user_id));

                if ($deactivateQuery->rowCount() === 1) {
                    //Step 3 - Insert Row into Trash Table
                    $InsertRecord = $db->prepare("INSERT INTO trash (user_id,deleted_at) VALUES (:id, NOW())");
                    $InsertRecord->execute(array(':id' => $user_id));

                    if ($InsertRecord->rowCount() === 1) {
                        //Step 4 - Send User an Notification via and display notification
                        //prepare email body
                        $mail_body = '<html>
                                    <body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
                                                        line-height:1.8em;">
                                    <h2>Account Deactivation - Kasi Mall Online</h2>
                                    <p>Dear ' . $firstname . '<br><br>You have requested to deactivate your account,
                                    your information will be kept for 14 days. If you wish to continue using Kasi Mall Online, login whithin 
                                    the next 14 days to reactivate your account or it will be permanently deleted.</p>
                                    <p><a href="http://localhost:8080/login.php">Login</a></p>
                                    <p><strong>&copy;2020 Kasi Mall online</strong></p>
                                    </body>
                                    </html>';

                        $mail->addAddress($email, $firstname);
                        $mail->Subject = " Deactivate Account ";
                        $mail->Body = $mail_body;

                        //Error Handling for PHPMailer
                        if (!$mail->Send()) {
                            $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                        } else {
                            $result = flashMessage("Your account information will be kept for 14 days. If you wish to continue using Kasi Mall Online, login whithin 
                            the next 14 days to reactivate your account or it will be permanently deleted.", "Pass");
                        }
                    } else {
                        $result = flashMessage("Could not complete operation. Please try again or Contact Admin");
                    }
                } else {
                    $result = flashMessage("Could not complete operation. Please try again or Contact Admin");
                }
            } else {
                signout();
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
    } else {
        //Throw and error
       
    }



    
}


if (isset($_POST['No'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) {//Proccess login Form
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    } else {
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
   
}


?>