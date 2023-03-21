<?php
// Start the session
session_start();
// Set your database credentials
include '../connect.php';

// Escape the variables to prevent SQL injection
$user_email = mysqli_real_escape_string($conn, $user_email);
$password = mysqli_real_escape_string($conn, $password);

// Build the SQL query
$sql = "SELECT user_id FROM users WHERE email = '$user_email' AND password = '$password'";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the user ID in a session variable
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    
    // Output a success message
    echo "Login successful";
} else {
    // Output an error message
    echo "Invalid login credentials";
}

?>
