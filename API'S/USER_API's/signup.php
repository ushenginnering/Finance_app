<?php
include "../connect.php";
$_POST['signup'] = "signup";

if (isset ($_POST['signup'])){ 
    // Get form data
    $fullname = $_POST['fullname'];  /*= "john"*/
    $country = $_POST['country']; /*= "Nigeria"*/
    $phone = $_POST['phone']; /*= "091 60 30 81 24"*/ 
    $password = $_POST['password']; /*= "12345"*/
    $confirm_password = $_POST['confirm_password']; /*= "12345"*/ 
    $user_mail = $_POST['mail']; // collect the email address of the user here
    $user_id =  rand(89,234324);
    $referred_by = $_POST['referred_by']; // collect the email address of the user here
    if($user_id == $referred_by){
        $referred_by = "";
    }

    /***************************************************************/
    /**************** use image handler for user image *************/
    /***************************************************************/
/*
    // Include the necessary file
    include "../handle_image.php";
    // Initialize the $image variable as an array and assign the uploaded file to it
    $image = array();
    $image  = $_FILES['image'];  
    // Specify the name of the column in the database where the image would be saved
    $db_image_holder =  "USER_IMAGE";
    // Specify the name of the table in the database where the user data is stored
    $db_table_name =  "users";
    // Specify the name of the column in the table that serves as the where guard
    $where_guard = "mail";
    // Specify the value of the where guard column that corresponds to the user whose image is being uploaded
    $guard_par =  $_POST['mail'];
    // Specify the directory where the uploaded file should be saved
    $target_dir = "../uploads/";
*/
    
    /***********************************************************************/
    /***********************************************************************/
    
// SQL query to select the desired columns from the company_profile table
$sql = "SELECT * FROM users where mail  = '$user_mail'";
                
// Execute the SQL query and store the result set
$result = mysqli_query($conn, $sql);
                
// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    $response = array(
        "registration_status"=>false,
        "email_status"=>false,
        "message"=>"Email already Exist",
    );
    echo json_encode($response);
    }
    else
    {
        if ($password == $confirm_password){
                // SQL query to insert data into table
                $sql = "INSERT INTO users (fullname, country, phone, password, mail, user_id, refered_by) VALUES ('$fullname', '$country', '$phone', '$password', '$user_mail', '$user_id','$referred_by')";

                // Execute query
                if (mysqli_query($conn, $sql)) {
                
/*************************************************************** */
/***************  this code was added to add image ****************/
/****************************************************************/
            /*
                // handle image 
                $handle_image  = handle_image($image, $image_name,$image_temp_name, $db_image_holder, $db_table_name, $where_guard, $guard_par,$target_dir,$conn);
                if ($handle_image == "image updated successfully." )
                {
                    $image_upload_response = array(
                        "image_upload_status"=>true,
                        "image_upload_message"=>"image saved successfully"
                    );
                    echo json_encode($image_upload_response);
                }else{
                
                    $image_upload_response = array(
                        "image_upload_status"=>false,
                        "image_upload_message"=>"image didn't saved successfully"
                    );
                    echo json_encode($image_upload_response); 
                }
                */
/*******************************************************************/
/***************************code end here **************************/
/*******************************************************************/

    
                    if(mysqli_query($conn, "INSERT INTO referral_history (user_id, referred_by, referral_name, referral_email) VALUES ('$user_id', '$referred_by', '$fullname', '$user_mail')")){
                    }
                    // echo "User signed up successfully!";
                    // send welcome mail user
                
                    // SQL query to select the desired columns from the company_profile table
                    $sql = "SELECT welcome_mail_draft, active_gmail_address, active_gmail_password, site_name FROM company_profile";
                    
                    // Execute the SQL query and store the result set
                    $result = mysqli_query($conn, $sql);
                    
                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row and output the data

                        $sql_create_account_info = "INSERT INTO accounts_info (user_id, active_investments, total_profit, balance, referral_link) VALUES ('$user_id', 'NULL', '0', '0', 'http://localhost/Finance_app/user/signup.php?ref=$user_id')";
                        
                        if(mysqli_query($conn, $sql_create_account_info)){
                            echo 'set';
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            $message =  $row["welcome_mail_draft"] ;
                            $sender_email =  $sender_gmail_email = $row["active_gmail_address"] ;
                            $sender_gmail_password =  $row["active_gmail_password"] ;
                            $sender_name =  $row["site_name"] ;
                            $subject = "Welcome to ".$sender_name;
                            include "../sendemail.php";
                            $send_email =  sendmail($sender_email,$sender_gmail_password, $sender_name, $message,$sender_gmail_email,$subject, $user_mail,$fullname);
                            if ($send_email == 'Record saved successfully and email sent') {
                                //echo "!"; 
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
}
?>
