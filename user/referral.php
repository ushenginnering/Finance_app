<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="author" content="">
	<link rel="shortcut icon" href="img/fav.png" />

	<!-- Title -->
	<title>User Dashboard || Referral</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="fonts/style.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="vendor/lobipanel/css/lobipanel.css" />
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

			<!-- Page header start -->
			<div class="page-header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item active">Referral</li>
				</ol>
			</div>
			<!-- Page header end -->

			<!-- Main container start -->
			<div class="main-container">


				<div class="spacer"></div>

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card lobipanel-close">
							<div class="card-header">
								<span id="greating"></span> <?php echo isset($_SESSION['fullname']) ? ucfirst(explode(" ", $_SESSION['fullname'])[0]) : ""?> 👋
								<!-- <span id="">and Welcome to Acumen Global! </span>--><br>
								<small>Welcome to Referal, this page shows total referred people that have used your link</small>
							</div>
							<div class="__notification alert" role="alert"></div>
						</div>
					</div>
					
				</div>
				<!-- Row end -->
				
				<div class="row gutters">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-users"></i>
							</div>
							<div class="sale-num">
								<h3>0</h3>
								<p class="text-dark">Referal Bonus</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-users"></i>
							</div>
							<div class="sale-num">
								<h3>0</h3>
								<p class="text-dark">Total Refferal</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Row end -->
				<div class="row gutters">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card primary">
							<div class="card-header">
								<div class="card-title">Refferal Link</div>
							</div>
							<div class="card-body">
								<!-- <h5>Refferal Link</h5> -->
								<p class="card-text text-white"><a href="https://stougiesinvestio.com/?refcode=Alexmak"
										class="text-white bold" id="p1">https://stougiesinvestio.com/?refcode=Alexmak</a>
								</p>
								<div class="pricing-footer">
									<a href="#" onclick="copyToClipboard('#p1')" class="btn btn-dark btn-lg">Copy Referral link</a>
								</div>
							</div>
						</div>
					</div>
				</div>
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
	<script src="vendor/lobipanel/js/lobipanel.js"></script>
	<script src="vendor/lobipanel/js/lobipanel-custom.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
	<script>
		const time = new Date().getHours();
		let greeting;
		if (time < 10) {
			greeting = "Good morning";
		} else if (time < 20) {
			greeting = "Good day";
		} else {
			greeting = "Good evening";
		}
		document.getElementById("greating").innerHTML = greeting;
	</script>

	<script>
		function copyToClipboard(element) {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($(element).text()).select();
			document.execCommand("copy");
			$temp.remove();
		}
	</script>
</body>

</html>