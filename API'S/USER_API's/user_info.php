<?php
session_start();
include "../connect.php";
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION['user_id'];
}
// Build the SQL query to retrieve data from the deposit_history table
$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND account_status = 'ACTIVE'";

// Execute the query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Create an array to hold the users history data
    $users_history = array();

    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        $users_history[] = $row;

    // Encode the deposit history array as JSON and output it
    
    // array to return on every request
}
$users_data = json_encode($users_history);
    $response = array(
        "status"=>true,
        "message"=>$users_history,
    );
    // Output a success message
    echo json_encode($response);
} else {
    // Output an error message if there are no rows in the result set
     // array to return on every request
     $response = array(
        "status"=>false,
        "message"=>"No user data found"
    );
    // Output a success message
    echo json_encode($response);
}
?>