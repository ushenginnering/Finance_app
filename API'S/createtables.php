<?php
include "connect.php";


// SQL query to create table
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    account_status ENUM('ACTIVE', 'INACTIVE') DEFAULT 'ACTIVE',
    password VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    user_id  VARCHAR(20) NOT NULL,
    USER_IMAGE VARCHAR(100),
    refered_by VARCHAR(20)
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }
           


// SQL statement to create the accounts_info table
$sql = "CREATE TABLE accounts_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    active_investments FLOAT(10, 2),
    total_profit FLOAT(10, 2),
    balance FLOAT(10, 2),
    referral_link VARCHAR(255),
    referral_bonus FLOAT(10, 2)
    )";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }




// SQL query to create table
$sql = "CREATE TABLE NOTIFICATIONS (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    TITLE VARCHAR(255) NOT NULL,
    CONTENT TEXT NOT NULL,
    DATE_TIME DATETIME DEFAULT CURRENT_TIMESTAMP
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }


// SQL query to create table
$sql = "CREATE TABLE deposit_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    transaction_id VARCHAR(50) NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    amount_deposited DECIMAL(10,2) NOT NULL,
    deposit_type VARCHAR(50) NOT NULL,
    transaction_status VARCHAR(50) NOT NULL,
    deposit_proof LONGBLOB
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }


// SQL query to create table
$sql = "CREATE TABLE withdrawal_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    withdrawal_id VARCHAR(50) NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    amount_withdrawn DECIMAL(10,2) NOT NULL,
    withdrawal_type VARCHAR(50) NOT NULL,
    transaction_status VARCHAR(50) NOT NULL,
    withdrawal_address VARCHAR(255) NOT NULL,
    withdraw_from VARCHAR(50) NOT NULL
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }


// SQL query to create table
$sql = "CREATE TABLE investment_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    transaction_id INT(6) UNSIGNED NOT NULL,
    investment_plan VARCHAR(50) NOT NULL,
    amount_invested DECIMAL(10,2) NOT NULL,
    profit DECIMAL(10,2) NOT NULL,
    profit_to_get DECIMAL(10,2) NOT NULL,
    transaction_status VARCHAR(20) NOT NULL,
    created_at DATE NOT NULL,
    end_date DATE NOT NULL
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }



// SQL query to create table
$sql = "CREATE TABLE referral_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(30) NOT NULL,
    referred_by VARCHAR(255) NOT NULL,
    referral_name VARCHAR(255) NOT NULL,
    referral_email VARCHAR(255) NOT NULL,
    referral_bonus DECIMAL(10, 2) NOT NULL,
    amount_invested DECIMAL(10, 2) NOT NULL,
    investment_history_id ENUM('new', 'renewal') NOT NULL
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }


    
// SQL query to create the company profile table
$sql = "CREATE TABLE company_profile (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    welcome_mail_draft TEXT,
    change_password_mail_draft TEXT,
    forget_password_mail_draft TEXT,
    receive_payment_mail_draft TEXT,
    active_gmail_address VARCHAR(255),
    active_gmail_password VARCHAR(255),
    system_auto_send_from_email_address VARCHAR(255),
    system_reply_email_address VARCHAR(255),
    admin_email VARCHAR(255),
    admin_password VARCHAR(255),
    site_url VARCHAR(255),
    site_name VARCHAR(255),
    meta_keywords VARCHAR(255),
    meta_description VARCHAR(255)
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }


    // Build the SQL query to create the table
$sql = "CREATE TABLE company_investment_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plan_name VARCHAR(30) NOT NULL,
    percentage FLOAT(5,2) NOT NULL,
    plan_duration INT(11) NOT NULL,
    minimum_value DECIMAL(10,2) NOT NULL,
    maximum_value DECIMAL(10,2) NOT NULL
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }


    
// Build the SQL query
$sql = "CREATE TABLE company_wallets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    wallet_name VARCHAR(50) NOT NULL,
    wallet_avatar VARCHAR(255),
    wallet_address VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    } "Error creating company wallets table: " . $conn->error;

?>