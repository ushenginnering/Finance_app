<?php

// Database credentials
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = "benjamin_finance_app"; // Database name 

// conn does not exist here 
// $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
// if (mysqli_query($conn, $sql)) {
//     echo "Database created successfully\n";
// } else {
//     echo "Error creating database: " . mysqli_error($conn) . "\n";
// }


// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password","$db_name") or die(mysqli_error($conn));

// Check connection
if (!$conn) {
    $response = array(
        "status"=>false,
        "message"=>"Not connected to database"
    );
    echo json_encode($response);
}

?>

