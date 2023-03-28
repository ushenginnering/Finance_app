<?php
session_start();

if(isset($_GET['logout'])){
unset($_SESSION['admin_email']);

header("location: ../../../../../Finance_app/tabadmin/login.php");
}

?>