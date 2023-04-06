<?php
session_start();
include "connect.php";
// Define the transaction ID to update
// $_POST['approve'] = true;
// $_POST['transaction_id'] = 55450;



if (isset($_POST['approve']))
{
    $transaction_id = $_POST['transaction_id'];

    $script = "SELECT amount_deposited FROM deposit_history WHERE transaction_id = '$transaction_id' and transaction_status = 'pending'";
    $result = mysqli_query($conn, $script);

    // check if query returned any rows
    if (mysqli_num_rows($result) > 0) {

                    
                // Update the transaction status to "approved"
                $sql = "UPDATE deposit_history SET transaction_status='approved' WHERE transaction_id=$transaction_id and transaction_status = 'pending'";

                if (mysqli_query($conn, $sql)) {
                    // add sum to the existing wallet value of this patient
                    
                   
                    $script = "SELECT amount_deposited, user_id FROM deposit_history WHERE transaction_id = '$transaction_id'";
                    $result = mysqli_query($conn, $script);

                    // check if query returned any rows
                    if (mysqli_num_rows($result) > 0) {
                        // fetch the result row as an associative array
                        $row = mysqli_fetch_assoc($result);
                        // access the value of amount_deposited column
                        $amount_deposited = $row['amount_deposited'];
                        $user_id = $row['user_id'] ; // set user_id
                    }else{
                        $amount_deposited = 0;
                    }
                    
                    // check if user has a row in the company's_wallet table
                    $sql = "SELECT * FROM accounts_info WHERE user_id = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) == 0) {
                        // if no row exists, create a new row for user with balance
                    $sql = "INSERT INTO accounts_info (user_id, balance) VALUES ('$user_id', '$amount_deposited')";
                    }else{
                        // update the balance with the sum of balance and amount_deposited
                    $sql = "UPDATE accounts_info SET balance = balance + $amount_deposited WHERE user_id = '$user_id'";      
                    }
                
                    if (mysqli_query($conn, $sql)) {

                        
                         /**************************** */
                    // create notification 
                    /************************************ */
                                    
                    // Set the user ID and notification title
                    $notification_title = "Approved deposited";
                    // Generate a random notification ID
                    $notification_id = rand(54, 78834534);
                    // Set the notification content and status
                    $notification_content = "Your request to deposite ".$amount_deposited." has been approved";
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
                            "message"=>"Transaction approved status updated successfully.",
                        );
                        // Output a success message            
                    }else{
                        $response = array(
                            "status"=>false,
                            "message"=>"Balance Update failed.",
                        );  
                    }

                    echo json_encode($response);

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
