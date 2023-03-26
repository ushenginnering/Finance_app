<?php
session_start();
include "../connect.php";
if(isset($_POST["investment_plan"])){

// Get the user ID, transaction ID, deposit amount, deposit type, and transaction status from the form
$user_id = $_SESSION['user_id']   ; /* = '215864'*/
$transaction_id = rand(3490,58888); 
$amount_invested = $_POST['amount_invested'] ; /*= '12000'*/
$investment_plan = $_POST['investment_plan'] ;/*= '1234'*/
$transaction_status = "pending";


// Prepare the SQL statement
$todayDateTime = date('Y-m-d H:i:s'); // current date and time
$futureDateTime = date('Y-m-d H:i:s', strtotime('+10 days')); // date and time 10 days from now

	
$sql = "INSERT INTO investment_history (user_id, transaction_id, investment_plan, amount_invested, profit, transaction_status, created_at, end_date) 
VALUES ( '$user_id', '$transaction_id',  '$investment_plan', '$amount_invested','0', 'pending','$todayDateTime','$futureDateTime')";
echo $sql;
// Execute the statement
if (mysqli_query($conn,$sql)){
    $response = array(
        "status"=>true,
        "message"=>"Investment submitted succesfully",

    );
    echo json_encode($response);
}else{
    $response = array(
        "status"=>false,
        "message"=>"Failed to submit investment",

    );
    echo json_encode($response);
}

}

?>


