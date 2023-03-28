<?php
session_start();

if(isset($_GET['logout'])){
unset($_SESSION['user_id']);
unset($_SESSION['fullname']);

header("location:http://localhost/finance_app/user/login.php");
}
?>