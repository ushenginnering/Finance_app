<?php 
session_start();
include "connect.php";
// Define the transaction ID to update

$sql_users = "SELECT COUNT(user_id) as total_users FROM users WHERE account_status = 'ACTIVE'";
$sql_deposit = "SELECT SUm(amount_deposited) as total_deposit FROM deposit_history WHERE transaction_status = 'approved'";
$sql_withdrawal = "SELECT SUM(amount_withdrawn) as total_withdrawal FROM withdrawal_history WHERE transaction_status = 'approved'";
$sql_investment = "SELECT COUNT(user_id) as total_investments FROM investment_history WHERE transaction_status = 'approved'";


$result_users = mysqli_query($conn, $sql_users);
if (mysqli_num_rows($result_users) > 0) {
    // fetch the result row as an associative array
    $row_users = mysqli_fetch_assoc($result_users);
    $total_users = $row_users['total_users'];
}else{
    $total_users = 0;
}

$result_deposit = mysqli_query($conn, $sql_deposit);
if (mysqli_num_rows($result_deposit) > 0) {
    // fetch the result row as an associative array
    $row_deposit = mysqli_fetch_assoc($result_deposit);
    $total_deposit = $row_deposit['total_deposit'];
}else{
    $total_deposit= 0;
}

$result_withdrawal = mysqli_query($conn, $sql_withdrawal);
if (mysqli_num_rows($result_withdrawal) > 0) {
    // fetch the result row as an associative array
    $row_withdrawal = mysqli_fetch_assoc($result_withdrawal);
    $total_withdrawal = $row_withdrawal['total_withdrawal'];
}else{
    $total_withdrawal = 0;
}
$result_investment = mysqli_query($conn, $sql_investment);
if (mysqli_num_rows($result_investment) > 0) {
    // fetch the result row as an associative array
    $row_investment = mysqli_fetch_assoc($result_investment);
    $total_investment = $row_investment['total_investments'];
}else{
    $total_investment = 0;
}
$message = array("total_users" => $total_users, "total_deposit" => $total_deposit, "total_withdrawal" => $total_withdrawal, "total_investment" => $total_investment);
$response = array(
    "status" => true,
    "message" => $message,
);
echo json_encode($response);
