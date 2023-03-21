<?php
// Set the values for the new deposit record
$user_id = 1234; // Replace with actual user ID
$transaction_id = 'ABC123'; // Replace with actual transaction ID
$amount_deposited = 100.00; // Replace with actual deposit amount
$deposit_type = 'Credit Card'; // Replace with actual deposit type
$transaction_status = 'Pending'; // Replace with actual transaction status
$deposit_proof = file_get_contents('path/to/deposit_proof.jpg'); // Replace with actual file path

// Prepare the SQL query
$sql = "INSERT INTO deposit_history (user_id, transaction_id, amount_deposited, deposit_type, transaction_status, deposit_proof) 
        VALUES ('$user_id', '$transaction_id', '$amount_deposited', '$deposit_type', '$transaction_status', '$deposit_proof')";

// Create a prepared statement
// Execute the prepared statement
if (mysqli_query($conn, $sql)) {
    // Deposit record inserted successfully
    echo "Deposit record inserted successfully.";
} else {
    // Error occurred while inserting deposit record
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
