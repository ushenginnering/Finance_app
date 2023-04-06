<?php
include "connect.php";
// Define the transaction ID to update
session_start();

if (isset($_POST['transaction_id']))
{
    $transaction_id = $_POST['transaction_id'];
    $user_id = $_SESSION['user_id'];
    // Update the transaction status to "approved"
    $sql = "UPDATE investment_history SET transaction_status = 'declined' WHERE transaction_id = '$transaction_id'";
    if (mysqli_query($conn, $sql)) {
        // array to return on every request
        $sql2 = "SELECT amount_invested FROM investment_history WHERE transaction_id = '$transaction_id'";
   
        $result = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result) > 0) {
        // fetch the result row as an associative array
        $row = mysqli_fetch_assoc($result);
        $amount = $row['amount_invested'];
        }
        $new_sql = "SELECT balance FROM accounts_info WHERE user_id = '$user_id'";
        
        $result_new = mysqli_query($conn, $new_sql);
         if (mysqli_num_rows($result_new) > 0) {
    // fetch the result row as an associative array
            $row_new = mysqli_fetch_assoc($result_new);
            $current_balance = $row_new['balance'];
            }else{
        $current_balance = 0;
        }

        $return_amount_sql = "UPDATE accounts_info SET balance = $current_balance + $amount WHERE user_id = '$user_id'";

        if(mysqli_query($conn, $return_amount_sql)){

            
                         /**************************** */
                    // create notification 
                    /************************************ */
                                    
                    // Set the user ID and notification title
                    $notification_title = "Investment Declined ";
                    // Generate a random notification ID
                    $notification_id = rand(54, 78834534);
                    // Set the notification content and status
                    $notification_content = "Your request to invest ".$amount." has been declined";
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
            "message"=>"Transaction decline status updated successfully.",
        );
        // Output a success message
        echo json_encode($response);
    }else{
        $response = array(
            "status"=>false,
            "message"=>"Transaction decline update failed.",
        );
        // Output a success message
        echo json_encode($response);
    }
    } else {
    //     // array to return on every request
        $response = array(
            "status"=>false,
            "message"=>"Transaction decline update failed.",
        );
        // Output a success message
        echo json_encode($response);
    }

}

?>
