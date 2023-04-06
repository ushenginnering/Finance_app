<?php
// Set the user ID
session_start();
$user_id = $_SESSION['user_id'];

include "../connect.php";

// Prepare and execute the SQL statement
$sql = "SELECT COUNT(*) as count FROM NOTIFICATIONS WHERE user_id = '$user_id' AND status = '0'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (mysqli_num_rows($result) > 0) {
    // Output the count
    while ($row = mysqli_fetch_assoc($result)) {
        $count = $row['count'];
    }

    $open_notice_response = array(
        "status"=>true,
        "message"=>$count
    );
   echo json_encode($open_notice_response);

} else {
    $open_notice_response = array(
        "status"=>true,
        "message"=> "0"
    );
   echo json_encode($open_notice_response);
}

// Close the database connection
mysqli_close($conn);
?>
