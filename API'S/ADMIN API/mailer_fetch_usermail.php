<?php
include "../connect.php";


$sql = "SELECT * FROM users ";  
$result = mysqli_query($conn, $sql);
$user_mail = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
       $user_mail[] =  $row['mail'];
    }
    $users = json_encode($user_mail);

        //echo "!"; 
        $response = array(
            "status"=>true,
            "message"=>$users
        );
        echo json_encode($response);
    }
    else{
        $response = array(
            "status"=>false,
            "message"=>$users,
        );
        echo json_encode($response);
}


?>