<?php
include "../connect.php";

// Get data from POST request
$wallet_address = $_POST['wallet_address'];
$withdraw_type = $_POST["withdraw_type"];
$amount = $_POST['amount_withdrawn'];
$transaction_id = rand(234, 90999);

// Generate withdrawal ID (e.g. using a timestamp)
$withdrawal_id = time();

// Set initial transaction status to "pending"
$transaction_status = "pending";

// Get current date and time
$date_time = date('Y-m-d H:i:s');

// Insert new row into withdraw_history table
$sql = "INSERT INTO withdraw_history (user_id, withdrawal_id, date_time, amount_withdrawn, withdrawal_type, transaction_status, withdrawal_address)
VALUES ('$transaction_id', '$withdrawal_id', '$date_time', '$amount', '$withdraw_type', '$transaction_status', '$wallet_address')";

if ($conn->query($sql) === TRUE) {
    // array to return on every request
    $response = array(
        "status"=>true,
        "message"=>"withraw request sent successfully"
    );
    // Output a success message
    echo json_encode($response);
} else {
    // array to return on every request
    $response = array(
        "status"=>true,
        "message"=>"withraw request failed"
    );
    // Output a success message
    echo json_encode($response);
}

// Close database connection
$conn->close();
?>
