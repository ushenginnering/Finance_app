<?php
function sendmail($sender_email,$sender_gmail_password, $sender_name, $message,$sender_gmail_email,$subject, $user_email, $user_name){
       
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $sender_email;                 // SMTP username
        $mail->Password = $sender_gmail_password;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($sender_email, $sender_name);     // Add a recipient
        $mail->addAddress($user_email, $user_name);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        $mail->send();
        return 'Record saved successfully and email sent';
    } catch (Exception $e) {
       return 'Email could not be sent. Mailer Error: {$mail->ErrorInfo}';
    }
} 


?>