<?php
session_start();
include "../connect.php";
if(isset($_POST["investment_plan"])){

// Get the user ID, transaction ID, deposit amount, deposit type, and transaction status from the form
$user_id = $_SESSION['user_id']   ; /* = '215864'*/
$transaction_id = rand(3490,58888); 
$amount_invested = $_POST['amount_invested'] ; /*= '12000'*/
$investment_plan = $_POST['investment_plan'] ;
$profit = $_POST['profit'] ;
$transaction_status = "pending";


$sql_plan = "SELECT plan_duration FROM company_investment_plan WHERE plan_name = '$investment_plan'";
// Execute the query
$result_plan = mysqli_query($conn, $sql_plan);

if (mysqli_num_rows($result_plan) > 0) {
    // Loop through each row of the result set
    while ($row_plan = $result_plan->fetch_assoc()) {
        // Assign the plan duration value to $plan_duration
        $plan_duration = $row_plan['plan_duration'];
    }
}

// Prepare the SQL statement
$todayDateTime = date('Y-m-d H:i:s'); // current date and time
$futureDateTime = date('Y-m-d H:i:s', strtotime('+'.$plan_duration.' days'));

$sql = "INSERT INTO investment_history (user_id, transaction_id, investment_plan, amount_invested, profit, transaction_status, created_at, end_date, profit_to_get) 
VALUES ( '$user_id', '$transaction_id',  '$investment_plan', '$amount_invested','0', 'pending','$todayDateTime','$futureDateTime', '$profit')";
// Execute the statement
if (mysqli_query($conn,$sql)){

        $balance_result = mysqli_query($conn, "SELECT balance FROM accounts_info WHERE user_id = '$user_id'");
    if (mysqli_num_rows($balance_result) > 0) {
        // fetch the result row as an associative array
        $row_balance = mysqli_fetch_assoc($balance_result);
        $balance = $row_balance['balance'];
    }else{
        $balance = 0;
    }
        $update_sql = "UPDATE accounts_info SET balance = $balance - $amount_invested WHERE user_id = '$user_id'";       

        if(mysqli_query($conn, $update_sql)){
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
}else{
    $response = array(
        "status"=>false,
        "message"=>"Failed to submit investment",

    );
    echo json_encode($response);
}

}

?>


