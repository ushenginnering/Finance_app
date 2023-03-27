<?php
include "../connect.php";

// Get the wallet address posted to this page
$wallet_address = $_POST['wallet_address'];

// Select everything from company_wallet where wallet address matches the posted wallet address
$sql = "SELECT * FROM company_wallet WHERE wallet_address = '$wallet_address'";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
  // Delete the matching rows
  $sql = "DELETE FROM company_wallet WHERE wallet_address = '$wallet_address'";
  if ($conn->query($sql) === TRUE) {
    echo "Rows deleted successfully!";
  } else {
    echo "Error deleting rows: " . $conn->error;
  }
} else {
  echo "No matching rows found.";
}

// Close database connection
$conn->close();
?>
