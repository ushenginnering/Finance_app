<?php
include "../sendemail.php";
include 'connect.php';
    $sql = "SELECT * FROM referral_history ";  
    $result = mysqli_query($conn, $sql);
    $referal_history =  array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           $referal_history[] =  $row;
        }
    }

    $ref_his = json_encode($referal_history);
    if ($send_email == 'Record saved successfully and email sent') {
        //echo "!"; 
        $response = array(
            "referral_history"=>true,
            "message"=>$ref_his,
        );
        echo json_encode($response);
    }else{
        $response = array(
            "referral_history"=>false,
            "message"=>$ref_his,
        );
        echo json_encode($response);
    }







?>