<?php
session_start();
include "connect.php";
// Define the transaction ID to update

if (isset($_POST['approve'])){
    $transaction_id = $_POST['withdraw_id'];
    $script = "SELECT amount_withdrawn, user_id FROM withdrawal_history WHERE withdrawal_id = '$transaction_id' and transaction_status = 'pending'";
    $result = mysqli_query($conn, $script);

    // check if query returned any rows
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $amount_withdrawn = $row["amount_withdrawn"];
            $user_id = $row["user_id"];

                 
                // Update the transaction status to "approved"
                $sql = "UPDATE withdrawal_history SET transaction_status='approved' WHERE withdrawal_id = '$transaction_id' and transaction_status = 'pending'";

                if (mysqli_query($conn, $sql)) {

                    /**************************** */
                    // create notification 
                    /************************************ */
                                    
                    // Set the user ID and notification title
                    $notification_title = "Approved Withdrawal";
                    // Generate a random notification ID
                    $notification_id = rand(54, 78834534);
                    // Set the notification content and status
                    $notification_content = "Your request to withdraw has been approved";
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
                        $response = array(
                            "status"=>true,
                            "message"=>"Transaction approved status updated successfully.",
                        );
                        echo json_encode($response);
                    //     // Output a success message            
                    // }else{
                    }else{
                        $response = array(
                            "status"=>false,
                            "message"=>"Balance Update failed.",
                        );  
                        echo json_encode($response);

                    }
        }
               

    } else {
        // array to return on every request
        $response = array(
            "status"=>false,
            "message"=>"Transaction already approved",
        );
        // Output a success message
        echo json_encode($response);
    }

}

?>
