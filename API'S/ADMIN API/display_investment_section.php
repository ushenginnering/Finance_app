<?php
include "../connect.php";
if(isset($_GET["filter"])){
    $filter = $_GET["filter"];
}
// Build the SQL query to retrieve data from the deposit_history table
$sql = "SELECT id, user_id, transaction_id,investment_plan,amount_invested,profit, transaction_status,created_at, end_date FROM investment_history WHERE transaction_status = '$filter'";

// Execute the query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Create an array to hold the deposit history data
    $investment_history = array();
    $investment_username = array();

    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Add the row data to the deposit history array
        $deposit_history[] = $row;
        // get full name and email from transaction user_id
        $user_id =  $row['user_id'];
        $investment_plan = $row['investment_plan'];

        $sql_user = "SELECT fullname, mail  FROM users where user_id = '$user_id'";
        // Execute the query
        $result_user = mysqli_query($conn, $sql_user);

        if  (mysqli_num_rows($result_user) > 0){

           // echo "enter here";
            // Loop through each row of the result set
            while ($row_user = $result_user->fetch_assoc()) {
                // Add the row data to the deposit history array
                 $investment_username[] = $row_user;
            }
        }

        $sql_plan = "SELECT percentage, plan_duration  FROM company_investment_plan where plan_name = '$investment_plan'";
        // Execute the query
        $result_plan = mysqli_query($conn, $sql_plan);

        if  (mysqli_num_rows($result_plan) > 0){

           // echo "enter here";
            // Loop through each row of the result set
            while ($row_user = $result_user->fetch_assoc()) {
                // Add the row data to the deposit history array
                 $investment_username[] = $row_plan;
            }
        }

    }

    // Encode the deposit history array as JSON and output it
    $investment_data = json_encode($investment_history);

        // array to return on every request
        $response = array(
            "status"=>true,
            "message"=>$investment_data,
            "others"=> $investment_username
        );
        // Output a success message
        echo json_encode($response);
} else {
    // Output an error message if there are no rows in the result set
     // array to return on every request
     $response = array(
        "status"=>false,
        "message"=>"No Investment data found"
    );
    // Output a success message
    echo json_encode($response);
}
?>
