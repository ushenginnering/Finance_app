<?php
include "connect.php";


if (isset($_POST['update_email_drafts'])){
    // Get form data
    $welcome_draft= $_POST['welcome_draft'] ;
    $change_password_draft = $_POST['change_password_draft'] ;
    $forget_email_draft = $_POST['forget_password_draft'] ;
    $receive_patment_draft = $_POST['receive_payment_draft'] ;
    $site_name = "ush Finansis";

    $sql = "UPDATE company_profile  SET welcome_mail_draft = '$welcome_draft', change_password_mail_draft = '$change_password_draft', forget_password_mail_draft = '$forget_email_draft', receive_payment_mail_draft = '$receive_patment_draft'";
   // Execute the SQL query and store the result set
    if (mysqli_query($conn, $sql)){
        echo "email drafts updated successfully";
    }else{
        echo "failed to update email drafts";
    }

}

?>