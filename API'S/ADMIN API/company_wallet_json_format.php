<?php
// Set your database credentials
include "../connect.php";

// Build the SQL query to select data from the table
$sql = "SELECT * FROM company_wallets ";

// Execute the query and fetch the results
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Initialize an empty array to store the data
    $data = array();

    // Loop through each row and add it to the array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Convert the array to JSON format
    $json_data = json_encode($data);

    // Output the JSON data
    $response = array(
        "status"=>true,
        "message"=> $json_data,
    ); 
    echo json_encode($response);

} else {
    $response = array(
        "status"=>false,
        "message"=>"No record found",
    );
    echo json_encode($response);
}


?>
