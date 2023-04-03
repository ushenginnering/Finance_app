<?php 
include '../connect.php';
if(isset($_POST['update_fullname'])){
    $user_id = $_POST['user_id'];
    $fullname = $_POST['update_fullname'];
    $phone = $_POST['update_phone'];
    $country = $_POST['update_country'];
    if (isset($_FILES['update_img'])){
        $img = $_FILES['update_img'];
        $sql = "UPDATE users SET fullname";
    }else{
        $sql = "UPDATE users SET fullname = '$fullname', phone = '$phone', country = '$country' WHERE user_id = '$user_id'";
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

if(isset($_POST['account_balance'])){

  $account_balance = $_POST['account_balance'];
  $total_profit = $_POST['total_profit'];
  $referral_bonus = $_POST['referral_bonus'];

  $sql = "UPDATE accounts_info SET balance = '$account_balance', total_profit = '$total_profit', referral_bonus = '$referral_bonus'";
  if(mysqli_query($conn, $sql)){
    $response = array(
        "status"=>true,
        "message"=>"Updated Succesfully",
    );
    echo json_encode($response);

}else{
    $response = array(
        "status"=>false,
        "message"=>"Fail to update",
    );
    echo json_encode($response);
}
}
