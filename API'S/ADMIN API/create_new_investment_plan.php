<?php
include '../connect.php';


if (isset($_POST['create_new_investment_plan'])){

$plan_name = $_POST['plan_name'];
$percentage = $_POST['percentage'];
$plan_duration = $_POST['plan_duration'];
$minimum_value = $_POST['minimum_value'];
$maximum_value = $_POST['maximum_value'];

// Escape the variables to prevent SQL injection
$plan_name = mysqli_real_escape_string($conn, $plan_name);
$percentage = mysqli_real_escape_string($conn, $percentage);
$plan_duration = mysqli_real_escape_string($conn, $plan_duration);
$minimum_value = mysqli_real_escape_string($conn, $minimum_value);
$maximum_value = mysqli_real_escape_string($conn, $maximum_value);

// Build the SQL query to insert a new row of data
$sql = "INSERT INTO company_investment_plan (plan_name, percentage, plan_duration, minimum_value, maximum_value)
        VALUES ('$plan_name', '$percentage', '$plan_duration', '$minimum_value', '$maximum_value')";

   // Execute the SQL query and store the result set
   if (mysqli_query($conn, $sql)){
    $response = array(
        "status"=>true,
        "message"=>"Investment plan added succesfully."
    );
    echo json_encode($response);
    }else{
        $response = array(
            "status"=>false,
            "message"=>"Failed to add investment plan"
        );
        echo json_encode($response);
    }
}
?>