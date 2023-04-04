<?php
// Check if an image file was uploaded

function handle_image($image, $image_name,$image_temp_name, $db_image_holder, $db_table_name, $where_guard, $guard_par,$target_dir){
    include "connect.php";
    if(isset($image)) {
        // Define the path where the uploaded file should be saved
        $target_file = $target_dir . basename($image_name);

        // Move the uploaded file to the target directory
        if(move_uploaded_file($image_temp_name, $target_file)) {
            
            // Update the user's image in the database
            // assuming this is submitted via a form
            $image_url = $target_file = "../API\'s/uploads/" . basename($image_name);
            
    
            $sql = "UPDATE $db_table_name SET $db_image_holder  ='$image_url' WHERE $where_guard ='$guard_par'";
            if(mysqli_query($conn, $sql)) {
             return  "image updated successfully.";
            } else {
                return "image didn't updated successfully.";
            }

        } else {
             return  $image_temp_name." ".$target_file;
        }
    } else {
        return "Error!!! no image sent here.";
   }
}
?>
