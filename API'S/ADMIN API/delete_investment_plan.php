<?php
// include database connection page
include 'connect.php';

if(isset($_POST['plan_name'])){
    // get plan name from request parameter
    $plan_name = $_POST['plan_name'];
    
    
    // Select everything from company_wallet where wallet address matches the posted wallet address
    $sql = "SELECT * FROM company_investment_plan WHERE plan_name = '$plan_name'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
    // prepare SQL statement to delete the plan
    $sql = "DELETE FROM company_investment_plan WHERE plan_name = '$plan_name'";
    
    // execute SQL statement
    if ($conn->query($sql) === TRUE) {
        $delete_investment_response = array(
            "status"=>true,
            "message"=>"Investment plan deleted successfully"
        );
        echo json_encode($delete_investment_response);
      
    } else {
        $delete_investment_response = array(
            "status"=>false,
            "message"=>"Error deleting investment plan: " . $conn->error
        );
        echo json_encode($delete_investment_response);
    }
    }
    else {
        $delete_investment_response = array(
            "status"=>false,
            "message"=>"No matching rows found."
        );
        echo json_encode($delete_investment_response);
      }
    
    // close database connection
    $conn->close();
}
?>
