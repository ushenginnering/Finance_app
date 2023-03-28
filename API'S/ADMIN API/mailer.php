<?php
include "../sendemail.php";
$send_to =  $_POST['send_to'];
$subject = $_POST['subject'];
$specific_user = $_POST['specific_user'];
$message = $_POST['body'];


       // SQL query to select the desired columns from the company_profile table
       $sql = "SELECT welcome_mail_draft, active_gmail_address, active_gmail_password, site_name FROM company_profile";
                    
       // Execute the SQL query and store the result set
       $result = mysqli_query($conn, $sql);
       while ($row = mysqli_fetch_assoc($result)) {
        $message =  $row["welcome_mail_draft"] ;
        $sender_email =  $sender_gmail_email = $row["active_gmail_address"] ;
        $sender_gmail_password =  $row["active_gmail_password"] ;
        $sender_name =  $row["site_name"] ;
       }


    if ($send_to === "specific user"){
        $sql = "SELECT * FROM users where mail = $specific_user";
    }else if ($send_to === "all user"){
        $sql = "SELECT * FROM users ";  
    }else if ($send_to === "active user"){
        $sql = "SELECT * FROM users where account_status = 'ACTIVE'";  
    }else{
        $sql = "SELECT * FROM users where account_status = 'INACTIVE'";   
    }
  
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           $user_mail =  $row['mail'];
           $fullname = $row['fullname'];
           $send_email =  sendmail($sender_email,$sender_gmail_password, $sender_name, $message,$sender_gmail_email,$subject, $user_mail,$fullname); 
           if ($send_email == 'Record saved successfully and email sent') {
                //echo "!"; 
                $response = array(
                    "email_status"=>true,
                    "message"=>"Email sent successfully",
                );
                echo json_encode($response);
            }else{
                $response = array(
                    "email_status"=>false,
                    "message"=>"Email could not be sent",
                );
                echo json_encode($response);
            }
    
        }
    }





?>