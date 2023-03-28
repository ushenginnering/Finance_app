<?php
session_start();
$referal_link = "http://localhost/finance_app/user/signup.php?referral_link=".$_SESSION['user_id'];
$response = array(
    "referal_status"=>true,
    "message"=>"signup with my referal link ".$referal_link
);
echo json_encode($response);
?>