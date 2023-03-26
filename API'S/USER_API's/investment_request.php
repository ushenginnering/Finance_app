<?php
session_start();
include "../connect.php";

// Get the user ID, transaction ID, deposit amount, deposit type, and transaction status from the form
$user_id = $_SESSION['user_id'];
$transaction_id = rand(3490,58888); 
$amount_invested = $_POST['amount_invested'];
$investment_plan = $_POST['investment_plan'];
$transaction_status = "pending";


// Prepare the SQL statement
	
$sql = "INSERT INTO investment_history (user_id, transaction_id,investment_plan,amount_invested,profit, transaction_status) 
VALUES ( '$user_id', '$transaction_id',  '$investment_plan', '$amount_invested','0', 'pending')";

// Execute the statement
if (mysqli_query($conn,$sql)){
    $response = array(
        "status"=>true,
        "message"=>"Deposit submitted succesfully",

    );
    echo json_encode($response);
}else{
    $response = array(
        "status"=>false,
        "message"=>"Failed to submit",

    );
    echo json_encode($response);
}

?>


