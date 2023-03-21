<?php
include "../connect.php";

if (isset($_POST['create_new_company_wallet'])){
// Escape the variables to prevent SQL injection
$wallet_name = mysqli_real_escape_string($conn, $_POST['wallet_name']);
$wallet_avatar = mysqli_real_escape_string($conn, $_POST['wallet_avatar']);
$wallet_address = mysqli_real_escape_string($conn, $_POST['wallet_address']);

// Build the SQL query
$sql = "INSERT INTO company_wallets (wallet_name, wallet_avatar, wallet_address) VALUES ('$wallet_name', '$wallet_avatar', '$wallet_address')";

   // Execute the SQL query and store the result set
   if (mysqli_query($conn, $sql)){
    echo "email drafts updated successfully";
    }else{
        echo "failed to update email drafts";
    }
}

?>