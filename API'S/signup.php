<?php
include "connect.php";


if (isset ($_POST['signup'])){

// Get form data
$fullname = $_POST['fullname']  ;
$country = $_POST['country'];
$phone = $_POST['phone'] ;
$password = $_POST['password'] ;
$mail = $_POST['mail'] ;

// SQL query to insert data into table
$sql = "INSERT INTO users (fullname, country, phone, password, mail) VALUES ('$fullname', '$country', '$phone', '$password', '$mail')";

// Execute query
if (mysqli_query($conn, $sql)) {
    echo "User signed up successfully!";
    // send welcome mail user
   
    // SQL query to select the desired columns from the company_profile table
    $sql = "SELECT welcome_mail_draft, active_gmail_address, active_gmail_password FROM company_profile";
    
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

            include "sendemail.php";
            $send_email =  sendmail($sender_email,$sender_gmail_password, $sender_name, $message,$sender_gmail_email,$subject);
            if ($send_email == 'Record saved successfully and email sent') {
                echo "Welcome Email sent successfully!"; 
            }else{
                echo $send_email;
            }
        }
    } else {
        echo "No results found";
    }
} else {
    echo "Error signing up user: " . mysqli_error($conn);
}


}
?>