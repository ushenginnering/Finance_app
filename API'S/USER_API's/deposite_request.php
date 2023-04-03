<?php
session_start();
include "connect.php";

// Get the user ID, transaction ID, deposit amount, deposit type, and transaction status from the form
$user_id = $_SESSION['user_id'];
$transaction_id = rand(3490,58888); 
$amount_deposited = $_POST['amount_deposited'];
$deposit_type = $_POST['deposit_type'];
$transaction_status = "pending";


    /***************************************************************/
    /**************** use image handler for user image *************/
    /***************************************************************/

    // Include the necessary file
    include "../handle_image.php";
    // Initialize the $image variable as an array and assign the uploaded file to it
    $image = array();
    $image  = $_FILES['deposit_proof'];  
    // Get the name of the uploaded file
    $image_name =  $_FILES['deposit_proof']["name"];
    // Get the temporary name of the uploaded file
    $image_temp_name =  $_FILES['deposit_proof']["tmp_name"];
    // Specify the name of the column in the database where the image would be saved
    $db_image_holder =  "deposit_proof";
    // Specify the name of the table in the database where the user data is stored
    $db_table_name =  "deposit_history";
    // Specify the name of the column in the table that serves as the where guard
    $where_guard = "transaction_id";
    // Specify the value of the where guard column that corresponds to the user whose image is being uploaded
    $guard_par =  $transaction_id;
    // Specify the directory where the uploaded file should be saved
    $target_dir = "../uploads/";
    
    /***********************************************************************/
    /***********************************************************************/
// Get the uploaded deposit proof image file

// you cant upload the image like this
$deposit_proof = $_FILES['deposit_proof']['tmp_name'];

// Prepare the SQL statement
$sql = "INSERT INTO deposit_history (user_id, transaction_id, amount_deposited, deposit_type, transaction_status) VALUES ( '$user_id', '$transaction_id', '$amount_deposited', '$deposit_type', '$transaction_status')";

// Execute the statement
if (mysqli_query($conn, $sql)){

    /*************************************************************** */
/***************  this code was added to add image ****************/
/****************************************************************/

// handle image 
$handle_image  = handle_image($image, $image_name,$image_temp_name, $db_image_holder, $db_table_name, $where_guard, $guard_par,$target_dir,$conn);
if ($handle_image == "image updated successfully." )
{
                    $image_upload_response = array(
                        "status"=>true,
                        "message"=>"Deposit submitted succesfully"
                    );
                   echo json_encode($image_upload_response);
                }else{
                
                    $image_upload_response = array(
                        "status"=>false,
                        "message"=>  $handle_image
                    );
                   echo json_encode($image_upload_response); 
                }
/*******************************************************************/
/***************************code end here **************************/
/*******************************************************************/

}else{
    $response = array(
        "status"=>false,
        "message"=>"Failed to submit",

    );
    echo json_encode($response);
}

?>


