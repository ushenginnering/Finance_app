<?php
include "connect.php";

// Get all pending investment history entries where end_date < today's date
$sql = "SELECT * FROM investment_history WHERE end_date < CURRENT_TIMESTAMP";
if (mysqli_query($conn,$sql)){
  // echo "hi";
$result = mysqli_query($conn,$sql);
// Loop through each entry
while($row = mysqli_fetch_assoc($result)) 
  {

    $amount_invested = $row["amount_invested"];
    $investment_plan = $row["investment_plan"];
    $user_id = $row["user_id"];
    // echo $amount_invested;
    // Get percentage from company_investment_plan table
  
    $sql = "SELECT percentage FROM company_investment_plan WHERE plan_name = '$investment_plan'";
    $percentage_result = $conn->query($sql);
    $percentage_row = $percentage_result->fetch_assoc();
    $percentage = $percentage_row["percentage"];
  
    // Calculate profit and update investment history entry
    $profit = ($amount_invested * $percentage) / 100;
    $referral_bonus  =  (10 * $profit) / 100;
    $investment_history_id = $row["id"];
    $sql = "UPDATE investment_history SET profit = '$profit', transaction_status = 'closed' WHERE id = '$investment_history_id'";
    mysqli_query($conn,$sql);
    $new  = $profit + $amount_invested;
    $result_balance = mysqli_query($conn, "SELECT balance, total_profit FROM accounts_info WHERE user_id = '$user_id'");
    if (mysqli_num_rows($result_balance) > 0) {
      // fetch the result row as an associative array
      $row_balance = mysqli_fetch_assoc($result_balance);
      $cur_balance = $row_balance['balance'];
      $cur_profit = $row_balance['total_profit'];
  }else{
      $cur_balance = 0;
      $cur_profit = 0;
  }
  
  $new_balance = $new + $cur_balance;
  $new_profit = $profit + $cur_profit;
  $new_referral_bonus = $cur_referral_bonus + $referral_bonus;
    $sql = "UPDATE accounts_info SET balance = '$new_balance', total_profit = '$new_profit' WHERE user_id = '$user_id'";
    // echo $sql;
    mysqli_query($conn,$sql);

    //update referal balance of that user refered by person, if that person exist
    // Get all pending investment history entries where end_date < today's date
    
    $sql = "SELECT refered_by FROM users WHERE user_id = '$user_id'";
    if (mysqli_query($conn,$sql)){
      $result = mysqli_query($conn,$sql);


    // Loop through each entry
    if(mysqli_num_rows($result) > 0) {
      $row_w = mysqli_fetch_assoc($result);
        $refered_by = $row_w["refered_by"];
    }

      $sql = "SELECT referral_bonus FROM referral_history WHERE user_id = '$user_id' AND referred_by = '$refered_by'";
     
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // fetch the result row as an associative array
        $row_ref = mysqli_fetch_assoc($result);
        $cur_ref_balance = $row_ref['referral_bonus'];
    }else{
      $cur_ref_balance = 0;
    }

    $result_balance_2 = mysqli_query($conn, "SELECT referral_bonus FROM accounts_info WHERE user_id = '$refered_by'");
      if (mysqli_num_rows($result_balance_2) > 0) {
        // fetch the result row as an associative array
        $row_ref_2 = mysqli_fetch_assoc($result_balance_2);
        $cur_referral_bonus = $row_ref_2['referral_bonus'];
        
  
    }else{
        $cur_referral_bonus = 0;
    }
  
      $new_referral_bonus = $cur_referral_bonus + $referral_bonus;

      $sql = "UPDATE accounts_info SET referral_bonus = '$new_referral_bonus'  WHERE user_id = '$refered_by'";
      mysqli_query($conn, $sql);

      $sql = "UPDATE referral_history SET referral_bonus = '$new_cur_ref_balance' WHERE user_id = '$user_id' AND referred_by = '$refered_by'";
      if(mysqli_query($conn, $sql)){
        
      }
    }

  
  }
  
  // Close database connection
  $conn->close();
  
}
