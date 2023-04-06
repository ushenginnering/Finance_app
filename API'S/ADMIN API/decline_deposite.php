<?php
include "connect.php";
// Define the transaction ID to update

if (isset($_POST['transaction_id']))
{
    $transaction_id = $_POST['transaction_id'];

    // Update the transaction status to "approved"
    $sql = "UPDATE deposit_history,user_id SET transaction_status='declined' WHERE transaction_id= '$transaction_id'";

    if (mysqli_query($conn, $sql)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row["user_id"];
                         /**************************** */
                    // create notification 
                    /************************************ */
                                    
                    // Set the user ID and notification title
                    $notification_title = "Investment Declined ";
                    // Generate a random notification ID
                    $notification_id = rand(54, 78834534);
                    // Set the notification content and status
                    $notification_content = "Your request to invest has been declined";
                    $status = 0;


                    // Prepare and execute the SQL statement
                    $sql = "INSERT INTO NOTIFICATIONS (user_id, TITLE, CONTENT, DATE_TIME, STATUS, notification_id)
                            VALUES ('$user_id', '$notification_title', '$notification_content', NOW(), '$status', '$notification_id')";

                    if (mysqli_query($conn, $sql)) {
                        //echo "New notification created successfully.";
                    } else {
                       // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                        

                    /****************************************************/
                    /**************notification end *********************/
                    /**************************************************/
                    
        // array to return on every request
        $response = array(
            "status"=>true,
            "message"=>"Transaction decline status updated successfully.",
        );
        // Output a success message
        echo json_encode($response);
    } else {
        // array to return on every request
        $response = array(
            "status"=>false,
            "message"=>"Transaction decline update failed.",
        );
        // Output a success message
        echo json_encode($response);
    }

}
}

?>
