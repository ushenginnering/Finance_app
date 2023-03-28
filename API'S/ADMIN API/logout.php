<?php
session_start();

if(isset($_GET['logout'])){
unset($_SESSION['admin_email']);

header("location:http://localhost/finance_app/tabadmin/login.php");
}

?>