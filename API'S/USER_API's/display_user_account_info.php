<?php 
session_start();
include "connect.php";
// Define the transaction ID to update
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

}
$sql_balance = "SELECT balance FROM accounts_info WHERE user_id = '$user_id'";
$sql_profit = "SELECT total_profit FROM accounts_info WHERE user_id = '$user_id'";
$sql_withdrawal = "SELECT SUM(amount_withdrawn) as total_withdraws FROM withdrawal_history WHERE transaction_status = 'approved' AND user_id = '$user_id'";
$sql_invests = "SELECT SUM(amount_invested) as total_invests FROM investment_history WHERE transaction_status = 'approved' AND user_id = '$user_id'";
$sql_active_investment = "SELECT COUNT(*) as total_investments FROM investment_history WHERE transaction_status = 'approved' AND user_id = '$user_id'";
$sql_last_deposit = "SELECT amount_deposited FROM deposit_history WHERE transaction_status = 'approved' AND user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$sql_last_withdrawal = "SELECT amount_withdrawn FROM withdrawal_history WHERE transaction_status = 'approved' AND user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$sql_referral = "SELECT referral_bonus FROM accounts_info WHERE user_id = '$user_id'";
$sql_referral_link = "SELECT referral_link FROM accounts_info WHERE user_id = '$user_id'";


$result_balance = mysqli_query($conn, $sql_balance);
if (mysqli_num_rows($result_balance) > 0) {
    // fetch the result row as an associative array
    $row_balance = mysqli_fetch_assoc($result_balance);
    $total_balance = $row_balance['balance'];
}else{
    $total_balance = 0;
}

$result_profit = mysqli_query($conn, $sql_profit);
if (mysqli_num_rows($result_profit) > 0) {
    // fetch the result row as an associative array
    $row_profit = mysqli_fetch_assoc($result_profit);
    $total_profit = $row_profit['total_profit'];
}else{
    $total_profit= 0;
}

$result_withdrawal = mysqli_query($conn, $sql_withdrawal);
if (mysqli_num_rows($result_withdrawal) > 0) {
    // fetch the result row as an associative array
    $row_withdrawal = mysqli_fetch_assoc($result_withdrawal);
    $total_withdrawal = $row_withdrawal['total_withdraws'];
}else{
    $total_withdrawal = 0;
}

$result_invests = mysqli_query($conn, $sql_invests);
if (mysqli_num_rows($result_invests) > 0) {
    // fetch the result row as an associative array
    $row_invests = mysqli_fetch_assoc($result_invests);
    $total_invests = $row_invests['total_invests'];
}else{
    $total_invests = 0;
}
$result_investment = mysqli_query($conn, $sql_active_investment);
if (mysqli_num_rows($result_investment) > 0) {
    // fetch the result row as an associative array
    $row_investment = mysqli_fetch_assoc($result_investment);
    $total_investment = $row_investment['total_investments'];
}else{
    $total_investment = 0;
}
$result_last_deposit = mysqli_query($conn, $sql_last_deposit);
if (mysqli_num_rows($result_last_deposit) > 0) {
    // fetch the result row as an associative array
    $row_last_deposit = mysqli_fetch_assoc($result_last_deposit);
    $total_last_deposit = $row_last_deposit['amount_deposited'];
}else{
    $total_last_deposit = 0;
}
$result_last_withdrawal = mysqli_query($conn, $sql_last_withdrawal);
if (mysqli_num_rows($result_last_withdrawal) > 0) {
    // fetch the result row as an associative array
    $row_last_withdrawal = mysqli_fetch_assoc($result_last_withdrawal);
    $total_last_withdrawal = $row_last_withdrawal['amount_withdrawn'];
}else{
    $total_last_withdrawal = 0;
}

$result_referral = mysqli_query($conn, $sql_referral);
if (mysqli_num_rows($result_referral) > 0) {
    // fetch the result row as an associative array
    $row_referral = mysqli_fetch_assoc($result_referral);
    $total_referral = $row_referral['referral_bonus'];
}else{
    $total_referral = 0;
}
$result_referral_link = mysqli_query($conn, $sql_referral_link);
if (mysqli_num_rows($result_referral) > 0) {
    // fetch the result row as an associative array
    $row_referral_link = mysqli_fetch_assoc($result_referral_link);
    $total_referral_link = $row_referral_link['referral_link'];
}else{
    $total_referral_link = "";
}

$message = array(
    "total_deposit" => $total_invests, 
    "total_balance" => $total_balance, 
    "total_profit" => $total_profit, 
    "total_withdrawal" => $total_withdrawal,
    "total_active_investment" => $total_investment,
    "last_deposit" => $total_last_deposit,
    "last_withdrawal" => $total_last_withdrawal,
    "referral_bonus" => $total_referral,
    "referral_link" => $total_referral_link,

);
$response = array(
    "status" => true,
    "message" => $message,
);
echo json_encode($response);
?>