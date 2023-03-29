<?php
include "connect.php";
// Define the transaction ID to update
session_start();

if (isset($_POST['transaction_id']))
{
    $transaction_id = $_POST['transaction_id'];
    $user_id = $_SESSION['user_id'];
    // Update the transaction status to "approved"
    $sql = "UPDATE investment_history SET transaction_status = 'declined' WHERE transaction_id = '$transaction_id'";
    if (mysqli_query($conn, $sql)) {
        // array to return on every request
        $sql2 = "SELECT amount_invested FROM investment_history WHERE transaction_id = '$transaction_id'";
   
        $result = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result) > 0) {
        // fetch the result row as an associative array
        $row = mysqli_fetch_assoc($result);
        $amount = $row['amount_invested'];
        }
        $new_sql = "SELECT balance FROM accounts_info WHERE user_id = '$user_id'";
        
        $result_new = mysqli_query($conn, $new_sql);
         if (mysqli_num_rows($result_new) > 0) {
    // fetch the result row as an associative array
            $row_new = mysqli_fetch_assoc($result_new);
            $current_balance = $row_new['balance'];
            }else{
        $current_balance = 0;
        }

        $return_amount_sql = "UPDATE accounts_info SET balance = $current_balance + $amount WHERE user_id = '$user_id'";

        if(mysqli_query($conn, $return_amount_sql)){

            $response = array(
            "status"=>true,
            "message"=>"Transaction decline status updated successfully.",
        );
        // Output a success message
        echo json_encode($response);
    }else{
        $response = array(
            "status"=>false,
            "message"=>"Transaction decline update failed.",
        );
        // Output a success message
        echo json_encode($response);
    }
    } else {
    //     // array to return on every request
        $response = array(
            "status"=>false,
            "message"=>"Transaction decline update failed.",
        );
        // Output a success message
        echo json_encode($response);
    }

}

?>
