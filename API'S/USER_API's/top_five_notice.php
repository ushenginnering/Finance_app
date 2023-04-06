<?php
include "../connect.php";
// Set the user ID
$user_id = $_POST['user_id'];

// Prepare and execute the SQL statement
$sql = "SELECT * FROM NOTIFICATIONS WHERE user_id = '$user_id' AND status = '0' ORDER BY DATE_TIME DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (mysqli_num_rows($result) > 0) {
    // Store the rows in an array
    $notice = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $notice[] = $row;
    }

    $notification_holder =  json_encode($notice);
    
    $notification_response = array(
        "status"=>true,
        "message"=>$notification_holder
    );
   echo json_encode($notification_response);
} else {
    $notification_response = array(
        "status"=>false,
        "message"=>"no result found."
    );
   echo json_encode($notification_response);
}

?>
