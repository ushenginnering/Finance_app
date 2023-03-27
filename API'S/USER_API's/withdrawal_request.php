<?php
include "../connect.php";
session_start();

if(isset($_POST['wallet_address'])){
$user_id = $_SESSION['user_id'];
$wallet_address = $_POST['wallet_address'];
$withdraw_type = $_POST["withdraw_type"];
$amount = $_POST['amount_withdrawn'];
$withdraw_from = $_POST['withdraw_from'];
$wallet_total = $_POST['wallet_total'];

$withdrawal_id = time();

// Set initial transaction status to "pending"
$transaction_status = "pending";

// Get current date and time
$date_time = date('Y-m-d H:i:s');

// Insert new row into withdraw_history table
$sql = "INSERT INTO withdrawal_history (user_id, withdrawal_id, date_time, amount_withdrawn, withdrawal_type, transaction_status, withdrawal_address, withdraw_from)
VALUES ('$user_id', '$withdrawal_id', '$date_time', '$amount', '$withdraw_type', '$transaction_status', '$wallet_address', '$withdraw_from')";

if (mysqli_query($conn, $sql)) {
    // array to return on every request
    $balance_result = mysqli_query($conn, "SELECT balance FROM accounts_info WHERE user_id = '$user_id'");
    if (mysqli_num_rows($balance_result) > 0) {
        // fetch the result row as an associative array
        $row_balance = mysqli_fetch_assoc($balance_result);
        $balance = $row_balance['balance'];
    }else{
        $balance = 0;
    }
    $referral_balance_sql = mysqli_query($conn, "SELECT referral_bonus FROM accounts_info WHERE user_id = '$user_id'");
    if (mysqli_num_rows($referral_balance_sql) > 0) {
        // fetch the result row as an associative array
        $referral_balance_row = mysqli_fetch_assoc($referral_balance_sql);
        $referral_balance = $referral_balance_row['referral_bonus'];
    }else{
        $referral_balance = 0;
    }

    // $update_sql = ''
    if($withdraw_from == "balance"){
        if($balance !== 0){
            $update_sql = "UPDATE accounts_info SET balance = $balance - $amount WHERE user_id = '$user_id'";       
         }
            
        }   elseif($withdraw_from == "referral"){
            if($referral_balance !== 0){

                $update_sql = "UPDATE accounts_info SET referral_bonus = $referral_balance - $amount WHERE user_id = '$user_id'";        
            }
            }

            if(mysqli_query($conn, $update_sql)){
                $response = array(
                    "status"=>true,
                    "message"=>"withraw request sent successfully"
                );
                echo json_encode($response);
            }else{
                $response = array(
                    "status"=>false,
                    "message"=>"withraw request failed"
                );
                // Output a success message
                echo json_encode($response);
            }

    }
    
    // Output a success message
else {
    // array to return on every request
    $response = array(
        "status"=>false,
        "message"=>"withraw request failed"
    );
    // Output a success message
    echo json_encode($response);
    
}
}

// Close database connection
$conn->close();
?>
