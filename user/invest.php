<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="description"
		content="Acumen global was founded with the goal to address any gaps in the value chain for any project management activity, in both oil and gas and non-oil and gas sector projects Our interest cut across oil and gas, medical, and construction services. The Directors and managers are qualified in Project Management, Engineering and, Consulting, Financial and Marketing Management, which allow us to Manage all facets of a project.">
	<meta name="author" content="">
	<link rel="shortcut icon" href="img/fav.png" />

	<!-- Title -->
	<title>User Dashboard || Investment</title>
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
					<li class="breadcrumb-item active">Investment Section</li>
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
								<span id="greating"></span> Alex👋
								<!-- <span id="">and Welcome to Acumen Global! </span>--><br>
								<small>Welcome to Investment section choose a package within the range of your active
									Balance.</small>

							</div>
						</div>
					</div>
					
				</div>
				<!-- Row end -->
				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="pricing-plan">
							<div class="pricing-header">
								<h4 class="pricing-title">Starter Plan</h4>
								<div class="pricing-save">2% daily for 10days</div>
							</div>
							<ul class="pricing-features">
								<li>Minimun deposit : $100</li>
								<li>Maximum deposit: $9,9999</li>
								<li>10% refferal commission</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="pricing-plan">
							<div class="pricing-header">
								<h4 class="pricing-title">Trader Plan</h4>
								<div class="pricing-save">2.5% daily for 10days</div>
							</div>
							<ul class="pricing-features">
								<li>Minimun deposit : $10,000</li>
								<li>Maximum deposit: $49,9999</li>
								<li>10% refferal commission</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="pricing-plan">
							<div class="pricing-header">
								<h4 class="pricing-title">Investor Plan</h4>
								<div class="pricing-save">3% daily for 10days</div>
							</div>
							<ul class="pricing-features">
								<li>Minimun deposit : $50,000</li>
								<li>Maximum deposit: Unlimited</li>
								<li>10% refferal commission</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Row end -->
				<div class="row gutters">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-credit"></i>
							</div>
							<div class="sale-num">
								<h3>:00</h3>
								<p class="text-dark">Account Balance</p>
								<p class="text-danger"><a href="deposit.html" class="text-danger">Deposit funds here</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title text-danger">Investment Form</div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label>Investment Plan <small class="text-danger">Select Investment of your
											choice</small></label>
									<select class="form-control">
										<option>Starter Plan</option>
										<option>Trader Plan</option>
										<option>Investor Plan</option>
									</select>
								</div>

								<div class="form-group">
									<label>Amount <small class="text-danger">Invest an amount within your preferred choice of Investment</small></label>
									<input type="text" class="form-control" placeholder="Amount" />
								</div>
								<button class="btn btn-dark">Start Investment</button>
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