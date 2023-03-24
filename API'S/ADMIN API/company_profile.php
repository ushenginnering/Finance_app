<?php
include "../connect.php";


// Set the parameter values
$welcome_mail = "Welcome on board to our website we are glad to have you here";
$change_password = "example123";
$forget_password = "example456";
$receive_payment = "paypal@example.com";
$active_gmail_address = "ushengineering@gmail.com";
$active_gmail_password = "gshhzscqgmwnlnbs";
$system_auto_send_from_email_address = "noreply@example.com";
$system_reply_email_address = "support@example.com";
$admin_email = "admin@example.com";
$admin_password = "admin123";
$site_url = "http://example.com";
$site_name = "ush Finansis";
$meta_keywords = "example, keywords, meta";
$meta_description = "This is an example of a meta description.";


// Prepare the SQL statement
 $sql = "INSERT INTO company_profile 
        (welcome_mail_draft, change_password_mail_draft, forget_password_mail_draft, receive_payment_mail_draft, active_gmail_address, active_gmail_password, system_auto_send_from_email_address, system_reply_email_address, admin_email, admin_password, site_url,site_name, meta_keywords, meta_description) 
        VALUES ( '$welcome_mail', '$change_password', '$forget_password', '$receive_payment', '$active_gmail_address', '$active_gmail_password', '$system_auto_send_from_email_address', '$system_reply_email_address', '$admin_email', '$admin_password', '$site_url','$site_name', '$meta_keywords', '$meta_description')";

if (mysqli_query($conn, $sql)){
    echo "working";
}else{
    echo "failed";
}

?>
