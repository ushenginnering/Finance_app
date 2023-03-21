<?php
include "../connect.php";

// Build the SQL query to retrieve data from the deposit_history table
$sql = "SELECT id, user_id, transaction_id, date_time, amount_deposited, deposit_type, transaction_status FROM deposit_history";

// Execute the query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Create an array to hold the deposit history data
    $deposit_history = array();

    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Add the row data to the deposit history array
        $deposit_history[] = $row;

        // get full name and email from transaction user_id
        // Build the SQL query to retrieve data from the deposit_history table
        $user_id =  $row['user_id'];
        $sql_user = "SELECT fullname, mail  FROM users where user_id = '$user_id'";
        // Execute the query
        $result_user = mysqli_query($conn, $sql_user);

        if  (mysqli_num_rows($result_user) > 0){
            // Loop through each row of the result set
            while ($row_user = $result->fetch_assoc()) {
                // Add the row data to the deposit history array
                $deposit_history[] = $row_user;
            }
        }

    }

    // Encode the deposit history array as JSON and output it
    echo json_encode($deposit_history);
} else {
    // Output an error message if there are no rows in the result set
    echo "No deposit history data found.";
}
?>
