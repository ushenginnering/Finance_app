<?php
session_start();

if(isset($_GET['logout'])){
unset($_SESSION['user_id']);
unset($_SESSION['fullname']);

header("location:../../../../../Finance_app/index.php");
}
?>