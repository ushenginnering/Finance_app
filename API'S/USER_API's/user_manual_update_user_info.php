<?php 
session_start();
include '../connect.php';
if(isset($_POST['update_fullname'])){

    $user_id = $_SESSION['user_id'];
    $fullname = $_POST['update_fullname'];
    $phone = $_POST['update_phone'];
    if (isset($_FILES['update_img'])){
    
    /***************************************************************/
    /**************** use image handler for user image *************/
    /***************************************************************/

    // Include the necessary file
    include "../handle_image.php";
    // Initialize the $image variable as an array and assign the uploaded file to it
    $image = array();
    $image  = $_FILES['update_img'];  
    // Get the name of the uploaded file
    $image_name =  $_FILES['update_img']["name"];
    // Get the temporary name of the uploaded file
    $image_temp_name =  $_FILES['update_img']["tmp_name"];
    // Specify the name of the column in the database where the image would be saved
    $db_image_holder =  "USER_IMAGE";
    // Specify the name of the table in the database where the user data is stored
    $db_table_name =  "users";
    // Specify the name of the column in the table that serves as the where guard
    $where_guard = "user_id";
    // Specify the value of the where guard column that corresponds to the user whose image is being uploaded
    $guard_par =  $user_id;
    // Specify the directory where the uploaded file should be saved
    $target_dir = "../uploads/";
    
    /***********************************************************************/
    /***********************************************************************/
// Get the uploaded deposit proof image file

// you cant upload the image like this
$deposit_proof = $_FILES['update_img']['tmp_name'];

// Prepare the SQL statement
$sql = "UPDATE users SET fullname = '$fullname', phone = '$phone' WHERE user_id = '$user_id'";

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
                        "message"=>"Updated with image succesfully"
                    );
                   echo json_encode($image_upload_response);
                }else{
                
                    $image_upload_response = array(
                        "status"=>false,
                        "message"=>  $handle_image
                    );
                   echo json_encode($image_upload_response); 
                }
            }
    }else{
        $sql = "UPDATE users SET fullname = '$fullname', phone = '$phone' WHERE user_id = '$user_id'";
        if(mysqli_query($conn, $sql)){

            $response = array(
                "status"=>true,
                "message"=>"Updated Succesfully",
            );
            echo json_encode($response);

        }else{
            $response = array(
                "status"=>true,
                "message"=>"Fail to update",
            );
            echo json_encode($response);
        }
    }

}

