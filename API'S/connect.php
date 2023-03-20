<?php

// Database credentials
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = "benjamin_finance_app"; // Database name 

// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password","$db_name") or die(mysqli_error());
if ($conn){
    echo "connected";
}


?>