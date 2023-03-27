<?php
include "connect.php";
session_start();
// Define the transaction ID to update

if (isset($_POST['withdrawal_id']))
{
    $user_id = $_SESSION['user_id'];
    $transaction_id = $_POST['withdrawal_id'];

    // Update the transaction status to "approved"
    $sql = "UPDATE withdrawal_history SET transaction_status='declined' WHERE withdrawal_id= '$transaction_id'";

    if (mysqli_query($conn, $sql)) {
        // array to return on every request

        // reverse balance back to user wallet
        $sql2 = "SELECT withdraw_from, amount_withdrawn FROM withdrawal_history WHERE withdrawal_id = '$transaction_id'";

        $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
    // fetch the result row as an associative array
    $row = mysqli_fetch_assoc($result);
    $withdraw_from = $row['withdraw_from'];
    $amount = $row['amount_withdrawn'];
    }

    $new_sql = "SELECT balance, referral_bonus FROM accounts_info WHERE user_id = '$user_id'";

    $result_new = mysqli_query($conn, $new_sql);
    if (mysqli_num_rows($result_new) > 0) {
    // fetch the result row as an associative array
    $row_new = mysqli_fetch_assoc($result_new);
    $current_balance = $row_new['balance'];
    $current_referral_bonus = $row_new['referral_bonus'];
    }else{
        $current_balance = 0;
    }
    // return amount if declined
        if($withdraw_from == "balance"){
            $return_amount_sql = "UPDATE accounts_info SET balance = $current_balance + $amount WHERE user_id = '$user_id'";
        }
        elseif($withdraw_from == "referral"){
            $return_amount_sql = "UPDATE accounts_info SET referral_bonus = $current_referral_bonus + $amount WHERE user_id = '$user_id'";
        }
        if(mysqli_query($conn, $return_amount_sql)){
            $response = array(
                "status"=>true,
                "message"=>"Transaction decline status updated successfully.",
            );

            echo json_encode($response);
        }else{
            $response = array(
                "status"=>false,
                "message"=>"Transaction decline update failed.",
            );
            // Output a success message
            echo json_encode($response);
        }
        // Output a success message
    } else {
        $response = array(
            "status"=>false,
            "message"=>"Transaction decline update failed.",
        );
        // Output a success message
        echo json_encode($response);
    }

}

?>
