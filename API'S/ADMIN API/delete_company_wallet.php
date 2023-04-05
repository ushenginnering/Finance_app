<?php
include "../connect.php";

// Get the wallet address posted to this page
if(isset($_POST['wallet_address'])){
  $wallet_address = $_POST['wallet_address'];
  
  // Select everything from company_wallet where wallet address matches the posted wallet address
  $sql = "SELECT * FROM company_wallets WHERE wallet_address = '$wallet_address'";
  $result = $conn->query($sql);
  
  // Check if any rows were returned
  if ($result->num_rows > 0) {
    // Delete the matching rows
    $sql = "DELETE FROM company_wallets WHERE wallet_address = '$wallet_address'";
    // execute SQL statement
    if ($conn->query($sql) === TRUE) {
      
      $delete_company_wallet = array(
          "status"=>true,
          "message"=>"Company wallet deleted successfully"
      );
      echo json_encode($delete_company_wallet);
  
    } else {
      $delete_company_wallet = array(
          "status"=>false,
          "message"=>"Error deleting Company wallet: " . $conn->error
      );
      echo json_encode($delete_company_wallet);
    }
  }else {
      $delete_company_wallet = array(
          "status"=>false,
          "message"=>"No matching rows found."
      );
      echo json_encode($delete_company_wallet);
    }
  
  // Close database connection
  $conn->close();
}
?>
