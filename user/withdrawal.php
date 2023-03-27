<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<link rel="shortcut icon" href="img/fav.png" />

	<!-- Title -->
	<title>User Dashboard || Withdrawal</title>
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
					<li class="breadcrumb-item active">Withdrawal Section</li>
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
								<small>Welcome to Withdrawal section, Please select which of the profit you want to withdraw from.<span class="text-success "> (Referal or Account Balance)</span></small>

							</div>
							
						</div>
							<div class="__notification alert" role="alert"></div>
					</div>
					
				</div>
				<!-- Row end -->
				<!-- Row start --
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
				Row end -->
				<div class="row gutters">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-credit"></i>
							</div>
							<div class="sale-num">
								<h3 id="account-balance">:00</h3>
								<p class="text-dark">Account Balance</p>
								</p>
								<div class="custom-control custom-switch mb-3">
									<input type="radio" class="custom-control-input" name="amount" checked id="accbalance">
									<label class="custom-control-label" for="accbalance"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="info-stats4">
							<div class="info-icon">
								<i class="icon-users"></i>
							</div>
							<div class="sale-num">
								<h3 id="referral-bonus">0</h3>
								<p class="text-dark">Referal Bonus</p>
								<div class="custom-control custom-switch mb-3">
									<input type="radio" class="custom-control-input" id="refbonus" name="amount">
									<label class="custom-control-label" for="refbonus"></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title text-danger">Withdrawal Details form</div>
							</div>
							<form action="" id="withdraw">
								<div class="card-body">
									<div class="form-group">
										<label>Select Withdrawal Option <small class="text-danger">Select Withdrawal option that suits you</small></label>
										<select class="form-control" id="payment-type">
										</select>
									</div>
									<div class="form-group">
										<label>Amount <small class="text-danger">You can only withdraw from either Account Balance or Referal Bonus</small></label>
										<input type="text" class="form-control amount" placeholder="Amount" />
									</div>
	
									<div class="form-group">
										<label>Wallet Address <small class="text-danger"></small></label>
										<input type="text" class="form-control wallet-address" placeholder="" />
									</div>
									<input  type="submit" class="btn btn-dark withdrawal-btn" value="Complete Withdrawal"/>
								</div>
							</form>
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
	<script src="js/custom/functions.js"></script>
	<script src="js/custom/withdrawal.js"></script>
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

	<script src="//code.tidio.co/fg841ies8tcsghtpwdb3unsoi8o6sdeg.js" async></script>
</body>

</html>