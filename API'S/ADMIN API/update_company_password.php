<?php
include "../connect.php";

if (isset($_POST['update_company_password'])){
    // Get form data
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password =  $_POST['confirm_password'];
 


if ($new_password ==  $confirm_password){
    // Prepare the MySQL query to check for matching records
    $query = "SELECT * FROM companyprofile WHERE admin_password ='$old_password'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check for errors in the query execution
            if (!$result) {
            // array to return on every request
            $response = array(
                "status"=>false,
                "message"=> "processing error"
            );
            // Output a success message
            echo json_encode($response);
    }

    // Check if any matching records were found
    if (mysqli_num_rows($result) > 0) {
            // Build the SQL query
            $sql = "UPDATE companyprofile SET admin_password = '$new_password'";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                   // array to return on every request
                    $response = array(
                        "status"=>true,
                        "message"=> "success"
                    );
                    // Output a success message
                    echo json_encode($response);
            } else {
                   // array to return on every request
                    $response = array(
                        "status"=>false,
                        "message"=> "failed to update"
                    );
                    // Output a success message
                    echo json_encode($response);
            }

            // Close
    } else {
           // array to return on every request
     $response = array(
        "status"=>false,
        "message"=> "old password mis-match"
    );
    // Output a success message
    echo json_encode($response);
    }    
}else{
      // array to return on every request
      $response = array(
        "status"=> false,
        "message"=> "Password Mismatch"
    );
    // Output a success message
    echo json_encode($response);
}


}