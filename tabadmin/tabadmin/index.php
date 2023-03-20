<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title>Home || Dashboard</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="fonts/style.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Loading starts -->
	<div id="loading-wrapper">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Loading ends -->


	<!-- Page wrapper start -->
	<div class="page-wrapper">

		<?php include 'control/nav.php';?>

		<!-- Page content start  -->
		<div class="page-content">

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
						<li class="dropdown" style="display:none;">
							<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
								<i class="icon-box"></i>
							</a>

						</li>
					</ul>
					<!-- Header actions end -->
				</div>
			</header>
			<!-- Header end -->

			<!-- Page header start -->
			<div class="page-header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item active">Admin Overview</li>
				</ol>
			</div>
			<!-- Page header end -->

			<!-- Main container start -->
			<div class="main-container">

				<div class="alert alert-info alert-dismissible fade show" role="alert">
					Hi Admin , you have a new support Ticket <a href="#"> View now</a>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="alert alert-info alert-dismissible fade show" role="alert">
					New User [__New_User_Email__] Just registered <a href="#"> View</a>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="alert alert-info alert-dismissible fade show" role="alert">
					New Investment from [__FirstName__] <a href="#"> View Transactions</a>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="spacer"></div>

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-users"></i>
							</div>
							<div class="sale-num">
								<h3>0</h3>
								<p>Total Users</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-credit"></i>
							</div>
							<div class="sale-num">
								<h3>0</h3>
								<p>Total Deposit</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-airplay"></i>
							</div>
							<div class="sale-num">
								<h3>0</h3>
								<p>Total Withdrawal</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-message"></i>
							</div>
							<div class="sale-num">
								<h3>0</h3>
								<p'>Total Investment</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Row end -->
				<!-- Row start -->

				<!-- Row end -->
			</div>
			<!-- Main container end -->

		</div>
		<!-- Page content end -->

	</div>
	<!-- Page wrapper end -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/moment.js"></script>
	<!-- Slimscroll JS -->
	<script src="vendor/slimscroll/slimscroll.min.js"></script>
	<script src="vendor/slimscroll/custom-scrollbar.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
</body>

</html>