<?php
// Set the user ID and notification ID
$user_id = $_POST['user_id'];
$notification_id = $_POST['notification_id'];

include "../connect.php"

if (isset($_POST['notification_id'])){
    // Prepare and execute the SQL statement
    $sql = "UPDATE NOTIFICATIONS SET status = '1' WHERE user_id = '$user_id' AND notification_id = '$notification_id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        $close_notice_response = array(
            "status"=>true,
            "message"=>"notification has been closed by the user"
        );
       echo json_encode( $close_notice_response);
    } else {
        $close_notice_response = array(
            "status"=>false,
            "message"=>"notification failed to close"
        );
       echo json_encode( $close_notice_response);
    }
}

?>
