<?php
    session_start();
    //  echo $_SESSION['user_id'];
    if (!isset($_SESSION['user_id']) or ($_SESSION['user_id'] == "") or ($_SESSION['user_id'] == "0")){
        header("location:login.php");
    }

    // include '../../ADMIN API/admin_auto_end_investment.php';  // link to auto end investment 
?>


<!-- Sidebar wrapper start  will get back to this later-->
<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar brand start  -->
<div class="sidebar-brand">
    <a href="index.php" class="logo">
        <img src="img/logo.png" alt="" />
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
                <a href="deposit.php">
                    <i class="icon-credit"></i>
                    <span class="menu-text">Deposit section</span>
                </a>
            </li>
            <li>
                <a href="invest.php">
                    <i class="icon-import_export"></i>
                    <span class="menu-text">Invest</span>
                </a>
            </li>

           

            <li>
                <a href="withdrawal.php">
                    <i class="icon-sentiment_very_satisfied"></i>
                    <span class="menu-text">Withdrawal section</span>
                </a>
            </li>
            <li>
                <a href="referral.php">
                    <i class="icon-users"></i>
                    <span class="menu-text">Referral</span>
                </a>
            </li>
            <li>
                <a href="transactions.php">
                    <i class="icon-input"></i>
                    <span class="menu-text">Transactions History</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <i class="icon-headset_mic"></i>
                    <span class="menu-text">Customer Center</span>
                </a>
            </li> -->

            <li>
                <a href="http://localhost/finance_app/API'S/USER_API's/logout.php?logout=1">
                    <i class="icon-log-out"></i>
                    <span class="menu-text">Logout</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- sidebar menu end -->

</div>
<!-- Sidebar content end -->

</nav>
<!-- Sidebar wrapper end -->


<!-- Header start -->

            <header class="header">
				<div class="toggle-btns">
					<a id="toggle-sidebar" href="#">
						<i class="icon-list"></i>
					</a>
					<a id="pin-sidebar" href="#">
						<i class="icon-list"></i>
					</a>
				</div>
				<div class="header-items">


					<!-- Header actions start -->
					<ul class="header-actions">
						<li class="dropdown">
							<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
								<i class="icon-bell"></i>
								<span class="count-label">0</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
								<!-- <div class="dropdown-menu-header">
									Notifications (40)
								</div> -->
								<ul class="header-notifications">
									<li>
										<!-- <a href="transactions.html">
											<div class="details">
												<div class="noti-details">Membership has been ended.</div>
												<div class="noti-date">Oct 20, 07:30 pm</div>
											</div>
										</a> -->
									</li>
								</ul>
							</div>
						</li>
						<li class="dropdown">
							<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
								aria-haspopup="true">
								<span class="user-name"><?php echo ucfirst(explode(" ", $_SESSION['fullname'])[0]); ?></span>
								<span class="avatar"> 
									<img src="img/user24.png" alt="avatar">
									<span class="status online"></span>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
								<div class="header-profile-actions">

									<a href="account-settings.php"><i class="icon-user1"></i> My Profile</a>
									<a href="login.php"><i class="icon-log-out1"></i> Sign Out</a>
								</div>
							</div>
						</li>
					</ul>
					<!-- Header actions end -->
				</div>
			</header>
			<!-- Header end -->
           <script src="//code.tidio.co/t6hgilkrcdxropb6neap8rsn9gq6hhbz.js" async></script>