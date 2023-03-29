<?php 
session_start();
include "connect.php";
// Define the transaction ID to update
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

}
$sql = "SELECT referral_bonus, referral_link FROM accounts_info WHERE user_id = '$user_id'";
$sql_2 = "SELECT COUNT(user_id) AS total_referrals FROM referral_history WHERE referred_by = '$user_id'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // fetch the result row as an associative array
    $row = mysqli_fetch_assoc($result);
    $referral_bonus = $row['referral_bonus'];
    $referral_link = $row['referral_link'];
}else{
    $referral_bonus = "";
}
$result_2 = mysqli_query($conn, $sql_2);
if (mysqli_num_rows($result_2) > 0) {
    // fetch the result row as an associative array
    $row_2 = mysqli_fetch_assoc($result_2);
    $total_referrals = $row_2;
}else{
    $total_referrals = "";
}

$message = array(
    "referral_bonus" => $referral_bonus, 
    "referral_link" => $referral_link,
    "total_referrals" => $total_referrals,
);
$response = array(
    "status" => true,
    "message" => $message,
);
echo json_encode($response);
