<?php
include "../connect.php";


$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];

if ($new_pass  ==  $confirm_pass){
    $temp_pass = $_POST['temp_pass'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $temp_pass = mysqli_real_escape_string($conn, $temp_pass);
    $current_date_time = date("Y-m-d H:i:s");


    // Prepare and execute the query
    $sql = "SELECT * FROM users WHERE mail = '$email' AND temp_pass = '$temp_pass' AND temp_pass_end_time < '$current_date_time'";
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and process data
        while ($row = mysqli_fetch_assoc($result)) {
          
            // Prepare and execute the query
            $sql = "UPDATE users SET password = '$new_pass' WHERE email = '$email'";
            if (mysqli_query($conn, $sql)) {
                $response = array(
                    "new_pass_status"=>true,
                    "message"=>"Create password successful",
                );
                echo json_encode($response);
            } else {
                $response = array(
                    "new_pass_status"=>false,
                    "message"=>"Create password failed",
                );
                echo json_encode($response);
            }

        }
    } else {
        echo "No results found.";
    }
}


?>