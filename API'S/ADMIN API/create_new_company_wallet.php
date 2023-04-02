<?php
include "../connect.php";

if (isset($_POST['create_new_company_wallet'])){
// Escape the variables to prevent SQL injection
$wallet_name = mysqli_real_escape_string($conn, $_POST['wallet_name']);
// work on the image handling
//$wallet_avatar = mysqli_real_escape_string($conn, $_FILES['wallet_avatar']["tmp_name"]);

$wallet_address = mysqli_real_escape_string($conn, $_POST['wallet_address']);

    /***************************************************************/
    /**************** use image handler for user image *************/
    /***************************************************************/

    // Include the necessary file
    include "../handle_image.php";
    // Initialize the $image variable as an array and assign the uploaded file to it
    $image = array();
    $image  = $_FILES['wallet_avatar'];  
    // Get the name of the uploaded file
    $image_name =  $_FILES['wallet_avatar']["name"];
    // Get the temporary name of the uploaded file
    $image_temp_name =  $_FILES['wallet_avatar']["tmp_name"];
    // Specify the name of the column in the database where the image would be saved
    $db_image_holder =  "wallet_avatar";
    // Specify the name of the table in the database where the user data is stored
    $db_table_name =  "company_wallets";
    // Specify the name of the column in the table that serves as the where guard
    $where_guard = "wallet_name";
    // Specify the value of the where guard column that corresponds to the user whose image is being uploaded
    $guard_par =  $wallet_name;
    // Specify the directory where the uploaded file should be saved
    $target_dir = "../uploads/";
    
    /***********************************************************************/
    /***********************************************************************/

// check if a wallet exist with a similar name 
$sql_check  =  "SELECT * from $db_table_name where $where_guard = $guard_par ";
if (mysqli_query($conn, $sql)){

    // Build the SQL query
    $sql = "INSERT INTO company_wallets (wallet_name, wallet_address) VALUES ('$wallet_name',  '$wallet_address')";


    // Execute the SQL query and store the result set
    if (mysqli_query($conn, $sql)){
        /*************************************************************** */
    /***************  this code was added to add image ****************/
    /****************************************************************/

                    // handle image 
                    $handle_image  = handle_image($image, $image_name,$image_temp_name, $db_image_holder, $db_table_name, $where_guard, $guard_par,$target_dir,$conn);
                    if ($handle_image == "image updated successfully." )
                    {
                        $image_upload_response = array(
                            "image_upload_status"=>true,
                            "image_upload_message"=>"image saved successfully"
                        );
                        echo json_encode($image_upload_response);
                    }else{
                    
                        $image_upload_response = array(
                            "image_upload_status"=>false,
                            "image_upload_message"=>   "image faile to save for some reason"
                        );
                        echo json_encode($image_upload_response); 
                    }
    /*******************************************************************/
    /***************************code end here **************************/
    /*******************************************************************/

        $response = array(
            "status"=>true,
            "message"=>"Wallet added succesfully"
        );
        echo json_encode($response);
        }else{
            $response = array(
                "status"=>false,
                "message"=>"Failed to add new wallet"
            );
            echo json_encode($response);
        }
    }
}
else{
    $response = array(
        "status"=>false,
        "message"=>"A wallet already exist with a similar name";
    );
    echo json_encode($response);
}

?>