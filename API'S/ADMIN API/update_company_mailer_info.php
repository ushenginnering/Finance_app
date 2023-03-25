<?php
include "../connect.php";


if (isset($_POST['update_mailer_info'])){
    // Get form data
    $active_gmail_address = $_POST['active_gmail_address'];
    $active_gmail_password = $_POST['active_gmail_password'];
    $system_auto_send_from_email_address = $_POST['system_auto_send_from_email_address'];
    $system_reply_email_address = $_POST['system_reply_email_address'];


    $sql = "UPDATE company_profile  SET active_gmail_address = '$active_gmail_address', active_gmail_password = '$active_gmail_password', system_auto_send_from_email_address = '$system_auto_send_from_email_address', system_reply_email_address = '$system_reply_email_address'";
   // Execute the SQL query and store the result set
    if (mysqli_query($conn, $sql)){
            // array to return on every request
     $response = array(
        "status"=>true,
        "message"=> "mailer info updated"
    );
    // Output a success message
    echo json_encode($response);
    }else{
           // array to return on every request
     $response = array(
        "status"=>false,
        "message"=> "failed to update mailer info"
    );
    // Output a success message
    echo json_encode($response);
    }

}

?>