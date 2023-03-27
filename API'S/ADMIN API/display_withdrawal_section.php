<?php
include "../connect.php";
if(isset($_GET["filter"])){
    $filter = $_GET["filter"];
}
// Build the SQL query to retrieve data from the withdrawal_history table
$sql = "SELECT * FROM withdrawal_history WHERE transaction_status = '$filter'";

// Execute the query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Create an array to hold the deposit history data
    $withdrawal_history = array();
    $withdrawal_username = array();

    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Add the row data to the deposit history array
        $withdrawal_history[] = $row;
        // get full name and email from transaction user_id
         $user_id =  $row['user_id'];
          $sql_user = "SELECT fullname, mail  FROM users where user_id = '$user_id'";
        
        // Execute the query
        $result_user = mysqli_query($conn, $sql_user);

        if  (mysqli_num_rows($result_user) > 0){

           // echo "enter here";
            // Loop through each row of the result set
            while ($row_user = $result_user->fetch_assoc()) {
                // Add the row data to the deposit history array
                 $withdrawal_username[] = $row_user;
            }
        }

    }

    // Encode the deposit history array as JSON and output it

        // array to return on every request
        $response = array(
            "status"=>true,
            "message"=>json_encode($withdrawal_history),
            "others"=> $withdrawal_username
        );
        // Output a success message
        echo json_encode($response);
} else {
    // Output an error message if there are no rows in the result set
     // array to return on every request
     $response = array(
        "status"=>false,
        "message"=>"No deposite data found"
    );
    // Output a success message
    echo json_encode($response);
}
?>
