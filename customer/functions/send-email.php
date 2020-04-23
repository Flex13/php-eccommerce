<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'class.phpmailer.php';

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Port = 465;
                $mail->Host = 'smtp.gmail.com';
                $mail->IsHTML(true);
                $mail->Mailer = 'smtp';
                $mail->SMTPSecure = 'ssl';
                
                $mail->Username = 'psahouses@gmail.com';
                $mail->Password = '04011994Flex15'; 
                
                //Sender Info
                $mail->From = "info@kasimall.co.za";
                $mail->FromName = "Kasi Mall Online";
?>