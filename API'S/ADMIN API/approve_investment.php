<?php
session_start();
include "connect.php";
// Define the transaction ID to update
/*
$_POST['approve'] = true;
$_POST['transaction_id'] = 55450;
*/

if (isset($_POST['approve']))
{
    $transaction_id = $_POST['transaction_id'];

    $script = "SELECT amount_investment FROM investment_history WHERE transaction_id = '$transaction_id' and transaction_status = 'pending'";
    $result = mysqli_query($conn, $script);

    // check if query returned any rows
    if (mysqli_num_rows($result) > 0) {

                    
                // Update the transaction status to "approved"
                $sql = "UPDATE investment_history SET transaction_status='approved' WHERE transaction_id = $transaction_id and transaction_status = 'pending'";

                if (mysqli_query($conn, $sql)) {
                    // add sum to the existing wallet value of this patient

                    $script = "SELECT amount_invested, user_id FROM investment_history WHERE transaction_id = '$transaction_id'";
                    $result = mysqli_query($conn, $script);

                    // check if query returned any rows
                    if (mysqli_num_rows($result) > 0) {
                        // fetch the result row as an associative array
                        $row = mysqli_fetch_assoc($result);
                        // access the value of amount_deposited column
                        $amount_invested = $row['amount_invested'];
                        $user_id = $row['user_id'] ; // set user_id
                    }else{
                        $amount_invested = 0;
                    }
                   
                    // update the balance with the sum of balance and amount_deposited
                    $sql = "UPDATE accounts_info SET balance = balance - $amount_invested WHERE user_id = '$user_id'";      
                    
                    if (mysqli_query($conn, $sql)) {
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
