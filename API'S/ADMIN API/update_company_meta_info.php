<?php
include "../connect.php";


if (isset($_POST['update_meta_info'])){
    // Get form data
    $site_name = $_POST['site_name'];
    $site_url = $_POST['site_url'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    $sql = "UPDATE company_profile  SET site_url = '$site_url', site_name = '$site_name',meta_keywords = '$meta_keywords', meta_description = '$meta_description' ";
   // Execute the SQL query and store the result set
    if (mysqli_query($conn, $sql)){
        echo "meta info updated successfully";
    }else{
        echo "failed to update meta info";
        
    }

}

?>