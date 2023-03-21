<?php
// Set your database credentials
include '../connect.php';

// Escape the variables to prevent SQL injection
$user_email = mysqli_real_escape_string($conn, $user_email);
$password = mysqli_real_escape_string($conn, $password);

// Build the SQL query
$sql = "SELECT * FROM users WHERE email = '$user_email' AND password = '$password'";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "Login successful";
} else {
    echo "in valid login credencials";
}

// Close the database connection
$conn->close();
?>
