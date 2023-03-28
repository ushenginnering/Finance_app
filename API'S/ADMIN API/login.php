<?php
// Start the session
session_start();
// Set your database credentials
include 'connect.php';

if (isset ($_POST['admin_email'])){
// Escape the variables to prevent SQL injection
$user_email = mysqli_real_escape_string($conn, $_POST["admin_email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

// Build the SQL query
$sql = "SELECT admin_email FROM company_profile WHERE admin_email = '$user_email' AND admin_password = '$password'";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the user ID in a session variable
    $row = $result->fetch_assoc();
    $_SESSION['admin_email'] = $row['admin_email'];
    
    // array to return on every request
    $response = array(
        "status"=>true,
        "message"=>"Login succesful"
    );
    // Output a success message
    echo json_encode($response);
} else {
    $response = array(
        "status"=>false,
        "message"=>"Invalid login credentials"
    );
    // Output an error message
    echo json_encode($response);
}

}


?>
