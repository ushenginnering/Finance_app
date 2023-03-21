<?php
session_start();
include "../connect.php";

// Get the user ID, transaction ID, deposit amount, deposit type, and transaction status from the form
$user_id = $_SESSION['user_id'];
$transaction_id = rand(3490,58888); 
$amount_deposited = $_POST['amount_deposited'];
$deposit_type = $_POST['deposit_type'];
$transaction_status = "pending";

// Get the uploaded deposit proof image file
$deposit_proof = file_get_contents($_FILES['deposit_proof']['tmp_name']);

// Prepare the SQL statement
$sql = "INSERT INTO deposit_history (user_id, transaction_id, amount_deposited, deposit_type, transaction_status, deposit_proof) VALUES ( '$user_id', '$transaction_id', '$amount_deposited', '$deposit_type', '$transaction_status', '$deposit_proof')";

// Execute the statement
if (mysqli_query($conn,$sql)){
    echo "Working";
}else{
    echo "failed";
}

?>


