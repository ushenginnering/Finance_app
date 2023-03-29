<?php 
session_start();
include "connect.php";
// Define the transaction ID to update
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

}
$sql_deposit = "SELECT * FROM deposit_history WHERE user_id = '$user_id'";
// $sql_profit = "SELECT total_profit FROM accounts_info WHERE user_id = '$user_id'";
$sql_withdrawal = "SELECT * FROM withdrawal_history WHERE user_id = '$user_id'";
$sql_investment = "SELECT * FROM investment_history WHERE user_id = '$user_id'";
$sql_referral = "SELECT * FROM referral_history WHERE referred_by = '$user_id'";


$result_deposit = mysqli_query($conn, $sql_deposit);
if (mysqli_num_rows($result_deposit) > 0) {
    // fetch the result row as an associative array
    $total_deposit = array();
    while ($row_deposit = mysqli_fetch_assoc($result_deposit)) {
        $total_deposit[] = $row_deposit;
    }
}else{
    $total_deposit = [];
}


$result_withdrawal = mysqli_query($conn, $sql_withdrawal);
if (mysqli_num_rows($result_withdrawal) > 0) {
    // fetch the result row as an associative array
    $total_withdrawal = array();
    while ($row_withdrawal = mysqli_fetch_assoc($result_withdrawal)) {
        $total_withdrawal[] = $row_withdrawal;
    }
}else{
    $total_withdrawal = [];
}

$result_investment = mysqli_query($conn, $sql_investment);
if (mysqli_num_rows($result_investment) > 0) {
    // fetch the result row as an associative array
    $total_investment = array();
    while ($row_investment = mysqli_fetch_assoc($result_investment)) {
        $total_investment[] = $row_investment;
    }
}else{
    $total_investment = [];
}

$result_referral = mysqli_query($conn, $sql_referral);
if (mysqli_num_rows($result_referral) > 0) {
    // fetch the result row as an associative array
    $total_referral = array();
    while ($row_referral = mysqli_fetch_assoc($result_referral)) {
        $total_referral[] = $row_referral;
    }
}else{
    $total_referral = [];
}

$message = array(
    "total_deposit" => $total_deposit, 
    "total_withdrawal" => $total_withdrawal,
    "total_investment" => $total_investment,
    "referrals" => $total_referral,

);
$response = array(
    "status" => true,
    "message" => $message,
);
echo json_encode($response);
?>