<?php
include "../connect.php";


if (isset($_POST['update_mailer_info'])){
    // Get form data
    $active_gmail_address = $_POST['active_gmail_address'];
    $active_gmail_password = $_POST['active_gmail_passsword'];
    $system_auto_send_from_email_address = $_POST['system_auto_send_from_email_address'];
    $system_reply_email_address = $_POST['system_reply_email_address'];


    $sql = "UPDATE company_profile  SET welcome_mail_draft = '$welcome_draft', change_password_mail_draft = '$change_password_draft', forget_password_mail_draft = '$forget_email_draft', receive_payment_mail_draft = '$receive_patment_draft'";
   // Execute the SQL query and store the result set
    if (mysqli_query($conn, $sql)){
        echo "email drafts updated successfully";
    }else{
        echo "failed to update email drafts";
    }

}

?>