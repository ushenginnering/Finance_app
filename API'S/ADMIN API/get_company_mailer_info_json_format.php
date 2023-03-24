<?php
include "../connect.php";


// Retrieve data from the database
    $sql = "SELECT active_gmail_address,active_gmail_password,system_auto_send_from_email_address,system_reply_email_address FROM company_profile";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // Store the data in an array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Convert the data to JSON format
    $json_data = json_encode($data);

     // array to return on every request
     $response = array(
        "status"=>true,
        "message"=> $json_data
    );
    // Output a success message
    echo json_encode($response);
}else{
    $response = array(
        "status"=>false,
        "message"=>"no data found"
    );
    // Output an error message
    echo json_encode($response);
}

    ?>