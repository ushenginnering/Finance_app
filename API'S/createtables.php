<?php
include "connect.php";

// SQL query to create the USERS table
$sql = "CREATE TABLE USERS (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FIRST_NAME VARCHAR(30) NOT NULL,
    LAST_NAME VARCHAR(30) NOT NULL,
    EMAIL VARCHAR(50) NOT NULL,
    USER_ID VARCHAR(20) NOT NULL,
    REFERRAL VARCHAR(20),
    USER_IMAGE VARCHAR(100)
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
    account_status ENUM('ACTIVE', 'INACTIVE') DEFAULT 'INACTIVE',
    active_investments FLOAT(10, 2),
    total_profit FLOAT(10, 2),
    balance FLOAT(10, 2),
    referral_link VARCHAR(255)
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
    USER_ID INT(6) NOT NULL,
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
    withdrawal_address VARCHAR(255) NOT NULL
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
    user_id INT(6) NOT NULL,
    investment_plan VARCHAR(255) NOT NULL,
    active_investments INT(6) NOT NULL,
    profit DECIMAL(10,2) NOT NULL,
    amount_invested DECIMAL(10,2) NOT NULL,
    investment_type ENUM('NEW', 'RE-NEWAL') NOT NULL
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }



// SQL query to create table
$sql = "CREATE TABLE referrals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    referral_name VARCHAR(255) NOT NULL,
    referral_email VARCHAR(255) NOT NULL,
    referral_bonus DECIMAL(10, 2) NOT NULL,
    amount_invested DECIMAL(10, 2) NOT NULL,
    investment_type ENUM('new', 'renewal') NOT NULL
)";

// Execute the query
if(mysqli_query($conn, $sql)){
    echo "working <br>";
    }else{
        echo "failed <br>";
    }
?>