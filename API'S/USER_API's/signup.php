<?php
include "../connect.php";
$_POST['signup'] = "signup";

if (isset ($_POST['signup'])){ 
    // Get form data
    $fullname = $_POST['fullname'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $mail = $_POST['mail'];
    $user_id =  rand(89,234324);

    if ($password == $confirm_password){
            // SQL query to insert data into table
            $sql = "INSERT INTO users (fullname, country, phone, password, mail, user_id) VALUES ('$fullname', '$country', '$phone', '$password', '$mail', '$user_id')";

            // Execute query
            if (mysqli_query($conn, $sql)) {
                // echo "User signed up successfully!";
                // send welcome mail user
            
                // SQL query to select the desired columns from the company_profile table
                $sql = "SELECT welcome_mail_draft, active_gmail_address, active_gmail_password, site_name FROM company_profile";
                
                // Execute the SQL query and store the result set
                $result = mysqli_query($conn, $sql);
                
                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and output the data
                    while ($row = mysqli_fetch_assoc($result)) {
                        $message =  $row["welcome_mail_draft"] ;
                        $sender_email =  $sender_gmail_email = $row["active_gmail_address"] ;
                        $sender_gmail_password =  $row["active_gmail_password"] ;
                        $sender_name =  $row["site_name"] ;
                        $subject = "Welcome to ".$sender_name;
                        include "../sendemail.php";
                        $send_email =  sendmail($sender_email,$sender_gmail_password, $sender_name, $message,$sender_gmail_email,$subject);
                        if ($send_email == 'Record saved successfully and email sent') {
                            echo "!"; 
                            $response = array(
                                "registration_status"=>true,
                                "email_status"=>true,
                                "message"=>"Welcome Email sent successfully",
                            );
                            echo json_encode($response);

                        }else{
                            $response = array(
                                "registration_status"=>true,
                                "email_status"=>false,
                                "message"=>"Email could not be sent",
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
            } else {
                $response = array(
                    "registration_status"=>false,
                    "message"=>"Error signing up user",

                );
                // Output an error message
                echo json_encode($response);
            }

    }else{
        $response = array(
            "registration_status"=>false,
            "message"=>"Password does not match",

        );
        // Output an error message
        echo json_encode($response);
    }


}
?>