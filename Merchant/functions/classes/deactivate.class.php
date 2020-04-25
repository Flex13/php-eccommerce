<?php include_once('functions/send-email.php'); ?>
<?php
if (isset($_POST['Yes'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['token'])) { //Proccess login Form

        $shop_id = $_POST['hidden_shop_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $shop_id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $shop_username   = $row['m_username'];
                $shop_owner_name   = $row['m_name'];
                $shop_email      = $row['m_email'];
                $shop_id    = $row['m_id'];
                $shop_name    = $row['m_shop_name'];

                $deactivateQuery = $db->prepare("UPDATE merchant SET activated = :activated WHERE m_id = :id");
                $deactivateQuery->execute(array(':activated' => 0, ':id' => $shop_id));

                if ($deactivateQuery->rowCount() === 1) {
                    //Step 3 - Insert Row into Trash Table
                    $InsertRecord = $db->prepare("INSERT INTO trash (m_id,deleted_at) VALUES (:id, NOW())");
                    $InsertRecord->execute(array(':id' => $shop_id));

                    if ($InsertRecord->rowCount() === 1) {
                        //Step 4 - Send User an Notification via and display notification
                        //prepare email body
                        $mail_body = '<html>
                                    <body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
                                                        line-height:1.8em;">
                                    <h2>Account Deactivation - Kasi Mall Online</h2>
                                    <p>Dear ' . $shop_owner_name . '  <br><br>You have requested to deactivate your shop account ' . $shop_name . ',
                                    your information will be kept for 14 days. If you wish to continue using Kasi Mall Online, login to shop admin whithin 
                                    the next 14 days to reactivate your account or it will be permanently deleted.</p>
                                    <p><a href="https://localhost:8080/login.php">Login</a></p>
                                    <p><strong>&copy;2020 Kasi Mall online</strong></p>
                                    </body>
                                    </html>';

                        $mail->addAddress($shop_email, $shop_owner_name);
                        $mail->Subject = " Deactivate Account ";
                        $mail->Body = $mail_body;

                        //Error Handling for PHPMailer
                        if (!$mail->Send()) {
                            $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                        } else {
                            
                            $result = flashMessage("Your Shop Account information will be kept for 14 days. If you wish to continue using Kasi Mall Online, logout from your current session and login the shop Admin Dashboard whithin 
                            the next 14 days to reactivate your account or it will be permanently deleted.", "Pass");
                        }
                    } else {
                        $result = flashMessage("Could not complete operation. Please try again or Contact Admin1");
                    }
                } else {
                    $result = flashMessage("Could not complete operation. Please try again or Contact Admin2");
                }
            } else {
                $result = flashMessage("Could not complete operation. Please try again or Contact Admin3");
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
    if (validate_token($_POST['token'])) { //Proccess login Form
        echo "<script>window.open('index.php?orders','_self')</script>";
    } else {
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}


?>