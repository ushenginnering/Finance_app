<?php
    session_start();
  //  echo $_SESSION['user_id'];
    if (!isset($_SESSION['admin_email']) or ($_SESSION['admin_email'] == "") or ($_SESSION['admin_email'] == "0")){
        header("location:../../../../../Finance_app/tabadmin/login.php");
    }
?>
<!-- Sidebar wrapper start -->
<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar brand start  -->
<div class="sidebar-brand">
    <a href="index.php" class="logo">
        <!-- <img src="img/logo.png" alt="" /> -->
    </a>
</div>
<!-- Sidebar brand end  -->

<!-- Sidebar content start -->
<div class="sidebar-content">

    <!-- sidebar menu start -->
    <div class="sidebar-menu">
        <ul>
            <li class="">
                <a href="index.php">
                    <i class="icon-devices_other"></i>
                    <span class="menu-text">Overview</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class="icon-folder"></i>
                    <span class="menu-text">Users Section</span>
                </a>
            </li>
            <li>
                <a href="deposit.php">
                    <i class="icon-credit"></i>
                    <span class="menu-text">Deposit section</span>
                </a>
            </li>

            <li>
                <a href="withdrawal.php">
                    <i class="icon-check-circle"></i>
                    <span class="menu-text">Withdrawal sections</span>
                </a>
            </li>


            <li>
                <a href="invest_section.php">
                    <i class="icon-check-circle"></i>
                    <span class="menu-text">Investment sections</span>
                </a>
            </li>

            <li>
                <a href="mailer.php">
                    <i class="icon-message-circle"></i>
                    <span class="menu-text">Mailer</span>
                </a>
            </li>
            <li>
                <a href="setting.php">
                    <i class="icon-settings1"></i>
                    <span class="menu-text">Setting</span>
                </a>
            </li>

            <li>
                <a href="../../../Finance_app/API'S/ADMIN API/logout.php?logout=1">
                    <i class="icon-settings1"></i>
                    <span class="menu-text">logout</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- sidebar menu end -->

</div>
<!-- Sidebar content end -->

</nav>
<!-- Sidebar wrapper end -->