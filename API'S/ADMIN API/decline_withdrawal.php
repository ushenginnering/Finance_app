<?php
include "connect.php";
// Define the transaction ID to update

if (isset($_POST['withdrawal_id']))
{
    $transaction_id = $_POST['withdrawal_id'];

    // Update the transaction status to "approved"
    $sql = "UPDATE withdrawal_history SET transaction_status='declined' WHERE withdrawal_id= '$transaction_id'";

    if (mysqli_query($conn, $sql)) {
        // array to return on every request
        $response = array(
            "status"=>true,
            "message"=>"Transaction decline status updated successfully.",
        );
        // Output a success message
        echo json_encode($response);
    } else {
        // array to return on every request
        $response = array(
            "status"=>false,
            "message"=>"Transaction decline update failed.",
        );
        // Output a success message
        echo json_encode($response);
    }

}

?>
