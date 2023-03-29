<?php
include "../../connect.php";

 $email = $_POST['confirm_email'];
 $sql_temp_pass =  rand(8945,3245834534);
 $current_time = time();
$future_time = $current_time + (15 * 60); // 15 minutes in seconds
$future_time_formatted = date("Y-m-d H:i:s", $future_time);

 $sql = "SELECT * from users where mail  = '$email'";
 $result  = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['fullname'];
        // SQL query to select the desired columns from the company_profile table
        $company_sql = "SELECT welcome_mail_draft, active_gmail_address, active_gmail_password, site_name FROM company_profile";
                    
        // Execute the SQL query and store the result set
        $result = mysqli_query($conn, $company_sql);
                    
                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row and output the data

                        $sql_temp_pass = "UPDATE users SET temp_pass = '$sql_temp_pass', temp_pass_end_time = '$future_time_formatted' WHERE mail = '$email'";
                        
                        if(mysqli_query($conn, $sql_temp_pass)){
                            echo 'set';
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            $message =  '<br>
                                         http://localhost/Finance_app/user/new_password.php?email='.$email.'&temp='.$sql_temp_pass;
                            $sender_email =  $sender_gmail_email = $row["active_gmail_address"] ;
                            $sender_gmail_password =  $row["active_gmail_password"] ;
                            $sender_name =  $row["site_name"] ;
                            $subject = "click to create a new password for your account";
                            include "../../sendemail.php";
                            $send_email =  sendmail($sender_email,$sender_gmail_password, $sender_name, $message,$sender_gmail_email,$subject, $email, $fullname);
                            if ($send_email == 'Record saved successfully and email sent') {
                                //echo "!"; 
                                $response = array(
                                    "validate_email_status"=>true,
                                    "email_status"=>true,
                                    "message"=>"Create Password Email sent successfully",
                                );
                                echo json_encode($response);
                            }else{
                                $response = array(
                                    "validate_email_status"=>true,
                                    "email_status"=>false,
                                    "message"=>"Create Password Email could not be sent",
                                );
                                echo json_encode($response);
                            }
                        }
                    } else {
                        $response = array(
                            "registration_status"=>true,
                            "email_status"=>false,
                            "message"=>"No results found",
                        );
                        echo json_encode($response);
                    }
 }else{
    $response = array(
        "status"=>false,
        "message"=>"Email address does not exist",
    );
    echo json_encode($response);
 }
?>