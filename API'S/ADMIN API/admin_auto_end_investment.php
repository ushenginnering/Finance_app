<?php
include "../connect.php";

// Get all pending investment history entries where end_date < today's date
$sql = "SELECT * FROM investment_history WHERE transaction_status = 'pending' AND end_date < CURDATE()";
if (mysqli_query($conn,$sql)){

// Loop through each entry
while($row = $result->fetch_assoc()) 
  {

    $amount_invested = $row["amount_invested"];
    $investment_plan = $row["investment_plan"];
    $user_id = $row["user_id"];
 
    // Get percentage from company_investment_plan table
  
    $sql = "SELECT percentage FROM company_investment_plan WHERE investment_plan = '$investment_plan'";
    $percentage_result = $conn->query($sql);
    $percentage_row = $percentage_result->fetch_assoc();
    $percentage = $percentage_row["percentage"];
  
    // Calculate profit and update investment history entry
    $profit = ($amount_invested * $percentage) / 100;
    $referral_bonus  =  0.1 * $profit;
    $investment_history_id = $row["id"];
    $sql = "UPDATE investment_history SET profit = '$profit', transaction_status = 'closed' WHERE id = '$investment_history_id'";
    mysqli_query($conn,$sql);
    $new  = $profit + $amount_invested;
    $sql = "UPDATE account_info SET balance  =  balance + '$new', total_profit = profit + '$profit' WHERE user_id = '$user_id'";
    mysqli_query($conn,$sql);

    //update referal balance of that user refered by person, if that person exist
    // Get all pending investment history entries where end_date < today's date
    $sql = "SELECT refered_by FROM users WHERE user_id = '$user_id' ";
    if (mysqli_query($conn,$sql)){

    // Loop through each entry
    while($row = $result->fetch_assoc()) 
      {
        $refered_by = $row["refered_by"];
        $sql = "UPDATE account_info SET referral_bonus  =  referral_bonus  + '$referral_bonus'  WHERE user_id = '$refered_by'";
        mysqli_query($conn,$sql);

        $sql = "UPDATE referral_history SET balance  =  balance + '$new', total_profit = profit + '$profit' WHERE user_id = '$user_id'";
        mysqli_query($conn,$sql);
      }
    }

  
  }
  
  // Close database connection
  $conn->close();
  
}
  ?>