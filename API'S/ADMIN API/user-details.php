<?php
include "connect.php";
if(isset($_GET["user_id"])){
    $user_id = $_GET["user_id"];

$sql_users = "SELECT * FROM users WHERE user_id = '$user_id'";
// $sql_deposit = "SELECT SUm(amount_deposited) as total_deposit FROM deposit_history WHERE transaction_status = 'approved'";
$sql_referral = "SELECT referral_name, referral_bonus FROM referral_history WHERE referred_by = '$user_id'";
$sql_investment = "SELECT * FROM investment_history WHERE user_id = '$user_id'";


$result_users = mysqli_query($conn, $sql_users);
if (mysqli_num_rows($result_users) > 0) {
    // fetch the result row as an associative array
    $row_users = mysqli_fetch_assoc($result_users);
    $total_users = $row_users;
}else{
    $total_users = "";
}


$result_referral = mysqli_query($conn, $sql_referral);
if (mysqli_num_rows($result_referral) > 0) {
    // fetch the result row as an associative array
    $total_referral = array();
    while ($row_referral_ = mysqli_fetch_assoc($result_referral)) {
        $total_referral[] = $row_referral_;
    }
}else{
    $total_referral = [];
}
$result_investment = mysqli_query($conn, $sql_investment);
if (mysqli_num_rows($result_investment) > 0) {
    // fetch the result row as an associative array
    $total_investment = array();
    $plans = array();
    while ($row_investment_ = mysqli_fetch_assoc($result_investment)) {
        $total_investment[] = $row_investment_;
        $plan = $row_investment_['investment_plan'];
        $plan_sql = "SELECT plan_name, percentage, plan_duration FROM company_investment_plan WHERE plan_name = '$plan'";
        $plan_result =  mysqli_query($conn, $plan_sql);
        if (mysqli_num_rows($plan_result) > 0) {
            // fetch the result row as an associative array
            while ($row_plan_ = mysqli_fetch_assoc($plan_result)) {
                $plans[] = $row_plan_;
            }
        }
    }
    // print_r($plans);
}else{
    $total_investment = [];
    $plans = [];
}
$message = array("user" => $total_users, "referral" => $total_referral, "investment" => $total_investment, "plan_info" => $plans);
$response = array(
    "status" => true,
    "message" => $message,
);
echo json_encode($response);
}
?>